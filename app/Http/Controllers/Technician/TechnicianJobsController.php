<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Review;
use App\Models\User;
use App\Models\Product;
use App\Helpers\BookingStatusHelper;
use App\Mail\TechnicianOnRouteMail;
use App\Mail\JobScheduledConfirmationMail;
use App\Mail\BookingConfirmMail;
use App\Mail\JobCompletedSuccessfullyMail;
use App\Mail\FeedbackRequestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class TechnicianJobsController extends Controller
{
    /**
     * Display all jobs assigned to the technician
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('user.login')->with('error', 'Please login to view your jobs.');
        }

        // Get query parameters
        $search = $request->get('search', '');
        $statusFilter = $request->get('status', '');
        $dateFrom = $request->get('date_from', '');
        $dateTo = $request->get('date_to', '');
        $perPage = $request->get('per_page', 10);

        // Get all booking statuses for this technician
        $bookingStatusQuery = BookingStatus::with(['booking.product', 'booking.user'])
            ->where('technician_id', $user->id);

        // Apply date filters
        if ($dateFrom) {
            $bookingStatusQuery->whereDate('created_at', '>=', $dateFrom);
        }
        if ($dateTo) {
            $bookingStatusQuery->whereDate('created_at', '<=', $dateTo);
        }

        // Get all booking statuses
        $allBookingStatuses = $bookingStatusQuery->orderBy('created_at', 'desc')->get();

        // Process bookings with status information
        $processedJobs = $allBookingStatuses->map(function($bookingStatus) {
            $booking = $bookingStatus->booking;
            $customer = $booking->user;
            $product = $booking->product;
            $review = Review::where('booking_id', $booking->id)->first();
            
            // Determine status based on booking_status table
            $status = 'pending';
            $statusLabel = 'Pending';
            $statusClass = 'pending';
            
            switch ($bookingStatus->status) {
                case BookingStatusHelper::STATUS_PENDING:
                    $status = 'pending';
                    $statusLabel = 'Pending';
                    $statusClass = 'pending';
                    break;
                case BookingStatusHelper::STATUS_APPROVED:
                    $status = 'approved';
                    $statusLabel = 'Approved';
                    $statusClass = 'approved';
                    break;
                case BookingStatusHelper::STATUS_REJECTED:
                    $status = 'rejected';
                    $statusLabel = 'Rejected';
                    $statusClass = 'rejected';
                    break;
                case BookingStatusHelper::STATUS_ON_ROUTE:
                    $status = 'on_route';
                    $statusLabel = 'On Route';
                    $statusClass = 'on_route';
                    break;
                case BookingStatusHelper::STATUS_JOB_COMPLETED:
                    $status = 'completed';
                    $statusLabel = 'Completed';
                    $statusClass = 'completed';
                    break;
            }

            return [
                'booking' => $booking,
                'bookingStatus' => $bookingStatus,
                'customer' => $customer,
                'product' => $product,
                'review' => $review,
                'status' => $status,
                'statusLabel' => $statusLabel,
                'statusClass' => $statusClass,
            ];
        });

        // Apply search filter
        if ($search) {
            $processedJobs = $processedJobs->filter(function($item) use ($search) {
                $searchLower = strtolower($search);
                return 
                    str_contains(strtolower($item['customer']->name ?? ''), $searchLower) ||
                    str_contains(strtolower($item['customer']->email ?? ''), $searchLower) ||
                    str_contains(strtolower($item['booking']->installation_address ?? ''), $searchLower) ||
                    str_contains(strtolower($item['booking']->city ?? ''), $searchLower) ||
                    str_contains(strtolower($item['product']->title ?? ''), $searchLower) ||
                    str_contains(strtolower($item['booking']->notes ?? ''), $searchLower);
            });
        }

        // Apply status filter
        if ($statusFilter) {
            $processedJobs = $processedJobs->filter(function($item) use ($statusFilter) {
                return $item['status'] === $statusFilter;
            });
        }

        // Paginate the processed jobs
        $currentPage = $request->get('page', 1);
        $items = $processedJobs->values();
        $total = $items->count();
        $items = $items->slice(($currentPage - 1) * $perPage, $perPage)->values();
        
        $paginatedJobs = new \Illuminate\Pagination\LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

        // Calculate stats
        $stats = [
            'pending' => $processedJobs->where('status', 'pending')->count(),
            'approved' => $processedJobs->where('status', 'approved')->count(),
            'on_route' => $processedJobs->where('status', 'on_route')->count(),
            'completed' => $processedJobs->where('status', 'completed')->count(),
            'rejected' => $processedJobs->where('status', 'rejected')->count(),
        ];

        return view('technician.jobs', compact('paginatedJobs', 'stats', 'search', 'statusFilter', 'dateFrom', 'dateTo', 'perPage'));
    }

    /**
     * Update job status (approve, reject, on route, complete)
     */
    public function updateStatus(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'status' => 'required|integer|in:0,1,2,3,4',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $bookingStatus = BookingStatus::findOrFail($id);

            // Verify booking status belongs to authenticated technician
            if ($bookingStatus->technician_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }

            // Update status
            $bookingStatus->status = $request->status;
            $bookingStatus->save();

            // Load relationships for email sending
            $bookingStatus->load(['booking.product', 'booking.user', 'technician']);

            // If job is approved, send confirmation emails to both technician and customer
            if ($request->status == BookingStatusHelper::STATUS_APPROVED) {
                $booking = $bookingStatus->booking;
                $technician = $bookingStatus->technician;
                $customer = $booking->user;
                $product = $booking->product;

                // Send email to technician
                if ($technician && $technician->email && $booking && $customer && $product) {
                    try {
                        Mail::to($technician->email)->send(new JobScheduledConfirmationMail(
                            $booking,
                            $bookingStatus,
                            $technician,
                            $customer,
                            $product
                        ));
                        Log::info('Job scheduled confirmation email sent to technician', [
                            'booking_id' => $booking->id,
                            'technician_email' => $technician->email
                        ]);
                    } catch (\Exception $emailException) {
                        Log::error('Failed to send job scheduled confirmation email to technician', [
                            'booking_id' => $booking->id,
                            'error' => $emailException->getMessage()
                        ]);
                    }
                }

                // Send email to customer
                if ($customer && $customer->email && $booking && $technician && $product) {
                    try {
                        Mail::to($customer->email)->send(new BookingConfirmMail(
                            $booking,
                            $bookingStatus,
                            $technician,
                            $customer,
                            $product
                        ));
                        Log::info('Booking confirmation email sent to customer', [
                            'booking_id' => $booking->id,
                            'customer_email' => $customer->email
                        ]);
                    } catch (\Exception $emailException) {
                        Log::error('Failed to send booking confirmation email to customer', [
                            'booking_id' => $booking->id,
                            'error' => $emailException->getMessage()
                        ]);
                    }
                }
            }

            // If job is marked as completed, update the booking table with technician_id and send completion emails
            if ($request->status == BookingStatusHelper::STATUS_JOB_COMPLETED) {
                // Load relationships for email sending
                $bookingStatus->load(['booking.product', 'booking.user', 'technician']);
                
                $booking = $bookingStatus->booking;
                $technician = $bookingStatus->technician;
                $customer = $booking->user;
                $product = $booking->product;

                if ($booking) {
                    $booking->technician_id = $bookingStatus->technician_id;
                    $booking->save();
                    
                    Log::info('Booking technician_id updated after job completion', [
                        'booking_id' => $booking->id,
                        'technician_id' => $bookingStatus->technician_id
                    ]);
                }

                // Send email to technician
                if ($technician && $technician->email && $booking && $customer && $product) {
                    try {
                        Mail::to($technician->email)->send(new JobCompletedSuccessfullyMail(
                            $booking,
                            $bookingStatus,
                            $technician,
                            $customer,
                            $product
                        ));
                        Log::info('Job completed email sent to technician', [
                            'booking_id' => $booking->id,
                            'technician_email' => $technician->email
                        ]);
                    } catch (\Exception $emailException) {
                        Log::error('Failed to send job completed email to technician', [
                            'booking_id' => $booking->id,
                            'error' => $emailException->getMessage()
                        ]);
                    }
                }

                // Send feedback request email to customer
                if ($customer && $customer->email && $booking && $technician && $product) {
                    try {
                        Mail::to($customer->email)->send(new FeedbackRequestMail(
                            $booking,
                            $bookingStatus,
                            $technician,
                            $customer,
                            $product
                        ));
                        Log::info('Feedback request email sent to customer', [
                            'booking_id' => $booking->id,
                            'customer_email' => $customer->email
                        ]);
                    } catch (\Exception $emailException) {
                        Log::error('Failed to send feedback request email to customer', [
                            'booking_id' => $booking->id,
                            'error' => $emailException->getMessage()
                        ]);
                    }
                }
            }

            Log::info('Job status updated', [
                'booking_status_id' => $bookingStatus->id,
                'booking_id' => $bookingStatus->booking_id,
                'technician_id' => $bookingStatus->technician_id,
                'new_status' => $request->status
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Job status updated successfully!',
                'status' => $bookingStatus->status,
                'status_label' => BookingStatusHelper::getStatusLabel($bookingStatus->status)
            ]);

        } catch (\Exception $e) {
            Log::error('Job status update error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update job status. Please try again.'
            ], 500);
        }
    }

    /**
     * Show start job page
     */
    public function startJob($id)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('user.login')->with('error', 'Please login to start a job.');
        }

        $bookingStatus = BookingStatus::with(['booking.product', 'booking.user', 'technician'])
            ->where('id', $id)
            ->where('technician_id', $user->id)
            ->firstOrFail();

        $booking = $bookingStatus->booking;
        $customer = $booking->user;
        $product = $booking->product;

        // Check if job is approved
        if ($bookingStatus->status != BookingStatusHelper::STATUS_APPROVED) {
            return redirect()->route('technician.jobs')
                ->with('error', 'This job is not approved yet or has already been started.');
        }

        // Check if it's the scheduled date
        $today = now()->format('Y-m-d');
        $scheduledDate = $booking->preferred_date ? $booking->preferred_date->format('Y-m-d') : null;
        
        if ($scheduledDate && $scheduledDate != $today) {
            return redirect()->route('technician.jobs')
                ->with('error', 'This job can only be started on the scheduled date: ' . $booking->preferred_date->format('M j, Y'));
        }

        return view('technician.start-job', compact('bookingStatus', 'booking', 'customer', 'product'));
    }

    /**
     * Set technician on route with ETA
     */
    public function setOnRoute(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'eta' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $bookingStatus = BookingStatus::with(['booking.product', 'booking.user', 'technician'])
                ->findOrFail($id);

            // Verify booking status belongs to authenticated technician
            if ($bookingStatus->technician_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }

            // Check if job is approved
            if ($bookingStatus->status != BookingStatusHelper::STATUS_APPROVED) {
                return response()->json([
                    'success' => false,
                    'message' => 'This job is not approved yet or has already been started.'
                ], 400);
            }

            // Update status to on route and save ETA
            $bookingStatus->status = BookingStatusHelper::STATUS_ON_ROUTE;
            $bookingStatus->eta = $request->eta;
            $bookingStatus->save();

            $booking = $bookingStatus->booking;
            $technician = $bookingStatus->technician;
            $customer = $booking->user;
            $product = $booking->product;

            // Send email notification to customer
            if ($customer && $customer->email && $product && $technician) {
                try {
                    Mail::to($customer->email)->send(new TechnicianOnRouteMail(
                        $booking,
                        $bookingStatus,
                        $technician,
                        $customer,
                        $product,
                        $request->eta
                    ));
                    Log::info('Technician on route email sent to customer', [
                        'booking_id' => $booking->id,
                        'customer_email' => $customer->email,
                        'eta' => $request->eta
                    ]);
                } catch (\Exception $emailException) {
                    Log::error('Failed to send technician on route email', [
                        'booking_id' => $booking->id,
                        'error' => $emailException->getMessage()
                    ]);
                }
            }

            Log::info('Technician set on route', [
                'booking_status_id' => $bookingStatus->id,
                'booking_id' => $booking->id,
                'technician_id' => $bookingStatus->technician_id,
                'eta' => $request->eta
            ]);

            return response()->json([
                'success' => true,
                'message' => 'You are now on route! Customer has been notified.',
                'status' => $bookingStatus->status,
                'status_label' => BookingStatusHelper::getStatusLabel($bookingStatus->status),
                'redirect_url' => route('technician.jobs')
            ]);

        } catch (\Exception $e) {
            Log::error('Set on route error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to set on route. Please try again.'
            ], 500);
        }
    }
}









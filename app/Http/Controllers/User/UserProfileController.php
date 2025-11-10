<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Review;
use App\Helpers\BookingStatusHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    /**
     * Display user profile page with bookings
     */
    public function index()
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('user.login')->with('error', 'Please login to view your profile.');
        }

        // Get only 3 most recent bookings for the user
        $bookings = Booking::with(['product', 'bookingStatuses.technician'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Process bookings with status information
        $processedBookings = $bookings->map(function($booking) {
            $latestStatus = $booking->bookingStatuses()->latest()->first();
            $technician = $latestStatus ? $latestStatus->technician : null;
            $review = Review::where('booking_id', $booking->id)->first();
            
            // Determine status based on booking_status table
            $status = 'pending';
            $statusLabel = 'Awaiting Assignment';
            $statusClass = 'te-status-pending';
            
            if ($latestStatus) {
                switch ($latestStatus->status) {
                    case BookingStatusHelper::STATUS_PENDING:
                        $status = 'pending';
                        $statusLabel = 'Awaiting Assignment';
                        $statusClass = 'te-status-pending';
                        break;
                    case BookingStatusHelper::STATUS_APPROVED:
                        $status = 'accepted';
                        $statusLabel = 'Technician Assigned';
                        $statusClass = 'te-status-accepted';
                        break;
                    case BookingStatusHelper::STATUS_REJECTED:
                        $status = 'rejected';
                        $statusLabel = 'Rejected';
                        $statusClass = 'te-status-pending';
                        break;
                    case BookingStatusHelper::STATUS_ON_ROUTE:
                        $status = 'on_route';
                        $statusLabel = 'Technician On Route';
                        $statusClass = 'te-status-accepted';
                        break;
                    case BookingStatusHelper::STATUS_JOB_COMPLETED:
                        $status = 'completed';
                        $statusLabel = 'Service Completed';
                        $statusClass = 'te-status-completed';
                        break;
                }
            }

            return [
                'booking' => $booking,
                'technician' => $technician,
                'status' => $status,
                'statusLabel' => $statusLabel,
                'statusClass' => $statusClass,
                'bookingStatus' => $latestStatus,
                'review' => $review,
            ];
        });

        // Calculate stats
        $stats = [
            'pending' => $processedBookings->whereIn('status', ['pending', 'rejected'])->count(),
            'active' => $processedBookings->whereIn('status', ['accepted', 'on_route'])->count(),
            'completed' => $processedBookings->where('status', 'completed')->count(),
        ];

        // Format user data
        $userData = [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'address' => $user->address,
            'member_since' => $user->created_at ? $user->created_at->format('F j, Y') : 'N/A',
            'customer_id' => 'INT-' . date('Y') . '-' . str_pad($user->id, 5, '0', STR_PAD_LEFT),
        ];

        return view('user.profile', compact('user', 'userData', 'processedBookings', 'stats'));
    }

    /**
     * Submit a review for a completed booking
     */
    public function submitReview(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'booking_id' => 'required|exists:bookings,id',
                'rating' => 'required|integer|min:1|max:5',
                'review' => 'required|string|max:1000',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $booking = Booking::findOrFail($request->booking_id);

            // Verify booking belongs to authenticated user
            if ($booking->user_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }

            // Check if booking status is job completed (status = 4) for technician
            $bookingStatus = BookingStatus::where('booking_id', $booking->id)
                ->where('status', BookingStatusHelper::STATUS_JOB_COMPLETED)
                ->first();

            if (!$bookingStatus) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot submit review. Job must be completed by technician first.'
                ], 400);
            }

            // Check if review already exists - if so, update it instead
            $existingReview = Review::where('booking_id', $booking->id)->first();
            if ($existingReview) {
                // Update existing review
                $existingReview->update([
                    'rating' => $request->rating,
                    'review' => $request->review,
                ]);
                
                Log::info('Review updated via submit', [
                    'review_id' => $existingReview->id,
                    'booking_id' => $booking->id,
                    'rating' => $request->rating
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Review updated successfully!',
                    'review' => $existingReview
                ]);
            }

            // Create new review with only booking_id
            $review = Review::create([
                'booking_id' => $booking->id,
                'rating' => $request->rating,
                'review' => $request->review,
            ]);

            Log::info('Review submitted', [
                'review_id' => $review->id,
                'booking_id' => $booking->id,
                'rating' => $request->rating
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Review submitted successfully!',
                'review' => $review
            ]);

        } catch (\Exception $e) {
            Log::error('Review submission error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit review. Please try again.'
            ], 500);
        }
    }

    /**
     * Update an existing review
     */
    public function updateReview(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'rating' => 'required|integer|min:1|max:5',
                'review' => 'required|string|max:1000',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $review = Review::findOrFail($id);
            $booking = $review->booking;

            // Verify review belongs to authenticated user
            if ($booking->user_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }

            // Update review
            $review->update([
                'rating' => $request->rating,
                'review' => $request->review,
            ]);

            Log::info('Review updated', [
                'review_id' => $review->id,
                'booking_id' => $booking->id,
                'rating' => $request->rating
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Review updated successfully!',
                'review' => $review
            ]);

        } catch (\Exception $e) {
            Log::error('Review update error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update review. Please try again.'
            ], 500);
        }
    }

    /**
     * Display all bookings with search, pagination, and filters
     */
    public function allBookings(Request $request)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('user.login')->with('error', 'Please login to view your bookings.');
        }

        // Get query parameters
        $search = $request->get('search', '');
        $statusFilter = $request->get('status', '');
        $dateFrom = $request->get('date_from', '');
        $dateTo = $request->get('date_to', '');
        $perPage = $request->get('per_page', 10);

        // Start query
        $query = Booking::with(['product', 'bookingStatuses.technician'])
            ->where('user_id', $user->id);

        // Apply search filter
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('installation_address', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('zip', 'like', "%{$search}%")
                  ->orWhere('notes', 'like', "%{$search}%")
                  ->orWhereHas('product', function($productQuery) use ($search) {
                      $productQuery->where('title', 'like', "%{$search}%");
                  });
            });
        }

        // Apply date filters
        if ($dateFrom) {
            $query->whereDate('created_at', '>=', $dateFrom);
        }
        if ($dateTo) {
            $query->whereDate('created_at', '<=', $dateTo);
        }

        // Order by created_at desc
        $query->orderBy('created_at', 'desc');

        // Get all bookings for status filtering (before pagination)
        $allBookings = $query->get();

        // Process bookings with status information
        $processedBookings = $allBookings->map(function($booking) {
            $latestStatus = $booking->bookingStatuses()->latest()->first();
            $technician = $latestStatus ? $latestStatus->technician : null;
            $review = Review::where('booking_id', $booking->id)->first();
            
            // Determine status based on booking_status table
            $status = 'pending';
            $statusLabel = 'Awaiting Assignment';
            $statusClass = 'te-status-pending';
            
            if ($latestStatus) {
                switch ($latestStatus->status) {
                    case BookingStatusHelper::STATUS_PENDING:
                        $status = 'pending';
                        $statusLabel = 'Awaiting Assignment';
                        $statusClass = 'te-status-pending';
                        break;
                    case BookingStatusHelper::STATUS_APPROVED:
                        $status = 'accepted';
                        $statusLabel = 'Technician Assigned';
                        $statusClass = 'te-status-accepted';
                        break;
                    case BookingStatusHelper::STATUS_REJECTED:
                        $status = 'rejected';
                        $statusLabel = 'Rejected';
                        $statusClass = 'te-status-pending';
                        break;
                    case BookingStatusHelper::STATUS_ON_ROUTE:
                        $status = 'on_route';
                        $statusLabel = 'Technician On Route';
                        $statusClass = 'te-status-accepted';
                        break;
                    case BookingStatusHelper::STATUS_JOB_COMPLETED:
                        $status = 'completed';
                        $statusLabel = 'Service Completed';
                        $statusClass = 'te-status-completed';
                        break;
                }
            }

            return [
                'booking' => $booking,
                'technician' => $technician,
                'status' => $status,
                'statusLabel' => $statusLabel,
                'statusClass' => $statusClass,
                'bookingStatus' => $latestStatus,
                'review' => $review,
            ];
        });

        // Apply status filter after processing
        if ($statusFilter) {
            $processedBookings = $processedBookings->filter(function($item) use ($statusFilter) {
                return $item['status'] === $statusFilter;
            });
        }

        // Paginate the processed bookings
        $currentPage = $request->get('page', 1);
        $items = $processedBookings->values();
        $total = $items->count();
        $items = $items->slice(($currentPage - 1) * $perPage, $perPage)->values();
        
        $paginatedBookings = new \Illuminate\Pagination\LengthAwarePaginator(
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
            'pending' => $processedBookings->whereIn('status', ['pending', 'rejected'])->count(),
            'active' => $processedBookings->whereIn('status', ['accepted', 'on_route'])->count(),
            'completed' => $processedBookings->where('status', 'completed')->count(),
        ];

        // Format user data
        $userData = [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'address' => $user->address,
            'member_since' => $user->created_at ? $user->created_at->format('F j, Y') : 'N/A',
            'customer_id' => 'INT-' . date('Y') . '-' . str_pad($user->id, 5, '0', STR_PAD_LEFT),
        ];

        return view('user.bookings', compact('user', 'userData', 'paginatedBookings', 'stats', 'search', 'statusFilter', 'dateFrom', 'dateTo', 'perPage'));
    }
}


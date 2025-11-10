<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Review;
use App\Models\Product;
use App\Models\User;
use App\Helpers\BookingStatusHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminBookingController extends Controller
{
    /**
     * Display all bookings
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $statusFilter = $request->get('status', '');
        $dateFrom = $request->get('date_from', '');
        $dateTo = $request->get('date_to', '');
        $perPage = $request->get('per_page', 20);

        // Start query
        $query = Booking::with(['user', 'product', 'bookingStatuses.technician']);

        // Apply search filter
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhere('installation_address', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('zip', 'like', "%{$search}%")
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('name', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%");
                  })
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

        // Get all bookings for processing
        $allBookings = $query->get();

        // Process bookings with complete status mapping
        $processedBookings = $allBookings->map(function($booking) {
            $latestStatus = $booking->bookingStatuses()->latest()->first();
            $technician = $latestStatus ? $latestStatus->technician : null;
            $review = Review::where('booking_id', $booking->id)->first();
            
            // Get all status history
            $statusHistory = $booking->bookingStatuses()->with('technician')->orderBy('created_at', 'asc')->get()->map(function($status) {
                return [
                    'status' => $status->status,
                    'status_label' => BookingStatusHelper::getStatusLabel($status->status),
                    'technician' => $status->technician,
                    'eta' => $status->eta,
                    'created_at' => $status->created_at,
                    'updated_at' => $status->updated_at,
                ];
            });
            
            // Determine current status
            $status = 'pending';
            $statusLabel = 'Pending';
            $statusClass = 'pending';
            
            if ($latestStatus) {
                switch ($latestStatus->status) {
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
            }

            return [
                'booking' => $booking,
                'technician' => $technician,
                'status' => $status,
                'statusLabel' => $statusLabel,
                'statusClass' => $statusClass,
                'bookingStatus' => $latestStatus,
                'review' => $review,
                'statusHistory' => $statusHistory,
            ];
        });

        // Apply status filter
        if ($statusFilter) {
            $processedBookings = $processedBookings->filter(function($item) use ($statusFilter) {
                return $item['status'] === $statusFilter;
            });
        }

        // Paginate
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
            'total' => $allBookings->count(),
            'pending' => $processedBookings->where('status', 'pending')->count(),
            'approved' => $processedBookings->where('status', 'approved')->count(),
            'on_route' => $processedBookings->where('status', 'on_route')->count(),
            'completed' => $processedBookings->where('status', 'completed')->count(),
            'rejected' => $processedBookings->where('status', 'rejected')->count(),
        ];

        return view('crud.bookings.index', compact('paginatedBookings', 'stats', 'search', 'statusFilter', 'dateFrom', 'dateTo', 'perPage'));
    }

    /**
     * Show single booking details
     */
    public function show($id)
    {
        $booking = Booking::with(['user', 'product', 'bookingStatuses.technician'])->findOrFail($id);
        
        $latestStatus = $booking->bookingStatuses()->with('technician')->latest()->first();
        $technician = $latestStatus ? $latestStatus->technician : null;
        $review = Review::where('booking_id', $booking->id)->first();
        
        // Get complete status history with technician relationship
        $statusHistory = $booking->bookingStatuses()->with('technician')->orderBy('created_at', 'asc')->get();
        
        return view('crud.bookings.show', compact('booking', 'technician', 'review', 'statusHistory', 'latestStatus'));
    }
}








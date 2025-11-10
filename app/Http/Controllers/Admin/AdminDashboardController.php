<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Review;
use App\Models\User;
use App\Models\Quote;
use App\Models\Product;
use App\Models\Category;
use App\Models\ContactSubmission;
use App\Models\VisitStat;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total Statistics
        $stats = [
            'total_bookings' => Booking::count(),
            'total_reviews' => Review::count(),
            'total_customers' => User::whereHas('roles', function($q) {
                $q->where('name', 'individual');
            })->count(),
            'total_quotes' => Quote::count(),
            'total_products' => Product::count(),
            'total_categories' => Category::count(),
            'total_contacts' => ContactSubmission::count(),
            'total_visits' => VisitStat::first()?->home_visits ?? 0,
        ];

        // Booking Statistics by Status - Get latest status for each booking
        $allBookings = Booking::with(['bookingStatuses' => function($query) {
            $query->latest()->limit(1);
        }])->get();
        
        $bookingStats = [
            'pending' => 0,
            'approved' => 0,
            'on_route' => 0,
            'completed' => 0,
            'rejected' => 0,
        ];
        
        foreach ($allBookings as $booking) {
            $latestStatus = $booking->bookingStatuses->first();
            if ($latestStatus) {
                switch ($latestStatus->status) {
                    case 0: // pending
                        $bookingStats['pending']++;
                        break;
                    case 1: // approved
                        $bookingStats['approved']++;
                        break;
                    case 2: // rejected
                        $bookingStats['rejected']++;
                        break;
                    case 3: // on_route
                        $bookingStats['on_route']++;
                        break;
                    case 4: // completed
                        $bookingStats['completed']++;
                        break;
                }
            } else {
                // If no status exists, count as pending
                $bookingStats['pending']++;
            }
        }

        // Monthly Statistics for Charts (Last 6 months)
        $months = [];
        $bookingsData = [];
        $reviewsData = [];
        $quotesData = [];
        $customersData = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthName = $date->format('M');
            $months[] = $monthName;
            
            $startOfMonth = $date->copy()->startOfMonth();
            $endOfMonth = $date->copy()->endOfMonth();
            
            $bookingsData[] = Booking::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
            $reviewsData[] = Review::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
            $quotesData[] = Quote::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
            $customersData[] = User::whereHas('roles', function($q) {
                $q->where('name', 'individual');
            })->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
        }

        // Recent Activity
        $recentBookings = Booking::with(['user', 'product'])->latest()->limit(5)->get();
        $recentReviews = Review::with(['booking.user'])->latest()->limit(5)->get();
        $recentQuotes = Quote::latest()->limit(5)->get();

        return view('admin.dashboard', compact(
            'stats',
            'bookingStats',
            'months',
            'bookingsData',
            'reviewsData',
            'quotesData',
            'customersData',
            'recentBookings',
            'recentReviews',
            'recentQuotes'
        ));
    }
}

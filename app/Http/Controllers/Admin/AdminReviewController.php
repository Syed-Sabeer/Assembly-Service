<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminReviewController extends Controller
{
    /**
     * Display all reviews
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $dateFrom = $request->get('date_from', '');
        $dateTo = $request->get('date_to', '');
        $perPage = $request->get('per_page', 20);

        // Start query
        $query = Review::with(['booking.user', 'booking.product']);

        // Apply search filter
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('review', 'like', "%{$search}%")
                  ->orWhereHas('booking.user', function($userQuery) use ($search) {
                      $userQuery->where('name', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%");
                  })
                  ->orWhereHas('booking.product', function($productQuery) use ($search) {
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

        $reviews = $query->paginate($perPage);

        // Calculate stats
        $stats = [
            'total' => Review::count(),
            'average_rating' => Review::avg('rating') ? round(Review::avg('rating'), 2) : 0,
            'today' => Review::whereDate('created_at', today())->count(),
            'this_week' => Review::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'this_month' => Review::whereMonth('created_at', now()->month)
                                ->whereYear('created_at', now()->year)
                                ->count(),
        ];

        return view('crud.reviews.index', compact('reviews', 'stats', 'search', 'dateFrom', 'dateTo', 'perPage'));
    }

    /**
     * Show single review details
     */
    public function show($id)
    {
        $review = Review::with(['booking.user', 'booking.product'])->findOrFail($id);
        
        return view('crud.reviews.show', compact('review'));
    }

    /**
     * Delete a review
     */
    public function destroy($id)
    {
        try {
            $review = Review::findOrFail($id);
            $review->delete();
            
            Log::info('Review deleted', ['review_id' => $id]);
            
            return response()->json([
                'success' => true,
                'message' => 'Review deleted successfully.'
            ]);
        } catch (\Exception $e) {
            Log::error('Review deletion error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete review.'
            ], 500);
        }
    }
}


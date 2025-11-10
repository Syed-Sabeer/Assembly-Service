<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminQuoteController extends Controller
{
    /**
     * Display all quotes
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $dateFrom = $request->get('date_from', '');
        $dateTo = $request->get('date_to', '');
        $perPage = $request->get('per_page', 15);

        // Start query
        $query = Quote::query();

        // Apply search filter
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('fullname', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('service', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%");
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

        $quotes = $query->paginate($perPage);

        // Calculate stats
        $stats = [
            'total' => Quote::count(),
            'today' => Quote::whereDate('created_at', today())->count(),
            'this_week' => Quote::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'this_month' => Quote::whereMonth('created_at', now()->month)
                                ->whereYear('created_at', now()->year)
                                ->count(),
        ];

        return view('admin.crud.quotes.index', compact('quotes', 'stats', 'search', 'dateFrom', 'dateTo', 'perPage'));
    }

    /**
     * Show single quote details
     */
    public function show($id)
    {
        $quote = Quote::findOrFail($id);
        
        // Parse file paths if they exist
        $files = [];
        if ($quote->file) {
            $filePaths = json_decode($quote->file, true);
            if (is_array($filePaths)) {
                foreach ($filePaths as $filePath) {
                    if (Storage::disk('public')->exists($filePath)) {
                        $files[] = [
                            'path' => $filePath,
                            'url' => asset('storage/' . $filePath),
                            'name' => basename($filePath)
                        ];
                    }
                }
            }
        }
        
        return view('admin.crud.quotes.show', compact('quote', 'files'));
    }

    /**
     * Delete a quote
     */
    public function destroy($id)
    {
        try {
            $quote = Quote::findOrFail($id);
            
            // Delete associated files
            if ($quote->file) {
                $filePaths = json_decode($quote->file, true);
                if (is_array($filePaths)) {
                    foreach ($filePaths as $filePath) {
                        if (Storage::disk('public')->exists($filePath)) {
                            Storage::disk('public')->delete($filePath);
                        }
                    }
                }
            }
            
            $quote->delete();
            
            Log::info('Quote deleted', ['quote_id' => $id]);
            
            return response()->json([
                'success' => true,
                'message' => 'Quote deleted successfully.'
            ]);
        } catch (\Exception $e) {
            Log::error('Quote deletion error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete quote.'
            ], 500);
        }
    }
}





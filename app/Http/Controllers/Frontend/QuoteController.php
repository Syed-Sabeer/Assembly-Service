<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class QuoteController extends Controller
{
    /**
     * Store a new quote request
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'details' => 'nullable|string',
            'swingSetImages' => 'nullable|array',
            'swingSetImages.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB max per file
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $filePaths = [];
            
            // Handle file uploads
            if ($request->hasFile('swingSetImages')) {
                foreach ($request->file('swingSetImages') as $file) {
                    if ($file->isValid()) {
                        $path = $file->store('quotes', 'public');
                        $filePaths[] = $path;
                    }
                }
            }
            
            // Store file paths as JSON
            $filePathsJson = !empty($filePaths) ? json_encode($filePaths) : null;

            $quote = Quote::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'phone' => $request->phone,
                'service' => $request->service,
                'file' => $filePathsJson,
                'city' => $request->city,
                'details' => $request->details,
            ]);

            Log::info('Quote request submitted', [
                'quote_id' => $quote->id,
                'email' => $quote->email
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your quote request has been submitted successfully. We will get back to you soon.',
            ]);

        } catch (\Exception $e) {
            Log::error('Quote submission error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit quote request. Please try again later.',
            ], 500);
        }
    }
}





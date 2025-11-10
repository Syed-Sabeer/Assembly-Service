<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\NewJobOfferMail;
use App\Mail\PaymentConfirmationMail;
use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Product;
use App\Models\TechnicianProfile;
use App\Models\User;
use App\Helpers\BookingStatusHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class BookingController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }
    public function index(Request $request){
        $products = Product::all();
        $technicians = TechnicianProfile::with('user')
            ->where('is_approved', 1) // Only show approved technicians
            ->whereHas('user', function($query) {
                $query->where('is_active', 1);
            })
            ->get();
        
        // Process technicians data for JavaScript
        $techniciansData = $technicians->map(function($tech) {
            $user = $tech->user;
            $profileImg = '';
            if ($tech->profile_picture) {
                $profileImg = Storage::disk('public')->exists($tech->profile_picture) ? asset('storage/' . $tech->profile_picture) : 'https://i.pravatar.cc/150?img=' . ($tech->id % 70);
            } else {
                $profileImg = 'https://i.pravatar.cc/150?img=' . ($tech->id % 70);
            }
            
            // Get all reviews for this technician from bookings where technician_id matches
            $allReviews = \App\Models\Review::with(['booking.user', 'booking.product'])
                ->whereHas('booking', function($query) use ($user) {
                    $query->where('technician_id', $user->id);
                })
                ->get();
            
            // Calculate rating statistics
            $averageRating = $allReviews->count() > 0 ? round($allReviews->avg('rating'), 1) : 0;
            $totalReviews = $allReviews->count();
            
            // Count completed jobs
            $completedJobsCount = BookingStatus::where('technician_id', $user->id)
                ->where('status', BookingStatusHelper::STATUS_JOB_COMPLETED)
                ->count();
            
            $certifications = $tech->certification && is_array($tech->certification) ? $tech->certification : [];
            $expertise = array_slice(array_filter(array_column($certifications, 'name')), 0, 3);
            if (empty($expertise) && $tech->job_title) {
                $expertise = [$tech->job_title];
            }
            
            return [
                'id' => $user->id,
                'name' => $user->name ?? 'Technician',
                'rating' => $averageRating,
                'reviews' => $totalReviews,
                'experience' => ($tech->year_of_experience ?? 0) . ' years',
                'specialization' => $tech->job_title ?? 'General Technician',
                'avatar' => $profileImg,
                'completedJobs' => $completedJobsCount,
                'responseTime' => '< 2 hours',
                'expertise' => $expertise,
                'available' => true
            ];
        });
        
        // Get product_id from query parameter if provided
        $selectedProductId = $request->get('product_id');
        
        // Check if user is authenticated and has individual role
        $isAuthenticated = Auth::check();
        $hasIndividualRole = false;
        if ($isAuthenticated) {
            try {
                $hasIndividualRole = Auth::user()->hasRole('individual');
            } catch (\Exception $e) {
                $hasIndividualRole = false;
            }
        }
        $openSignupModal = !$isAuthenticated;
        
        return view("frontend.booking", compact('products', 'technicians', 'techniciansData', 'selectedProductId', 'openSignupModal', 'isAuthenticated', 'hasIndividualRole'));
    }

    /**
     * Show booking success page
     */
    public function success($id)
    {
        $booking = Booking::with(['user', 'product'])->findOrFail($id);
        
        // Get technician from booking status
        $bookingStatus = BookingStatus::where('booking_id', $booking->id)->first();
        $technician = $bookingStatus ? User::find($bookingStatus->technician_id) : null;
        $product = $booking->product;
        
        return view('user.booking-success', compact('booking', 'technician', 'product'));
    }

    /**
     * Create Stripe Payment Intent
     */
    public function createPaymentIntent(Request $request)
    {
        try {
            // Check if user is authenticated
            if (!Auth::check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please login or sign up to book a service.',
                    'requires_auth' => true
                ], 401);
            }

            $validator = Validator::make($request->all(), [
                'amount' => 'required|numeric|min:0.01',
                'product_id' => 'required|exists:products,id',
                'technician_id' => 'required|exists:users,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $amount = $request->amount;
            $amountInCents = (int)($amount * 100); // Convert to cents

            // Create Payment Intent
            $paymentIntent = PaymentIntent::create([
                'amount' => $amountInCents,
                'currency' => 'usd',
                'payment_method_types' => ['card'],
                'metadata' => [
                    'user_id' => Auth::id(),
                    'product_id' => $request->product_id,
                    'technician_id' => $request->technician_id,
                ],
            ]);

            Log::info('Payment intent created', [
                'payment_intent_id' => $paymentIntent->id,
                'amount' => $amount,
                'user_id' => Auth::id()
            ]);

            return response()->json([
                'success' => true,
                'client_secret' => $paymentIntent->client_secret,
                'payment_intent_id' => $paymentIntent->id,
            ]);

        } catch (\Exception $e) {
            Log::error('Payment intent creation error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create payment intent. Please try again.'
            ], 500);
        }
    }

    /**
     * Confirm booking after successful payment
     */
    public function confirm(Request $request)
    {
        try {
            // Check if user is authenticated
            if (!Auth::check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please login or sign up to book a service.',
                    'requires_auth' => true
                ], 401);
            }

            $validator = Validator::make($request->all(), [
                'payment_intent_id' => 'required|string',
                'product_id' => 'required|exists:products,id',
                'technician_id' => 'required|exists:users,id',
                'installation_address' => 'required|string|max:300',
                'installation_city' => 'required|string|max:255',
                'zip' => 'required|string|max:255',
                'preferred_date' => 'required|date|after_or_equal:today',
                'preferred_time' => 'required|string',
                'notes' => 'nullable|string',
                'amount' => 'required|numeric|min:0',
                'payment_method' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Verify payment intent
            try {
                $paymentIntent = PaymentIntent::retrieve($request->payment_intent_id);
                
                if ($paymentIntent->status !== 'succeeded') {
                    return response()->json([
                        'success' => false,
                        'message' => 'Payment not completed. Please try again.'
                    ], 400);
                }
            } catch (\Exception $e) {
                Log::error('Payment intent verification error: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid payment. Please try again.'
                ], 400);
            }

            // Create booking (without technician_id - it's stored in booking_status table)
            $booking = Booking::create([
                'product_id' => $request->product_id,
                'user_id' => Auth::id(),
                'installation_address' => $request->installation_address,
                'city' => $request->installation_city,
                'zip' => $request->zip,
                'preferred_date' => $request->preferred_date,
                'preferred_time' => $request->preferred_time,
                'notes' => $request->notes,
                'amount' => $request->amount,
                'payment_method' => $request->payment_method,
                'payment_id' => $request->payment_intent_id,
                'status' => 'confirmed',
            ]);

            // Create booking status record for technician
            BookingStatus::create([
                'booking_id' => $booking->id,
                'technician_id' => $request->technician_id,
                'status' => BookingStatusHelper::STATUS_PENDING, // 0 = pending
            ]);

            // Load relationships for emails
            $booking->load(['user', 'product']);
            $technician = User::find($request->technician_id);
            $product = Product::find($request->product_id);

            // Send payment confirmation email to customer
            if ($booking->user && $booking->user->email && $product) {
                try {
                    Mail::to($booking->user->email)->send(new PaymentConfirmationMail($booking, $booking->user, $product));
                    Log::info('Payment confirmation email sent to customer', [
                        'booking_id' => $booking->id,
                        'email' => $booking->user->email
                    ]);
                } catch (\Exception $emailException) {
                    Log::error('Failed to send payment confirmation email', [
                        'booking_id' => $booking->id,
                        'error' => $emailException->getMessage()
                    ]);
                }
            }

            // Send new job offer email to technician
            if ($technician && $technician->email && $product) {
                try {
                    Mail::to($technician->email)->send(new NewJobOfferMail($booking, $technician, $booking->user, $product));
                    Log::info('New job offer email sent to technician', [
                        'booking_id' => $booking->id,
                        'technician_id' => $request->technician_id,
                        'email' => $technician->email
                    ]);
                } catch (\Exception $emailException) {
                    Log::error('Failed to send new job offer email', [
                        'booking_id' => $booking->id,
                        'technician_id' => $request->technician_id,
                        'error' => $emailException->getMessage()
                    ]);
                }
            }

            Log::info('Booking confirmed successfully', [
                'booking_id' => $booking->id,
                'technician_id' => $request->technician_id,
                'payment_intent_id' => $request->payment_intent_id,
                'status' => BookingStatusHelper::STATUS_PENDING
            ]);

            // Redirect to success page with booking ID
            return response()->json([
                'success' => true,
                'message' => 'Booking confirmed successfully!',
                'redirect_url' => route('booking.success', ['id' => $booking->id])
            ]);

        } catch (\Exception $e) {
            Log::error('Booking confirmation error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to confirm booking. Please try again.'
            ], 500);
        }
    }
}

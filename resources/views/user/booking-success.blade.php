@extends('layouts.frontend.master')

@section('title', 'Booking Confirmed')

@section('css')
<style>
    /* Dashboard Header Premium Styles */
    .dashboard-header-premium {
        animation: fadeInDown 0.6s ease-out;
    }
    
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @media (max-width: 768px) {
        .dashboard-header-content {
            padding: 30px 20px !important;
        }
        
        .dashboard-header-content h1 {
            font-size: 24px !important;
        }
    }
</style>
@endsection

@section('content')
<div class="page-wrapper" >
    <!-- Premium Dashboard Header -->
    <div class="dashboard-header-premium" style="max-width: 1400px; margin: 0 auto 40px; padding: 0 20px;">
        <div class="dashboard-header-content" style="background: linear-gradient(135deg, #3375d1 0%, #0c9eb5 50%, #72a500 100%); border-radius: 20px; padding: 40px; box-shadow: 0 10px 40px rgba(51, 117, 209, 0.3); position: relative; overflow: hidden;">
            <!-- Decorative Elements -->
            <div style="position: absolute; top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
            <div style="position: absolute; bottom: -30px; left: -30px; width: 150px; height: 150px; background: rgba(255,255,255,0.08); border-radius: 50%;"></div>
            
            <div style="position: relative; z-index: 1; text-align: center;">
                <div style="display: inline-block; background: rgba(255,255,255,0.2); width: 80px; height: 80px; border-radius: 50%; line-height: 80px; margin-bottom: 20px; backdrop-filter: blur(10px);">
                    <i class="fas fa-check" style="color: white; font-size: 40px;"></i>
                </div>
                <h1 style="margin: 0 0 10px 0; font-size: 32px; font-weight: 700; color: white; text-shadow: 0 2px 10px rgba(0,0,0,0.2);">
                    Booking Confirmed!
                </h1>
                <p style="margin: 0; font-size: 16px; color: rgba(255,255,255,0.9);">
                    Thank you for your payment. Your installation request is confirmed.
                </p>
            </div>
        </div>
    </div>
    
    <div class="container" style="max-width: 800px; margin: 0 auto 4rem auto; padding: 20px;">
        <!-- Booking Details Card -->
        <div style="background: white; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 30px; margin-bottom: 30px;">
            <h2 style="color: #1a1a1a; font-size: 24px; font-weight: 600; margin-bottom: 25px; padding-bottom: 15px; border-bottom: 2px solid #f0f0f0;">Booking Details</h2>
            
            <div style="display: grid; gap: 20px;">
                <div style="display: flex; justify-content: space-between; padding: 15px; background: #f9fafb; border-radius: 8px;">
                    <span style="color: #6b7280; font-weight: 600;">Booking ID:</span>
                    <span style="color: #1a1a1a; font-weight: 500;">#{{ $booking->id ?? 'N/A' }}</span>
                </div>
                
                <div style="display: flex; justify-content: space-between; padding: 15px; background: #f9fafb; border-radius: 8px;">
                    <span style="color: #6b7280; font-weight: 600;">Product:</span>
                    <span style="color: #1a1a1a; font-weight: 500;">{{ $product->title ?? 'N/A' }}</span>
                </div>
                
                <div style="display: flex; justify-content: space-between; padding: 15px; background: #f9fafb; border-radius: 8px;">
                    <span style="color: #6b7280; font-weight: 600;">Technician:</span>
                    <span style="color: #1a1a1a; font-weight: 500;">{{ $technician->name ?? 'Assigned' }}</span>
                </div>
                
                <div style="display: flex; justify-content: space-between; padding: 15px; background: #f9fafb; border-radius: 8px;">
                    <span style="color: #6b7280; font-weight: 600;">Installation Address:</span>
                    <span style="color: #1a1a1a; font-weight: 500; text-align: right; max-width: 60%;">{{ $booking->installation_address ?? 'N/A' }}, {{ $booking->city ?? '' }} {{ $booking->zip ?? '' }}</span>
                </div>
                
                <div style="display: flex; justify-content: space-between; padding: 15px; background: #f9fafb; border-radius: 8px;">
                    <span style="color: #6b7280; font-weight: 600;">Preferred Date & Time:</span>
                    <span style="color: #1a1a1a; font-weight: 500;">
                        @if($booking->preferred_date)
                            {{ \Carbon\Carbon::parse($booking->preferred_date)->format('F j, Y') }} at {{ $booking->preferred_time ?? 'TBD' }}
                        @else
                            TBD
                        @endif
                    </span>
                </div>
                
                <div style="display: flex; justify-content: space-between; padding: 15px; background: #f9fafb; border-radius: 8px;">
                    <span style="color: #6b7280; font-weight: 600;">Amount Paid:</span>
                    <span style="color: #10b981; font-weight: 600; font-size: 18px;">${{ number_format($booking->amount ?? 0, 2) }}</span>
                </div>
                
                <div style="display: flex; justify-content: space-between; padding: 15px; background: #f9fafb; border-radius: 8px;">
                    <span style="color: #6b7280; font-weight: 600;">Payment Method:</span>
                    <span style="color: #1a1a1a; font-weight: 500;">{{ ucfirst($booking->payment_method ?? 'Stripe') }}</span>
                </div>
                
                <div style="display: flex; justify-content: space-between; padding: 15px; background: #f9fafb; border-radius: 8px;">
                    <span style="color: #6b7280; font-weight: 600;">Status:</span>
                    <span style="color: #10b981; font-weight: 600; text-transform: capitalize;">{{ $booking->status ?? 'Confirmed' }}</span>
                </div>
            </div>
            
            @if($booking->notes)
            <div style="margin-top: 20px; padding: 15px; background: #eff6ff; border-left: 4px solid #3b82f6; border-radius: 4px;">
                <strong style="color: #1e40af;">Special Notes:</strong>
                <p style="color: #1e40af; margin: 5px 0 0 0; line-height: 1.6;">{{ $booking->notes }}</p>
            </div>
            @endif
        </div>

        <!-- Next Steps Card -->
        <div style="background: #eff6ff; border-left: 4px solid #3b82f6; padding: 25px; border-radius: 8px; margin-bottom: 30px;">
            <h3 style="color: #1e40af; font-size: 20px; font-weight: 600; margin-bottom: 15px;">What's Next?</h3>
            <ul style="color: #1e40af; line-height: 1.8; padding-left: 20px; margin: 0;">
                <li>Your selected technician has been notified and will review your booking</li>
                <li>You'll receive a confirmation email with all the details</li>
                <li>Once the technician accepts, you'll receive another email with contact information</li>
                <li>Please ensure your swing set kit is available at the installation location</li>
            </ul>
        </div>

        <!-- Important Notice -->
        <div style="background: #fef3c7; border-left: 4px solid #f59e0b; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
            <p style="color: #92400e; margin: 0; line-height: 1.6;">
                <strong>Important Reminder:</strong> Please ensure your complete swing set kit is available at the installation location. Our service covers professional installation only.
            </p>
        </div>

        <!-- Action Buttons -->
        <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('home') }}" style="display: inline-block; background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500); color: white; padding: 15px 40px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 16px;">
                Back to Home
            </a>
            <a href="{{ route('booking') }}" style="display: inline-block; background: white; color: #3375d1; padding: 15px 40px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 16px; border: 2px solid #3375d1;">
                Book Another Service
            </a>
        </div>

        <!-- Support Info -->
        <div style="text-align: center; margin-top: 40px; padding-top: 30px; border-top: 1px solid #e5e7eb;">
            <p style="color: #6b7280; font-size: 15px; line-height: 1.6;">
                If you have any questions, feel free to contact us at 
                <a href="mailto:{{ config('mail.from.address', 'support@assembly-services.com') }}" style="color: #3b82f6; text-decoration: none;">
                    {{ config('mail.from.address', 'support@assembly-services.com') }}
                </a>
            </p>
        </div>

    </div>
</div>
@endsection


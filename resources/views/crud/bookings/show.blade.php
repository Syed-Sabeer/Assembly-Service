@extends('layouts.app.master')

@php
    use App\Helpers\BookingStatusHelper;
@endphp

@section('title', 'Booking Details')

@section('css')
<style>
    .status-badge {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
        text-transform: uppercase;
    }
    .status-pending {
        background-color: #fff3cd;
        color: #856404;
    }
    .status-approved {
        background-color: #d4edda;
        color: #155724;
    }
    .status-rejected {
        background-color: #f8d7da;
        color: #721c24;
    }
    .status-on_route {
        background-color: #cfe2ff;
        color: #084298;
    }
    .status-completed {
        background-color: #d1e7dd;
        color: #0f5132;
    }
    .info-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .dark-only .info-card {
        background: #1e293b;
        box-shadow: 0 2px 8px rgba(0,0,0,0.3);
    }
    .info-row {
        display: flex;
        padding: 12px 0;
        border-bottom: 1px solid #f0f0f0;
    }
    .dark-only .info-row {
        border-bottom: 1px solid #334155;
    }
    .info-row:last-child {
        border-bottom: none;
    }
    .info-label {
        font-weight: 600;
        color: #666;
        width: 200px;
    }
    .dark-only .info-label {
        color: #94a3b8;
    }
    .info-value {
        color: #333;
        flex: 1;
    }
    .dark-only .info-value {
        color: #e2e8f0;
    }
    .dark-only .info-value strong {
        color: #ffffff;
    }
    .dark-only .info-value code {
        background: #0f172a;
        color: #e2e8f0;
    }
    .dark-only h3, .dark-only h4, .dark-only h5 {
        color: #ffffff;
    }
    .timeline {
        position: relative;
        padding-left: 30px;
    }
    .timeline-item {
        position: relative;
        padding-bottom: 25px;
        border-left: 2px solid #e0e0e0;
        padding-left: 25px;
    }
    .timeline-item:last-child {
        border-left: none;
    }
    .timeline-item::before {
        content: '';
        position: absolute;
        left: -8px;
        top: 5px;
        width: 14px;
        height: 14px;
        border-radius: 50%;
        background: #667eea;
        border: 3px solid white;
        box-shadow: 0 0 0 2px #667eea;
    }
    .timeline-item.completed::before {
        background: #10b981;
        box-shadow: 0 0 0 2px #10b981;
    }
    .timeline-content {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
    }
    .dark-only .timeline-content {
        background: #334155;
        color: #e2e8f0;
    }
    .dark-only .timeline-item {
        border-left-color: #475569;
    }
    .dark-only .timeline-item::before {
        border-color: #1e293b;
    }
    .dark-only h3 {
        color: #ffffff;
    }
    .dark-only .text-muted {
        color: #94a3b8 !important;
    }
    .dark-only code {
        background: #334155;
        color: #e2e8f0;
        padding: 2px 6px;
        border-radius: 4px;
    }
    .review-text {
        color: #666;
    }
    .dark-only .review-text {
        color: #94a3b8;
    }
</style>
@endsection

@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Booking Details #{{ $booking->id }}</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.bookings.index') }}">Bookings</a></li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <!-- Booking Information -->
                <div class="info-card">
                    <h4 class="mb-4">Booking Information</h4>
                    <div class="info-row">
                        <div class="info-label">Booking ID</div>
                        <div class="info-value"><strong>#{{ $booking->id }}</strong></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Product/Service</div>
                        <div class="info-value">{{ $booking->product->title ?? 'N/A' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Customer</div>
                        <div class="info-value">
                            <strong>{{ $booking->user->name ?? 'N/A' }}</strong><br>
                            <small class="text-muted">{{ $booking->user->email ?? 'N/A' }}</small><br>
                            <small class="text-muted">{{ $booking->user->phone ?? 'N/A' }}</small>
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Installation Address</div>
                        <div class="info-value">
                            {{ $booking->installation_address }}, {{ $booking->city }}, {{ $booking->zip }}
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Scheduled Date & Time</div>
                        <div class="info-value">
                            @if($booking->preferred_date)
                                {{ $booking->preferred_date->format('F j, Y') }} at {{ $booking->preferred_time ?? 'TBD' }}
                            @else
                                TBD
                            @endif
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Amount Paid</div>
                        <div class="info-value"><strong style="color: #10b981; font-size: 18px;">${{ number_format($booking->amount ?? 0, 2) }}</strong></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Payment Method</div>
                        <div class="info-value">{{ ucfirst($booking->payment_method ?? 'Stripe') }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Payment ID</div>
                        <div class="info-value"><code>{{ $booking->payment_id ?? 'N/A' }}</code></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Current Status</div>
                        <div class="info-value">
                            @if($latestStatus)
                                <span class="status-badge status-{{ strtolower(str_replace(' ', '_', BookingStatusHelper::getStatusLabel($latestStatus->status))) }}">
                                    {{ BookingStatusHelper::getStatusLabel($latestStatus->status) }}
                                </span>
                            @else
                                <span class="status-badge status-pending">Pending</span>
                            @endif
                        </div>
                    </div>
                    @if($booking->notes)
                    <div class="info-row">
                        <div class="info-label">Special Notes</div>
                        <div class="info-value">{{ $booking->notes }}</div>
                    </div>
                    @endif
                    <div class="info-row">
                        <div class="info-label">Created At</div>
                        <div class="info-value">{{ $booking->created_at->format('F j, Y g:i A') }}</div>
                    </div>
                </div>

          
                <!-- Review Section -->
                @if($review)
                <div class="info-card">
                    <h4 class="mb-4">Customer Review</h4>
                    <div class="mb-3">
                        <div class="text-warning mb-2">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $review->rating ? '' : 'fa-star-o' }}" style="font-size: 20px;"></i>
                            @endfor
                            <span class="ms-2"><strong>{{ $review->rating }}/5</strong></span>
                        </div>
                        <p class="mb-0" style="font-style: italic; color: #666;">"{{ $review->review }}"</p>
                        <small class="text-muted">Reviewed on {{ $review->created_at->format('F j, Y g:i A') }}</small>
                    </div>
                </div>
                @endif
            </div>

            <div class="col-md-4">
                <!-- Technician Information -->
                @if($technician)
                <div class="info-card">
                    <h4 class="mb-4">Assigned Technician</h4>
                    <div class="text-center mb-3">
                        <div style="width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, #667eea, #764ba2); display: inline-flex; align-items: center; justify-content: center; color: white; font-size: 32px; font-weight: bold;">
                            {{ strtoupper(substr($technician->name, 0, 1)) }}
                        </div>
                    </div>
                    <div class="text-center mb-3">
                        <h5>{{ $technician->name }}</h5>
                        <p class="text-muted mb-0">{{ $technician->email }}</p>
                        @if($technician->phone)
                            <p class="text-muted">{{ $technician->phone }}</p>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Quick Actions -->
                <div class="info-card">
                    <h4 class="mb-4">Quick Actions</h4>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary w-100 mb-2">
                        <i class="fa fa-arrow-left"></i> Back to Bookings
                    </a>
                    @if($booking->user)
                    <a href="{{ route('admin.customers.show', $booking->user->id) }}" class="btn btn-info w-100 mb-2">
                        <i class="fa fa-user"></i> View Customer Profile
                    </a>
                    @endif
                    @if($technician)
                    <a href="{{ route('admin.technician.show', $technician->id) }}" class="btn btn-info w-100">
                        <i class="fa fa-user-tie"></i> View Technician Profile
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection


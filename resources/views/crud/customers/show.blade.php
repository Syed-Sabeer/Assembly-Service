@extends('layouts.app.master')

@php
    use App\Helpers\BookingStatusHelper;
@endphp

@section('title', 'Customer Details')

@section('css')
<style>
    .status-badge {
        padding: 5px 12px;
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
        background: #1e293b !important;
        box-shadow: 0 2px 8px rgba(0,0,0,0.3);
    }
    .info-row {
        display: flex;
        padding: 12px 0;
        border-bottom: 1px solid #f0f0f0;
    }
    .dark-only .info-row {
        border-bottom: 1px solid #334155 !important;
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
        color: #94a3b8 !important;
    }
    .info-value {
        color: #333;
        flex: 1;
    }
    .dark-only .info-value {
        color: #e2e8f0 !important;
    }
    .dark-only h3, .dark-only h4, .dark-only h5 {
        color: #ffffff !important;
    }
    .dark-only .text-muted {
        color: #94a3b8 !important;
    }
    .stat-box {
        text-align: center;
        padding: 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 12px;
        margin-bottom: 15px;
    }
    .stat-box h3 {
        font-size: 32px;
        font-weight: bold;
        margin: 0;
    }
    .stat-box p {
        margin: 5px 0 0 0;
        opacity: 0.9;
    }
    .dark-only .card {
        background: #1e293b !important;
        border-color: #334155 !important;
    }
    .dark-only .card-body {
        color: #e2e8f0 !important;
    }
</style>
@endsection

@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Customer Profile: {{ $customer->name }}</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.customers.index') }}">Customers</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <!-- Customer Information -->
                <div class="info-card">
                    <h4 class="mb-4">Customer Information</h4>
                    <div class="text-center mb-3">
                        <div style="width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(135deg, #667eea, #764ba2); display: inline-flex; align-items: center; justify-content: center; color: white; font-size: 40px; font-weight: bold;">
                            {{ strtoupper(substr($customer->name, 0, 1)) }}
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Name</div>
                        <div class="info-value"><strong>{{ $customer->name }}</strong></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Email</div>
                        <div class="info-value">{{ $customer->email }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Phone</div>
                        <div class="info-value">{{ $customer->phone ?? 'N/A' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Registered</div>
                        <div class="info-value">{{ $customer->created_at->format('F j, Y') }}</div>
                    </div>
                </div>

                <!-- Customer Statistics -->
                <div class="info-card">
                    <h4 class="mb-4">Statistics</h4>
                    <div class="stat-box">
                        <h3>{{ $customerStats['total_bookings'] }}</h3>
                        <p>Total Bookings</p>
                    </div>
                    <div class="stat-box" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <h3>${{ number_format($customerStats['total_spent'], 2) }}</h3>
                        <p>Total Spent</p>
                    </div>
                    <div class="stat-box" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <h3>{{ $customerStats['reviews_given'] }}</h3>
                        <p>Reviews Given</p>
                    </div>
                    <div class="mt-3">
                        <p class="mb-1"><strong>Status Breakdown:</strong></p>
                        <p class="mb-1">Pending: {{ $customerStats['pending'] }}</p>
                        <p class="mb-1">Approved: {{ $customerStats['approved'] }}</p>
                        <p class="mb-1">On Route: {{ $customerStats['on_route'] }}</p>
                        <p class="mb-1">Completed: {{ $customerStats['completed'] }}</p>
                        <p class="mb-0">Rejected: {{ $customerStats['rejected'] }}</p>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="info-card">
                    <h4 class="mb-4">Quick Actions</h4>
                    <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary w-100 mb-2">
                        <i class="fa fa-arrow-left"></i> Back to Customers
                    </a>
                </div>
            </div>

            <div class="col-md-8">
                <!-- Bookings List -->
                <div class="info-card">
                    <h4 class="mb-4">All Bookings ({{ $processedBookings->count() }})</h4>
                    @forelse($processedBookings as $item)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5 class="mb-2">
                                        <a href="{{ route('admin.bookings.show', $item['booking']->id) }}">
                                            Booking #{{ $item['booking']->id }}
                                        </a>
                                    </h5>
                                    <p class="mb-1"><strong>Product:</strong> {{ $item['booking']->product->title ?? 'N/A' }}</p>
                                    <p class="mb-1"><strong>Address:</strong> {{ $item['booking']->installation_address }}, {{ $item['booking']->city }}, {{ $item['booking']->zip }}</p>
                                    <p class="mb-1"><strong>Amount:</strong> ${{ number_format($item['booking']->amount ?? 0, 2) }}</p>
                                    <p class="mb-0"><strong>Date:</strong> {{ $item['booking']->created_at->format('F j, Y g:i A') }}</p>
                                    @if($item['technician'])
                                    <p class="mb-0 mt-2"><strong>Technician:</strong> {{ $item['technician']->name ?? 'N/A' }}</p>
                                    @endif
                                    @if($item['review'])
                                    <p class="mb-0 mt-2">
                                        <strong>Review:</strong> 
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star {{ $i <= $item['review']->rating ? '' : 'far' }}" style="color: #ffc107;"></i>
                                        @endfor
                                        <span class="ms-1">{{ $item['review']->rating }}/5</span>
                                    </p>
                                    @endif
                                </div>
                                <div class="col-md-4 text-end">
                                    <span class="status-badge status-{{ $item['status'] }}">
                                        {{ $item['statusLabel'] }}
                                    </span>
                                    <div class="mt-3">
                                        <a href="{{ route('admin.bookings.show', $item['booking']->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-eye"></i> View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-5">
                        <p class="text-muted">No bookings found for this customer.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection


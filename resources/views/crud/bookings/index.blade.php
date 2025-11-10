@extends('layouts.app.master')

@php
    use App\Helpers\BookingStatusHelper;
@endphp

@section('title', 'Bookings')

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
    .stat-card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        position: relative;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
    }
    .stat-value {
        font-size: 28px;
        font-weight: 700;
        margin: 10px 0 5px;
        color: #1a1a1a;
    }
    .dark-only .stat-value {
        color: #ffffff !important;
    }
    .stat-label {
        font-size: 13px;
        color: #6b7280;
        font-weight: 500;
    }
    .dark-only .stat-label {
        color: #9ca3af !important;
    }
    .gradient-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .gradient-success { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
    .gradient-info { background: linear-gradient(135deg, #3494E6 0%, #EC6EAD 100%); }
    .gradient-warning { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
    .gradient-danger { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); }
    .filter-section {
        display: flex;
        justify-content: center;
        margin: 20px 0;
    }
</style>
@endsection

@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Bookings List</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                            <svg class="stroke-icon">
                                <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-home')}}"></use>
                            </svg></a></li>
                        <li class="breadcrumb-item">Bookings</li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid list-product-view product-wrapper">
        <!-- Statistics Cards Row -->
        <div class="row mb-4">
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">Total</div>
                                <div class="stat-value">{{ $stats['total'] }}</div>
                            </div>
                            <div class="stat-icon gradient-primary">
                                <i class="fa fa-calendar-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">Pending</div>
                                <div class="stat-value">{{ $stats['pending'] }}</div>
                            </div>
                            <div class="stat-icon gradient-warning">
                                <i class="fa fa-clock"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">Approved</div>
                                <div class="stat-value">{{ $stats['approved'] }}</div>
                            </div>
                            <div class="stat-icon gradient-success">
                                <i class="fa fa-check-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">On Route</div>
                                <div class="stat-value">{{ $stats['on_route'] }}</div>
                            </div>
                            <div class="stat-icon gradient-info">
                                <i class="fa fa-route"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">Completed</div>
                                <div class="stat-value">{{ $stats['completed'] }}</div>
                            </div>
                            <div class="stat-icon gradient-success">
                                <i class="fa fa-check-double"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">Rejected</div>
                                <div class="stat-value">{{ $stats['rejected'] }}</div>
                            </div>
                            <div class="stat-icon gradient-danger">
                                <i class="fa fa-times-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <form method="GET" action="{{ route('admin.bookings.index') }}" class="d-inline-flex gap-2 align-items-center">
                <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ $search }}" style="width: 200px;">
                <select name="status" class="form-control" style="width: 150px;">
                    <option value="">All Status</option>
                    <option value="pending" {{ $statusFilter == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $statusFilter == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="on_route" {{ $statusFilter == 'on_route' ? 'selected' : '' }}>On Route</option>
                    <option value="completed" {{ $statusFilter == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="rejected" {{ $statusFilter == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
                <input type="date" name="date_from" class="form-control" value="{{ $dateFrom }}" placeholder="From">
                <input type="date" name="date_to" class="form-control" value="{{ $dateTo }}" placeholder="To">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary"><i class="fa fa-redo"></i></a>
            </form>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-no-border">
                        <h5>All Bookings</h5>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="list-product">
                            <div class="recent-table table-responsive custom-scrollbar product-list-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>No.</th>
                                            <th><span class="c-o-light f-w-600">Booking ID</span></th>
                                            <th><span class="c-o-light f-w-600">Customer</span></th>
                                            <th><span class="c-o-light f-w-600">Product</span></th>
                                            <th><span class="c-o-light f-w-600">Address</span></th>
                                            <th><span class="c-o-light f-w-600">Amount</span></th>
                                            <th><span class="c-o-light f-w-600">Status</span></th>
                                            <th><span class="c-o-light f-w-600">Date</span></th>
                                            <th><span class="c-o-light f-w-600">Actions</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($paginatedBookings as $item)
                                        @php
                                            $booking = $item['booking'];
                                            $status = $item['status'];
                                            $statusLabel = $item['statusLabel'];
                                        @endphp
                                        <tr class="product-removes">
                                            <td></td>
                                            <td>{{ $loop->iteration + ($paginatedBookings->currentPage() - 1) * $paginatedBookings->perPage() }}</td>
                                            <td>
                                                <p class="c-o-light mb-0"><strong>#{{ $booking->id }}</strong></p>
                                            </td>
                                            <td>
                                                <p class="c-o-light mb-0">{{ $booking->user->name ?? 'N/A' }}</p>
                                                <small class="text-muted">{{ $booking->user->email ?? 'N/A' }}</small>
                                            </td>
                                            <td>
                                                <p class="c-o-light mb-0">{{ $booking->product->title ?? 'N/A' }}</p>
                                            </td>
                                            <td>
                                                <p class="c-o-light mb-0">{{ Str::limit($booking->installation_address ?? 'N/A', 30) }}</p>
                                                <small class="text-muted">{{ $booking->city ?? 'N/A' }}, {{ $booking->zip ?? 'N/A' }}</small>
                                            </td>
                                            <td>
                                                <p class="c-o-light mb-0"><strong>${{ number_format($booking->amount ?? 0, 2) }}</strong></p>
                                            </td>
                                            <td>
                                                <span class="status-badge status-{{ $status ?? 'pending' }}">
                                                    {{ ucfirst($statusLabel ?? 'Pending') }}
                                                </span>
                                            </td>
                                            <td>
                                                <p class="c-o-light mb-0">{{ $booking->created_at->format('M d, Y') }}</p>
                                                <small class="text-muted">{{ $booking->created_at->format('h:i A') }}</small>
                                            </td>
                                            <td>
                                                <div class="product-action">
                                                    <a class="square-white" href="{{ route('admin.bookings.show', $booking->id) }}" title="View Details">
                                                        <svg>
                                                            <use href="{{ asset('AdminAssets/svg/icon-sprite.svg#eye') }}"></use>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="10" class="text-center py-5">
                                                <p class="text-muted">No bookings found.</p>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    Showing {{ $paginatedBookings->firstItem() ?? 0 }} to {{ $paginatedBookings->lastItem() ?? 0 }} of {{ $paginatedBookings->total() }} entries
                                </div>
                                <div>
                                    {{ $paginatedBookings->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection

@section('script')
@endsection


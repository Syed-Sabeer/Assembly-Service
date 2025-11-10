@extends('layouts.app.master')

@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/css/vendors/chartist.css')}}">
<style>
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
        font-size: 32px;
        font-weight: 700;
        margin: 15px 0 5px;
        color: #1a1a1a;
    }
    .dark-only .stat-value {
        color: #ffffff !important;
    }
    .stat-label {
        font-size: 14px;
        color: #6b7280;
        font-weight: 500;
    }
    .dark-only .stat-label {
        color: #9ca3af !important;
    }
    .dark-only .text-muted {
        color: #9ca3af !important;
    }
    .chart-card {
        border-radius: 12px;
        overflow: hidden;
    }
    .chart-header {
        padding: 20px;
        border-bottom: 1px solid #e5e7eb;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    .chart-header h5 {
        margin: 0;
        font-weight: 600;
        font-size: 18px;
    }
    .recent-activity-card {
        border-radius: 12px;
        overflow: hidden;
    }
    .activity-item {
        padding: 15px 20px;
        border-bottom: 1px solid #f3f4f6;
        transition: background 0.2s;
    }
    .activity-item:hover {
        background: #f9fafb;
    }
    .activity-item:last-child {
        border-bottom: none;
    }
    .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        color: white;
    }
    .gradient-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .gradient-success { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
    .gradient-info { background: linear-gradient(135deg, #3494E6 0%, #EC6EAD 100%); }
    .gradient-warning { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
    .gradient-danger { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); }
    .gradient-purple { background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); }
    .gradient-blue { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .gradient-green { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
</style>
@endsection

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                            <svg class="stroke-icon">
                                <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-home')}}"></use>
                            </svg></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Container-fluid starts-->
    <div class="container-fluid dashboard-09">
        <!-- Statistics Cards Row -->
        <div class="row">
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">Total Bookings</div>
                                <div class="stat-value"><span class="counter" data-target="{{ $stats['total_bookings'] }}">0</span></div>
                                <div class="mt-2">
                                    <small class="text-muted">
                                        <i class="fa fa-arrow-up text-success"></i> 
                                        Pending: {{ $bookingStats['pending'] }}
                                    </small>
                                </div>
                            </div>
                            <div class="stat-icon gradient-primary">
                                <i class="fa fa-calendar-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">Total Reviews</div>
                                <div class="stat-value"><span class="counter" data-target="{{ $stats['total_reviews'] }}">0</span></div>
                                <div class="mt-2">
                                    <small class="text-muted">
                                        <i class="fa fa-star text-warning"></i> 
                                        Customer Feedback
                                    </small>
                                </div>
                            </div>
                            <div class="stat-icon gradient-warning">
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">Total Customers</div>
                                <div class="stat-value"><span class="counter" data-target="{{ $stats['total_customers'] }}">0</span></div>
                                <div class="mt-2">
                                    <small class="text-muted">
                                        <i class="fa fa-users text-info"></i> 
                                        Registered Users
                                    </small>
                                </div>
                            </div>
                            <div class="stat-icon gradient-success">
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">Total Quotes</div>
                                <div class="stat-value"><span class="counter" data-target="{{ $stats['total_quotes'] }}">0</span></div>
                                <div class="mt-2">
                                    <small class="text-muted">
                                        <i class="fa fa-file-alt text-primary"></i> 
                                        Quote Requests
                                    </small>
                                </div>
                            </div>
                            <div class="stat-icon gradient-info">
                                <i class="fa fa-file-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Second Row Statistics -->
        <div class="row mt-3">
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">Total Products</div>
                                <div class="stat-value"><span class="counter" data-target="{{ $stats['total_products'] }}">0</span></div>
                                <div class="mt-2">
                                    <small class="text-muted">
                                        <i class="fa fa-box text-success"></i> 
                                        Available Products
                                    </small>
                                </div>
                            </div>
                            <div class="stat-icon gradient-green">
                                <i class="fa fa-box"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">Total Categories</div>
                                <div class="stat-value"><span class="counter" data-target="{{ $stats['total_categories'] }}">0</span></div>
                                <div class="mt-2">
                                    <small class="text-muted">
                                        <i class="fa fa-tags text-info"></i> 
                                        Product Categories
                                    </small>
                                </div>
                            </div>
                            <div class="stat-icon gradient-purple">
                                <i class="fa fa-tags"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">Total Contacts</div>
                                <div class="stat-value"><span class="counter" data-target="{{ $stats['total_contacts'] }}">0</span></div>
                                <div class="mt-2">
                                    <small class="text-muted">
                                        <i class="fa fa-envelope text-primary"></i> 
                                        Contact Submissions
                                    </small>
                                </div>
                            </div>
                            <div class="stat-icon gradient-blue">
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">Total Visits</div>
                                <div class="stat-value"><span class="counter" data-target="{{ $stats['total_visits'] }}">0</span></div>
                                <div class="mt-2">
                                    <small class="text-muted">
                                        <i class="fa fa-eye text-success"></i> 
                                        Website Visits
                                    </small>
                                </div>
                            </div>
                            <div class="stat-icon gradient-danger">
                                <i class="fa fa-eye"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Charts Row -->
        <div class="row mt-4">
            <div class="col-xl-8 col-lg-12">
                <div class="card chart-card">
                    <div class="chart-header">
                        <h5><i class="fa fa-chart-line me-2"></i> Monthly Statistics (Last 6 Months)</h5>
                    </div>
                    <div class="card-body" style="position: relative; height: 300px; width: 100%;">
                        <div id="monthlyStatsChart" style="width: 100%; height: 100%;"></div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-lg-12">
                <div class="card chart-card">
                    <div class="chart-header">
                        <h5><i class="fa fa-chart-pie me-2"></i> Booking Status Distribution</h5>
                    </div>
                    <div class="card-body" style="position: relative; height: 300px; width: 100%;">
                        <div id="bookingStatusChart" style="width: 100%; height: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recent Activity Row -->
        <div class="row mt-4">
            <div class="col-xl-4 col-lg-12">
                <div class="card recent-activity-card">
                    <div class="card-header">
                        <h5><i class="fa fa-calendar me-2"></i> Recent Bookings</h5>
                    </div>
                    <div class="card-body p-0">
                        @forelse($recentBookings as $booking)
                        <div class="activity-item">
                            <div class="d-flex align-items-center">
                                <div class="activity-icon gradient-primary me-3">
                                    <i class="fa fa-calendar-check"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">{{ $booking->user->name ?? 'N/A' }}</h6>
                                    <p class="mb-0 text-muted small">
                                        {{ $booking->product->title ?? 'N/A' }}<br>
                                        <small>{{ $booking->created_at->diffForHumans() }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="activity-item text-center text-muted py-4">
                            No recent bookings
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-lg-12">
                <div class="card recent-activity-card">
                    <div class="card-header">
                        <h5><i class="fa fa-star me-2"></i> Recent Reviews</h5>
                    </div>
                    <div class="card-body p-0">
                        @forelse($recentReviews as $review)
                        <div class="activity-item">
                            <div class="d-flex align-items-center">
                                <div class="activity-icon gradient-warning me-3">
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fa fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-muted' }}"></i>
                                        @endfor
                                    </h6>
                                    <p class="mb-0 text-muted small">
                                        {{ Str::limit($review->review ?? 'No comment', 50) }}<br>
                                        <small>{{ $review->created_at->diffForHumans() }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="activity-item text-center text-muted py-4">
                            No recent reviews
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-lg-12">
                <div class="card recent-activity-card">
                    <div class="card-header">
                        <h5><i class="fa fa-file-alt me-2"></i> Recent Quotes</h5>
                    </div>
                    <div class="card-body p-0">
                        @forelse($recentQuotes as $quote)
                        <div class="activity-item">
                            <div class="d-flex align-items-center">
                                <div class="activity-icon gradient-info me-3">
                                    <i class="fa fa-file-alt"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">{{ $quote->fullname }}</h6>
                                    <p class="mb-0 text-muted small">
                                        {{ $quote->service }}<br>
                                        <small>{{ $quote->created_at->diffForHumans() }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="activity-item text-center text-muted py-4">
                            No recent quotes
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection

@section('script')
<!-- Suppress Apex Charts errors for non-existent elements -->
<script>
    // Override ApexCharts to prevent errors for missing elements
    if (typeof ApexCharts !== 'undefined') {
        const originalApexCharts = ApexCharts;
        ApexCharts = function(selector, options) {
            const element = typeof selector === 'string' ? document.querySelector(selector) : selector;
            if (!element) {
                // Silently fail for missing elements
                return {
                    render: function() {},
                    updateOptions: function() {},
                    destroy: function() {}
                };
            }
            return new originalApexCharts(element, options);
        };
        // Copy static methods
        Object.setPrototypeOf(ApexCharts, originalApexCharts);
        Object.keys(originalApexCharts).forEach(key => {
            ApexCharts[key] = originalApexCharts[key];
        });
    }
</script>
<!-- Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    // Counter Animation
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.textContent = target;
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.ceil(current);
                }
            }, 30);
        });
    });
    
    // Load Google Charts
    google.charts.load('current', {'packages':['corechart', 'line']});
    google.charts.setOnLoadCallback(drawCharts);
    
    function drawCharts() {
        // Monthly Statistics Chart
        const monthsData = {!! json_encode($months) !!};
        const bookingsData = {!! json_encode($bookingsData) !!};
        const reviewsData = {!! json_encode($reviewsData) !!};
        const quotesData = {!! json_encode($quotesData) !!};
        const customersData = {!! json_encode($customersData) !!};
        
        const monthlyData = new google.visualization.DataTable();
        monthlyData.addColumn('string', 'Month');
        monthlyData.addColumn('number', 'Bookings');
        monthlyData.addColumn('number', 'Reviews');
        monthlyData.addColumn('number', 'Quotes');
        monthlyData.addColumn('number', 'Customers');
        
        for (let i = 0; i < monthsData.length; i++) {
            monthlyData.addRow([
                monthsData[i],
                bookingsData[i],
                reviewsData[i],
                quotesData[i],
                customersData[i]
            ]);
        }
        
        const monthlyOptions = {
            title: '',
            curveType: 'function',
            legend: { position: 'top' },
            height: 300,
            colors: ['#667eea', '#f5576c', '#3494E6', '#11998e'],
            hAxis: {
                title: 'Month'
            },
            vAxis: {
                title: 'Count',
                minValue: 0
            }
        };
        
        const monthlyChart = new google.visualization.LineChart(document.getElementById('monthlyStatsChart'));
        monthlyChart.draw(monthlyData, monthlyOptions);
        
        // Booking Status Chart
        const bookingStatsData = {
            pending: {{ $bookingStats['pending'] }},
            approved: {{ $bookingStats['approved'] }},
            onRoute: {{ $bookingStats['on_route'] }},
            completed: {{ $bookingStats['completed'] }},
            rejected: {{ $bookingStats['rejected'] }}
        };
        
        const statusData = new google.visualization.DataTable();
        statusData.addColumn('string', 'Status');
        statusData.addColumn('number', 'Count');
        statusData.addRows([
            ['Pending', bookingStatsData.pending],
            ['Approved', bookingStatsData.approved],
            ['On Route', bookingStatsData.onRoute],
            ['Completed', bookingStatsData.completed],
            ['Rejected', bookingStatsData.rejected]
        ]);
        
        const statusOptions = {
            title: '',
            height: 300,
            colors: ['#FFCE56', '#36A2EB', '#4BC0C0', '#4BC0C0', '#FF6384'],
            legend: { position: 'bottom' },
            pieHole: 0.4
        };
        
        const statusChart = new google.visualization.PieChart(document.getElementById('bookingStatusChart'));
        statusChart.draw(statusData, statusOptions);
        
        // Handle window resize
        window.addEventListener('resize', function() {
            monthlyChart.draw(monthlyData, monthlyOptions);
            statusChart.draw(statusData, statusOptions);
        });
    }
</script>
@endsection

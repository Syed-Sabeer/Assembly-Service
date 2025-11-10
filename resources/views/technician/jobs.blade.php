@extends('layouts.frontend.master')

@php
    use App\Helpers\BookingStatusHelper;
@endphp

@section('css')
  <style>
    /* Dashboard Header Premium Styles */
    .dashboard-header-premium {
        animation: fadeInDown 0.6s ease-out;
    }
    
    .dashboard-header-content a:hover {
        background: rgba(255,255,255,0.3) !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
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
        
        .dashboard-header-content > div {
            flex-direction: column;
            align-items: flex-start !important;
        }
    }
    
  .career_jobs {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      padding: 3rem 0;
        min-height: 100vh;
      }
    
     .career_jobs .header {
       background: white;
        padding: 50px 40px;
        text-align: center;
        margin: 0 auto 40px;
        max-width: 1200px;
        border-radius: 24px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
    }

    .career_jobs .header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500);
}

.career_jobs .header h1 {
        font-size: 2.8rem;
    font-weight: 800;
    margin-bottom: 16px;
    background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    letter-spacing: -1px;
}

.career_jobs .header p {
        font-size: 1.15em;
        color: #64748b;
        max-width: 700px;
    margin: 0 auto;
        line-height: 1.6;
    }

    /* Stats Bar */
    .career_jobs .stats-bar {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .career_jobs .stat-card {
        background: white;
        padding: 28px 24px;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        text-align: center;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        border: 2px solid transparent;
    }

    .career_jobs .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .career_jobs .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        border-color: rgba(51, 117, 209, 0.2);
    }

    .career_jobs .stat-card:hover::before {
        transform: scaleX(1);
    }

    .career_jobs .stat-card.pending {
        border-left: 4px solid #fbbf24;
    }

    .career_jobs .stat-card.approved {
        border-left: 4px solid #10b981;
    }

    .career_jobs .stat-card.on_route {
        border-left: 4px solid #3b82f6;
    }

    .career_jobs .stat-card.completed {
        border-left: 4px solid #059669;
    }

    .career_jobs .stat-card.rejected {
        border-left: 4px solid #ef4444;
    }

    .career_jobs .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
        font-size: 24px;
        color: white;
    }

    .career_jobs .stat-card.pending .stat-icon {
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
    }

    .career_jobs .stat-card.approved .stat-icon {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .career_jobs .stat-card.on_route .stat-icon {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
    }

    .career_jobs .stat-card.completed .stat-icon {
        background: linear-gradient(135deg, #059669, #047857);
    }

    .career_jobs .stat-card.rejected .stat-icon {
        background: linear-gradient(135deg, #ef4444, #dc2626);
    }

    .career_jobs .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 8px;
        line-height: 1;
    }

    .career_jobs .stat-card.pending .stat-number {
        color: #f59e0b;
    }

    .career_jobs .stat-card.approved .stat-number {
        color: #059669;
    }

    .career_jobs .stat-card.on_route .stat-number {
        color: #2563eb;
    }

    .career_jobs .stat-card.completed .stat-number {
        color: #047857;
    }

    .career_jobs .stat-card.rejected .stat-number {
        color: #dc2626;
    }

    .career_jobs .stat-label {
        font-size: 14px;
        color: #64748b;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Filters */
.career_jobs .filters {
    background: white;
        padding: 35px 30px;
    border-radius: 20px;
    margin-bottom: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.05);
}

.career_jobs .filter-row {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr auto;
    gap: 15px;
        align-items: end;
    }

    .career_jobs .filter-group {
    display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .career_jobs .filter-label {
        font-size: 12px;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .career_jobs .filter-input,
.career_jobs .filter-select {
        padding: 14px 16px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
    font-size: 14px;
        transition: all 0.3s;
    background: white;
        width: 100%;
    }

    .career_jobs .filter-input:focus,
    .career_jobs .filter-select:focus {
        outline: none;
        border-color: #3375d1;
        box-shadow: 0 0 0 3px rgba(51, 117, 209, 0.1);
}

.career_jobs .search-btn {
    background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500);
    color: white;
        padding: 14px 32px;
    border: none;
        border-radius: 12px;
    font-size: 14px;
        font-weight: 700;
    cursor: pointer;
        transition: all 0.3s;
        white-space: nowrap;
        box-shadow: 0 4px 15px rgba(51, 117, 209, 0.3);
}

.career_jobs .search-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(51, 117, 209, 0.4);
    }

    .career_jobs .search-btn:active {
        transform: translateY(0);
}

.career_jobs .results-count {
        margin-bottom: 25px;
        color: #64748b;
        font-size: 15px;
        font-weight: 500;
        padding: 12px 20px;
    background: white;
        border-radius: 12px;
        display: inline-block;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    /* Jobs Grid */
.career_jobs .jobs-grid {
    display: grid;
        grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
}

.career_jobs .job-card {
   background: white;
        border-radius: 24px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 0;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
    }

    .career_jobs .job-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500);
}

.career_jobs .job-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 60px rgba(51, 117, 209, 0.2);
}

.career_jobs .job-header {
    display: flex;
    align-items: start;
        gap: 18px;
        padding: 28px 28px 20px;
        background: linear-gradient(135deg, rgba(51, 117, 209, 0.03), rgba(12, 158, 181, 0.03));
        border-bottom: 1px solid #f1f5f9;
}

.career_jobs .job-avatar {
        width: 60px;
        height: 60px;
        border-radius: 16px;
    background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
        font-weight: 800;
        font-size: 22px;
    flex-shrink: 0;
        box-shadow: 0 4px 15px rgba(51, 117, 209, 0.3);
}

.career_jobs .job-title-section {
    flex: 1;
}

.career_jobs .job-name {
        font-size: 19px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 10px;
        line-height: 1.3;
    }

    .career_jobs .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .career_jobs .status-pending {
        background: linear-gradient(135deg, #fef3c7, #fde68a);
        color: #92400e;
    }

    .career_jobs .status-approved {
        background: linear-gradient(135deg, #d1fae5, #a7f3d0);
        color: #065f46;
    }

    .career_jobs .status-on_route {
        background: linear-gradient(135deg, #dbeafe, #bfdbfe);
        color: #1e40af;
    }

    .career_jobs .status-completed {
        background: linear-gradient(135deg, #d1fae5, #a7f3d0);
        color: #065f46;
    }

    .career_jobs .status-rejected {
        background: linear-gradient(135deg, #fee2e2, #fecaca);
        color: #991b1b;
}

.career_jobs .job-meta {
    display: flex;
    flex-direction: column;
        gap: 12px;
        padding: 24px 28px;
        border-bottom: 1px solid #f1f5f9;
}

.career_jobs .meta-item {
    display: flex;
    align-items: center;
        gap: 12px;
        font-size: 14px;
        color: #475569;
}

.career_jobs .meta-icon {
        width: 20px;
        height: 20px;
        color: #64748b;
        flex-shrink: 0;
    }

    .career_jobs .meta-item strong {
        color: #1e293b;
        font-weight: 600;
        margin-right: 4px;
}

.career_jobs .job-description {
        padding: 20px 28px;
    font-size: 14px;
        color: #64748b;
        line-height: 1.7;
        background: #f8fafc;
        border-top: 1px solid #f1f5f9;
        border-bottom: 1px solid #f1f5f9;
    }

    .career_jobs .job-description strong {
        color: #1e293b;
    font-weight: 600;
}

    .career_jobs .review-section {
        padding: 20px 28px;
        background: linear-gradient(135deg, #fffbeb, #fef3c7);
        border-top: 1px solid #fde68a;
        border-bottom: 1px solid #fde68a;
    }

    .career_jobs .review-stars {
        color: #fbbf24;
        font-size: 16px;
        margin-bottom: 10px;
    }

    .career_jobs .review-text {
        font-size: 14px;
        color: #78350f;
        font-style: italic;
        line-height: 1.6;
    }

    .career_jobs .job-actions {
    display: flex;
        gap: 12px;
        padding: 24px 28px;
        flex-wrap: wrap;
}

.career_jobs .btn {
    flex: 1;
        min-width: 140px;
        padding: 14px 20px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 700;
    cursor: pointer;
    border: none;
    text-align: center;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .career_jobs .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .career_jobs .btn:active {
        transform: translateY(0);
    }

    .career_jobs .btn-approve {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }

    .career_jobs .btn-approve:hover {
        background: linear-gradient(135deg, #059669, #047857);
    }

    .career_jobs .btn-reject {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
    }

    .career_jobs .btn-reject:hover {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
    }

    .career_jobs .btn-on-route {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
    }

    .career_jobs .btn-on-route:hover {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
    }

    .career_jobs .btn-complete {
        background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

    .career_jobs .btn-complete:hover {
        background: linear-gradient(135deg, #059669, #047857);
    }

    .career_jobs .btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none !important;
    }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        margin-top: 40px;
        padding: 30px 0;
        flex-wrap: wrap;
    }

    .pagination a,
    .pagination span {
        padding: 12px 18px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        text-decoration: none;
        color: #475569;
        font-weight: 600;
        transition: all 0.3s;
        min-width: 44px;
        text-align: center;
    background: white;
    }

    .pagination a:hover {
        background: linear-gradient(135deg, #3375d1, #0c9eb5);
        color: white;
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(51, 117, 209, 0.3);
    }

    .pagination .active {
        background: linear-gradient(135deg, #3375d1, #0c9eb5);
    color: white;
        border-color: transparent;
        box-shadow: 0 4px 12px rgba(51, 117, 209, 0.3);
    }

    .pagination .disabled {
        opacity: 0.4;
        cursor: not-allowed;
        background: #f1f5f9;
    }

    .pagination .disabled:hover {
        transform: none;
        box-shadow: none;
    }

    /* Empty State */
    .career_jobs .empty-state {
        grid-column: 1 / -1;
    text-align: center;
        padding: 80px 40px;
        background: white;
        border-radius: 24px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .career_jobs .empty-state-icon {
        font-size: 80px;
        color: #cbd5e1;
        margin-bottom: 20px;
    }

    .career_jobs .empty-state h3 {
    font-size: 24px;
        color: #1e293b;
        margin-bottom: 12px;
        font-weight: 700;
    }

    .career_jobs .empty-state p {
        font-size: 16px;
        color: #64748b;
        margin: 0;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .career_jobs .filter-row {
        grid-template-columns: 1fr;
    }

        .career_jobs .jobs-grid {
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
        }
}

@media (max-width: 768px) {
    .career_jobs .header h1 {
            font-size: 2rem;
        }

        .career_jobs .stats-bar {
            grid-template-columns: repeat(2, 1fr);
        }

    .career_jobs .jobs-grid {
        grid-template-columns: 1fr;
    }

        .career_jobs .job-actions {
        flex-direction: column;
    }

        .career_jobs .btn {
        width: 100%;
    }
}
    </style>
@endsection

@section('content')
<section class="career_jobs" >
    <!-- Premium Dashboard Header -->
    <div class="dashboard-header-premium" style="max-width: 1400px; margin: 0 auto 40px; padding: 0 20px;">
        <div class="dashboard-header-content" style="background: linear-gradient(135deg, #3375d1 0%, #0c9eb5 50%, #72a500 100%); border-radius: 20px; padding: 40px; box-shadow: 0 10px 40px rgba(51, 117, 209, 0.3); position: relative; overflow: hidden;">
            <!-- Decorative Elements -->
            <div style="position: absolute; top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
            <div style="position: absolute; bottom: -30px; left: -30px; width: 150px; height: 150px; background: rgba(255,255,255,0.08); border-radius: 50%;"></div>
            
            <div style="position: relative; z-index: 1; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
                <div>
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 10px;">
                        <div style="width: 50px; height: 50px; background: rgba(255,255,255,0.2); border-radius: 12px; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(10px);">
                            <i class="fas fa-briefcase" style="font-size: 24px; color: white;"></i>
				</div>
                        <div>
                            <h1 style="margin: 0; font-size: 32px; font-weight: 700; color: white; text-shadow: 0 2px 10px rgba(0,0,0,0.2);">
                                My Job Requests
                            </h1>
                            <p style="margin: 5px 0 0 0; font-size: 14px; color: rgba(255,255,255,0.9);">
                                View, approve, reject, and manage all service requests assigned to you
                            </p>
			</div>
                    </div>
    </div>

                <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                    <a href="{{ route('technician.dashboard') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; background: rgba(255,255,255,0.2); color: white; border-radius: 12px; text-decoration: none; font-weight: 600; font-size: 14px; transition: all 0.3s ease; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.3);">
                        <i class="fas fa-arrow-left"></i>
                        <span>Back to Dashboard</span>
                    </a>
            </div>
            </div>
            </div>
        </div>

    <div class="container mt-5">
            <!-- Stats Bar -->
            <div class="stats-bar">
                <div class="stat-card pending">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                </div>
                    <div class="stat-number">{{ $stats['pending'] ?? 0 }}</div>
                    <div class="stat-label">Pending</div>
            </div>
                <div class="stat-card approved">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
        </div>
                    <div class="stat-number">{{ $stats['approved'] ?? 0 }}</div>
                    <div class="stat-label">Approved</div>
            </div>
                <div class="stat-card on_route">
                    <div class="stat-icon">
                        <i class="fas fa-route"></i>
            </div>
                    <div class="stat-number">{{ $stats['on_route'] ?? 0 }}</div>
                    <div class="stat-label">On Route</div>
        </div>
                <div class="stat-card completed">
                    <div class="stat-icon">
                        <i class="fas fa-check-double"></i>
        </div>
                    <div class="stat-number">{{ $stats['completed'] ?? 0 }}</div>
                    <div class="stat-label">Completed</div>
        </div>
                <div class="stat-card rejected">
                    <div class="stat-icon">
                        <i class="fas fa-times-circle"></i>
        </div>
                    <div class="stat-number">{{ $stats['rejected'] ?? 0 }}</div>
                    <div class="stat-label">Rejected</div>
        </div>
    </div>

            <!-- Filters -->
            <div class="filters">
                <form method="GET" action="{{ route('technician.jobs') }}" id="filterForm">
                    <div class="filter-row">
                        <div class="filter-group">
                            <label class="filter-label">Search</label>
                            <input type="text" id="searchInput" name="search" class="filter-input" value="{{ $search }}" placeholder="Search by customer, address, product...">
                </div>
                        <div class="filter-group">
                            <label class="filter-label">Status</label>
                            <select id="statusFilter" name="status" class="filter-select">
                                <option value="">All Statuses</option>
                                <option value="pending" {{ $statusFilter == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ $statusFilter == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="on_route" {{ $statusFilter == 'on_route' ? 'selected' : '' }}>On Route</option>
                                <option value="completed" {{ $statusFilter == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="rejected" {{ $statusFilter == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
            </div>
                        <div class="filter-group">
                            <label class="filter-label">Date From</label>
                            <input type="date" id="dateFrom" name="date_from" class="filter-input" value="{{ $dateFrom }}">
        </div>
                        <div class="filter-group">
                            <label class="filter-label">Date To</label>
                            <input type="date" id="dateTo" name="date_to" class="filter-input" value="{{ $dateTo }}">
            </div>
                        <div class="filter-group">
                            <label class="filter-label" style="opacity: 0;">Action</label>
                            <button type="submit" class="search-btn">
                                <i class="fas fa-search"></i> Search
                            </button>
            </div>
        </div>
                </form>
        </div>

            <div class="results-count" id="resultsCount">
                <i class="fas fa-list"></i> Showing {{ $paginatedJobs->firstItem() ?? 0 }} to {{ $paginatedJobs->lastItem() ?? 0 }} of {{ $paginatedJobs->total() }} jobs
    </div>

            <!-- Jobs Grid -->
            <div class="jobs-grid" id="jobsGrid">
                @forelse($paginatedJobs as $item)
                    @php
                        $booking = $item['booking'];
                        $bookingStatus = $item['bookingStatus'];
                        $customer = $item['customer'];
                        $product = $item['product'];
                        $review = $item['review'];
                        $status = $item['status'];
                        $statusLabel = $item['statusLabel'];
                        $statusClass = $item['statusClass'];
                        $customerName = $customer->name ?? 'Customer';
                        $customerInitials = strtoupper(substr($customerName, 0, 1) . (strpos($customerName, ' ') !== false ? substr($customerName, strpos($customerName, ' ') + 1, 1) : substr($customerName, 1, 1)));
                    @endphp

                    <div class="job-card" data-status="{{ $status }}">
        <div class="job-header">
                            <div class="job-avatar">{{ $customerInitials }}</div>
            <div class="job-title-section">
                                <div class="job-name">{{ $product->title ?? 'Service Request' }}</div>
                                <span class="status-badge status-{{ $statusClass }}">
                                    @if($status == 'pending')
                                        <i class="fas fa-clock"></i>
                                    @elseif($status == 'approved')
                                        <i class="fas fa-check-circle"></i>
                                    @elseif($status == 'on_route')
                                        <i class="fas fa-route"></i>
                                    @elseif($status == 'completed')
                                        <i class="fas fa-check-double"></i>
                                    @elseif($status == 'rejected')
                                        <i class="fas fa-times-circle"></i>
                                    @endif
                                    {{ $statusLabel }}
                                </span>
            </div>
        </div>
        <div class="job-meta">
            <div class="meta-item">
                                <svg class="meta-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                                <span><strong>Customer:</strong> {{ $customerName }}</span>
            </div>
            <div class="meta-item">
                                <svg class="meta-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                </svg>
                                <span>{{ $customer->email ?? 'N/A' }}</span>
            </div>
            <div class="meta-item">
                                <svg class="meta-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $booking->installation_address }}, {{ $booking->city }} {{ $booking->zip }}</span>
            </div>
            <div class="meta-item">
                                <svg class="meta-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                </svg>
                                <span><strong>Scheduled:</strong> {{ $booking->preferred_date ? $booking->preferred_date->format('M j, Y') : 'TBD' }} at {{ $booking->preferred_time ?? 'TBD' }}</span>
            </div>
            <div class="meta-item">
                                <svg class="meta-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16z"/>
                                </svg>
                                <span><strong>Amount:</strong> ${{ number_format($booking->amount ?? 0, 2) }}</span>
            </div>
            <div class="meta-item">
                                <svg class="meta-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span><strong>Booking ID:</strong> #{{ $booking->id }}</span>
            </div>
        </div>
                        @if($booking->notes)
        <div class="job-description">
                            <strong>Notes:</strong> {{ $booking->notes }}
        </div>
                        @endif

                        @if($review)
                        <div class="review-section">
                            <div class="review-stars">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $review->rating ? '' : 'fa-star-o' }}"></i>
                                @endfor
        </div>
                            <div class="review-text">"{{ $review->review }}"</div>
        </div>
                        @endif

                        <div class="job-actions">
                            @if($status == 'pending')
                                <button class="btn btn-approve" onclick="updateJobStatus({{ $bookingStatus->id }}, 1, this)">
                                    <i class="fas fa-check"></i> Approve
                                </button>
                                <button class="btn btn-reject" onclick="updateJobStatus({{ $bookingStatus->id }}, 2, this)">
                                    <i class="fas fa-times"></i> Reject
                                </button>
                            @elseif($status == 'approved')
                                @php
                                    $today = now()->format('Y-m-d');
                                    $scheduledDate = $booking->preferred_date ? $booking->preferred_date->format('Y-m-d') : null;
                                    $canStart = !$scheduledDate || $scheduledDate == $today;
                                @endphp
                                @if($canStart)
                                    <a href="{{ route('technician.jobs.start', $bookingStatus->id) }}" class="btn btn-on-route" style="text-decoration: none;">
                                        <i class="fas fa-play-circle"></i> Start Job
                                    </a>
                                @else
                                    <span class="btn" style="background: #e2e8f0; color: #64748b; cursor: default; box-shadow: none;">
                                        <i class="fas fa-calendar"></i> Scheduled: {{ $booking->preferred_date->format('M j') }}
                                    </span>
                                @endif
                            @elseif($status == 'on_route')
                                <button class="btn btn-complete" onclick="updateJobStatus({{ $bookingStatus->id }}, 4, this)">
                                    <i class="fas fa-check-circle"></i> Mark Complete
                                </button>
                            @elseif($status == 'completed')
                                <span class="btn" style="background: linear-gradient(135deg, #d1fae5, #a7f3d0); color: #065f46; cursor: default; box-shadow: none;">
                                    <i class="fas fa-check-double"></i> Completed
                                </span>
                            @elseif($status == 'rejected')
                                <span class="btn" style="background: linear-gradient(135deg, #fee2e2, #fecaca); color: #991b1b; cursor: default; box-shadow: none;">
                                    <i class="fas fa-times-circle"></i> Rejected
                                </span>
                            @endif
    </div>
        </div>
                @empty
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <i class="fas fa-inbox"></i>
        </div>
                        <h3>No jobs found</h3>
            <p>Try adjusting your filters to see more results</p>
        </div>
                @endforelse
    </div>

            <!-- Pagination -->
            @if($paginatedJobs->hasPages())
            <div class="pagination">
                @if($paginatedJobs->onFirstPage())
                    <span class="disabled">&laquo; Previous</span>
                @else
                    <a href="{{ $paginatedJobs->previousPageUrl() }}">&laquo; Previous</a>
                @endif

                @php
                    $currentPage = $paginatedJobs->currentPage();
                    $lastPage = $paginatedJobs->lastPage();
                    $startPage = max(1, $currentPage - 2);
                    $endPage = min($lastPage, $currentPage + 2);
                @endphp

                @if($startPage > 1)
                    <a href="{{ $paginatedJobs->url(1) }}">1</a>
                    @if($startPage > 2)
                        <span>...</span>
                    @endif
                @endif

                @foreach(range($startPage, $endPage) as $page)
                    @if($page == $currentPage)
                        <span class="active">{{ $page }}</span>
                    @else
                        <a href="{{ $paginatedJobs->url($page) }}">{{ $page }}</a>
                    @endif
                @endforeach

                @if($endPage < $lastPage)
                    @if($endPage < $lastPage - 1)
                        <span>...</span>
                    @endif
                    <a href="{{ $paginatedJobs->url($lastPage) }}">{{ $lastPage }}</a>
                @endif

                @if($paginatedJobs->hasMorePages())
                    <a href="{{ $paginatedJobs->nextPageUrl() }}">Next &raquo;</a>
                @else
                    <span class="disabled">Next &raquo;</span>
                @endif
        </div>
            @endif
    </div>
    </section>

<script>
        function updateJobStatus(bookingStatusId, newStatus, btn) {
            const originalText = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';

            fetch('{{ route("technician.jobs.updateStatus", ":id") }}'.replace(':id', bookingStatusId), {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    status: newStatus
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNotification('✅ ' + data.message);
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    alert(data.message || 'Failed to update job status. Please try again.');
                    btn.disabled = false;
                    btn.innerHTML = originalText;
                }
            })
            .catch(error => {
                console.error('Job status update error:', error);
                alert('An error occurred. Please try again.');
                btn.disabled = false;
                btn.innerHTML = originalText;
            });
        }

        function showNotification(message) {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: linear-gradient(135deg, #3375d1, #0c9eb5);
                color: white;
                padding: 18px 25px;
                border-radius: 12px;
                box-shadow: 0 8px 25px rgba(51, 117, 209, 0.4);
                z-index: 10000;
                font-weight: 600;
                animation: slideIn 0.4s ease-out;
            `;
            notification.textContent = message;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.animation = 'slideOut 0.4s ease-out';
                setTimeout(() => notification.remove(), 400);
            }, 3000);
        }

        // Add animation keyframes
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translateX(100px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
            @keyframes slideOut {
                to {
                    opacity: 0;
                    transform: translateX(100px);
                }
            }
        `;
        document.head.appendChild(style);
    </script>
@endsection

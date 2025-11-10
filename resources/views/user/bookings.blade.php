@extends('layouts.frontend.master')

@php
    use App\Helpers\BookingStatusHelper;
@endphp

@section('css')
<style>
    .te-filters-container {
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }
    .te-filter-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 15px;
    }
    .te-filter-group {
        display: flex;
        flex-direction: column;
    }
    .te-filter-group label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
        font-size: 14px;
    }
    .te-filter-group input,
    .te-filter-group select {
        padding: 10px 15px;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        font-size: 14px;
        transition: border-color 0.3s;
    }
    .te-filter-group input:focus,
    .te-filter-group select:focus {
        outline: none;
        border-color: #3375d1;
    }
    .te-filter-actions {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }
    .te-filter-btn {
        padding: 10px 25px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        font-size: 14px;
    }
    .te-filter-btn-primary {
        background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500);
        color: white;
    }
    .te-filter-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(51, 117, 209, 0.3);
    }
    .te-filter-btn-secondary {
        background: #f3f4f6;
        color: #374151;
    }
    .te-filter-btn-secondary:hover {
        background: #e5e7eb;
    }
    .te-results-info {
        padding: 15px;
        background: #f9fafb;
        border-radius: 8px;
        margin-bottom: 20px;
        color: #6b7280;
        font-size: 14px;
    }
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin-top: 30px;
        padding: 20px 0;
    }
    .pagination a,
    .pagination span {
        padding: 10px 15px;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        text-decoration: none;
        color: #374151;
        font-weight: 600;
        transition: all 0.3s;
    }
    .pagination a:hover {
        background: linear-gradient(135deg, #3375d1, #0c9eb5);
        color: white;
        border-color: transparent;
    }
    .pagination .active {
        background: linear-gradient(135deg, #3375d1, #0c9eb5);
        color: white;
        border-color: transparent;
    }
    .pagination .disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
</style>
@endsection

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"></script>
    
    <div class="te-container" style="max-width: 1400px; margin: 10vh auto 4rem auto; padding: 0 20px;">
        <!-- Premium Dashboard Header -->
        <div class="dashboard-header-premium" style="margin-bottom: 40px;">
            <div class="dashboard-header-content" style="background: linear-gradient(135deg, #3375d1 0%, #0c9eb5 50%, #72a500 100%); border-radius: 20px; padding: 40px; box-shadow: 0 10px 40px rgba(51, 117, 209, 0.3); position: relative; overflow: hidden;">
                <!-- Decorative Elements -->
                <div style="position: absolute; top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                <div style="position: absolute; bottom: -30px; left: -30px; width: 150px; height: 150px; background: rgba(255,255,255,0.08); border-radius: 50%;"></div>
                
                <div style="position: relative; z-index: 1; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
                    <div>
                        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 10px;">
                            <div style="width: 50px; height: 50px; background: rgba(255,255,255,0.2); border-radius: 12px; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(10px);">
                                <i class="fas fa-calendar-check" style="font-size: 24px; color: white;"></i>
                            </div>
                            <div>
                                <h1 style="margin: 0; font-size: 32px; font-weight: 700; color: white; text-shadow: 0 2px 10px rgba(0,0,0,0.2);">
                                    All Service Requests
                                </h1>
                                <p style="margin: 5px 0 0 0; font-size: 14px; color: rgba(255,255,255,0.9);">
                                    Search, filter, and manage all your service requests
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                        <a href="{{ route('user.profile') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; background: rgba(255,255,255,0.2); color: white; border-radius: 12px; text-decoration: none; font-weight: 600; font-size: 14px; transition: all 0.3s ease; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.3);">
                            <i class="fas fa-arrow-left"></i>
                            <span>Back to Profile</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Section -->
        <div class="te-header">
            <div class="te-header-badge">
                <i class="fas fa-shield-alt"></i> Service Dashboard
            </div>
            <h1 class="te-header-title">All Service Requests</h1>
            <p class="te-header-subtitle">Search, filter, and manage all your service requests</p>
        </div>

        <!-- Stats Bar -->
        <div class="te-stats-bar">
            <div class="te-stat-card">
                <div class="te-stat-icon te-pending">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="te-stat-content">
                    <h3>{{ $stats['pending'] ?? 0 }}</h3>
                    <p>Pending Requests</p>
                </div>
            </div>
            <div class="te-stat-card">
                <div class="te-stat-icon te-active">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="te-stat-content">
                    <h3>{{ $stats['active'] ?? 0 }}</h3>
                    <p>Active Services</p>
                </div>
            </div>
            <div class="te-stat-card">
                <div class="te-stat-icon te-done">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="te-stat-content">
                    <h3>{{ $stats['completed'] ?? 0 }}</h3>
                    <p>Completed</p>
                </div>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="te-filters-container">
            <form method="GET" action="{{ route('user.profile.bookings') }}" id="filterForm">
                <div class="te-filter-row">
                    <div class="te-filter-group">
                        <label for="search">Search</label>
                        <input type="text" id="search" name="search" value="{{ $search }}" placeholder="Search by address, city, product...">
                    </div>
                    <div class="te-filter-group">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            <option value="">All Statuses</option>
                            <option value="pending" {{ $statusFilter == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="accepted" {{ $statusFilter == 'accepted' ? 'selected' : '' }}>Approved</option>
                            <option value="on_route" {{ $statusFilter == 'on_route' ? 'selected' : '' }}>On Route</option>
                            <option value="completed" {{ $statusFilter == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="rejected" {{ $statusFilter == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>
                    <div class="te-filter-group">
                        <label for="date_from">Date From</label>
                        <input type="date" id="date_from" name="date_from" value="{{ $dateFrom }}">
                    </div>
                    <div class="te-filter-group">
                        <label for="date_to">Date To</label>
                        <input type="date" id="date_to" name="date_to" value="{{ $dateTo }}">
                    </div>
                    <div class="te-filter-group">
                        <label for="per_page">Per Page</label>
                        <select id="per_page" name="per_page">
                            <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                            <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                        </select>
                    </div>
                </div>
                <div class="te-filter-actions">
                    <button type="submit" class="te-filter-btn te-filter-btn-primary">
                        <i class="fas fa-search"></i> Apply Filters
                    </button>
                    <a href="{{ route('user.profile.bookings') }}" class="te-filter-btn te-filter-btn-secondary">
                        <i class="fas fa-redo"></i> Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Results Info -->
        <div class="te-results-info">
            Showing {{ $paginatedBookings->firstItem() ?? 0 }} to {{ $paginatedBookings->lastItem() ?? 0 }} of {{ $paginatedBookings->total() }} bookings
        </div>

        <!-- Requests Grid -->
        <div class="te-requests-grid">
            @forelse($paginatedBookings as $item)
                @php
                    $booking = $item['booking'];
                    $technician = $item['technician'];
                    $status = $item['status'];
                    $statusLabel = $item['statusLabel'];
                    $statusClass = $item['statusClass'];
                    $review = $item['review'];
                    $product = $booking->product;
                    $technicianInitials = $technician ? strtoupper(substr($technician->name ?? 'T', 0, 1) . substr($technician->name ?? 'T', strpos($technician->name ?? 'T', ' ') + 1, 1)) : 'N/A';
                @endphp
                
                <div class="te-request-card">
                    <div class="te-card-header">
                        <div class="te-status-badge {{ $statusClass }}">
                            @if($status == 'pending')
                                <i class="fas fa-hourglass-half"></i>
                            @elseif($status == 'accepted')
                                <i class="fas fa-user-check"></i>
                            @elseif($status == 'rejected')
                                <i class="fas fa-times-circle"></i>
                            @elseif($status == 'on_route')
                                <i class="fas fa-route"></i>
                            @else
                                <i class="fas fa-check-double"></i>
                            @endif
                            <span>{{ $statusLabel }}</span>
                        </div>
                        <h2 class="te-request-title">{{ $product->title ?? 'Service Request' }}</h2>
                        <p class="te-request-description">{{ $booking->notes ?? 'No additional notes provided.' }}</p>
                    </div>
                    
                    <div class="te-card-body">
                        @if($technician && $status != 'pending')
                        <div class="te-technician-card">
                            <div class="te-technician-avatar">{{ $technicianInitials }}</div>
                            <div class="te-technician-info">
                                <div class="te-technician-name">{{ $technician->name ?? 'Technician' }}</div>
                                <div class="te-technician-specialty">
                                    @php
                                        $techProfile = \App\Models\TechnicianProfile::where('user_id', $technician->id)->first();
                                        $specialty = $techProfile->job_title ?? 'Technician';
                                        $experience = $techProfile->year_of_experience ?? 0;
                                    @endphp
                                    {{ $specialty }} • {{ $experience }} Years Exp.
                                </div>
                            </div>
                            <div class="te-technician-badge">
                                <i class="fas fa-star"></i> 4.5
                            </div>
                        </div>
                        @endif
                        
                        <div class="te-info-section">
                            <div class="te-info-row">
                                <div class="te-icon-wrapper">
                                    <i class="fas fa-calendar-plus"></i>
                                </div>
                                <div class="te-info-content">
                                    <div class="te-info-label">Request Date</div>
                                    <div class="te-info-value">{{ $booking->created_at->format('F j, Y') }}</div>
                                </div>
                            </div>
                            
                            @if($status == 'accepted' && $booking->preferred_date)
                            <div class="te-info-row">
                                <div class="te-icon-wrapper">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                                <div class="te-info-content">
                                    <div class="te-info-label">Scheduled Date</div>
                                    <div class="te-info-value">{{ $booking->preferred_date->format('F j, Y') }}</div>
                                </div>
                            </div>
                            
                            <div class="te-info-row">
                                <div class="te-icon-wrapper">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="te-info-content">
                                    <div class="te-info-label">Preferred Time</div>
                                    <div class="te-info-value">{{ $booking->preferred_time ?? 'TBD' }}</div>
                                </div>
                            </div>
                            @endif
                            
                            @if($technician && $technician->phone)
                            <div class="te-info-row">
                                <div class="te-icon-wrapper">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="te-info-content">
                                    <div class="te-info-label">Technician Contact</div>
                                    <div class="te-info-value">{{ $technician->phone }}</div>
                                </div>
                            </div>
                            @endif

                            <div class="te-info-row">
                                <div class="te-icon-wrapper">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="te-info-content">
                                    <div class="te-info-label">Service Location</div>
                                    <div class="te-info-value">{{ $booking->installation_address }}, {{ $booking->city }} {{ $booking->zip }}</div>
                                </div>
                            </div>
                            
                            <div class="te-info-row">
                                <div class="te-icon-wrapper">
                                    <i class="fas fa-hashtag"></i>
                                </div>
                                <div class="te-info-content">
                                    <div class="te-info-label">Booking ID</div>
                                    <div class="te-info-value">#{{ $booking->id }}</div>
                                </div>
                            </div>
                            
                            <div class="te-info-row">
                                <div class="te-icon-wrapper">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="te-info-content">
                                    <div class="te-info-label">Amount Paid</div>
                                    <div class="te-info-value">${{ number_format($booking->amount ?? 0, 2) }}</div>
                                </div>
                            </div>
                        </div>

                        @if($status == 'completed' && !$review && $item['bookingStatus'] && $item['bookingStatus']->status == BookingStatusHelper::STATUS_JOB_COMPLETED)
                        <div class="te-rating-section" data-booking-id="{{ $booking->id }}">
                            <div class="te-rating-title">
                                <i class="fas fa-star-half-alt"></i>
                                Rate Your Experience
                            </div>
                            <div class="te-stars-container">
                                <i class="fas fa-star te-star" data-rating="1"></i>
                                <i class="fas fa-star te-star" data-rating="2"></i>
                                <i class="fas fa-star te-star" data-rating="3"></i>
                                <i class="fas fa-star te-star" data-rating="4"></i>
                                <i class="fas fa-star te-star" data-rating="5"></i>
                            </div>
                            <textarea class="te-review-input" placeholder="Share your experience..." rows="4"></textarea>
                            <button class="te-submit-btn" onclick="submitReview({{ $booking->id }}, this)">
                                <i class="fas fa-paper-plane"></i>
                                Submit Review
                            </button>
                        </div>
                        @endif

                        @if($review)
                        <div class="te-given-rating" id="review-display-{{ $booking->id }}">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                                <div class="te-given-rating-stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $review->rating ? 'te-active' : '' }}"></i>
                                    @endfor
                                </div>
                                <button class="te-edit-review-btn" onclick="editReview({{ $booking->id }}, {{ $review->id }}, {{ $review->rating }}, '{{ addslashes($review->review) }}')" style="background: #f3f4f6; border: none; padding: 8px 15px; border-radius: 6px; cursor: pointer; font-size: 13px; color: #374151; font-weight: 600;">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                            </div>
                            <p class="te-given-rating-text">"{{ $review->review }}"</p>
                        </div>
                        
                        <div class="te-rating-section" id="review-edit-{{ $booking->id }}" style="display: none;" data-booking-id="{{ $booking->id }}" data-review-id="{{ $review->id }}">
                            <div class="te-rating-title">
                                <i class="fas fa-star-half-alt"></i>
                                Edit Your Review
                            </div>
                            <div class="te-stars-container">
                                <i class="fas fa-star te-star" data-rating="1"></i>
                                <i class="fas fa-star te-star" data-rating="2"></i>
                                <i class="fas fa-star te-star" data-rating="3"></i>
                                <i class="fas fa-star te-star" data-rating="4"></i>
                                <i class="fas fa-star te-star" data-rating="5"></i>
                            </div>
                            <textarea class="te-review-input" placeholder="Share your experience..." rows="4"></textarea>
                            <div style="display: flex; gap: 10px;">
                                <button class="te-submit-btn" onclick="updateReview({{ $review->id }}, {{ $booking->id }}, this)" style="flex: 1;">
                                    <i class="fas fa-save"></i>
                                    Update Review
                                </button>
                                <button class="te-submit-btn" onclick="cancelEditReview({{ $booking->id }}, {{ $review->rating }}, '{{ addslashes($review->review) }}')" style="flex: 1; background: #f3f4f6; color: #374151;">
                                    <i class="fas fa-times"></i>
                                    Cancel
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="te-request-card" style="text-align: center; padding: 40px;">
                    <p style="color: #6b7280; font-size: 16px;">No bookings found matching your criteria.</p>
                    <a href="{{ route('booking') }}" style="display: inline-block; margin-top: 20px; padding: 12px 30px; background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500); color: white; text-decoration: none; border-radius: 6px; font-weight: 600;">
                        Book a Service
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($paginatedBookings->hasPages())
        <div class="pagination">
            @if($paginatedBookings->onFirstPage())
                <span class="disabled">&laquo; Previous</span>
            @else
                <a href="{{ $paginatedBookings->previousPageUrl() }}">&laquo; Previous</a>
            @endif

            @php
                $currentPage = $paginatedBookings->currentPage();
                $lastPage = $paginatedBookings->lastPage();
                $startPage = max(1, $currentPage - 2);
                $endPage = min($lastPage, $currentPage + 2);
            @endphp

            @if($startPage > 1)
                <a href="{{ $paginatedBookings->url(1) }}">1</a>
                @if($startPage > 2)
                    <span>...</span>
                @endif
            @endif

            @foreach(range($startPage, $endPage) as $page)
                @if($page == $currentPage)
                    <span class="active">{{ $page }}</span>
                @else
                    <a href="{{ $paginatedBookings->url($page) }}">{{ $page }}</a>
                @endif
            @endforeach

            @if($endPage < $lastPage)
                @if($endPage < $lastPage - 1)
                    <span>...</span>
                @endif
                <a href="{{ $paginatedBookings->url($lastPage) }}">{{ $lastPage }}</a>
            @endif

            @if($paginatedBookings->hasMorePages())
                <a href="{{ $paginatedBookings->nextPageUrl() }}">Next &raquo;</a>
            @else
                <span class="disabled">Next &raquo;</span>
            @endif
        </div>
        @endif
    </div>

    <script>
        // Rating system functionality
        document.querySelectorAll('.te-stars-container').forEach(container => {
            const stars = container.querySelectorAll('.te-star');
            let selectedRating = 0;

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    selectedRating = parseInt(this.getAttribute('data-rating'));
                    updateStars(stars, selectedRating);
                });

                star.addEventListener('mouseenter', function() {
                    const hoverRating = parseInt(this.getAttribute('data-rating'));
                    updateStars(stars, hoverRating);
                });
            });

            container.addEventListener('mouseleave', function() {
                updateStars(stars, selectedRating);
            });
        });

        function updateStars(stars, rating) {
            stars.forEach(star => {
                const starRating = parseInt(star.getAttribute('data-rating'));
                if (starRating <= rating) {
                    star.classList.add('te-active');
                } else {
                    star.classList.remove('te-active');
                }
            });
        }

        // Edit review functionality
        function editReview(bookingId, reviewId, currentRating, currentReview) {
            const displayDiv = document.getElementById('review-display-' + bookingId);
            const editDiv = document.getElementById('review-edit-' + bookingId);
            
            if (!displayDiv || !editDiv) return;
            
            // Hide display, show edit
            displayDiv.style.display = 'none';
            editDiv.style.display = 'block';
            
            // Set current values
            const stars = editDiv.querySelectorAll('.te-star');
            stars.forEach((star, index) => {
                if (index < currentRating) {
                    star.classList.add('te-active');
                } else {
                    star.classList.remove('te-active');
                }
            });
            
            const textarea = editDiv.querySelector('.te-review-input');
            if (textarea) {
                textarea.value = currentReview;
            }
        }
        
        // Cancel edit review
        function cancelEditReview(bookingId, currentRating, currentReview) {
            const displayDiv = document.getElementById('review-display-' + bookingId);
            const editDiv = document.getElementById('review-edit-' + bookingId);
            
            if (!displayDiv || !editDiv) return;
            
            // Show display, hide edit
            displayDiv.style.display = 'block';
            editDiv.style.display = 'none';
        }
        
        // Update review functionality
        function updateReview(reviewId, bookingId, btn) {
            const card = btn.closest('.te-request-card');
            const ratingSection = card.querySelector('#review-edit-' + bookingId);
            const stars = ratingSection.querySelectorAll('.te-star.te-active').length;
            const reviewText = ratingSection.querySelector('.te-review-input').value;

            if (stars === 0) {
                alert('⭐ Please select a rating before updating!');
                return;
            }

            if (!reviewText.trim()) {
                alert('✍️ Please share your experience in the review box!');
                return;
            }

            // Disable button
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';

            // Update review via AJAX
            fetch('{{ route("user.review.update", ":id") }}'.replace(':id', reviewId), {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    rating: stars,
                    review: reviewText
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Reload page to show updated review
                    window.location.reload();
                } else {
                    alert(data.message || 'Failed to update review. Please try again.');
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fas fa-save"></i> Update Review';
                }
            })
            .catch(error => {
                console.error('Review update error:', error);
                alert('An error occurred. Please try again.');
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-save"></i> Update Review';
            });
        }

        // Submit review functionality
        function submitReview(bookingId, btn) {
            const card = btn.closest('.te-request-card');
            const ratingSection = card.querySelector('.te-rating-section');
            const stars = ratingSection.querySelectorAll('.te-star.te-active').length;
            const reviewText = ratingSection.querySelector('.te-review-input').value;

            if (stars === 0) {
                alert('⭐ Please select a rating before submitting!');
                return;
            }

            if (!reviewText.trim()) {
                alert('✍️ Please share your experience in the review box!');
                return;
            }

            // Disable button
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';

            // Submit review via AJAX
            fetch('{{ route("user.review.submit") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    booking_id: bookingId,
                    rating: stars,
                    review: reviewText
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Create success message
                    ratingSection.style.animation = 'te-fadeOut 0.3s ease-out';
                    
                    setTimeout(() => {
                        ratingSection.outerHTML = `
                            <div class="te-given-rating" style="animation: te-fadeInUp 0.5s ease-out;">
                                <div class="te-given-rating-stars">
                                    ${'<i class="fas fa-star"></i>'.repeat(stars)}
                                </div>
                                <p class="te-given-rating-text">"${reviewText}"</p>
                            </div>
                        `;
                    }, 300);

                    // Show success notification
                    showNotification('✅ Review submitted successfully! Thank you for your feedback.');
                } else {
                    alert(data.message || 'Failed to submit review. Please try again.');
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Review';
                }
            })
            .catch(error => {
                console.error('Review submission error:', error);
                alert('An error occurred. Please try again.');
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Review';
            });
        }

        // Notification system
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
                animation: te-slideIn 0.4s ease-out;
            `;
            notification.textContent = message;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.animation = 'te-slideOut 0.4s ease-out';
                setTimeout(() => notification.remove(), 400);
            }, 3000);
        }

        // Add animation keyframes dynamically
        const style = document.createElement('style');
        style.textContent = `
            @keyframes te-fadeOut {
                to {
                    opacity: 0;
                    transform: scale(0.95);
                }
            }
            @keyframes te-fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            @keyframes te-slideIn {
                from {
                    opacity: 0;
                    transform: translateX(100px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
            @keyframes te-slideOut {
                to {
                    opacity: 0;
                    transform: translateX(100px);
                }
            }
        `;
        document.head.appendChild(style);
    </script>
@endsection


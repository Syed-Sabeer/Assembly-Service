@extends('layouts.frontend.master')

@php
    use App\Helpers\BookingStatusHelper;
@endphp

@section('css')
<style>
      .main-header {
        top: -124px;
        }
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
</style>
@endsection

@section('content')
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"></script>
        <div class="tt-dashboard">
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
                                <i class="fas fa-user-circle" style="font-size: 24px; color: white;"></i>
                            </div>
                            <div>
                                <h1 style="margin: 0; font-size: 32px; font-weight: 700; color: white; text-shadow: 0 2px 10px rgba(0,0,0,0.2);">
                                    My Profile
                                </h1>
                                <p style="margin: 5px 0 0 0; font-size: 14px; color: rgba(255,255,255,0.9);">
                                    Manage your personal information and service requests
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tt-header">
            <div class="tt-user-info">
                <div class="tt-avatar">{{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}</div>
                <div class="tt-user-details">
                    <h1>
                        {{ $user->name ?? 'User' }}
                        <span class="tt-verification-badge">
                            <i class="fas fa-check-circle"></i>
                            Verified
                        </span>
                    </h1>
                    <div class="tt-user-id">
                        <i class="fas fa-id-card"></i>
                        Customer ID: #{{ $userData['customer_id'] ?? 'N/A' }}
                    </div>
                </div>
            </div>
           
        </div>

        <div class="tt-main-grid">
            <div class="tt-card">
                <div class="tt-card-header">
                    <div class="tt-card-icon">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <h2 class="tt-card-title">Personal Information</h2>
                </div>
                <div class="personinfo" >
                    <div class="tt-info-row">
                        <div class="tt-info-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="tt-info-content">
                            <div class="tt-info-label">Full Legal Name</div>
                            <div class="tt-info-value">{{ $user->name ?? 'N/A' }}</div>
                        </div>
                    </div>
                    <div class="tt-info-row">
                        <div class="tt-info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="tt-info-content">
                            <div class="tt-info-label">Email Address</div>
                            <div class="tt-info-value">{{ $user->email ?? 'N/A' }}</div>
                        </div>
                    </div>
                    <div class="tt-info-row">
                        <div class="tt-info-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="tt-info-content">
                            <div class="tt-info-label">Primary Phone</div>
                            <div class="tt-info-value">{{ $user->phone ?? 'N/A' }}</div>
                        </div>
                    </div>
                    @if($user->address)
                    <div class="tt-info-row">
                        <div class="tt-info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="tt-info-content">
                            <div class="tt-info-label">Address</div>
                            <div class="tt-info-value">{{ $user->address }}</div>
                        </div>
                    </div>
                    @endif
                    <div class="tt-info-row">
                        <div class="tt-info-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="tt-info-content">
                            <div class="tt-info-label">Member Since</div>
                            <div class="tt-info-value">{{ $userData['member_since'] ?? 'N/A' }}</div>
                        </div>
                    </div>
                </div>
            </div>

        
         

        </div>
    </div>
		

    <div class="te-container">
        <!-- Header Section -->
        <div class="te-header">
            <div class="te-header-badge">
                <i class="fas fa-shield-alt"></i> Service Dashboard
            </div>
            <h1 class="te-header-title">My Service Requests</h1>
            <p class="te-header-subtitle">Track, manage, and review all your service requests in one centralized dashboard</p>
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

        <!-- Requests Grid -->
        <div class="te-requests-grid">
            @forelse($processedBookings as $item)
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
                    <p style="color: #6b7280; font-size: 16px;">No bookings found. Start by booking a service!</p>
                    <a href="{{ route('booking') }}" style="display: inline-block; margin-top: 20px; padding: 12px 30px; background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500); color: white; text-decoration: none; border-radius: 6px; font-weight: 600;">
                        Book a Service
                    </a>
                </div>
            @endforelse
        </div>

        @if($processedBookings->count() > 0)
        <div class="allreqcarbtn">
            <a href="{{ route('user.profile.bookings') }}" class="card-allbtn" style="text-decoration: none; display: inline-block;">
                <span><i class="fa-solid fa-eye"></i></span>
                <span>View all</span>
            </a>
        </div>
        @endif
        <!-- Bottom Section: FAQ & Complaint -->
        <div class="te-bottom-section">
            <div class="te-section-header">
                <h2 class="te-section-title">Support & Information</h2>
                <p class="te-section-subtitle">Find answers to common questions or report any concerns about your service experience</p>
            </div>

            <div class="te-info-grid">
                <!-- FAQ Section -->
                <div class="te-faq-container">
                    <div class="te-faq-title">
                        <div class="te-faq-icon">
                            <i class="fas fa-question-circle"></i>
                        </div>
                        <span>Frequently Asked Questions</span>
                    </div>

                    <div class="te-faq-item">
                        <div class="te-faq-question">
                            <i class="fas fa-chevron-right"></i>
                            <span>How long does it take to assign a technician?</span>
                        </div>
                        <div class="te-faq-answer">
                            Typically, a qualified technician is assigned within 2-4 hours of your request submission. You'll receive an instant notification once assigned.
                        </div>
                    </div>

                    <div class="te-faq-item">
                        <div class="te-faq-question">
                            <i class="fas fa-chevron-right"></i>
                            <span>Can I reschedule my service appointment?</span>
                        </div>
                        <div class="te-faq-answer">
                            Yes, you can reschedule up to 4 hours before the scheduled time. Contact our support team or reach out directly to your assigned technician.
                        </div>
                    </div>

                    <div class="te-faq-item">
                        <div class="te-faq-question">
                            <i class="fas fa-chevron-right"></i>
                            <span>What if I'm not satisfied with the service?</span>
                        </div>
                        <div class="te-faq-answer">
                            Your satisfaction is our priority. You have the right to file a complaint, request a re-service, or escalate the issue to our quality assurance team.
                        </div>
                    </div>

                    <div class="te-faq-item">
                        <div class="te-faq-question">
                            <i class="fas fa-chevron-right"></i>
                            <span>Are technicians background-checked and insured?</span>
                        </div>
                        <div class="te-faq-answer">
                            Absolutely. All our technicians undergo thorough background checks, carry professional liability insurance, and are verified for their credentials.
                        </div>
                    </div>

                </div>

                <!-- Complaint Section -->
                <div class="te-complaint-section">
                    <div class="te-complaint-header">
                        <div class="te-complaint-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <h3 class="te-complaint-title">Report a Concern</h3>
                    </div>

                    <div class="te-complaint-content">
                        <div class="te-complaint-highlight">
                            <strong>Your Rights as a Customer:</strong>
                            You have every right to file a complaint if you experience unprofessional behavior, poor service quality, safety concerns, or any other issues with your technician or service.
                        </div>

                        <p style="margin-bottom: 15px;">
                            We take all complaints seriously and investigate thoroughly. Your feedback helps us maintain high service standards and ensures accountability across our technician network.
                        </p>

                        <p style="margin-bottom: 20px; font-weight: 600; color: #2d3436;">
                            <i class="fas fa-shield-alt" style="color: #e74c3c; margin-right: 8px;"></i>
                            All complaints are handled confidentially and resolved within 24-48 hours.
                        </p>

                        <div class="te-contact-buttons">

                            <a class="te-contact-btn te-contact-btn-secondary" href="{{ route('contact') }}">
                                <i class="fas fa-headset"></i>
                                Contact Support
</a>
                        </div>

                        <div class="te-support-info">
                            <div class="te-support-item">
                                <i class="fas fa-envelope"></i>
                                <div class="te-support-item-content">
                                    <div class="te-support-label">Email Support</div>
                                    <div class="te-support-value">support@service.com</div>
                                </div>
                            </div>
                            <div class="te-support-item">
                                <i class="fas fa-phone"></i>
                                <div class="te-support-item-content">
                                    <div class="te-support-label">24/7 Hotline</div>
                                    <div class="te-support-value">1-800-SERVICE</div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

	<div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
		</svg>
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

<script>
        // Initialize the map with San Francisco coordinates
        const map = L.map('map').setView([37.7599, -122.4148], 16);

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors',
            maxZoom: 19
        }).addTo(map);

        // Create custom icon for marker
        const customIcon = L.divIcon({
            html: '<div style="background: linear-gradient(135deg, #3375d1, #0c9eb5); width: 45px; height: 45px; border-radius: 50% 50% 50% 0; transform: rotate(-45deg); display: flex; align-items: center; justify-content: center; border: 3px solid white; box-shadow: 0 5px 15px rgba(0,0,0,0.3);"><i class="fas fa-home" style="color: white; font-size: 18px; transform: rotate(45deg);"></i></div>',
            className: 'tt-custom-marker',
            iconSize: [45, 45],
            iconAnchor: [22, 45],
            popupAnchor: [0, -45]
        });

        // Add marker at the location
        const marker = L.marker([37.7599, -122.4148], { icon: customIcon }).addTo(map);

        // Add popup to marker with international formatting
        marker.bindPopup(`
            <div style="text-align: center; padding: 12px; min-width: 250px;">
                <strong style="font-size: 17px; color: #2c3e50; display: block; margin-bottom: 8px;">James Anderson</strong>
                <span style="color: #3375d1; font-size: 12px; display: block; margin-bottom: 10px;">
                    <i class="fas fa-user-check"></i> Verified Customer
                </span>
                <div style="text-align: left; margin: 10px 0; padding: 10px; background: #f8f9fa; border-radius: 8px;">
                    <div style="margin-bottom: 5px;">
                        <i class="fas fa-map-marker-alt" style="color: #3375d1; width: 15px;"></i>
                        <span style="color: #555; font-size: 13px;">1847 Mission Street, Apt 3B</span>
                    </div>
                    <div style="margin-bottom: 5px;">
                        <i class="fas fa-city" style="color: #3375d1; width: 15px;"></i>
                        <span style="color: #555; font-size: 13px;">San Francisco, CA 94103</span>
                    </div>
                    <div>
                        <i class="fas fa-flag" style="color: #3375d1; width: 15px;"></i>
                        <span style="color: #555; font-size: 13px;">United States</span>
                    </div>
                </div>
                <a href="https://www.google.com/maps?q=37.7599,-122.4148" target="_blank" style="display: inline-block; margin-top: 10px; padding: 8px 16px; background: linear-gradient(135deg, #3375d1, #0c9eb5); color: white; text-decoration: none; border-radius: 8px; font-size: 13px; font-weight: 600;">
                    <i class="fas fa-directions"></i> Get Directions
                </a>
            </div>
        `).openPopup();

        // Add circle to show service coverage area
        L.circle([37.7599, -122.4148], {
            color: '#3375d1',
            fillColor: '#3375d1',
            fillOpacity: 0.15,
            radius: 300,
            weight: 2
        }).addTo(map);

        // Add marker for parking entrance
        const parkingIcon = L.divIcon({
            html: '<div style="background: #72a500; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 2px solid white; box-shadow: 0 3px 8px rgba(0,0,0,0.3);"><i class="fas fa-parking" style="color: white; font-size: 14px;"></i></div>',
            className: 'tt-parking-marker',
            iconSize: [30, 30],
            iconAnchor: [15, 15]
        });

        L.marker([37.7595, -122.4155], { icon: parkingIcon }).addTo(map)
            .bindPopup('<strong>Visitor Parking Entrance</strong><br><small>Underground Garage</small>');
    </script>




@endsection

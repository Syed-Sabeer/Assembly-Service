@extends('layouts.app.master')

@section('title', 'Review Details')

@section('css')
<style>
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
    .rating-stars {
        color: #ffc107;
        font-size: 24px;
    }
    .review-text {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #667eea;
        font-style: italic;
        color: #555;
        line-height: 1.6;
    }
    .dark-only .review-text {
        background: #0f172a !important;
        color: #e2e8f0 !important;
        border-left: 4px solid #818cf8 !important;
    }
</style>
@endsection

@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Review Details #{{ $review->id }}</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.reviews.index') }}">Reviews</a></li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <!-- Review Information -->
                <div class="info-card">
                    <h4 class="mb-4">Review Information</h4>
                    <div class="info-row">
                        <div class="info-label">Review ID</div>
                        <div class="info-value"><strong>#{{ $review->id }}</strong></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Rating</div>
                        <div class="info-value">
                            <div class="rating-stars">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $review->rating ? '' : 'far' }}"></i>
                                @endfor
                                <span class="ms-2"><strong>{{ $review->rating }}/5</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Review Text</div>
                        <div class="info-value">
                            <div class="review-text">
                                "{{ $review->review }}"
                            </div>
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Submitted At</div>
                        <div class="info-value">{{ $review->created_at->format('F j, Y g:i A') }}</div>
                    </div>
                </div>

                <!-- Customer Information -->
                <div class="info-card">
                    <h4 class="mb-4">Customer Information</h4>
                    <div class="info-row">
                        <div class="info-label">Name</div>
                        <div class="info-value"><strong>{{ $review->booking->user->name ?? 'N/A' }}</strong></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Email</div>
                        <div class="info-value">{{ $review->booking->user->email ?? 'N/A' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Phone</div>
                        <div class="info-value">{{ $review->booking->user->phone ?? 'N/A' }}</div>
                    </div>
                </div>

                <!-- Booking Information -->
                <div class="info-card">
                    <h4 class="mb-4">Booking Information</h4>
                    <div class="info-row">
                        <div class="info-label">Booking ID</div>
                        <div class="info-value">
                            <a href="{{ route('admin.bookings.show', $review->booking_id) }}">
                                <strong>#{{ $review->booking_id }}</strong>
                            </a>
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Product/Service</div>
                        <div class="info-value">{{ $review->booking->product->title ?? 'N/A' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Installation Address</div>
                        <div class="info-value">
                            {{ $review->booking->installation_address ?? 'N/A' }}, 
                            {{ $review->booking->city ?? 'N/A' }}, 
                            {{ $review->booking->zip ?? 'N/A' }}
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Amount Paid</div>
                        <div class="info-value"><strong style="color: #10b981;">${{ number_format($review->booking->amount ?? 0, 2) }}</strong></div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Quick Actions -->
                <div class="info-card">
                    <h4 class="mb-4">Quick Actions</h4>
                    <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary w-100 mb-2">
                        <i class="fa fa-arrow-left"></i> Back to Reviews
                    </a>
                    <a href="{{ route('admin.bookings.show', $review->booking_id) }}" class="btn btn-info w-100 mb-2">
                        <i class="fa fa-calendar"></i> View Booking
                    </a>
                    @if($review->booking->user)
                    <a href="{{ route('admin.customers.show', $review->booking->user->id) }}" class="btn btn-info w-100 mb-2">
                        <i class="fa fa-user"></i> View Customer
                    </a>
                    @endif
                    <button type="button" class="btn btn-danger w-100" onclick="deleteReview({{ $review->id }})">
                        <i class="fa fa-trash"></i> Delete Review
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function deleteReview(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/admin/reviews/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || document.querySelector('input[name="_token"]')?.value,
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire('Deleted!', data.message || 'Review has been deleted.', 'success').then(() => {
                        window.location.href = '{{ route('admin.reviews.index') }}';
                    });
                } else {
                    Swal.fire('Error!', data.message || 'Failed to delete review.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('Error!', 'An error occurred while deleting the review.', 'error');
            });
        }
    });
}
</script>
@endsection



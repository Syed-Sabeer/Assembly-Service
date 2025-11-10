@extends('layouts.frontend.master')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

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
        
        .dashboard-header-content > div {
            flex-direction: column;
            align-items: flex-start !important;
        }
    }
</style>
@endsection

@section('content')



<section class="service-three style-two">
    <div class="outer-container py-5" style="background-image:url(assets/images/background/service-three_pattern.png)" >
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
                                <i class="fas fa-users" style="font-size: 24px; color: white;"></i>
                            </div>
                            <div>
                                <h1 style="margin: 0; font-size: 32px; font-weight: 700; color: white; text-shadow: 0 2px 10px rgba(0,0,0,0.2);">
                                    Find Your Perfect Technician
                                </h1>
                                <p style="margin: 5px 0 0 0; font-size: 14px; color: rgba(255,255,255,0.9);">
                                    Connect with certified professionals across multiple specialties
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tm-wrapper">
        <!-- Search and Filters -->
        <div class="tm-search-container">
            <div class="tm-search-grid">
                <div class="tm-input-group">
                    <div class="tm-input-wrapper">
                        <i class="fas fa-search tm-input-icon"></i>
                        <input type="text" class="tm-input" id="tmSearchInput" placeholder="Search by name, specialty, or skills...">
                    </div>
                    
                    <div class="tm-input-wrapper">
                        <i class="fas fa-tools tm-input-icon"></i>
                        <select class="tm-select" id="tmSpecialtySelect">
                            <option value="">All Specialties</option>
                            <option value="playset">Playset Assembly</option>
                            <option value="basketball">Basketball Goal Installation</option>
                            <option value="fitness">Fitness Equipment Setup</option>
                            <option value="outdoor">Outdoor Furniture Assembly</option>
                            <option value="general">General Installation</option>
                            <option value="office">Office Furniture Assembly</option>
                        </select>
                    </div>
                    
                    <div class="tm-input-wrapper">
                        <i class="fas fa-clock tm-input-icon"></i>
                        <select class="tm-select" id="tmAvailabilitySelect">
                            <option value="">All Status</option>
                            <option value="available">Available Now</option>
                            <option value="busy">Currently Busy</option>
                        </select>
                    </div>
                </div>
                
                <button class="tm-btn-search" onclick="applyFilters()">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>

         
        </div>

        <!-- Results Info -->
        <div class="tm-results-bar">
            <div class="tm-results-text">
                <span class="tm-results-count" id="tmResultsCount">{{ $technicians->count() }}</span> technicians available
            </div>
        </div>

        <!-- Technicians Grid -->
        <div class="tm-grid" id="tmGrid">
            @forelse($technicians as $technician)
            @php
                $user = $technician->user;
                $profileImg = '';
                if ($technician->profile_picture) {
                    $profileImg = Storage::disk('public')->exists($technician->profile_picture) ? asset('storage/' . $technician->profile_picture) : 'https://i.pravatar.cc/150?img=' . ($technician->id % 70);
                } else {
                    $profileImg = 'https://i.pravatar.cc/150?img=' . ($technician->id % 70);
                }
                
                $hasCertifications = $technician->certification && is_array($technician->certification) && count($technician->certification) > 0;
                $experience = $technician->year_of_experience ?? 0;
                $certified = $hasCertifications ? 'true' : 'false';
                $projectsCount = $technician->projects && is_array($technician->projects) ? count($technician->projects) : 0;
            @endphp
            <div class="tm-card" data-specialty="{{ strtolower(str_replace(' ', '', $technician->job_title ?? 'general')) }}" data-available="true" data-rating="4.5" data-certified="{{ $certified }}" data-experience="{{ $experience }}">
                <div class="tm-card-header">
                    <div class="tm-card-top">
                        <img src="{{ $profileImg }}" alt="{{ $user->name ?? 'Technician' }}" class="tm-avatar">
                        <div class="tm-card-info">
                            <h3 class="tm-card-name">{{ $user->name ?? 'Technician' }}</h3>
                       
                            <span class="tm-badge">
                                <i class="fas fa-check-circle"></i> {{ $technician->completed_jobs_count ?? 0 }} Jobs Completed
                            </span>
                           
                          
                            <div class="tm-rating-row">
                                @php
                                    $rating = $technician->average_rating ?? 0;
                                    $totalReviews = $technician->total_reviews ?? 0;
                                    $fullStars = floor($rating);
                                    $hasHalfStar = ($rating - $fullStars) >= 0.5;
                                    $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
                                @endphp
                                <div class="tm-stars">
                                    @for($i = 0; $i < $fullStars; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                    @if($hasHalfStar)
                                        <i class="fas fa-star-half-alt"></i>
                                    @endif
                                    @for($i = 0; $i < $emptyStars; $i++)
                                        <i class="far fa-star"></i>
                                    @endfor
                                </div>
                                <span class="tm-rating-num">{{ number_format($rating, 1) }}</span>
                                @if($totalReviews > 0)
                                    <span class="tm-reviews">({{ $totalReviews }} {{ $totalReviews == 1 ? 'review' : 'reviews' }})</span>
                                @else
                                    <span class="tm-reviews">(No reviews yet)</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tm-specialty-box">
                        <i class="fas fa-briefcase tm-specialty-icon"></i>
                        <div>
                            <div class="tm-specialty-text">Specialty</div>
                            <div class="tm-specialty-name">{{ $technician->job_title ?? 'General Technician' }}</div>
                        </div>
                    </div>
                </div>
                <div class="tm-card-body">
                    <p class="tm-description">
    {{ \Illuminate\Support\Str::words($technician->about ?? 'Experienced technician ready to help with your assembly and installation needs.', 30, '...') }}
</p>

                    <div class="tm-skills">
                    
                        @if($technician->year_of_experience)
                        <span class="tm-skill-badge"><i class="fas fa-check"></i> {{ $technician->year_of_experience }}+ Years Experience</span>
                        @endif
                    </div>
                    <div class="tm-card-footer">
                        <span class="tm-status tm-status-available">
                            <span class="tm-status-dot"></span> Available Now
                        </span>
                        @php
                            $user = auth()->user();
                            $isCustomer = false;
                            $isTechnician = false;
                            if ($user) {
                                try {
                                    $isCustomer = $user->hasRole('individual');
                                    $isTechnician = $user->hasRole('technician');
                                } catch (\Exception $e) {
                                    // Handle error silently
                                }
                            }
                        @endphp
                        @if($isCustomer)
                            <a href="{{ route('technician.profile.public', $technician->id) }}">
                                <button class="tm-btn-profile">
                                    <i class="fas fa-user"></i> View Profile
                                </button>
                            </a>
                        @elseif($isTechnician && $technician->user_id == $user->id)
                            <a href="{{ route('technician.dashboard') }}">
                                <button class="tm-btn-profile">
                                    <i class="fas fa-user"></i> View Profile
                                </button>
                            </a>
                        @else
                            <a href="{{ route('technician.profile.public', $technician->id) }}">
                                <button class="tm-btn-profile">
                                    <i class="fas fa-user"></i> View Profile
                                </button>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="tm-no-results" style="display: block;">
                <i class="fas fa-search-minus tm-no-results-icon"></i>
                <h3 class="tm-no-results-title">No Technicians Available</h3>
                <p class="tm-no-results-text">There are currently no technicians registered. Check back later!</p>
            </div>
            @endforelse
        </div>

        <!-- No Results -->
        <div class="tm-no-results" id="tmNoResults" style="display: none;">
            <i class="fas fa-search-minus tm-no-results-icon"></i>
            <h3 class="tm-no-results-title">No Technicians Found</h3>
            <p class="tm-no-results-text">We couldn't find any technicians matching your search criteria. Try adjusting your filters or search terms.</p>
        </div>
    </div>
    </div>
</section>




@endsection

@section('script')

@endsection
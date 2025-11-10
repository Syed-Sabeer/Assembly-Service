@extends('layouts.frontend.master')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('css')

@endsection

@section('content')



        	<!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset('FrontendAssets/images/background/banner.jpg')}})">
        <div class="auto-container">
			<h2>Technician</h2>
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<ul class="bread-crumb clearfix">
					<li><a href="index.html">Home</a></li>
					<li>Technician</li>
				</ul>
				<div class="page-title_text">At Assembly Services, we deliver professional indoor and outdoor equipment assembly with seamless, hassle-free execution.</div>
			</div>
        </div>
    </section>

<section class="service-three style-two" >
    <div class="outer-container py-5" style="background-image:url(assets/images/background/service-three_pattern.png)" >
            <div class="tm-wrapper">
        <!-- Hero Section -->
        <div class="tm-hero">
            <h3 class="tm-hero-title">Find Your Perfect Technician</h3>
            <p class="tm-hero-subtitle">Connect with certified professionals across multiple specialties. Browse expert technicians ready to solve your technical challenges with precision and care.</p>
        </div>

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

            <div class="tm-filters-row">
                <span class="tm-filter-label">Quick Filters:</span>
                <button class="tm-chip" data-filter="certified" onclick="toggleChip(this)">
                    <i class="fas fa-certificate"></i> Certified Only
                </button>
                <button class="tm-chip" data-filter="toprated" onclick="toggleChip(this)">
                    <i class="fas fa-star"></i> Top Rated (4.5+)
                </button>
                <button class="tm-chip" data-filter="experienced" onclick="toggleChip(this)">
                    <i class="fas fa-award"></i> 10+ Years
                </button>
                <button class="tm-chip tm-chip-clear" onclick="clearFilters()">
                    <i class="fas fa-times"></i> Clear All
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
                            @if($hasCertifications)
                            <span class="tm-badge">
                                <i class="fas fa-certificate"></i> {{ $technician->job_title ?? 'Certified Technician' }}
                            </span>
                            @else
                            <span class="tm-badge">
                                <i class="fas fa-tools"></i> {{ $technician->job_title ?? 'Technician' }}
                            </span>
                            @endif
                            <div class="tm-rating-row">
                                <div class="tm-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="tm-rating-num">4.5</span>
                                <span class="tm-reviews">({{ $projectsCount }} projects)</span>
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
                        @if($technician->certification && is_array($technician->certification))
                            @foreach(array_slice($technician->certification, 0, 4) as $cert)
                                @if(!empty($cert['name']))
                                <span class="tm-skill-badge"><i class="fas fa-check"></i> {{ $cert['name'] }}</span>
                                @endif
                            @endforeach
                        @endif
                        @if($technician->year_of_experience)
                        <span class="tm-skill-badge"><i class="fas fa-check"></i> {{ $technician->year_of_experience }}+ Years Experience</span>
                        @endif
                    </div>
                    <div class="tm-card-footer">
                        <span class="tm-status tm-status-available">
                            <span class="tm-status-dot"></span> Available Now
                        </span>
                        <a href="{{ route('techniciansdetail', ['id' => $technician->id]) }}">
                        <button class="tm-btn-profile">
                            <i class="fas fa-user"></i> View Profile
                        </button>
                        </a>
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
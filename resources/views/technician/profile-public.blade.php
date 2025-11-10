@extends('layouts.frontend.master')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('css')
<style>
    /* Dashboard Header Premium Styles */
    .dashboard-header-premium {
        animation: fadeInDown 0.6s ease-out;
        margin-top: 10vh;
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

<section class="service-three style-two" >
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
                                <i class="fas fa-user-tie" style="font-size: 24px; color: white;"></i>
                            </div>
                            <div>
                                <h1 style="margin: 0; font-size: 32px; font-weight: 700; color: white; text-shadow: 0 2px 10px rgba(0,0,0,0.2);">
                                    Technician Profile
                                </h1>
                                <p style="margin: 5px 0 0 0; font-size: 14px; color: rgba(255,255,255,0.9);">
                                    {{ $technician->user->name ?? 'Technician' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="pr-container">
            <!-- Hero Section -->
            <div class="pr-hero-section">
                <div class="pr-hero-content">
                    <div class="pr-profile-image">
                        @php
                            $profileImg = '';
                            if ($technician && $technician->profile_picture) {
                                $profileImg = Storage::disk('public')->exists($technician->profile_picture) ? asset('storage/' . $technician->profile_picture) : 'https://i.pravatar.cc/150?img=12';
                            } else {
                                $profileImg = 'https://i.pravatar.cc/150?img=12';
                            }
                        @endphp
                        <img src="{{ $profileImg }}" alt="{{ $technician->user->name ?? 'Technician' }}" class="tm-avatar">
                    </div>
                    <div class="pr-hero-info">
                        <div class="prinfoedit">
                            <div>
                                <h4 class="pr-name">{{ $technician->user->name ?? 'Technician' }}</h4>
                                <p class="pr-title">{{ $technician->job_title ?? 'Technician' }}</p>
                            </div>
                        </div>
                        
                        <div class="pr-stats">
                            <div class="pr-stat-item">
                                <span class="pr-stat-number">{{ $technician->year_of_experience ?? 0 }}+</span>
                                <span class="pr-stat-label">Years Experience</span>
                            </div>
                            <div class="pr-stat-item">
                                <span class="pr-stat-number">{{ $technician && $technician->projects ? count($technician->projects) : 0 }}+</span>
                                <span class="pr-stat-label">Projects Completed</span>
                            </div>
                            <div class="pr-stat-item">
                                <span class="pr-stat-number">{{ $completedJobsCount ?? 0 }}</span>
                                <span class="pr-stat-label">Jobs Completed</span>
                            </div>
                            <div class="pr-stat-item">
                                <span class="pr-stat-number">{{ number_format($ratingStats['average_rating'] ?? 0, 1) }}</span>
                                <span class="pr-stat-label">Average Rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pr-projects-section pr-full-width">
                <div class="pr-card-header">
                    <div class="pr-card-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h2 class="pr-card-title">About Me</h2>
                </div>

                <p class="pr-about-text">{{ $technician->about ?? 'No description added yet.' }}</p>
            </div>

            <!-- Content Grid -->
            <div class="pr-content-grid">
                <!-- Certifications -->
                <div class="pr-card">
                    <div class="pr-card-header">
                        <div class="pr-card-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h2 class="pr-card-title">Certifications</h2>
                    </div>
                    <div class="pr-certifications-list">
                        @if($technician && $technician->certification && is_array($technician->certification) && count($technician->certification) > 0)
                            @foreach($technician->certification as $cert)
                                <div class="pr-certification-item">
                                    <div class="pr-cert-icon">
                                        <i class="fas fa-award"></i>
                                    </div>
                                    <div class="pr-cert-details">
                                        <h4>{{ $cert['name'] ?? 'Certification' }}</h4>
                                        <p>{{ $cert['organization'] ?? '' }}@if($cert['organization'] && $cert['year']) • @endif{{ $cert['year'] ?? '' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p style="color: #999; padding: 20px; text-align: center;">No certifications added yet.</p>
                        @endif
                    </div>
                </div>

                <!-- Education -->
                <div class="pr-card">
                    <div class="pr-card-header">
                        <div class="pr-card-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h2 class="pr-card-title">Education</h2>
                    </div>
                    <div class="pr-education-list">
                        @if($technician && $technician->education && is_array($technician->education) && count($technician->education) > 0)
                            @foreach($technician->education as $edu)
                                <div class="pr-education-item">
                                    <h4>{{ $edu['degree'] ?? 'Education' }}</h4>
                                    <p>{{ $edu['institution'] ?? '' }}</p>
                                    <div class="pr-education-meta">
                                        @if($edu['start_year'] || $edu['end_year'])
                                            <span><i class="fas fa-calendar"></i>
                                                @if($edu['start_year'] && $edu['end_year'])
                                                    {{ $edu['start_year'] }} - {{ $edu['end_year'] }}
                                                @elseif($edu['start_year'])
                                                    {{ $edu['start_year'] }}
                                                @elseif($edu['end_year'])
                                                    {{ $edu['end_year'] }}
                                                @endif
                                            </span>
                                        @endif
                                        @if($edu['location'])
                                            <span><i class="fas fa-map-marker-alt"></i>{{ $edu['location'] }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p style="color: #999; padding: 20px; text-align: center;">No education entries added yet.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Recent Projects Section -->
            <div class="pr-projects-section pr-full-width">
                <div class="pr-card-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <div class="pr-card-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h2 class="pr-card-title" style="margin: 0;">Recent Projects</h2>
                    </div>
                </div>
                
                <div class="projects-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 25px;">
                    @if($technician && $technician->projects && is_array($technician->projects) && count($technician->projects) > 0)
                        @php
                            $recentProjects = array_slice($technician->projects, 0, 6); // Show only 6 recent projects
                        @endphp
                        @foreach($recentProjects as $project)
                            @php
                                $projectImg = '';
                                if (isset($project['image']) && $project['image']) {
                                    $projectImg = Storage::disk('public')->exists($project['image']) ? asset('storage/' . $project['image']) : 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=800';
                                } else {
                                    $projectImg = 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=800';
                                }
                                $tags = [];
                                if (isset($project['tags'])) {
                                    $tags = is_string($project['tags']) ? explode(',', $project['tags']) : (is_array($project['tags']) ? $project['tags'] : []);
                                }
                            @endphp
                            <div class="project-card" style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: all 0.3s ease; cursor: pointer; position: relative;">
                                <div class="project-image-wrapper" style="position: relative; width: 100%; height: 220px; overflow: hidden; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                    <img src="{{ $projectImg }}" alt="{{ $project['name'] ?? 'Project' }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                                    @if(isset($project['year']) && $project['year'])
                                        <div class="project-year-badge" style="position: absolute; top: 15px; right: 15px; background: rgba(255,255,255,0.95); padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; color: #667eea; box-shadow: 0 2px 8px rgba(0,0,0,0.2);">
                                            <i class="fas fa-calendar"></i> {{ $project['year'] }}
                                        </div>
                                    @endif
                                </div>
                                <div class="project-content" style="padding: 20px;">
                                    <h3 style="margin: 0 0 10px 0; font-size: 18px; font-weight: 700; color: #333; line-height: 1.4;">
                                        {{ $project['name'] ?? 'Project' }}
                                    </h3>
                                    <p style="margin: 0 0 15px 0; font-size: 14px; color: #666; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ $project['description'] ?? 'No description available.' }}
                                    </p>
                                    @if(count($tags) > 0 || isset($project['year']))
                                        <div class="project-tags" style="display: flex; flex-wrap: wrap; gap: 8px; margin-top: 15px;">
                                            @foreach($tags as $tag)
                                                @if(trim($tag))
                                                    <span style="display: inline-block; padding: 4px 12px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 20px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                                                        {{ trim($tag) }}
                                                    </span>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; background: white; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                            <i class="fas fa-briefcase" style="font-size: 48px; color: #ddd; margin-bottom: 20px;"></i>
                            <p style="color: #999; font-size: 16px; margin: 0;">No projects added yet.</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <style>
                .project-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 8px 24px rgba(0,0,0,0.15);
                }
                
                .project-card:hover .project-image-wrapper img {
                    transform: scale(1.1);
                }
                
                @media (max-width: 768px) {
                    .projects-grid {
                        grid-template-columns: 1fr;
                    }
                }
            </style>

            <!-- Client Reviews Section -->
            <div class="pr-reviews-section pr-full-width">
                <div class="pr-card-header">
                    <div class="pr-card-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h2 class="pr-card-title">Client Reviews & Ratings</h2>
                </div>
                
                <!-- Overall Rating Display -->
                @if(isset($ratingStats) && $ratingStats['total_reviews'] > 0)
                    @php
                        $totalReviews = $ratingStats['total_reviews'] ?? 0;
                        $averageRating = $ratingStats['average_rating'] ?? 0;
                        $rating5 = $ratingStats['rating_5'] ?? 0;
                        $rating4 = $ratingStats['rating_4'] ?? 0;
                        $rating3 = $ratingStats['rating_3'] ?? 0;
                        $rating2 = $ratingStats['rating_2'] ?? 0;
                        $rating1 = $ratingStats['rating_1'] ?? 0;
                    @endphp
                    <div class="technician-rating-display" style="margin-bottom: 30px; background: white; border-radius: 12px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                        <div style="display: flex; gap: 30px; align-items: flex-start;">
                            <div style="text-align: center; min-width: 200px; padding-right: 30px; border-right: 1px solid #e0e0e0;">
                                <div style="font-size: 48px; font-weight: 700; color: #667eea; margin-bottom: 10px;">
                                    {{ number_format($averageRating, 1) }}
                                </div>
                                <div style="color: #ffc107; font-size: 20px; margin-bottom: 10px;">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= floor($averageRating))
                                            <i class="fas fa-star"></i>
                                        @elseif($i - 0.5 <= $averageRating)
                                            <i class="fas fa-star-half-alt"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <div style="color: #666; font-size: 14px;">
                                    Based on {{ $totalReviews }} {{ $totalReviews == 1 ? 'review' : 'reviews' }}
                                </div>
                            </div>

                            @if($totalReviews > 0)
                                <div style="flex: 1; display: flex; flex-direction: column; gap: 12px;">
                                    <div style="display: flex; align-items: center; gap: 15px;">
                                        <span style="min-width: 50px; font-weight: 600; color: #333; font-size: 14px;">5 <i class="fas fa-star" style="color: #ffc107; font-size: 12px;"></i></span>
                                        <div style="flex: 1; height: 8px; background: #e0e0e0; border-radius: 4px; overflow: hidden;">
                                            <div style="height: 100%; background: linear-gradient(90deg, #667eea, #764ba2); width: {{ $totalReviews > 0 ? ($rating5 / $totalReviews * 100) : 0 }}%; transition: width 0.3s ease;"></div>
                                        </div>
                                        <span style="min-width: 30px; text-align: right; font-weight: 600; color: #666; font-size: 14px;">{{ $rating5 }}</span>
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 15px;">
                                        <span style="min-width: 50px; font-weight: 600; color: #333; font-size: 14px;">4 <i class="fas fa-star" style="color: #ffc107; font-size: 12px;"></i></span>
                                        <div style="flex: 1; height: 8px; background: #e0e0e0; border-radius: 4px; overflow: hidden;">
                                            <div style="height: 100%; background: linear-gradient(90deg, #667eea, #764ba2); width: {{ $totalReviews > 0 ? ($rating4 / $totalReviews * 100) : 0 }}%; transition: width 0.3s ease;"></div>
                                        </div>
                                        <span style="min-width: 30px; text-align: right; font-weight: 600; color: #666; font-size: 14px;">{{ $rating4 }}</span>
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 15px;">
                                        <span style="min-width: 50px; font-weight: 600; color: #333; font-size: 14px;">3 <i class="fas fa-star" style="color: #ffc107; font-size: 12px;"></i></span>
                                        <div style="flex: 1; height: 8px; background: #e0e0e0; border-radius: 4px; overflow: hidden;">
                                            <div style="height: 100%; background: linear-gradient(90deg, #667eea, #764ba2); width: {{ $totalReviews > 0 ? ($rating3 / $totalReviews * 100) : 0 }}%; transition: width 0.3s ease;"></div>
                                        </div>
                                        <span style="min-width: 30px; text-align: right; font-weight: 600; color: #666; font-size: 14px;">{{ $rating3 }}</span>
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 15px;">
                                        <span style="min-width: 50px; font-weight: 600; color: #333; font-size: 14px;">2 <i class="fas fa-star" style="color: #ffc107; font-size: 12px;"></i></span>
                                        <div style="flex: 1; height: 8px; background: #e0e0e0; border-radius: 4px; overflow: hidden;">
                                            <div style="height: 100%; background: linear-gradient(90deg, #667eea, #764ba2); width: {{ $totalReviews > 0 ? ($rating2 / $totalReviews * 100) : 0 }}%; transition: width 0.3s ease;"></div>
                                        </div>
                                        <span style="min-width: 30px; text-align: right; font-weight: 600; color: #666; font-size: 14px;">{{ $rating2 }}</span>
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 15px;">
                                        <span style="min-width: 50px; font-weight: 600; color: #333; font-size: 14px;">1 <i class="fas fa-star" style="color: #ffc107; font-size: 12px;"></i></span>
                                        <div style="flex: 1; height: 8px; background: #e0e0e0; border-radius: 4px; overflow: hidden;">
                                            <div style="height: 100%; background: linear-gradient(90deg, #667eea, #764ba2); width: {{ $totalReviews > 0 ? ($rating1 / $totalReviews * 100) : 0 }}%; transition: width 0.3s ease;"></div>
                                        </div>
                                        <span style="min-width: 30px; text-align: right; font-weight: 600; color: #666; font-size: 14px;">{{ $rating1 }}</span>
                                    </div>
                                </div>
                            @else
                                <div style="flex: 1; text-align: center; padding: 20px; color: #999;">
                                    <p>No reviews yet</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <style>
                        @media (max-width: 768px) {
                            .technician-rating-display > div {
                                flex-direction: column;
                            }
                            .technician-rating-display > div > div:first-child {
                                border-right: none;
                                border-bottom: 1px solid #e0e0e0;
                                padding-right: 0;
                                padding-bottom: 20px;
                                margin-bottom: 20px;
                            }
                        }
                    </style>
                @endif
                
                <!-- Reviews List -->
                <div class="pr-reviews-list">
                    @forelse($recentReviews ?? [] as $review)
                        @php
                            $customer = $review->booking->user ?? null;
                            $product = $review->booking->product ?? null;
                            $customerInitials = $customer ? strtoupper(substr($customer->name, 0, 1) . (strlen($customer->name) > 1 ? substr($customer->name, strpos($customer->name, ' ') + 1, 1) : '')) : 'CU';
                        @endphp
                        <div class="pr-review-card">
                            <div class="pr-review-header">
                                <div class="pr-reviewer-info">
                                    <div class="pr-reviewer-avatar">{{ $customerInitials }}</div>
                                    <div class="pr-reviewer-details">
                                        <h4>{{ $customer->name ?? 'Customer' }}</h4>
                                        <p>{{ $product->title ?? 'Service' }} - {{ $review->created_at->format('M j, Y') }}</p>
                                    </div>
                                </div>
                                <div class="pr-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="{{ $i <= $review->rating ? 'fas' : 'far' }} fa-star pr-star"></i>
                                    @endfor
                                </div>
                            </div>
                            <p class="pr-review-text">"{{ $review->review }}"</p>
                        </div>
                    @empty
                        <div class="pr-review-card" style="text-align: center; padding: 40px;">
                            <p style="color: #999; font-size: 16px;">No reviews yet. Reviews will appear here once customers rate completed jobs.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

@endsection





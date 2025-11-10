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
    
    /* Reviews Pagination Styles */
    .reviews-pagination {
        margin-top: 30px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }
    
    .pagination-info {
        color: #666;
        font-size: 14px;
        font-weight: 500;
    }
    
    .pagination-controls {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .pagination-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
    }
    
    .pagination-btn:hover:not(.pagination-btn-disabled) {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }
    
    .pagination-btn-disabled {
        background: #e0e0e0;
        color: #999;
        cursor: not-allowed;
        box-shadow: none;
    }
    
    .pagination-btn-disabled:hover {
        transform: none;
    }
    
    .pagination-page-info {
        color: #333;
        font-size: 14px;
        font-weight: 600;
        padding: 0 10px;
    }
    
    @media (max-width: 768px) {
        .reviews-pagination {
            flex-direction: column;
            text-align: center;
        }
        
        .pagination-controls {
            width: 100%;
            justify-content: center;
        }
        
        .pagination-btn {
            padding: 8px 16px;
            font-size: 13px;
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
                                    Technician Dashboard
                                </h1>
                                <p style="margin: 5px 0 0 0; font-size: 14px; color: rgba(255,255,255,0.9);">
                                    Welcome back, {{ auth()->user()->name ?? 'Technician' }}
                                </p>
        </div>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                        <a href="{{ route('technician.jobs') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; background: rgba(255,255,255,0.2); color: white; border-radius: 12px; text-decoration: none; font-weight: 600; font-size: 14px; transition: all 0.3s ease; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.3);">
                            <i class="fas fa-briefcase"></i>
                            <span>My Jobs</span>
                        </a>
                        <a href="{{ route('technician.projects') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; background: rgba(255,255,255,0.2); color: white; border-radius: 12px; text-decoration: none; font-weight: 600; font-size: 14px; transition: all 0.3s ease; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.3);">
                            <i class="fas fa-folder-open"></i>
                            <span>Projects</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="pr-container">
            <!-- Hero Section -->
            <div class="pr-hero-section">
                <div class="pr-hero-content">
                    <div class="pr-profile-image">
                        <!-- <i class="fas fa-user-tie"></i> -->
                             @php
                                $profileImg = '';
                                if ($technician && $technician->profile_picture) {
                                    $profileImg = Storage::disk('public')->exists($technician->profile_picture) ? asset('storage/' . $technician->profile_picture) : 'https://i.pravatar.cc/150?img=12';
                                } else {
                                    $profileImg = 'https://i.pravatar.cc/150?img=12';
                                }
                             @endphp
                             <img src="{{ $profileImg }}" alt="{{ auth()->user()->name ?? 'User' }}" class="tm-avatar">
                    </div>
                    <div class="pr-hero-info">
                        <div class="prinfoedit" >
                            <div>
                                    <h4 class="pr-name">{{ auth()->user()->name ?? 'User' }}</h4>
                                    <p class="pr-title">{{ $technician->job_title ?? 'Technician' }}</p>
                            </div>    
                            <div>
                                <button class="ep-trigger-btn" onclick="epOpenModal()">
                                    <i class="fas fa-user-edit"></i>
                                    Edit Profile
                                </button>
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
                                <span class="pr-stat-number">4.9</span>
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
                    @if($technician && $technician->projects && is_array($technician->projects) && count($technician->projects) > 6)
                    <a href="{{ route('technician.projects') }}" class="view-all-btn" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);">
                        <span>View All</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    @endif
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
                            <p style="color: #999; font-size: 16px; margin: 0;">No projects added yet. Add projects in the edit profile modal.</p>
                            </div>
                    @endif
                        </div>
                
                @if($technician && $technician->projects && is_array($technician->projects) && count($technician->projects) > 6)
                <div style="text-align: center; margin-top: 30px;">
                    <a href="{{ route('technician.projects') }}" class="view-all-btn" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 30px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 15px; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);">
                        <span>View All Projects</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                            </div>
                @endif
            </div>
            
            <style>
                .project-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 8px 24px rgba(0,0,0,0.15);
                }
                
                .project-card:hover .project-image-wrapper img {
                    transform: scale(1.1);
                }
                
                .view-all-btn:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
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
                @if(isset($ratingStats))
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
                    @forelse($reviews ?? [] as $review)
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
                            <p style="color: #999; font-size: 16px;">No reviews yet. Reviews will appear here once customers rate your completed jobs.</p>
                </div>
                    @endforelse
            </div>
                
                <!-- Pagination Controls -->
                @if(isset($reviews) && $reviews->hasPages())
                <div class="reviews-pagination">
                    <div class="pagination-info">
                        Showing {{ $reviews->firstItem() ?? 0 }} to {{ $reviews->lastItem() ?? 0 }} of {{ $reviews->total() }} reviews
                    </div>
                    <div class="pagination-controls">
                        @if($reviews->onFirstPage())
                            <button class="pagination-btn pagination-btn-disabled" disabled>
                                <i class="fas fa-chevron-left"></i> Previous
                            </button>
                        @else
                            <a href="{{ $reviews->previousPageUrl() }}" class="pagination-btn">
                                <i class="fas fa-chevron-left"></i> Previous
                            </a>
                        @endif
                        
                        <span class="pagination-page-info">
                            Page {{ $reviews->currentPage() }} of {{ $reviews->lastPage() }}
                        </span>
                        
                        @if($reviews->hasMorePages())
                            <a href="{{ $reviews->nextPageUrl() }}" class="pagination-btn">
                                Next <i class="fas fa-chevron-right"></i>
                            </a>
                        @else
                            <button class="pagination-btn pagination-btn-disabled" disabled>
                                Next <i class="fas fa-chevron-right"></i>
                            </button>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    
    <div class="ep-modal-overlay" id="epModalOverlay" onclick="epCloseOnOutsideClick(event)">
        <div class="ep-modal-container">
            <div class="ep-modal-header">
                <h2 class="ep-modal-title">
                    <i class="fas fa-edit"></i>
                    Edit Profile
                </h2>
                <button class="ep-close-btn" onclick="epCloseModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form id="epProfileForm" enctype="multipart/form-data">
                @csrf
                <div class="ep-modal-body" style="max-height: calc(90vh - 200px); overflow-y: auto; overflow-x: hidden;">
                <!-- Basic Information -->
                <div class="ep-section">
                    <div class="ep-section-header">
                        <div class="ep-section-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <h3 class="ep-section-title">Basic Information</h3>
                    </div>

                    <div class="ep-profile-pic-container">
                            @php
                                $modalProfileImg = '';
                                if ($technician && $technician->profile_picture) {
                                    $modalProfileImg = Storage::disk('public')->exists($technician->profile_picture) ? asset('storage/' . $technician->profile_picture) : 'https://via.placeholder.com/100';
                                } else {
                                    $modalProfileImg = 'https://via.placeholder.com/100';
                                }
                             @endphp
                            <img src="{{ $modalProfileImg }}" alt="Profile" class="ep-profile-pic-preview" id="epProfilePic">
                            <button type="button" class="ep-upload-btn" onclick="document.getElementById('epFileInput').click()">
                            <i class="fas fa-camera"></i>
                            Change Photo
                        </button>
                            <input type="file" id="epFileInput" name="profile_picture" class="ep-hidden" accept="image/*" onchange="epPreviewImage(event)">
                    </div>

                    <div class="ep-form-row">
                        <div class="ep-form-group">
                            <label class="ep-label">
                                <i class="fas fa-signature"></i>
                                Full Name
                            </label>
                                <input type="text" name="name" class="ep-input" value="{{ auth()->user()->name ?? '' }}" placeholder="Enter your name">
                        </div>
                        <div class="ep-form-group">
                            <label class="ep-label">
                                <i class="fas fa-briefcase"></i>
                                Job Title
                            </label>
                                <input type="text" name="job_title" class="ep-input" value="{{ $technician->job_title ?? '' }}" placeholder="Your job title">
                        </div>
                    </div>

                    <div class="ep-form-row">
                        <div class="ep-form-group">
                            <label class="ep-label">
                                <i class="fas fa-calendar"></i>
                                Years of Experience
                            </label>
                                <input type="number" name="year_of_experience" class="ep-input" value="{{ $technician->year_of_experience ?? '' }}" placeholder="Years">
                        </div>
                    </div>

                    <div class="ep-form-group">
                        <label class="ep-label">
                            <i class="fas fa-info-circle"></i>
                            About Me
                        </label>
                            <textarea name="about" class="ep-textarea" placeholder="Write about yourself...">{{ $technician->about ?? '' }}</textarea>
                    </div>
                </div>

                <!-- Certifications -->
                <div class="ep-section">
                    <div class="ep-section-header">
                        <div class="ep-section-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3 class="ep-section-title">Certifications</h3>
                    </div>

                    <div class="ep-items-list" id="epCertificationsList">
                        @if($technician && $technician->certification && is_array($technician->certification) && count($technician->certification) > 0)
                            @foreach($technician->certification as $index => $cert)
                                <div class="ep-item-card" data-index="{{ $index }}">
                            <div class="ep-item-header">
                                        <strong>{{ $cert['name'] ?? 'Certification' }}</strong>
                                <div class="ep-item-actions">
                                            <button type="button" class="ep-icon-btn ep-delete" onclick="epRemoveCertification(this)" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="ep-form-row">
                                <div class="ep-form-group">
                                    <label class="ep-label">Certification Name</label>
                                            <input type="text" name="certifications[{{ $index }}][name]" class="ep-input" value="{{ $cert['name'] ?? '' }}" placeholder="Certification Name">
                                </div>
                                <div class="ep-form-group">
                                    <label class="ep-label">Issuing Organization</label>
                                            <input type="text" name="certifications[{{ $index }}][organization]" class="ep-input" value="{{ $cert['organization'] ?? '' }}" placeholder="Organization">
                                </div>
                                <div class="ep-form-group">
                                    <label class="ep-label">Year</label>
                                            <input type="number" name="certifications[{{ $index }}][year]" class="ep-input" value="{{ $cert['year'] ?? '' }}" placeholder="Year">
                                </div>
                            </div>
                        </div>
                            @endforeach
                        @else
                            <p style="color: #999; padding: 10px; text-align: center;">No certifications added yet. Click "Add Certification" to add one.</p>
                        @endif
                    </div>

                    <button type="button" class="ep-add-btn" onclick="epAddCertification()">
                        <i class="fas fa-plus-circle"></i>
                        Add Certification
                    </button>
                </div>

                <!-- Education -->
                <div class="ep-section">
                    <div class="ep-section-header">
                        <div class="ep-section-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3 class="ep-section-title">Education</h3>
                    </div>

                    <div class="ep-items-list" id="epEducationList">
                        @if($technician && $technician->education && is_array($technician->education) && count($technician->education) > 0)
                            @foreach($technician->education as $index => $edu)
                                <div class="ep-item-card" data-index="{{ $index }}">
                            <div class="ep-item-header">
                                        <strong>{{ $edu['degree'] ?? 'Education' }}</strong>
                                <div class="ep-item-actions">
                                            <button type="button" class="ep-icon-btn ep-delete" onclick="epRemoveEducation(this)" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="ep-form-row">
                                <div class="ep-form-group">
                                    <label class="ep-label">Degree/Diploma</label>
                                            <input type="text" name="educations[{{ $index }}][degree]" class="ep-input" value="{{ $edu['degree'] ?? '' }}" placeholder="Degree/Diploma">
                                </div>
                                <div class="ep-form-group">
                                    <label class="ep-label">Institution</label>
                                            <input type="text" name="educations[{{ $index }}][institution]" class="ep-input" value="{{ $edu['institution'] ?? '' }}" placeholder="Institution">
                                </div>
                            </div>
                            <div class="ep-form-row">
                                <div class="ep-form-group">
                                    <label class="ep-label">Start Year</label>
                                            <input type="number" name="educations[{{ $index }}][start_year]" class="ep-input" value="{{ $edu['start_year'] ?? '' }}" placeholder="Start Year">
                                </div>
                                <div class="ep-form-group">
                                    <label class="ep-label">End Year</label>
                                            <input type="number" name="educations[{{ $index }}][end_year]" class="ep-input" value="{{ $edu['end_year'] ?? '' }}" placeholder="End Year">
                                </div>
                                <div class="ep-form-group">
                                    <label class="ep-label">Location</label>
                                            <input type="text" name="educations[{{ $index }}][location]" class="ep-input" value="{{ $edu['location'] ?? '' }}" placeholder="Location">
                                </div>
                            </div>
                        </div>
                            @endforeach
                        @else
                            <p style="color: #999; padding: 10px; text-align: center;">No education entries added yet. Click "Add Education" to add one.</p>
                        @endif
                    </div>

                    <button type="button" class="ep-add-btn" onclick="epAddEducation()">
                        <i class="fas fa-plus-circle"></i>
                        Add Education
                    </button>
                </div>

                <!-- Recent Projects -->
                <div class="ep-section">
                    <div class="ep-section-header">
                        <div class="ep-section-icon">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <h3 class="ep-section-title">Recent Projects</h3>
                    </div>

                    <div class="ep-items-list" id="epProjectsList">
                        @if($technician && $technician->projects)
                            @foreach($technician->projects as $index => $project)
                                <div class="ep-item-card" data-index="{{ $index }}">
                            <div class="ep-item-header">
                                        <strong>{{ $project['name'] ?? 'Project' }}</strong>
                                <div class="ep-item-actions">
                                            <button type="button" class="ep-icon-btn ep-delete" onclick="epRemoveProject(this)" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                                    <input type="hidden" name="projects[{{ $index }}][image_index]" value="{{ $index }}">
                                    @if(isset($project['image']))
                                        <input type="hidden" name="projects[{{ $index }}][existing_image]" value="{{ $project['image'] }}">
                                    @endif
                            <div class="ep-form-group">
                                <label class="ep-label">Project Name</label>
                                        <input type="text" name="projects[{{ $index }}][name]" class="ep-input" value="{{ $project['name'] ?? '' }}" placeholder="Project Name">
                            </div>
                            <div class="ep-form-group">
                                <label class="ep-label">Description</label>
                                        <textarea name="projects[{{ $index }}][description]" class="ep-textarea" placeholder="Project description...">{{ $project['description'] ?? '' }}</textarea>
                            </div>
                            <div class="ep-form-row">
                                <div class="ep-form-group">
                                    <label class="ep-label">Year</label>
                                            <input type="number" name="projects[{{ $index }}][year]" class="ep-input" value="{{ $project['year'] ?? '' }}" placeholder="Year">
                                </div>
                                <div class="ep-form-group">
                                    <label class="ep-label">Tags (comma-separated)</label>
                                            <input type="text" name="projects[{{ $index }}][tags]" class="ep-input" value="{{ $project['tags'] ?? '' }}" placeholder="Tags">
                                </div>
                            </div>
                            <div class="ep-form-group">
                                <label class="ep-label">Project Image</label>
                                        <button type="button" class="ep-upload-btn" onclick="document.getElementById('epProjectImg{{ $index }}').click()">
                                    <i class="fas fa-image"></i>
                                    Upload Image
                                </button>
                                        <input type="file" id="epProjectImg{{ $index }}" name="project_images[{{ $index }}]" class="ep-hidden" accept="image/*" onchange="epPreviewProjectImage(event, {{ $index }})">
                                        @php
                                            $modalProjectImg = '';
                                            if (isset($project['image']) && $project['image']) {
                                                $modalProjectImg = Storage::disk('public')->exists($project['image']) ? asset('storage/' . $project['image']) : 'https://via.placeholder.com/800x400';
                                            } else {
                                                $modalProjectImg = 'https://via.placeholder.com/800x400';
                                            }
                                        @endphp
                                        <img src="{{ $modalProjectImg }}" alt="Project" class="ep-project-image-preview" id="epProjectImgPreview{{ $index }}">
                            </div>
                        </div>
                            @endforeach
                        @endif
                    </div>

                    <button type="button" class="ep-add-btn" onclick="epAddProject()">
                        <i class="fas fa-plus-circle"></i>
                        Add Project
                    </button>
                </div>
            </div>

            <div class="ep-modal-footer">
                <button type="button" class="ep-btn ep-btn-cancel" onclick="epCloseModal()">
                    <i class="fas fa-times"></i>
                    Cancel
                </button>
                <button type="button" class="ep-btn ep-btn-save" id="epSaveBtn">
                    <i class="fas fa-save"></i>
                    Save Changes
                </button>
            </div>
            </form>
        </div>
    </div>

    


</section>





@endsection

@section('script')
<script>
    // Global index variables
    let certIndex = {{ $technician && $technician->certification ? count($technician->certification) : 0 }};
    let eduIndex = {{ $technician && $technician->education ? count($technician->education) : 0 }};
    let projectIndex = {{ $technician && $technician->projects ? count($technician->projects) : 0 }};

    // Form submission handler
    function handleFormSubmit() {
        const profileForm = document.getElementById('epProfileForm');
        const submitBtn = document.getElementById('epSaveBtn');
        
        if (!profileForm || !submitBtn) return;
        
        const formData = new FormData(profileForm);
        const originalText = submitBtn.innerHTML;
        
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
        
        fetch('{{ route("technician.profile.update") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert(data.message || 'Profile updated successfully!');
                location.reload();
            } else {
                alert(data.message || 'Failed to update profile. Please try again.');
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
    }

    // Attach event listeners when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        const submitBtn = document.getElementById('epSaveBtn');
        if (submitBtn) {
            submitBtn.addEventListener('click', handleFormSubmit);
        }
        
        // Also handle form submit event as backup
        const profileForm = document.getElementById('epProfileForm');
        if (profileForm) {
            profileForm.addEventListener('submit', function(e) {
                e.preventDefault();
                handleFormSubmit();
                return false;
            });
        }
    });

    // Add Certification - Override the function from script.js
    window.epAddCertification = function() {
        const list = document.getElementById('epCertificationsList');
        const card = document.createElement('div');
        card.className = 'ep-item-card';
        card.setAttribute('data-index', certIndex);
        card.innerHTML = `
            <div class="ep-item-header">
                <strong>New Certification</strong>
                <div class="ep-item-actions">
                    <button type="button" class="ep-icon-btn ep-delete" onclick="epRemoveCertification(this)" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="ep-form-row">
                <div class="ep-form-group">
                    <label class="ep-label">Certification Name</label>
                    <input type="text" name="certifications[${certIndex}][name]" class="ep-input" placeholder="Certification Name">
                </div>
                <div class="ep-form-group">
                    <label class="ep-label">Issuing Organization</label>
                    <input type="text" name="certifications[${certIndex}][organization]" class="ep-input" placeholder="Organization">
                </div>
                <div class="ep-form-group">
                    <label class="ep-label">Year</label>
                    <input type="number" name="certifications[${certIndex}][year]" class="ep-input" placeholder="Year">
                </div>
            </div>
        `;
        list.appendChild(card);
        certIndex++;
    };

    // Remove Certification
    window.epRemoveCertification = function(btn) {
        if (confirm('Are you sure you want to remove this certification?')) {
            btn.closest('.ep-item-card').remove();
        }
    };

    // Add Education - Override the function from script.js
    window.epAddEducation = function() {
        const list = document.getElementById('epEducationList');
        const card = document.createElement('div');
        card.className = 'ep-item-card';
        card.setAttribute('data-index', eduIndex);
        card.innerHTML = `
            <div class="ep-item-header">
                <strong>New Education</strong>
                <div class="ep-item-actions">
                    <button type="button" class="ep-icon-btn ep-delete" onclick="epRemoveEducation(this)" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="ep-form-row">
                <div class="ep-form-group">
                    <label class="ep-label">Degree/Diploma</label>
                    <input type="text" name="educations[${eduIndex}][degree]" class="ep-input" placeholder="Degree/Diploma">
                </div>
                <div class="ep-form-group">
                    <label class="ep-label">Institution</label>
                    <input type="text" name="educations[${eduIndex}][institution]" class="ep-input" placeholder="Institution">
                </div>
            </div>
            <div class="ep-form-row">
                <div class="ep-form-group">
                    <label class="ep-label">Start Year</label>
                    <input type="number" name="educations[${eduIndex}][start_year]" class="ep-input" placeholder="Start Year">
                </div>
                <div class="ep-form-group">
                    <label class="ep-label">End Year</label>
                    <input type="number" name="educations[${eduIndex}][end_year]" class="ep-input" placeholder="End Year">
                </div>
                <div class="ep-form-group">
                    <label class="ep-label">Location</label>
                    <input type="text" name="educations[${eduIndex}][location]" class="ep-input" placeholder="Location">
                </div>
            </div>
        `;
        list.appendChild(card);
        eduIndex++;
    };

    // Remove Education
    window.epRemoveEducation = function(btn) {
        if (confirm('Are you sure you want to remove this education?')) {
            btn.closest('.ep-item-card').remove();
        }
    };

    // Add Project - Override the function from script.js
    window.epAddProject = function() {
        const list = document.getElementById('epProjectsList');
        const card = document.createElement('div');
        card.className = 'ep-item-card';
        card.setAttribute('data-index', projectIndex);
        card.innerHTML = `
            <div class="ep-item-header">
                <strong>New Project</strong>
                <div class="ep-item-actions">
                    <button type="button" class="ep-icon-btn ep-delete" onclick="epRemoveProject(this)" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <input type="hidden" name="projects[${projectIndex}][image_index]" value="${projectIndex}">
            <div class="ep-form-group">
                <label class="ep-label">Project Name</label>
                <input type="text" name="projects[${projectIndex}][name]" class="ep-input" placeholder="Project Name">
            </div>
            <div class="ep-form-group">
                <label class="ep-label">Description</label>
                <textarea name="projects[${projectIndex}][description]" class="ep-textarea" placeholder="Project description..."></textarea>
            </div>
            <div class="ep-form-row">
                <div class="ep-form-group">
                    <label class="ep-label">Year</label>
                    <input type="number" name="projects[${projectIndex}][year]" class="ep-input" placeholder="Year">
                </div>
                <div class="ep-form-group">
                    <label class="ep-label">Tags (comma-separated)</label>
                    <input type="text" name="projects[${projectIndex}][tags]" class="ep-input" placeholder="Tags">
                </div>
            </div>
            <div class="ep-form-group">
                <label class="ep-label">Project Image</label>
                <button type="button" class="ep-upload-btn" onclick="document.getElementById('epProjectImg${projectIndex}').click()">
                    <i class="fas fa-image"></i>
                    Upload Image
                </button>
                <input type="file" id="epProjectImg${projectIndex}" name="project_images[${projectIndex}]" class="ep-hidden" accept="image/*" onchange="epPreviewProjectImage(event, ${projectIndex})">
                <img src="https://via.placeholder.com/800x400" alt="Project" class="ep-project-image-preview" id="epProjectImgPreview${projectIndex}">
            </div>
        `;
        list.appendChild(card);
        projectIndex++;
    };

    // Remove Project
    window.epRemoveProject = function(btn) {
        if (confirm('Are you sure you want to remove this project?')) {
            btn.closest('.ep-item-card').remove();
        }
    };

    // Preview Profile Image - Override the function from script.js
    window.epPreviewImage = function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('epProfilePic').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    };

    // Preview Project Image
    window.epPreviewProjectImage = function(event, index) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('epProjectImgPreview' + index).src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    };

    // Initialize carousel with dynamic project count - override script.js functions
    (function() {
        // Initialize variables immediately
        window.prCurrentSlide = 0;
        
        // Override prUpdateCarousel to use window variables
        window.prUpdateCarousel = function() {
            const prTrack = document.getElementById('prCarouselTrack');
            const prIndicators = document.querySelectorAll('.pr-indicator');
            
            if (prTrack && typeof window.prCurrentSlide !== 'undefined' && typeof window.prTotalSlides !== 'undefined') {
                prTrack.style.transform = `translateX(-${window.prCurrentSlide * 100}%)`;
            }
            
            if (prIndicators && typeof window.prCurrentSlide !== 'undefined') {
                prIndicators.forEach((indicator, index) => {
                    if (index === window.prCurrentSlide) {
                        indicator.classList.add('pr-active');
                    } else {
                        indicator.classList.remove('pr-active');
                    }
                });
            }
        };
        
        // Override navigation functions
        window.prNextSlide = function() {
            if (typeof window.prCurrentSlide === 'undefined') window.prCurrentSlide = 0;
            if (typeof window.prTotalSlides === 'undefined') return;
            window.prCurrentSlide = (window.prCurrentSlide + 1) % window.prTotalSlides;
            window.prUpdateCarousel();
        };
        
        window.prPreviousSlide = function() {
            if (typeof window.prCurrentSlide === 'undefined') window.prCurrentSlide = 0;
            if (typeof window.prTotalSlides === 'undefined') return;
            window.prCurrentSlide = (window.prCurrentSlide - 1 + window.prTotalSlides) % window.prTotalSlides;
            window.prUpdateCarousel();
        };
        
        window.prGoToSlide = function(index) {
            window.prCurrentSlide = index;
            window.prUpdateCarousel();
        };
        
        // Initialize when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            const projectCards = document.querySelectorAll('#prCarouselTrack .pr-project-card');
            const projectCount = projectCards.length;
            
            if (projectCount > 0) {
                window.prTotalSlides = projectCount;
                window.prCurrentSlide = 0;
                
                // Reinitialize carousel indicators
                const prIndicatorsContainer = document.getElementById('prIndicators');
                if (prIndicatorsContainer) {
                    prIndicatorsContainer.innerHTML = '';
                    for (let i = 0; i < projectCount; i++) {
                        const prIndicator = document.createElement('div');
                        prIndicator.className = 'pr-indicator' + (i === 0 ? ' pr-active' : '');
                        prIndicator.onclick = () => window.prGoToSlide(i);
                        prIndicatorsContainer.appendChild(prIndicator);
                    }
                }
                
                // Initialize carousel
                window.prUpdateCarousel();
                
                // Clear any existing interval and set new one
                if (window.prCarouselInterval) {
                    clearInterval(window.prCarouselInterval);
                }
                window.prCarouselInterval = setInterval(window.prNextSlide, 5000);
            } else {
                // No projects, disable carousel
                window.prTotalSlides = 0;
            }
        });
    })();
</script>
@endsection
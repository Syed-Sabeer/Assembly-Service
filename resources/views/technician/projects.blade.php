@extends('layouts.frontend.master')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('title', 'All Projects')

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
    
    .projects-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px 60px;
    }
    
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }
    
    .project-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
    }
    
    .project-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 32px rgba(0,0,0,0.15);
    }
    
    .project-image-wrapper {
        position: relative;
        width: 100%;
        height: 250px;
        overflow: hidden;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .project-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .project-card:hover .project-image-wrapper img {
        transform: scale(1.1);
    }
    
    .project-year-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(255,255,255,0.95);
        padding: 8px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        color: #667eea;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .project-content {
        padding: 25px;
    }
    
    .project-content h3 {
        margin: 0 0 12px 0;
        font-size: 20px;
        font-weight: 700;
        color: #333;
        line-height: 1.4;
    }
    
    .project-content p {
        margin: 0 0 18px 0;
        font-size: 14px;
        color: #666;
        line-height: 1.7;
    }
    
    .project-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 15px;
    }
    
    .project-tag {
        display: inline-block;
        padding: 6px 14px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        background: white;
        color: #667eea;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }
    
    .back-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    
    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 80px 20px;
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .empty-state i {
        font-size: 64px;
        color: #ddd;
        margin-bottom: 20px;
    }
    
    .empty-state p {
        color: #999;
        font-size: 18px;
        margin: 0;
    }
    
    @media (max-width: 768px) {
        .projects-page-header {
            padding: 40px 20px;
        }
        
        .projects-page-header h1 {
            font-size: 28px;
        }
        
        .projects-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .project-image-wrapper {
            height: 200px;
        }
    }
</style>
@endsection

@section('content')

<section class="service-three style-two" >
    <div class="outer-container py-5">
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
                                <i class="fas fa-folder-open" style="font-size: 24px; color: white;"></i>
                            </div>
                            <div>
                                <h1 style="margin: 0; font-size: 32px; font-weight: 700; color: white; text-shadow: 0 2px 10px rgba(0,0,0,0.2);">
                                    All Projects
                                </h1>
                                <p style="margin: 5px 0 0 0; font-size: 14px; color: rgba(255,255,255,0.9);">
                                    Showcasing my completed work and expertise
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
        
        <div class="projects-container">
            
            <div class="projects-grid">
                @if($technician && $projects && count($projects) > 0)
                    @foreach($projects as $project)
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
                        <div class="project-card">
                            <div class="project-image-wrapper">
                                <img src="{{ $projectImg }}" alt="{{ $project['name'] ?? 'Project' }}">
                                @if(isset($project['year']) && $project['year'])
                                <div class="project-year-badge">
                                    <i class="fas fa-calendar"></i>
                                    <span>{{ $project['year'] }}</span>
                                </div>
                                @endif
                            </div>
                            <div class="project-content">
                                <h3>{{ $project['name'] ?? 'Project' }}</h3>
                                <p>{{ $project['description'] ?? 'No description available.' }}</p>
                                @if(count($tags) > 0)
                                <div class="project-tags">
                                    @foreach($tags as $tag)
                                        @if(trim($tag))
                                        <span class="project-tag">{{ trim($tag) }}</span>
                                        @endif
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="empty-state">
                        <i class="fas fa-briefcase"></i>
                        <p>No projects added yet. Add projects in the edit profile modal.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
@endsection


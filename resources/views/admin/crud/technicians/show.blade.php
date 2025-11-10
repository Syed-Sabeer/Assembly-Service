@extends('layouts.app.master')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('title', 'Technician Profile')

@section('css')
<style>
    .profile-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 40px;
        border-radius: 10px;
        color: white;
        margin-bottom: 30px;
    }
    .profile-image-large {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid white;
        margin-bottom: 20px;
    }
    .info-card {
        background: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .info-card h4 {
        color: #333;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #f0f0f0;
    }
    .info-item {
        display: flex;
        padding: 10px 0;
        border-bottom: 1px solid #f0f0f0;
    }
    .info-item:last-child {
        border-bottom: none;
    }
    .info-label {
        font-weight: 600;
        color: #666;
        width: 200px;
    }
    .info-value {
        color: #333;
        flex: 1;
    }
    .cert-item, .edu-item, .project-item {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 15px;
        border-left: 4px solid #667eea;
    }
    .status-badge {
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        display: inline-block;
    }
    .status-pending {
        background-color: #fff3cd;
        color: #856404;
    }
    .status-approved {
        background-color: #d4edda;
        color: #155724;
    }
    .status-rejected {
        background-color: #f8d7da;
        color: #721c24;
    }
    .project-image {
        width: 100%;
        max-width: 300px;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
        margin-top: 10px;
    }
</style>
@endsection

@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Technician Profile</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                            <svg class="stroke-icon">
                                <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                            </svg></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.technician.index') }}">Technicians</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        @php
            $user = $technician->user;
            $status = $technician->is_approved ?? 0;
            $statusText = match((int)$status) {
                0 => ['text' => 'Pending', 'class' => 'status-pending'],
                1 => ['text' => 'Approved', 'class' => 'status-approved'],
                2 => ['text' => 'Rejected', 'class' => 'status-rejected'],
                default => ['text' => 'Unknown', 'class' => 'status-pending'],
            };
            
            $profileImg = '';
            if ($technician->profile_picture) {
                $profileImg = Storage::disk('public')->exists($technician->profile_picture) ? asset('storage/' . $technician->profile_picture) : 'https://i.pravatar.cc/150?img=' . ($technician->id % 70);
            } else {
                $profileImg = 'https://i.pravatar.cc/150?img=' . ($technician->id % 70);
            }
        @endphp
        
        <!-- Profile Header -->
        <div class="profile-header text-center">
            <img src="{{ $profileImg }}" alt="{{ $user->name ?? 'Technician' }}" class="profile-image-large">
            <h2 style="color: white; margin-bottom: 10px;">{{ $user->name ?? 'N/A' }}</h2>
            <p style="color: rgba(255,255,255,0.9); font-size: 18px;">{{ $technician->job_title ?? 'Technician' }}</p>
            <span class="status-badge {{ $statusText['class'] }}" style="margin-top: 15px;">{{ $statusText['text'] }}</span>
        </div>
        
        <!-- Action Buttons -->
        <div class="info-card text-center">
            @if($status != 1)
            <form action="{{ route('admin.technician.approve', $technician->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to approve this technician?');">
                @csrf
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Approve Technician
                </button>
            </form>
            @endif
            
            @if($status != 2)
            <form action="{{ route('admin.technician.reject', $technician->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to reject this technician?');">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-times"></i> Reject Technician
                </button>
            </form>
            @endif
            
            @if($status != 0)
            <form action="{{ route('admin.technician.setPending', $technician->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to set this technician to pending?');">
                @csrf
                <button type="submit" class="btn btn-warning">
                    <i class="fa fa-clock"></i> Set to Pending
                </button>
            </form>
            @endif
            
            <a href="{{ route('admin.technician.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Back to List
            </a>
        </div>
        
        <!-- Basic Information -->
        <div class="info-card">
            <h4><i class="fa fa-user"></i> Basic Information</h4>
            <div class="info-item">
                <span class="info-label">Name:</span>
                <span class="info-value">{{ $user->name ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Email:</span>
                <span class="info-value">{{ $user->email ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Phone:</span>
                <span class="info-value">{{ $user->phone ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Job Title:</span>
                <span class="info-value">{{ $technician->job_title ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Years of Experience:</span>
                <span class="info-value">{{ $technician->year_of_experience ?? 0 }} years</span>
            </div>
            <div class="info-item">
                <span class="info-label">Status:</span>
                <span class="info-value">
                    <span class="status-badge {{ $statusText['class'] }}">{{ $statusText['text'] }}</span>
                </span>
            </div>
        </div>
        
        <!-- About -->
        @if($technician->about)
        <div class="info-card">
            <h4><i class="fa fa-info-circle"></i> About</h4>
            <p style="color: #666; line-height: 1.8;">{{ $technician->about }}</p>
        </div>
        @endif
        
        <!-- Certifications -->
        <div class="info-card">
            <h4><i class="fa fa-certificate"></i> Certifications</h4>
            @if($technician->certification && is_array($technician->certification) && count($technician->certification) > 0)
                @foreach($technician->certification as $cert)
                    @if(!empty($cert['name']) || !empty($cert['organization']))
                    <div class="cert-item">
                        <h5 style="margin-bottom: 8px; color: #333;">{{ $cert['name'] ?? 'Certification' }}</h5>
                        <p style="margin: 5px 0; color: #666;">
                            <strong>Organization:</strong> {{ $cert['organization'] ?? 'N/A' }}
                            @if($cert['year'])
                                <br><strong>Year:</strong> {{ $cert['year'] }}
                            @endif
                        </p>
                    </div>
                    @endif
                @endforeach
            @else
                <p style="color: #999; padding: 20px; text-align: center;">No certifications added yet.</p>
            @endif
        </div>
        
        <!-- Education -->
        <div class="info-card">
            <h4><i class="fa fa-graduation-cap"></i> Education</h4>
            @if($technician->education && is_array($technician->education) && count($technician->education) > 0)
                @foreach($technician->education as $edu)
                    @if(!empty($edu['degree']) || !empty($edu['institution']))
                    <div class="edu-item">
                        <h5 style="margin-bottom: 8px; color: #333;">{{ $edu['degree'] ?? 'Education' }}</h5>
                        <p style="margin: 5px 0; color: #666;">
                            <strong>Institution:</strong> {{ $edu['institution'] ?? 'N/A' }}
                            @if($edu['start_year'] || $edu['end_year'])
                                <br><strong>Duration:</strong> 
                                @if($edu['start_year'] && $edu['end_year'])
                                    {{ $edu['start_year'] }} - {{ $edu['end_year'] }}
                                @elseif($edu['start_year'])
                                    {{ $edu['start_year'] }}
                                @elseif($edu['end_year'])
                                    {{ $edu['end_year'] }}
                                @endif
                            @endif
                            @if($edu['location'])
                                <br><strong>Location:</strong> {{ $edu['location'] }}
                            @endif
                        </p>
                    </div>
                    @endif
                @endforeach
            @else
                <p style="color: #999; padding: 20px; text-align: center;">No education entries added yet.</p>
            @endif
        </div>
        
        <!-- Projects -->
        <div class="info-card">
            <h4><i class="fa fa-briefcase"></i> Projects</h4>
            @if($technician->projects && is_array($technician->projects) && count($technician->projects) > 0)
                @foreach($technician->projects as $project)
                    @if(!empty($project['name']) || !empty($project['description']))
                    <div class="project-item">
                        <h5 style="margin-bottom: 8px; color: #333;">{{ $project['name'] ?? 'Project' }}</h5>
                        <p style="margin: 5px 0; color: #666;">{{ $project['description'] ?? 'No description available.' }}</p>
                        @if($project['year'])
                            <p style="margin: 5px 0; color: #666;"><strong>Year:</strong> {{ $project['year'] }}</p>
                        @endif
                        @if($project['tags'])
                            <p style="margin: 5px 0; color: #666;">
                                <strong>Tags:</strong> 
                                @php
                                    $tags = is_string($project['tags']) ? explode(',', $project['tags']) : (is_array($project['tags']) ? $project['tags'] : []);
                                @endphp
                                @foreach($tags as $tag)
                                    <span class="badge bg-secondary">{{ trim($tag) }}</span>
                                @endforeach
                            </p>
                        @endif
                        @if(isset($project['image']) && $project['image'])
                            @php
                                $projectImg = Storage::disk('public')->exists($project['image']) ? asset('storage/' . $project['image']) : '';
                            @endphp
                            @if($projectImg)
                                <img src="{{ $projectImg }}" alt="{{ $project['name'] ?? 'Project' }}" class="project-image">
                            @endif
                        @endif
                    </div>
                    @endif
                @endforeach
            @else
                <p style="color: #999; padding: 20px; text-align: center;">No projects added yet.</p>
            @endif
        </div>
        
        <!-- Resume -->
        @if($technician->resume)
        <div class="info-card">
            <h4><i class="fa fa-file-pdf"></i> Resume</h4>
            @php
                $resumePath = Storage::disk('public')->exists($technician->resume) ? asset('storage/' . $technician->resume) : '';
            @endphp
            @if($resumePath)
                <a href="{{ $resumePath }}" target="_blank" class="btn btn-primary">
                    <i class="fa fa-download"></i> Download Resume
                </a>
            @else
                <p style="color: #999;">Resume file not found.</p>
            @endif
        </div>
        @endif
    </div>
</div>

@endsection

@section('script')
@endsection


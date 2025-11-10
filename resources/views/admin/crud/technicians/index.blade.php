@extends('layouts.app.master')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('title', 'Technicians')

@section('css')
<style>
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
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
    .profile-image {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }
</style>
@endsection

@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Technicians List</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                            <svg class="stroke-icon">
                                <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                            </svg></a></li>
                        <li class="breadcrumb-item">CMS</li>
                        <li class="breadcrumb-item active">Technicians List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid list-product-view product-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-no-border text-end">
                        <div class="card-header-right-icon">
                            <span class="badge bg-info">Total: {{ $technicians->count() }}</span>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="list-product">
                            <div class="recent-table table-responsive custom-scrollbar product-list-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>No.</th>
                                            <th><span class="c-o-light f-w-600">Profile</span></th>
                                            <th><span class="c-o-light f-w-600">Name</span></th>
                                            <th><span class="c-o-light f-w-600">Email</span></th>
                                            <th><span class="c-o-light f-w-600">Job Title</span></th>
                                            <th><span class="c-o-light f-w-600">Experience</span></th>
                                            <th><span class="c-o-light f-w-600">Status</span></th>
                                            <th><span class="c-o-light f-w-600">Actions</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($technicians as $technician)
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
                                        <tr class="product-removes">
                                            <td></td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ $profileImg }}" alt="{{ $user->name ?? 'Technician' }}" class="profile-image">
                                            </td>
                                            <td>
                                                <p class="c-o-light f-w-600">{{ $user->name ?? 'N/A' }}</p>
                                            </td>
                                            <td>
                                                <p class="c-o-light">{{ $user->email ?? 'N/A' }}</p>
                                            </td>
                                            <td>
                                                <p class="c-o-light">{{ $technician->job_title ?? 'N/A' }}</p>
                                            </td>
                                            <td>
                                                <p class="c-o-light">{{ $technician->year_of_experience ?? 0 }} years</p>
                                            </td>
                                            <td>
                                                <span class="status-badge {{ $statusText['class'] }}">{{ $statusText['text'] }}</span>
                                            </td>
                                            <td>
                                                <div class="product-action">
                                                    <a class="square-white" href="{{ route('admin.technician.show', $technician->id) }}" title="View Profile">
                                                        <i class="fa fa-eye" style="font-size: 16px;"></i>
                                                    </a>
                                                    
                                                    @if($status != 1)
                                                    <form action="{{ route('admin.technician.approve', $technician->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to approve this technician?');">
                                                        @csrf
                                                        <button type="submit" class="square-white" style="border:none; background:none; padding:0; color: #28a745;" title="Approve">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    </form>
                                                    @endif
                                                    
                                                    @if($status != 2)
                                                    <form action="{{ route('admin.technician.reject', $technician->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to reject this technician?');">
                                                        @csrf
                                                        <button type="submit" class="square-white" style="border:none; background:none; padding:0; color: #dc3545;" title="Reject">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                    @endif
                                                    
                                                    @if($status != 0)
                                                    <form action="{{ route('admin.technician.setPending', $technician->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to set this technician to pending?');">
                                                        @csrf
                                                        <button type="submit" class="square-white" style="border:none; background:none; padding:0; color: #ffc107;" title="Set to Pending">
                                                            <i class="fa fa-clock"></i>
                                                        </button>
                                                    </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="9" class="text-center py-5">
                                                <p class="text-muted">No technicians found.</p>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection


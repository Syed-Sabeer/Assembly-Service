@extends('layouts.app.master')

@section('title', 'Dashboard')

@section('css')
<style>
    .stat-card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        position: relative;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
    }
    .stat-value {
        font-size: 28px;
        font-weight: 700;
        margin: 10px 0 5px;
        color: #1a1a1a;
    }
    .dark-only .stat-value {
        color: #ffffff !important;
    }
    .stat-label {
        font-size: 13px;
        color: #6b7280;
        font-weight: 500;
    }
    .dark-only .stat-label {
        color: #9ca3af !important;
    }
    .gradient-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .gradient-success { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
    .gradient-info { background: linear-gradient(135deg, #3494E6 0%, #EC6EAD 100%); }
    .gradient-warning { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
    .filter-section {
        display: flex;
        justify-content: center;
        margin: 20px 0;
    }
</style>
@endsection

@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Project List</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                            </svg></a></li>
                        <li class="breadcrumb-item">CMS</li>
                        <li class="breadcrumb-item active">Project List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid list-product-view product-wrapper">
        <!-- Statistics Cards Row -->
        <div class="row mb-4">
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">Total Projects</div>
                                <div class="stat-value">{{ $stats['total'] }}</div>
                            </div>
                            <div class="stat-icon gradient-primary">
                                <i class="fa fa-folder-open"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <form method="GET" action="{{ route('admin.project.index') }}" class="d-inline-flex gap-2 align-items-center">
                <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ $search }}" style="width: 200px;">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                <a href="{{ route('admin.project.index') }}" class="btn btn-secondary"><i class="fa fa-redo"></i></a>
                <a class="btn btn-success f-w-500" href="{{ route('admin.project.add') }}">
                    <i class="fa fa-plus pe-2"></i>Add Project
                </a>
            </form>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-no-border">
                        <h5>All Projects</h5>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="list-product">
                            <div class="recent-table table-responsive custom-scrollbar product-list-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>No.</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Location</th>
                                            <th>Category</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($projects as $project)
                                        <tr class="project-removes">
                                            <td></td>
                                            <td>{{ $loop->iteration + ($projects->currentPage() - 1) * $projects->perPage() }}</td>
                                            <td>
                                                @if($project->image)
                                                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                                @else
                                                    <div style="width: 50px; height: 50px; background-color: #f0f0f0; border-radius: 5px; display: flex; align-items: center; justify-content: center;">
                                                        <i class="fa fa-image text-muted"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $project->title }}</td>
                                            <td>{{ $project->location }}</td>
                                            <td>{{ $project->category }}</td>
                                            <td>
                                                <div class="product-action">
                                                    <a class="square-white" href="{{ route('admin.project.edit', $project->id) }}">
                                                        <svg>
                                                            <use href="{{ asset('AdminAssets/svg/icon-sprite.svg#edit-content') }}"></use>
                                                        </svg>
                                                    </a>

                                                    <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="square-white trash-3" style="border:none; background:none; padding:0;">
                                                            <svg>
                                                                <use href="{{ asset('AdminAssets/svg/icon-sprite.svg#trash1') }}"></use>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center py-5">
                                                    <p class="text-muted">No projects found.</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    Showing {{ $projects->firstItem() ?? 0 }} to {{ $projects->lastItem() ?? 0 }} of {{ $projects->total() }} entries
                                </div>
                                <div>
                                    {{ $projects->links() }}
                                </div>
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

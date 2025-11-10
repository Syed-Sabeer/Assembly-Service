@extends('layouts.app.master')

@section('title', 'Quotes')

@section('css')
<style>
    .file-preview {
        display: inline-block;
        margin: 5px;
    }
    .file-preview img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 5px;
        border: 1px solid #ddd;
    }
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
                    <h3>Quote Requests</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                            <svg class="stroke-icon">
                                <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-home')}}"></use>
                            </svg></a></li>
                        <li class="breadcrumb-item">Submissions</li>
                        <li class="breadcrumb-item active">Quote Requests</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid list-product-view product-wrapper">
        <!-- Statistics Cards Row -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">Total</div>
                                <div class="stat-value">{{ $stats['total'] }}</div>
                            </div>
                            <div class="stat-icon gradient-primary">
                                <i class="fa fa-file-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">Today</div>
                                <div class="stat-value">{{ $stats['today'] }}</div>
                            </div>
                            <div class="stat-icon gradient-info">
                                <i class="fa fa-calendar-day"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">This Week</div>
                                <div class="stat-value">{{ $stats['this_week'] }}</div>
                            </div>
                            <div class="stat-icon gradient-success">
                                <i class="fa fa-calendar-week"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stat-label">This Month</div>
                                <div class="stat-value">{{ $stats['this_month'] }}</div>
                            </div>
                            <div class="stat-icon gradient-warning">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <form method="GET" action="{{ route('admin.quotes.index') }}" class="d-inline-flex gap-2 align-items-center">
                <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ $search }}" style="width: 200px;">
                <input type="date" name="date_from" class="form-control" value="{{ $dateFrom }}" placeholder="From">
                <input type="date" name="date_to" class="form-control" value="{{ $dateTo }}" placeholder="To">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                <a href="{{ route('admin.quotes.index') }}" class="btn btn-secondary"><i class="fa fa-redo"></i></a>
            </form>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-no-border">
                        <h5>All Quote Requests</h5>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="list-product">
                            <div class="recent-table table-responsive custom-scrollbar product-list-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>No.</th>
                                            <th><span class="c-o-light f-w-600">Name</span></th>
                                            <th><span class="c-o-light f-w-600">Email</span></th>
                                            <th><span class="c-o-light f-w-600">Phone</span></th>
                                            <th><span class="c-o-light f-w-600">Service</span></th>
                                            <th><span class="c-o-light f-w-600">City</span></th>
                                            <th><span class="c-o-light f-w-600">Files</span></th>
                                            <th><span class="c-o-light f-w-600">Date</span></th>
                                            <th><span class="c-o-light f-w-600">Actions</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($quotes as $quote)
                                        <tr class="product-removes">
                                            <td></td>
                                            <td>{{ $loop->iteration + ($quotes->currentPage() - 1) * $quotes->perPage() }}</td>
                                            <td>
                                                <p class="c-o-light mb-0">{{ $quote->fullname }}</p>
                                            </td>
                                            <td>
                                                <p class="c-o-light mb-0">{{ $quote->email }}</p>
                                            </td>
                                            <td>
                                                <p class="c-o-light mb-0">{{ $quote->phone }}</p>
                                            </td>
                                            <td>
                                                <p class="c-o-light mb-0">{{ $quote->service }}</p>
                                            </td>
                                            <td>
                                                <p class="c-o-light mb-0">{{ $quote->city }}</p>
                                            </td>
                                            <td>
                                                @if($quote->file)
                                                    @php
                                                        $files = json_decode($quote->file, true);
                                                    @endphp
                                                    @if(is_array($files) && count($files) > 0)
                                                        <span class="badge bg-info">{{ count($files) }} file(s)</span>
                                                    @else
                                                        <span class="text-muted">No files</span>
                                                    @endif
                                                @else
                                                    <span class="text-muted">No files</span>
                                                @endif
                                            </td>
                                            <td>
                                                <p class="c-o-light mb-0">{{ $quote->created_at->format('M d, Y') }}</p>
                                                <small class="text-muted">{{ $quote->created_at->format('h:i A') }}</small>
                                            </td>
                                            <td>
                                                <div class="product-action">
                                                    <a class="square-white" href="{{ route('admin.quotes.show', $quote->id) }}" title="View Details">
                                                        <svg>
                                                            <use href="{{ asset('AdminAssets/svg/icon-sprite.svg#eye') }}"></use>
                                                        </svg>
                                                    </a>
                                                    <button type="button" class="square-white trash-3" onclick="deleteQuote({{ $quote->id }})" title="Delete">
                                                        <svg>
                                                            <use href="{{ asset('AdminAssets/svg/icon-sprite.svg#trash1') }}"></use>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="10" class="text-center py-5">
                                                <p class="text-muted">No quote requests found.</p>
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
                                    Showing {{ $quotes->firstItem() ?? 0 }} to {{ $quotes->lastItem() ?? 0 }} of {{ $quotes->total() }} entries
                                </div>
                                <div>
                                    {{ $quotes->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function deleteQuote(id) {
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
            fetch(`/admin/quotes/${id}`, {
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
                    Swal.fire('Deleted!', data.message || 'Quote has been deleted.', 'success').then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire('Error!', data.message || 'Failed to delete quote.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('Error!', 'An error occurred while deleting the quote.', 'error');
            });
        }
    });
}
</script>
@endsection


@extends('layouts.app.master')

@section('title', 'Quote Details')

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
    .dark-only .info-value strong {
        color: #ffffff !important;
    }
    .info-card h4 {
        color: #1a1a1a;
    }
    .dark-only .info-card h4 {
        color: #ffffff !important;
    }
    .dark-only h3, .dark-only h4, .dark-only h5 {
        color: #ffffff !important;
    }
    .dark-only .info-card p {
        color: #e2e8f0 !important;
    }
    .file-preview {
        display: inline-block;
        margin: 10px;
        text-align: center;
    }
    .file-preview img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #ddd;
        cursor: pointer;
    }
    .dark-only .file-preview img {
        border: 2px solid #475569 !important;
    }
    .file-preview a {
        display: block;
        margin-top: 5px;
        color: #667eea;
        text-decoration: none;
    }
    .dark-only .file-preview a {
        color: #818cf8 !important;
    }
</style>
@endsection

@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Quote Request Details #{{ $quote->id }}</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.quotes.index') }}">Quotes</a></li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <!-- Quote Information -->
                <div class="info-card">
                    <h4 class="mb-4">Quote Request Information</h4>
                    <div class="info-row">
                        <div class="info-label">Quote ID</div>
                        <div class="info-value"><strong>#{{ $quote->id }}</strong></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Full Name</div>
                        <div class="info-value">{{ $quote->fullname }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Email</div>
                        <div class="info-value">{{ $quote->email }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Phone</div>
                        <div class="info-value">{{ $quote->phone }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Service</div>
                        <div class="info-value"><strong>{{ $quote->service }}</strong></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">City</div>
                        <div class="info-value">{{ $quote->city }}</div>
                    </div>
                    @if($quote->details)
                    <div class="info-row">
                        <div class="info-label">Details</div>
                        <div class="info-value">{{ $quote->details }}</div>
                    </div>
                    @endif
                    <div class="info-row">
                        <div class="info-label">Submitted At</div>
                        <div class="info-value">{{ $quote->created_at->format('F j, Y g:i A') }}</div>
                    </div>
                </div>

                <!-- Files Section -->
                @if(count($files) > 0)
                <div class="info-card">
                    <h4 class="mb-4">Attached Files ({{ count($files) }})</h4>
                    <div class="row">
                        @foreach($files as $file)
                        <div class="col-md-4">
                            <div class="file-preview">
                                @if(in_array(strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                    <img src="{{ $file['url'] }}" alt="{{ $file['name'] }}" onclick="window.open('{{ $file['url'] }}', '_blank')">
                                @else
                                    <div style="width: 150px; height: 150px; background: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fa fa-file" style="font-size: 48px; color: #999;"></i>
                                    </div>
                                @endif
                                <a href="{{ $file['url'] }}" target="_blank" download>{{ $file['name'] }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <div class="col-md-4">
                <!-- Quick Actions -->
                <div class="info-card">
                    <h4 class="mb-4">Quick Actions</h4>
                    <a href="{{ route('admin.quotes.index') }}" class="btn btn-secondary w-100 mb-2">
                        <i class="fa fa-arrow-left"></i> Back to Quotes
                    </a>
                    <button type="button" class="btn btn-danger w-100" onclick="deleteQuote({{ $quote->id }})">
                        <i class="fa fa-trash"></i> Delete Quote
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
                        window.location.href = '{{ route('admin.quotes.index') }}';
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


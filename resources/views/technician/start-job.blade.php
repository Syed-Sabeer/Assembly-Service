@extends('layouts.frontend.master')

@section('title', 'Start Job')

@section('css')
<style>
    .start-job-container {
        max-width: 900px;
        margin: 10vh auto 60px;
        padding: 0 20px;
    }
    
    .dashboard-header-premium {
        margin-bottom: 40px;
    }
    
    .dashboard-header-content {
        background: linear-gradient(135deg, #3375d1 0%, #0c9eb5 50%, #72a500 100%);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 40px rgba(51, 117, 209, 0.3);
        position: relative;
        overflow: hidden;
    }
    
    .job-details-card {
        background: white;
        border-radius: 20px;
        padding: 35px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
    }
    
    .job-details-card h3 {
        font-size: 24px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f1f5f9;
    }
    
    .info-row {
        display: flex;
        padding: 15px 0;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .info-row:last-child {
        border-bottom: none;
    }
    
    .info-label {
        font-weight: 600;
        color: #64748b;
        width: 200px;
        flex-shrink: 0;
    }
    
    .info-value {
        color: #1e293b;
        flex: 1;
    }
    
    .eta-form-card {
        background: white;
        border-radius: 20px;
        padding: 35px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }
    
    .eta-form-card h3 {
        font-size: 24px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 20px;
    }
    
    .form-group {
        margin-bottom: 25px;
    }
    
    .form-label {
        display: block;
        font-weight: 600;
        color: #475569;
        margin-bottom: 10px;
        font-size: 14px;
    }
    
    .form-input {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s;
    }
    
    .form-input:focus {
        outline: none;
        border-color: #3375d1;
        box-shadow: 0 0 0 3px rgba(51, 117, 209, 0.1);
    }
    
    .btn-submit {
        background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500);
        color: white;
        padding: 14px 32px;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }
    
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(51, 117, 209, 0.4);
    }
    
    .btn-submit:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }
    
    .customer-avatar {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 800;
        font-size: 22px;
        margin-bottom: 15px;
    }
</style>
@endsection

@section('content')

<div class="start-job-container">
    <!-- Premium Dashboard Header -->
    <div class="dashboard-header-premium">
        <div class="dashboard-header-content">
            <!-- Decorative Elements -->
            <div style="position: absolute; top: -50px; right: -50px; width: 200px;  background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
            <div style="position: absolute; bottom: -30px; left: -30px; width: 150px; height: 150px; background: rgba(255,255,255,0.08); border-radius: 50%;"></div>
            
            <div style="position: relative; z-index: 1; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
                <div>
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 10px;">
                        <div style="width: 50px; height: 50px; background: rgba(255,255,255,0.2); border-radius: 12px; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(10px);">
                            <i class="fas fa-play-circle" style="font-size: 24px; color: white;"></i>
                        </div>
                        <div>
                            <h1 style="margin: 0; font-size: 32px; font-weight: 700; color: white; text-shadow: 0 2px 10px rgba(0,0,0,0.2);">
                                Start Job
                            </h1>
                            <p style="margin: 5px 0 0 0; font-size: 14px; color: rgba(255,255,255,0.9);">
                                Set your estimated time of arrival and notify the customer
                            </p>
                        </div>
                    </div>
                </div>
                
                <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                    <a href="{{ route('technician.jobs') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; background: rgba(255,255,255,0.2); color: white; border-radius: 12px; text-decoration: none; font-weight: 600; font-size: 14px; transition: all 0.3s ease; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.3);">
                        <i class="fas fa-arrow-left"></i>
                        <span>Back to Jobs</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Details Card -->
    <div class="job-details-card">
        <h3><i class="fas fa-info-circle"></i> Job Details</h3>
        
        <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 25px; padding-bottom: 20px; border-bottom: 1px solid #f1f5f9;">
            <div class="customer-avatar">
                {{ strtoupper(substr($customer->name ?? 'C', 0, 1) . (strpos($customer->name ?? 'C', ' ') !== false ? substr($customer->name, strpos($customer->name, ' ') + 1, 1) : substr($customer->name ?? 'C', 1, 1))) }}
            </div>
            <div>
                <h4 style="margin: 0 0 5px 0; font-size: 20px; color: #1e293b;">{{ $customer->name ?? 'Customer' }}</h4>
                <p style="margin: 0; color: #64748b; font-size: 14px;">{{ $customer->email ?? 'N/A' }}</p>
                @if($customer->phone)
                <p style="margin: 5px 0 0 0; color: #64748b; font-size: 14px;"><i class="fas fa-phone"></i> {{ $customer->phone }}</p>
                @endif
            </div>
        </div>
        
        <div class="info-row">
            <div class="info-label">Service/Product</div>
            <div class="info-value"><strong>{{ $product->title ?? 'N/A' }}</strong></div>
        </div>
        <div class="info-row">
            <div class="info-label">Booking ID</div>
            <div class="info-value">#{{ $booking->id }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Installation Address</div>
            <div class="info-value">{{ $booking->installation_address }}, {{ $booking->city }} {{ $booking->zip }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Scheduled Date</div>
            <div class="info-value">
                @if($booking->preferred_date)
                    {{ $booking->preferred_date->format('F j, Y') }} at {{ $booking->preferred_time ?? 'TBD' }}
                @else
                    TBD
                @endif
            </div>
        </div>
        <div class="info-row">
            <div class="info-label">Amount</div>
            <div class="info-value" style="color: #10b981; font-weight: 700; font-size: 18px;">${{ number_format($booking->amount ?? 0, 2) }}</div>
        </div>
        @if($booking->notes)
        <div class="info-row">
            <div class="info-label">Special Notes</div>
            <div class="info-value">{{ $booking->notes }}</div>
        </div>
        @endif
    </div>

    <!-- ETA Form Card -->
    <div class="eta-form-card">
        <h3><i class="fas fa-clock"></i> Set Estimated Time of Arrival</h3>
        <form id="etaForm">
            @csrf
             <div class="form-group">
                 <label class="form-label">Estimated Time of Arrival (ETA)</label>
                 <input type="time" 
                        id="eta" 
                        name="eta" 
                        class="form-input" 
                        required
                        autocomplete="off">
                 <small style="color: #64748b; font-size: 13px; margin-top: 5px; display: block;">
                     <i class="fas fa-info-circle"></i> Select the time when you expect to arrive at the customer's location
                 </small>
             </div>
            
            <button type="submit" class="btn-submit" id="submitBtn">
                <i class="fas fa-route"></i>
                Set On Route & Notify Customer
            </button>
        </form>
    </div>
</div>

<script>
document.getElementById('etaForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
     const btn = document.getElementById('submitBtn');
     const originalText = btn.innerHTML;
     const etaInput = document.getElementById('eta');
     const eta = etaInput.value;
     
     if (!eta) {
         alert('Please select an estimated time of arrival.');
         etaInput.focus();
         return;
     }
     
     // Format time for display (convert 24h to 12h format)
     const formatTime = (time24) => {
         const [hours, minutes] = time24.split(':');
         const hour = parseInt(hours);
         const ampm = hour >= 12 ? 'PM' : 'AM';
         const hour12 = hour % 12 || 12;
         return `${hour12}:${minutes} ${ampm}`;
     };
     
     const formattedEta = formatTime(eta);
    
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Setting on route...';
    
    fetch('{{ route("technician.jobs.setOnRoute", $bookingStatus->id) }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            'X-Requested-With': 'XMLHttpRequest'
        },
         body: JSON.stringify({
             eta: formattedEta
         })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success notification
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500);
                color: white;
                padding: 18px 25px;
                border-radius: 12px;
                box-shadow: 0 8px 25px rgba(51, 117, 209, 0.4);
                z-index: 10000;
                font-weight: 600;
                animation: slideIn 0.4s ease-out;
            `;
            notification.textContent = '✅ ' + data.message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                if (data.redirect_url) {
                    window.location.href = data.redirect_url;
                } else {
                    window.location.href = '{{ route("technician.jobs") }}';
                }
            }, 1500);
        } else {
            alert(data.message || 'Failed to set on route. Please try again.');
            btn.disabled = false;
            btn.innerHTML = originalText;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
        btn.disabled = false;
        btn.innerHTML = originalText;
    });
});

// Add animation
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(100px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
`;
document.head.appendChild(style);
</script>

@endsection

@section('script')
@endsection


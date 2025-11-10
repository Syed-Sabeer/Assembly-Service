@extends('layouts.frontend.master')

@section('css')
<!-- Stripe Elements CSS -->
<style>
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        transition: box-shadow 150ms ease;
    }
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
    .checkout-summary-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #e0e0e0;
    }
    .checkout-summary-item:last-child {
        border-bottom: none;
    }
</style>
@endsection

@section('content')

<style>

       .page-title {
            padding: 180px 0px 90px;
       } 
        .container {
           max-width: 1200px;
           margin: 6rem auto 4rem auto;
        }

        /* Progress Steps */
        .progress-steps {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
            gap: 20px;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .step-number {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            background: #e0e0e0;
            color: #666;
            transition: all 0.3s;
        }

        .step.active .step-number {
            background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500);
            color: white;
        }

        .step-text {
            font-weight: 600;
            color: #999;
            font-size: 22px;
        }

        .step.active .step-text {
            color: #4caf50;
            font-size: 22px;
        }

        .progress-line {
            width: 80px;
            height: 4px;
            background: #e0e0e0;
            position: relative;
            overflow: hidden;
        }

        .progress-line.active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #4caf50;
        }

        /* Form Container */
        .form-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            padding: 40px;
            display: none;
        }

        .form-container.active {
            display: block;
        }

        .form-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .form-header svg {
            color: #009688;
        }

        .form-header h2 {
            font-size: 28px;
            color: #333;
        }

        /* Form Fields */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
                font-weight: 600;
                color: #2d7783;
                margin-bottom: 8px;
                font-size: 16px;
        }

        label .required {
            color: #4caf50;
        }

        input, select, textarea {
            padding: 12px 16px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 15px;
            transition: all 0.3s;
            font-family: inherit;
            color: gray;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #b7d7d4;
            /* box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.1); */
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* Buttons */
        .btn {
            padding: 16px 32px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3375d1, #0c9eb5, #72a500);
            color: white;
            width: 100%;
            margin-top: 20px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(33, 150, 243, 0.3);
        }

        .btn-secondary {
            background: #e0e0e0;
            color: #666;
        }

        .btn-secondary:hover {
            background: #d0d0d0;
        }

        .btn:disabled {
            background: #e0e0e0;
            color: #999;
            cursor: not-allowed;
            transform: none;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .button-group .btn {
            flex: 1;
        }

        /* Search Bar */
        .search-container {
            position: relative;
            margin-bottom: 30px;
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .search-input {
            width: 100%;
            padding: 16px 16px 16px 50px;
            font-size: 16px;
        }

        /* Technician Cards */
        .technician-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
        }

        .technician-card {
            border: 3px solid #e0e0e0;
            border-radius: 12px;
            padding: 24px;
            cursor: pointer;
            transition: all 0.3s;
            background: white;
            position: relative;
        }

        .technician-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            border-color: #00a192;
        }

        .technician-card.selected {
            border-color: #4caf50;
            background: #f1f8f4;
            box-shadow: 0 8px 24px rgba(76, 175, 80, 0.2);
        }

        .technician-card.unavailable {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .technician-card.unavailable:hover {
            transform: none;
            border-color: #e0e0e0;
        }

        .card-header {
            display: flex;
            gap: 16px;
            margin-bottom: 20px;
        }

        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 4px solid #bbdefb;
        }

        .tech-info h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 8px;
        }

        .rating {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .star {
            color: #ffc107;
            font-size: 16px;
        }

        .rating-text {
            font-weight: 600;
            color: #333;
        }

        .review-count {
            color: #666;
            font-size: 14px;
        }

        .card-details {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .detail-row {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #555;
            font-size: 14px;
        }

        .detail-row svg {
            flex-shrink: 0;
        }

        .expertise-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid #e0e0e0;
        }

        .tag {
            background: #e3f2fd;
            color: #1976d2;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .completed-jobs {
            padding-top: 12px;
            border-top: 1px solid #e0e0e0;
            font-size: 14px;
            color: #666;
        }

        .completed-jobs strong {
            color: #4caf50;
            font-size: 16px;
        }

        .badge {
            position: absolute;
            top: 16px;
            right: 16px;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-unavailable {
            background: #f44336;
            color: white;
        }

        .badge-selected {
            background: #4caf50;
            color: white;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .no-results {
            text-align: center;
            padding: 60px 20px;
            color: #999;
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }

            .step-text {
                display: none;
            }

            .progress-line {
                width: 40px;
            }

            .technician-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>


        <!-- Page Title -->
        <section class="page-title" style="background-image:url({{asset('FrontendAssets/images/background/contact-banner2-Edited.jpg')}});     background-position: bottom;">
            <div class="auto-container">
                <h2>Schedule Your Installation</h2>
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Schedule Your Installation</li>
                    </ul>
                    {{--<div class="page-title_text">Whether you’re building, remodeling, buying, or selling, we bring seamless project execution under one roof.</div>--}}
                </div>
            </div>
        </section>
        <!-- End Page Title -->

	<div class="container py-5">
        <!-- Progress Steps -->
        <div class="progress-steps">
            <div class="step" id="step1Indicator">
                <div class="step-number">1</div>
                <span class="step-text">Booking Details</span>
            </div>
            <div class="progress-line" id="progressLine1"></div>
            <div class="step" id="step2Indicator">
                <div class="step-number">2</div>
                <span class="step-text">Select Technician</span>
            </div>
            <div class="progress-line" id="progressLine2"></div>
            <div class="step" id="step3Indicator">
                <div class="step-number">3</div>
                <span class="step-text">Checkout & Payment</span>
            </div>
        </div>

        <!-- Step 1: Booking Form -->
        <div class="form-container active" id="step1">
            <div class="form-header">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                <h2>Schedule Your Installation</h2>
            </div>

            @if(!$isAuthenticated || !$hasIndividualRole)
            <div style="background: #fff3cd; border: 1px solid #ffc107; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <p style="margin: 0; color: #856404;">
                    <strong>Please sign up or login</strong> to continue with your booking. Only customers can book services.
                </p>
            </div>
            @endif

            <form id="bookingForm" @if(!$isAuthenticated || !$hasIndividualRole) onsubmit="event.preventDefault(); if(typeof openSignupModal2025 === 'function') { openSignupModal2025(); } return false;" @endif>
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label>Selected Service <span class="required">*</span></label>
                        <select id="product_id" name="product_id" required>
                            <option value="">Choose your service/product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ isset($selectedProductId) && $selectedProductId == $product->id ? 'selected' : '' }}>{{ $product->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Installation Address <span class="required">*</span></label>
                        <input type="text" id="installation_address" name="installation_address" placeholder="123 Main Street" required>
                    </div>

                    <div class="form-group">
                        <label>City <span class="required">*</span></label>
                        <input type="text" id="installation_city" name="installation_city" placeholder="Your City" required autocomplete="address-level2">
                        <small id="installation_city-error" style="color: #dc3545; display: none; margin-top: 5px;"></small>
                    </div>

                    <div class="form-group">
                        <label>ZIP Code <span class="required">*</span></label>
                        <input type="text" id="zip" name="zip" placeholder="12345" required>
                    </div>

                    <div class="form-group">
                        <label>Preferred Date <span class="required">*</span></label>
                        <input type="date" id="preferred_date" name="preferred_date" required>
                    </div>

                    <div class="form-group">
                        <label>Preferred Time Range <span class="required">*</span></label>
                        <select id="preferred_time" name="preferred_time" required>
                            <option value="">Select a time range</option>
                            <option value="8:00 AM - 10:00 AM">8:00 AM - 10:00 AM</option>
                            <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
                            <option value="12:00 PM - 2:00 PM">12:00 PM - 2:00 PM</option>
                            <option value="2:00 PM - 4:00 PM">2:00 PM - 4:00 PM</option>
                            <option value="4:00 PM - 6:00 PM">4:00 PM - 6:00 PM</option>
                        </select>
                    </div>
                </div>

                <div class="form-group full-width">
                    <label>Additional Notes (Optional)</label>
                    <textarea id="notes" name="notes" placeholder="Any special instructions, site conditions, or requests..."></textarea>
                </div>
                
                <input type="hidden" id="technician_id" name="technician_id" value="">

                <button type="submit" class="btn btn-primary mt-4">Continue to Technician Selection</button>
            </form>
        </div>

        <!-- Step 2: Technician Selection -->
        <div class="form-container" id="step2">
            <div class="form-header">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="8" r="7"></circle>
                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                </svg>
                <h2>Choose Your Expert Technician</h2>
            </div>

            <!-- Search Bar -->
            <div class="search-container">
                <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" id="searchInput" class="search-input" placeholder="Search by name, specialization, or expertise...">
            </div>

            <!-- Technician Grid -->
            <div class="technician-grid" id="technicianGrid"></div>

            <div class="no-results" id="noResults" style="display: none;">
                No technicians found matching your search.
            </div>

            <!-- Action Buttons -->
            <div class="button-group">
                <button class="btn btn-secondary" id="backBtn">Back to Details</button>
                <button class="btn btn-primary" id="continueToCheckoutBtn" disabled>Continue to Checkout</button>
            </div>
        </div>

        <!-- Step 3: Checkout & Payment -->
        <div class="form-container" id="step3">
            <div class="form-header">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 7h-4m0 0V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m0 0H4m16 0v10a2 2 0 01-2 2H6a2 2 0 01-2-2V7m16 0V5a2 2 0 00-2-2H6a2 2 0 00-2 2v2"></path>
                </svg>
                <h2>Checkout & Payment</h2>
    </div>

            <!-- Order Summary -->
            <div class="checkout-summary" style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
                <h3 style="margin-top: 0; margin-bottom: 20px; color: #333;">Order Summary</h3>
                <div id="orderSummary">
                    <!-- Will be populated by JavaScript -->
                </div>
                <div style="border-top: 2px solid #ddd; margin-top: 15px; padding-top: 15px;">
                    <div style="display: flex; justify-content: space-between; font-size: 18px; font-weight: bold; color: #333;">
                        <span>Total:</span>
                        <span id="totalAmount">$0.00</span>
                    </div>
                </div>
            </div>

            <!-- Payment Form -->
            <form id="checkoutForm">
                @csrf
                <input type="hidden" id="payment_intent_id" name="payment_intent_id" value="">
                
                <!-- Stripe Elements Container -->
                <div class="form-group full-width">
                    <label>Card Information <span class="required">*</span></label>
                    <div id="card-element" style="padding: 12px; border: 2px solid #ddd; border-radius: 5px; background: white;">
                        <!-- Stripe Elements will create form elements here -->
                    </div>
                    <div id="card-errors" role="alert" style="color: #dc3545; margin-top: 8px; font-size: 14px;"></div>
                </div>

                <!-- Billing Information -->
                <div class="form-grid">
                    <div class="form-group">
                        <label>Cardholder Name <span class="required">*</span></label>
                        <input type="text" id="cardholder_name" name="cardholder_name" placeholder="John Doe" required>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="button-group">
                    <button type="button" class="btn btn-secondary" id="backToTechnicianBtn">Back to Technician Selection</button>
                    <button type="submit" class="btn btn-primary" id="payBtn">
                        <i class="fas fa-lock"></i> Pay & Confirm Booking
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Stripe.js -->
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        // Data from database
        const technicians = @json($techniciansData);
        const products = @json($products);

        // State
        let currentStep = 1;
        let selectedTechnicianId = null;
        let bookingData = {};
        
        // Function to generate star HTML based on rating
        function generateStars(rating) {
            const fullStars = Math.floor(rating);
            const hasHalfStar = (rating - fullStars) >= 0.5;
            const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);
            
            let starsHTML = '';
            for (let i = 0; i < fullStars; i++) {
                starsHTML += '<span class="star filled">★</span>';
            }
            if (hasHalfStar) {
                starsHTML += '<span class="star half">★</span>';
            }
            for (let i = 0; i < emptyStars; i++) {
                starsHTML += '<span class="star empty">☆</span>';
            }
            return starsHTML;
        }

        // DOM Elements
        const step1 = document.getElementById('step1');
        const step2 = document.getElementById('step2');
        const step3 = document.getElementById('step3');
        const step1Indicator = document.getElementById('step1Indicator');
        const step2Indicator = document.getElementById('step2Indicator');
        const step3Indicator = document.getElementById('step3Indicator');
        const progressLine1 = document.getElementById('progressLine1');
        const progressLine2 = document.getElementById('progressLine2');
        const bookingForm = document.getElementById('bookingForm');
        const checkoutForm = document.getElementById('checkoutForm');
        const searchInput = document.getElementById('searchInput');
        const technicianGrid = document.getElementById('technicianGrid');
        const noResults = document.getElementById('noResults');
        const backBtn = document.getElementById('backBtn');
        const continueToCheckoutBtn = document.getElementById('continueToCheckoutBtn');
        const backToTechnicianBtn = document.getElementById('backToTechnicianBtn');
        const payBtn = document.getElementById('payBtn');
        
        // Stripe variables
        let stripe = null;
        let cardElement = null;
        let paymentIntentClientSecret = null;

        // Set minimum date to today
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('preferred_date').setAttribute('min', today);
        
        // Auto-select product if product_id is provided in URL
        @if(isset($selectedProductId) && $selectedProductId)
            document.getElementById('product_id').value = {{ $selectedProductId }};
        @endif
        
        // Store form values in real-time as backup
        const formValuesBackup = {
            installation_city: '',
            installation_address: '',
            zip: '',
            product_id: '',
            preferred_date: '',
            preferred_time: '',
            notes: ''
        };
        
        // Add real-time validation feedback for city field and backup values
        const cityInputField = document.getElementById('installation_city');
        if (cityInputField) {
            cityInputField.addEventListener('input', function() {
                const value = this.value;
                formValuesBackup.installation_city = value; // Store raw value
                const trimmedValue = value.trim();
                const errorElement = document.getElementById('installation_city-error');
                if (trimmedValue.length === 0) {
                    this.style.borderColor = '#dc3545';
                    if (errorElement) {
                        errorElement.textContent = 'City is required';
                        errorElement.style.display = 'block';
                    }
                } else {
                    this.style.borderColor = '';
                    if (errorElement) {
                        errorElement.style.display = 'none';
                    }
                }
                console.log('City field changed - Value:', trimmedValue, 'Length:', trimmedValue.length, 'Backup stored:', formValuesBackup.installation_city);
            });
            
            cityInputField.addEventListener('blur', function() {
                const value = this.value;
                formValuesBackup.installation_city = value; // Update backup on blur
                const trimmedValue = value.trim();
                console.log('City field blurred - Value:', trimmedValue, 'Length:', trimmedValue.length, 'Backup:', formValuesBackup.installation_city);
                if (trimmedValue.length === 0) {
                    this.style.borderColor = '#dc3545';
                } else {
                    this.style.borderColor = '';
                }
            });
        }
        
        // Backup other form fields too
        const installationAddressInput = document.getElementById('installation_address');
        if (installationAddressInput) {
            installationAddressInput.addEventListener('input', function() {
                formValuesBackup.installation_address = this.value;
            });
            installationAddressInput.addEventListener('blur', function() {
                formValuesBackup.installation_address = this.value;
            });
        }
        
        const zipInput = document.getElementById('zip');
        if (zipInput) {
            zipInput.addEventListener('input', function() {
                formValuesBackup.zip = this.value;
            });
            zipInput.addEventListener('blur', function() {
                formValuesBackup.zip = this.value;
            });
        }

        // Step 1: Form Submission
        bookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Check if user is authenticated
            @if(!$isAuthenticated || !$hasIndividualRole)
                // Open signup modal if not authenticated
                if (typeof openSignupModal2025 === 'function') {
                    openSignupModal2025();
                    return false;
                }
                return false;
            @endif
            
            // Get form elements FIRST before any validation
            const cityInput = document.getElementById('installation_city');
            const installationAddressInput = document.getElementById('installation_address');
            const zipInput = document.getElementById('zip');
            const productSelect = document.getElementById('product_id');
            const preferredDateInput = document.getElementById('preferred_date');
            const preferredTimeSelect = document.getElementById('preferred_time');
            const notesTextarea = document.getElementById('notes');
            
            // Check if elements exist
            if (!cityInput || !installationAddressInput || !zipInput) {
                console.error('Form elements not found');
                console.error('City input:', cityInput);
                console.error('Installation address input:', installationAddressInput);
                console.error('ZIP input:', zipInput);
                alert('Form error: Please refresh the page and try again.');
                return false;
            }
            
            // Get the city value - use backup first, then input value
            const cityRawValue = formValuesBackup.installation_city || cityInput.value || '';
            const cityValue = String(cityRawValue).trim();
            
            console.log('City backup value:', formValuesBackup.installation_city);
            console.log('City input value:', cityInput.value);
            console.log('Final city value used:', cityValue);
            
            // Use backup values if input values are empty
            const installationAddressRawValue = formValuesBackup.installation_address || installationAddressInput.value || '';
            const installationAddressValue = installationAddressRawValue.trim();
            const zipRawValue = formValuesBackup.zip || zipInput.value || '';
            const zipValue = zipRawValue.trim();
            
            // Debug logging
            console.log('=== FORM SUBMISSION DEBUG ===');
            console.log('City raw value:', cityRawValue);
            console.log('City trimmed value:', cityValue);
            console.log('City value length:', cityValue.length);
            console.log('Installation Address:', installationAddressValue);
            console.log('ZIP:', zipValue);
            console.log('=== END DEBUG ===');
            
            // Check HTML5 validation AFTER we've captured the values
            if (!bookingForm.checkValidity()) {
                console.log('HTML5 validation failed');
                bookingForm.reportValidity();
                return false;
            }
            
            // Validate required fields with better error messages
            if (cityValue === '' || cityValue.length === 0) {
                alert('Please enter a city name.');
                cityInput.focus();
                cityInput.style.borderColor = '#dc3545';
                setTimeout(() => {
                    cityInput.style.borderColor = '';
                }, 3000);
                return false;
            }
            
            if (installationAddressValue === '' || installationAddressValue.length === 0) {
                alert('Please enter an installation address.');
                installationAddressInput.focus();
                installationAddressInput.style.borderColor = '#dc3545';
                setTimeout(() => {
                    installationAddressInput.style.borderColor = '';
                }, 3000);
                return false;
            }
            
            if (zipValue === '' || zipValue.length === 0) {
                alert('Please enter a ZIP code.');
                zipInput.focus();
                zipInput.style.borderColor = '#dc3545';
                setTimeout(() => {
                    zipInput.style.borderColor = '';
                }, 3000);
                return false;
            }
            
            // Reset border colors if validation passes
            cityInput.style.borderColor = '';
            installationAddressInput.style.borderColor = '';
            zipInput.style.borderColor = '';
            
            // Store booking data
            bookingData = {
                product_id: productSelect ? productSelect.value : '',
                installation_address: installationAddressValue,
                installation_city: cityValue,
                zip: zipValue,
                preferred_date: preferredDateInput ? preferredDateInput.value : '',
                preferred_time: preferredTimeSelect ? preferredTimeSelect.value : '',
                notes: notesTextarea ? (notesTextarea.value || '').trim() : ''
            };
            
            console.log('Booking data stored:', bookingData);

            goToStep(2);
        });

        // Navigation
        function goToStep(step) {
            // Check authentication before allowing step 2 or 3
            @if(!$isAuthenticated || !$hasIndividualRole)
                if (step === 2 || step === 3) {
                    // Prevent going to step 2 or 3 if not authenticated
                    if (typeof openSignupModal2025 === 'function') {
                        openSignupModal2025();
                    }
                    return false;
                }
            @endif
            
            currentStep = step;

            if (step === 1) {
                step1.classList.add('active');
                step2.classList.remove('active');
                step3.classList.remove('active');
                step1Indicator.classList.add('active');
                step2Indicator.classList.remove('active');
                step3Indicator.classList.remove('active');
                progressLine1.classList.remove('active');
                progressLine2.classList.remove('active');
            } else if (step === 2) {
                step1.classList.remove('active');
                step2.classList.add('active');
                step3.classList.remove('active');
                step1Indicator.classList.add('active');
                step2Indicator.classList.add('active');
                step3Indicator.classList.remove('active');
                progressLine1.classList.add('active');
                progressLine2.classList.remove('active');
                renderTechnicians(technicians);
            } else if (step === 3) {
                step1.classList.remove('active');
                step2.classList.remove('active');
                step3.classList.add('active');
                step1Indicator.classList.add('active');
                step2Indicator.classList.add('active');
                step3Indicator.classList.add('active');
                progressLine1.classList.add('active');
                progressLine2.classList.add('active');
                updateOrderSummary();
                initializeStripe();
            }
        }

        backBtn.addEventListener('click', () => goToStep(1));
        backToTechnicianBtn.addEventListener('click', () => goToStep(2));

        // Render Technicians
        function renderTechnicians(techList) {
            technicianGrid.innerHTML = '';

            if (techList.length === 0) {
                noResults.style.display = 'block';
                return;
            }

            noResults.style.display = 'none';

            techList.forEach(tech => {
                const card = document.createElement('div');
                card.className = `technician-card ${!tech.available ? 'unavailable' : ''} ${selectedTechnicianId === tech.id ? 'selected' : ''}`;
                
                card.innerHTML = `
                    ${!tech.available ? '<div class="badge badge-unavailable">Unavailable</div>' : ''}
                    ${selectedTechnicianId === tech.id ? `
                        <div class="badge badge-selected">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Selected
                        </div>
                    ` : ''}
                    
                    <div class="card-header">
                        <img src="${tech.avatar}" alt="${tech.name}" class="avatar">
                        <div class="tech-info">
                            <h3>${tech.name}</h3>
                            <div class="rating">
                                ${generateStars(tech.rating)}
                                <span class="rating-text">${tech.rating}</span>
                                <span class="review-count">(${tech.reviews} ${tech.reviews === 1 ? 'review' : 'reviews'})</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-details">
                        <div class="detail-row">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2196f3" stroke-width="2">
                                <circle cx="12" cy="8" r="7"></circle>
                                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                            </svg>
                            <strong>${tech.experience} Experience</strong>
                        </div>

                        <div class="detail-row">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4caf50" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>${tech.specialization}</span>
                        </div>

                        <div class="detail-row">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ff9800" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <span>Response: ${tech.responseTime}</span>
                        </div>

                        <div class="expertise-tags">
                            ${tech.expertise.map(exp => `<span class="tag">${exp}</span>`).join('')}
                        </div>

                        <div class="completed-jobs">
                            <strong>${tech.completedJobs}</strong> Completed Installations
                        </div>
                    </div>
                `;

                if (tech.available) {
                    card.addEventListener('click', () => selectTechnician(tech.id));
                }

                technicianGrid.appendChild(card);
            });
        }

        // Search Functionality
        searchInput.addEventListener('input', function(e) {
            const query = e.target.value.toLowerCase();
            
            const filtered = technicians.filter(tech => 
                tech.name.toLowerCase().includes(query) ||
                tech.specialization.toLowerCase().includes(query) ||
                tech.expertise.some(exp => exp.toLowerCase().includes(query))
            );

            renderTechnicians(filtered);
        });

        // Select Technician
        function selectTechnician(id) {
            selectedTechnicianId = id;
            document.getElementById('technician_id').value = id;
            continueToCheckoutBtn.disabled = false;
            renderTechnicians(searchInput.value ? 
                technicians.filter(tech => 
                    tech.name.toLowerCase().includes(searchInput.value.toLowerCase()) ||
                    tech.specialization.toLowerCase().includes(searchInput.value.toLowerCase()) ||
                    tech.expertise.some(exp => exp.toLowerCase().includes(searchInput.value.toLowerCase()))
                ) : technicians
            );
        }

        // Continue to Checkout Button
        continueToCheckoutBtn.addEventListener('click', function() {
            if (!selectedTechnicianId) {
                alert('Please select a technician');
                return;
            }
            goToStep(3);
        });

        // Update Order Summary
        function updateOrderSummary() {
            const productId = parseInt(bookingData.product_id);
            const technicianId = parseInt(selectedTechnicianId);
            
            // Get product details
            const selectedProduct = products.find(p => parseInt(p.id) === productId);
            const selectedTechnician = technicians.find(t => parseInt(t.id) === technicianId);
            
            const orderSummary = document.getElementById('orderSummary');
            const totalAmount = document.getElementById('totalAmount');
            
            if (selectedProduct) {
                const amount = parseFloat(selectedProduct.price || 0);
                orderSummary.innerHTML = `
                    <div class="checkout-summary-item">
                        <span><strong>Service:</strong> ${selectedProduct.title}</span>
                    </div>
                    ${selectedTechnician ? `
                    <div class="checkout-summary-item">
                        <span><strong>Technician:</strong> ${selectedTechnician.name}</span>
                    </div>
                    ` : ''}
                    <div class="checkout-summary-item">
                        <span><strong>Installation Address:</strong> ${bookingData.installation_address}, ${bookingData.installation_city}, ${bookingData.zip}</span>
                    </div>
                    <div class="checkout-summary-item">
                        <span><strong>Date:</strong> ${bookingData.preferred_date}</span>
                    </div>
                    <div class="checkout-summary-item">
                        <span><strong>Time:</strong> ${bookingData.preferred_time}</span>
                    </div>
                `;
                totalAmount.textContent = `$${amount.toFixed(2)}`;
                bookingData.amount = amount;
            }
        }
        
        // Initialize Stripe
        function initializeStripe() {
            if (typeof Stripe === 'undefined') {
                // Load Stripe.js
                const script = document.createElement('script');
                script.src = 'https://js.stripe.com/v3/';
                script.onload = function() {
                    setupStripe();
                };
                document.head.appendChild(script);
            } else {
                setupStripe();
            }
        }
        
        function setupStripe() {
            const stripeKey = '{{ config("services.stripe.key") }}';
            if (!stripeKey) {
                console.error('Stripe key not configured');
                return;
            }
            
            stripe = Stripe(stripeKey);
            const elements = stripe.elements();
            
            // Create card element
            cardElement = elements.create('card', {
                style: {
                    base: {
                        fontSize: '16px',
                        color: '#424770',
                        '::placeholder': {
                            color: '#aab7c4',
                        },
                    },
                    invalid: {
                        color: '#9e2146',
                    },
                },
            });
            
            cardElement.mount('#card-element');
            
            // Handle real-time validation errors
            cardElement.on('change', function(event) {
                const displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
        }
        
        // Checkout Form Submission
        checkoutForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            if (!stripe || !cardElement) {
                alert('Payment system is not ready. Please wait a moment and try again.');
                return;
            }
            
            const payBtn = document.getElementById('payBtn');
            const originalText = payBtn.innerHTML;
            payBtn.disabled = true;
            payBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing Payment...';
            
            try {
                // Create payment intent
                const response = await fetch('{{ route("booking.create-payment-intent") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        amount: bookingData.amount,
                        product_id: bookingData.product_id,
                        technician_id: selectedTechnicianId,
                        installation_address: bookingData.installation_address,
                            installation_city: bookingData.installation_city,
                        zip: bookingData.zip,
                        preferred_date: bookingData.preferred_date,
                        preferred_time: bookingData.preferred_time,
                        notes: bookingData.notes,
                        cardholder_name: document.getElementById('cardholder_name').value
                    })
                });
                
                const data = await response.json();
                
                if (!data.success) {
                    throw new Error(data.message || 'Failed to create payment intent');
                }
                
                paymentIntentClientSecret = data.client_secret;
                document.getElementById('payment_intent_id').value = data.payment_intent_id;
                
                // Confirm payment with Stripe
                const {error, paymentIntent} = await stripe.confirmCardPayment(paymentIntentClientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: document.getElementById('cardholder_name').value,
                        },
                    },
                });
                
                if (error) {
                    throw new Error(error.message);
                }
                
                if (paymentIntent.status === 'succeeded') {
                    // Validate booking data before sending confirmation
                    if (!bookingData.installation_city || !bookingData.installation_city.trim()) {
                        throw new Error('City is required. Please go back and fill in all required fields.');
                    }
                    
                    if (!bookingData.installation_address || !bookingData.installation_address.trim()) {
                        throw new Error('Installation address is required. Please go back and fill in all required fields.');
                    }
                    
                    if (!bookingData.zip || !bookingData.zip.trim()) {
                        throw new Error('ZIP code is required. Please go back and fill in all required fields.');
                    }
                    
                    // Payment succeeded, confirm booking
                    const confirmResponse = await fetch('{{ route("booking.confirm") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify({
                            payment_intent_id: data.payment_intent_id,
                            product_id: bookingData.product_id,
                            technician_id: selectedTechnicianId,
                            installation_address: bookingData.installation_address.trim(),
                            installation_city: bookingData.installation_city.trim(),
                            zip: bookingData.zip.trim(),
                            preferred_date: bookingData.preferred_date,
                            preferred_time: bookingData.preferred_time,
                            notes: (bookingData.notes || '').trim(),
                            amount: bookingData.amount,
                            payment_method: 'stripe',
                        })
                    });
                    
                    const confirmData = await confirmResponse.json();
                    
                    if (confirmData.success) {
                        // Redirect to success page
                        if (confirmData.redirect_url) {
                            window.location.href = confirmData.redirect_url;
                        } else {
                            window.location.href = '{{ route("home") }}';
                        }
                    } else {
                        throw new Error(confirmData.message || 'Failed to confirm booking');
                    }
                }
            } catch (error) {
                console.error('Payment error:', error);
                alert(error.message || 'Payment failed. Please try again.');
                payBtn.disabled = false;
                payBtn.innerHTML = originalText;
            }
        });

        // Initialize
        step1Indicator.classList.add('active');
        
        // Open signup modal if user is not authenticated
        @if(isset($openSignupModal) && $openSignupModal)
            window.addEventListener('load', function() {
                if (typeof openSignupModal2025 === 'function') {
                    openSignupModal2025();
                }
            });
        @endif
    </script>

@endsection

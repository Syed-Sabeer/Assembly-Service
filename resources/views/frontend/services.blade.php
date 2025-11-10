@extends('layouts.frontend.master')


@section('css')
@endsection

@section('content')

	<!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset('FrontendAssets/images/background/banner.jpg')}})">
        <div class="auto-container">
			<h2>Our Services</h2>
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<ul class="bread-crumb clearfix">
					<li><a href="{{route('home')}}">Home</a></li>
					<li>Services</li>
				</ul>
				<div class="page-title_text">Whether you’re building, remodeling, buying, or selling, we bring seamless project execution under one roof.</div>
			</div>
        </div>
    </section>
    <!-- End Page Title -->
	
	<!-- Service Three / Style Two -->
	<section class="service-three style-two">
		<div class="outer-container" style="background-image:url({{asset('FrontendAssets/images/background/service-three_pattern.png')}})">
			<div class="auto-container">
				<div class="sec-title centered">
					<div class="sec-title_title">Our services</div>
					<h2 class="sec-title_heading">Assembly & Installation <br>  Solutions</h2>
				</div>
				
				<div class="row clearfix" style="justify-content: center;" >
					
			@foreach($services as $service)
					<!-- Service Block Three -->
					<div class="service-block_three col-lg-4 col-md-6 col-sm-12">
						<div class="service-block_three-inner">
							<div class="service-block_three_hover-image" style="background-image:url({{asset($service->bg_image)}})"></div>
							<div class="service-block_three-pattern" style="background-image:url({{asset($service->bg_image)}})"></div>
							<div class="service-block_three-upper">
								<div class="service-block_three-icon">
									<img src="{{asset($service->image)}}" alt="" />
								</div>
								<h4 class="service-block_three-heading"><a href="/service-details">{{ $service->heading }}</a></h4>
							</div>
							<div class="service-block_three-text" style="color:#ffff;">{!! $service->description !!}</div>
							<a href="/service-details" class="service-block_three-more">
								Get Started <i class="fa-classic fa-solid fa-arrow-right fa-fw"></i>
							</a>
						</div>
					</div>
					@endforeach
					
				
				
					
				</div>
				
				<div class="service-three_btn text-center" id="ca-get-started" >
					<!-- <a href="javascript:;" class="theme-btn btn-style-three" onclick="showSection('ca-catalogue')" >
						<span class="btn-wrap">
							<span class="text-one">Get Started <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
							<span class="text-two">Get Started <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
						</span>
					</a>-->
					        <!-- Service Catalogue Section -->
						<div class="ca-section" id="ca-catalogue">
							<div class="ca-catalogue-section">
								<div class="ca-section-header">
									<h2 class="ca-section-title"> Our Services</h2>
									<p class="ca-section-description">Select a service to request a quote</p>
								</div>

								<div class="ca-products-grid">
									<div class="ca-product-card" onclick="selectProduct(this, 'Wooden Swing Set Assembly', 'fas fa-child', 'Swing Set Installation')">
										<span class="ca-selected-badge"><i class="fas fa-check"></i> Selected</span>
										<div class="ca-product-icon"><i class="fas fa-child"></i></div>
										<h3 class="ca-product-name">Wooden Swing Set Assembly</h3>
										<p class="ca-product-description">Professional installation of wooden swing sets, playsets, and outdoor play structures with precision and safety as our priority.</p>
										<div class="ca-product-includes">
											<h4><i class="fas fa-list-check"></i> INCLUDES:</h4>
											<ul>
												<li><i class="fas fa-circle-check"></i> Complete assembly</li>
												<li><i class="fas fa-circle-check"></i> Safety inspection</li>
												<li><i class="fas fa-circle-check"></i> Anchoring & leveling</li>
												<li><i class="fas fa-circle-check"></i> Hardware check</li>
											</ul>
										</div>
									</div>

									<div class="ca-product-card" onclick="selectProduct(this, 'Playset Relocation Service', 'fas fa-truck-moving', 'Playset Moving')">
										<span class="ca-selected-badge"><i class="fas fa-check"></i> Selected</span>
										<div class="ca-product-icon"><i class="fas fa-truck-moving"></i></div>
										<h3 class="ca-product-name">Playset Relocation Service</h3>
										<p class="ca-product-description">Now offering used playset relocation! We carefully disassemble, transport, and reassemble your existing playset at a new location.</p>
										<div class="ca-product-includes">
											<h4><i class="fas fa-list-check"></i> INCLUDES:</h4>
											<ul>
												<li><i class="fas fa-circle-check"></i> Safe disassembly</li>
												<li><i class="fas fa-circle-check"></i> Transportation</li>
												<li><i class="fas fa-circle-check"></i> Reassembly at new site</li>
												<li><i class="fas fa-circle-check"></i> Structural inspection</li>
											</ul>
										</div>
									</div>

									<div class="ca-product-card" onclick="selectProduct(this, 'Basketball Goal Installation', 'fas fa-basketball', 'Basketball Goal Setup')">
										<span class="ca-selected-badge"><i class="fas fa-check"></i> Selected</span>
										<div class="ca-product-icon"><i class="fas fa-basketball"></i></div>
										<h3 class="ca-product-name">Basketball Goal Installation</h3>
										<p class="ca-product-description">Expert assembly and installation of in-ground, portable, and wall-mounted basketball goals for your home or facility.</p>
										<div class="ca-product-includes">
											<h4><i class="fas fa-list-check"></i> INCLUDES:</h4>
											<ul>
												<li><i class="fas fa-circle-check"></i> Goal assembly</li>
												<li><i class="fas fa-circle-check"></i> Height adjustment setup</li>
												<li><i class="fas fa-circle-check"></i> Backboard mounting</li>
												<li><i class="fas fa-circle-check"></i> Stability testing</li>
											</ul>
										</div>
									</div>

									<div class="ca-product-card" onclick="selectProduct(this, 'Exercise Equipment Assembly', 'fas fa-dumbbell', 'Fitness Equipment Setup')">
										<span class="ca-selected-badge"><i class="fas fa-check"></i> Selected</span>
										<div class="ca-product-icon"><i class="fas fa-dumbbell"></i></div>
										<h3 class="ca-product-name">Exercise Equipment Assembly</h3>
										<p class="ca-product-description">Professional assembly of treadmills, ellipticals, weight benches, home gyms, and all types of fitness equipment.</p>
										<div class="ca-product-includes">
											<h4><i class="fas fa-list-check"></i> INCLUDES:</h4>
											<ul>
												<li><i class="fas fa-circle-check"></i> Full assembly</li>
												<li><i class="fas fa-circle-check"></i> Calibration</li>
												<li><i class="fas fa-circle-check"></i> Safety testing</li>
												<li><i class="fas fa-circle-check"></i> Debris removal</li>
											</ul>
										</div>
									</div>

									<div class="ca-product-card" onclick="selectProduct(this, 'Outdoor Furniture Assembly', 'fas fa-couch', 'Furniture Setup')">
										<span class="ca-selected-badge"><i class="fas fa-check"></i> Selected</span>
										<div class="ca-product-icon"><i class="fas fa-couch"></i></div>
										<h3 class="ca-product-name">Outdoor Furniture Assembly</h3>
										<p class="ca-product-description">Assembly of patio sets, gazebos, pergolas, sheds, and other outdoor structures with attention to detail.</p>
										<div class="ca-product-includes">
											<h4><i class="fas fa-list-check"></i> INCLUDES:</h4>
											<ul>
												<li><i class="fas fa-circle-check"></i> Complete assembly</li>
												<li><i class="fas fa-circle-check"></i> Weather-resistant setup</li>
												<li><i class="fas fa-circle-check"></i> Anchoring (if needed)</li>
												<li><i class="fas fa-circle-check"></i> Quality check</li>
											</ul>
										</div>
									</div>

									<div class="ca-product-card" onclick="selectProduct(this, 'General Assembly Services', 'fas fa-toolbox', 'Custom Assembly')">
										<span class="ca-selected-badge"><i class="fas fa-check"></i> Selected</span>
										<div class="ca-product-icon"><i class="fas fa-toolbox"></i></div>
										<h3 class="ca-product-name">General Assembly Services</h3>
										<p class="ca-product-description">We assemble all types of items! Grills, trampolines, pool tables, and any other assembly needs you have.</p>
										<div class="ca-product-includes">
											<h4><i class="fas fa-list-check"></i> INCLUDES:</h4>
											<ul>
												<li><i class="fas fa-circle-check"></i> Custom assembly</li>
												<li><i class="fas fa-circle-check"></i> Professional tools</li>
												<li><i class="fas fa-circle-check"></i> Cleanup service</li>
												<li><i class="fas fa-circle-check"></i> Satisfaction guaranteed</li>
											</ul>
										</div>
									</div>
								</div>

								<div class="ca-action-buttons">
									<button class="ca-btn ca-btn-secondary" onclick="showSection('ca-get-started')">
										<i class="fas fa-arrow-left"></i> Back
									</button>
									<button class="ca-btn ca-btn-primary" onclick="proceedToQuotation()">
										Continue to Quote Request <i class="fas fa-arrow-right"></i>
									</button>
								</div>
							</div>
						</div>

						<!-- Quotation Form Section -->
						<div class="ca-section" id="ca-quotation">
							<div class="ca-quotation-form">
								<div class="ca-section-header">
									<h2 class="ca-section-title"><i class="fas fa-file-contract"></i> Request a Quote</h2>
									<p class="ca-section-description">Fill out the form below and we'll send you a confirmation email</p>
								</div>

								<div class="ca-selected-product-info" id="ca-selected-info">
									<div class="ca-selected-product-icon">
										<i class="fas fa-child"></i>
									</div>
									<div class="ca-selected-product-details">
										<h3 id="ca-selected-name">Wooden Swing Set Assembly</h3>
										<p id="ca-selected-type">Swing Set Installation</p>
									</div>
								</div>

								<div class="ca-info-box">
									<i class="fas fa-info-circle"></i>
									<strong>Note:</strong> After submitting, you'll receive a confirmation email with your quote request details. We'll follow up within 24 hours with pricing and availability.
								</div>

								<form id="ca-quotation-form-element">
									<div class="ca-form-grid">
										<div class="ca-form-group">
											<label class="ca-form-label">
												<i class="fas fa-user"></i> Full Name <span class="ca-required">*</span>
											</label>
											<input type="text" class="ca-form-input" name="fullName" required placeholder="John Doe">
										</div>

										<div class="ca-form-group">
											<label class="ca-form-label">
												<i class="fas fa-envelope"></i> Email Address <span class="ca-required">*</span>
											</label>
											<input type="email" class="ca-form-input" name="email" required placeholder="john@example.com">
										</div>

										<div class="ca-form-group">
											<label class="ca-form-label">
												<i class="fas fa-phone"></i> Phone Number <span class="ca-required">*</span>
											</label>
											<input type="tel" class="ca-form-input" name="phone" required placeholder="(123) 456-7890">
										</div>

										<div class="ca-form-group">
											<label class="ca-form-label">
												<i class="fas fa-map-marker-alt"></i> Service Location (City, State) <span class="ca-required">*</span>
											</label>
											<input type="text" class="ca-form-input" name="location" required placeholder="Dallas, TX">
										</div>

										<div class="ca-form-group ca-form-full">
											<label class="ca-form-label">
												<i class="fas fa-home"></i> Complete Address <span class="ca-required">*</span>
											</label>
											<input type="text" class="ca-form-input" name="address" required placeholder="123 Main Street, Apartment 4B">
										</div>

										<div class="ca-form-group">
											<label class="ca-form-label">
												<i class="fas fa-calendar"></i> Preferred Service Date
											</label>
											<input type="date" class="ca-form-input" name="preferredDate">
										</div>

										<div class="ca-form-group">
											<label class="ca-form-label">
												<i class="fas fa-clock"></i> Preferred Time
											</label>
											<select class="ca-form-select" name="preferredTime">
												<option value="">Select Time</option>
												<option value="morning">Morning (8AM - 12PM)</option>
												<option value="afternoon">Afternoon (12PM - 4PM)</option>
												<option value="evening">Evening (4PM - 7PM)</option>
												<option value="flexible">Flexible</option>
											</select>
										</div>

										<div class="ca-form-group ca-form-full">
											<label class="ca-form-label">
												<i class="fas fa-box"></i> Product Brand/Model (if known)
											</label>
											<input type="text" class="ca-form-input" name="productModel" placeholder="e.g., Backyard Discovery, Lifetime, Spalding">
										</div>

										<div class="ca-form-group ca-form-full">
											<label class="ca-form-label">
												<i class="fas fa-comment-dots"></i> Project Details <span class="ca-required">*</span>
											</label>
											<textarea class="ca-form-textarea" name="details" required placeholder="Please describe your assembly needs, dimensions, special requirements, or any concerns..."></textarea>
										</div>

										<div class="ca-form-group ca-form-full">
											<label class="ca-form-label">
												<i class="fas fa-image"></i> Upload Photos (Optional)
											</label>
											<div class="ca-file-upload" onclick="document.getElementById('ca-file-input').click()">
												<i class="fas fa-cloud-upload-alt"></i>
												<p>Click to upload photos of the item or installation area</p>
												<small style="color: #999;">Supports: JPG, PNG, PDF (Max 5MB)</small>
												<input type="file" id="ca-file-input" accept="image/*,.pdf" multiple onchange="handleFileUpload(this)">
												<div class="ca-file-name" id="ca-file-name"></div>
											</div>
										</div>

										<div class="ca-form-group ca-form-full">
											<div class="ca-checkbox-group">
												<input type="checkbox" id="ca-urgent" name="urgent">
												<label for="ca-urgent">
													<i class="fas fa-bolt"></i> This is an urgent request (within 48 hours)
												</label>
											</div>
										</div>

										<div class="ca-form-group ca-form-full">
											<div class="ca-checkbox-group">
												<input type="checkbox" id="ca-confirmation" name="confirmation" required>
												<label for="ca-confirmation">
													<span class="ca-required">*</span> I confirm that the information provided is accurate and I agree to receive a confirmation email
												</label>
											</div>
										</div>
									</div>

									<div class="ca-action-buttons">
										<button type="button" class="ca-btn ca-btn-secondary" onclick="showSection('ca-catalogue')">
											<i class="fas fa-arrow-left"></i> Back to Services
										</button>
										<button type="submit" class="ca-btn ca-btn-primary" id="ca-submit-btn">
											<i class="fas fa-paper-plane"></i> Submit Quote Request
										</button>
									</div>
								</form>

								<div class="ca-success-message" id="ca-success-msg">
									<div class="ca-success-icon">
										<i class="fas fa-check-circle"></i>
									</div>
									<h3>Quote Request Submitted Successfully!</h3>
									<p style="font-size: 1.1rem; margin-bottom: 20px;">
										We've received your request and sent a confirmation email to <strong id="ca-customer-email"></strong>
									</p>
									
									<div class="ca-email-preview">
										<h4><i class="fas fa-envelope"></i> Confirmation Email Preview:</h4>
										<hr style="margin: 15px 0; border: 1px solid #e0e0e0;">
										<p style="margin-bottom: 10px;"><strong>Subject:</strong> Assembly Service Quote Request Confirmation</p>
										<p style="margin-bottom: 15px;"><strong>Dear <span id="ca-preview-name"></span>,</strong></p>
										<p style="line-height: 1.8; color: #666;">
											Thank you for requesting a quote from our assembly services! We have received your request for <strong id="ca-preview-service"></strong> and will review it shortly.
										</p>
										<div style="background: #f8f8f8; padding: 15px; margin: 15px 0; border-radius: 5px;">
											<p style="margin: 5px 0;"><strong>Service:</strong> <span id="ca-preview-service2"></span></p>
											<p style="margin: 5px 0;"><strong>Location:</strong> <span id="ca-preview-location"></span></p>
											<p style="margin: 5px 0;"><strong>Preferred Date:</strong> <span id="ca-preview-date"></span></p>
											<p style="margin: 5px 0;"><strong>Contact:</strong> <span id="ca-preview-phone"></span></p>
										</div>
										<p style="line-height: 1.8; color: #666;">
											Our team will contact you within 24 hours with a detailed quote and to discuss scheduling. If you have any immediate questions, please don't hesitate to reach out.
										</p>
										<p style="margin-top: 15px; color: #666;"><strong>Best regards,</strong><br>Assembly Services Team</p>
									</div>

									<button class="ca-btn ca-btn-primary" onclick="resetForm()" style="margin-top: 30px;">
										<i class="fas fa-home"></i> Return to Home
									</button>
								</div>
							</div>
						</div>
				</div>

				
			</div>
		</div>
	</section>
	<!-- End Service Three -->
	
	<!-- Program One -->
	<section class="service-one">
			<div class="service-one_shadow"></div>
			<div class="auto-container">
				<div class="inner-container">
					<div class="service-one_pattern-layer"
						style="background-image:url({{asset('FrontendAssets/images/background/pattern-2.png')}})"></div>
					<div class="row clearfix">

						<!-- Content Column -->
						<div class="service-one_content-column col-lg-7 col-md-12 col-sm-12">
							<div class="service-one_content-outer">
								<!-- Sec Title -->
								<div class="sec-title light title-anim">
									<div class="sec-title_title">
										 Services
									</div>
									<h2 class="sec-title_heading">Construction Service To Our Clients</h2>
								</div>
								<div class="service-one_titles">
								@foreach($services as $index => $service)
    <div class="service-one_title {{ $index === 0 ? 'active' : '' }}">
        <h4 class="service-one_heading {{ $index > 0 ? \Illuminate\Support\Arr::get(['', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight'], $index, 'extra') : '' }}">
            <a href="javascript:;">{{ $service->heading ?? 'Untitled Service' }}</a>
        </h4>
        <!-- Optional arrow -->
        <!--
        <a class="service-one_arrow" href="javascript:;">
            <i class="fa-classic fa-solid fa-arrow-right fa-fw"></i>
        </a>
        -->
    </div>
@endforeach

							
								</div>
							</div>
						</div>

						<!-- Image Column -->
						<div class="service-one_image-column col-lg-5 col-md-12 col-sm-12">
							<div class="service-one_image-outer">
								<div class="service-one_images_outer">
              @foreach($services as $index => $service)
    <div class="service-one_image {{ $index === 0 ? 'active' : 'item-' . $index }}">
        <img src="{{ asset($service->bg_image ?? 'FrontendAssets/images/resource/default.jpg') }}" alt="{{ $service->title ?? 'Service' }}" />
        <div class="service-one_content">
            
            <!-- Button Box -->
            <div class="service-one_button">
                <a href="{{ $service->link ?? 'javascript:;' }}" class="theme-btn btn-style-three">
                    <span class="btn-wrap">
                        <span class="text-one">
                            Discover More 
                            <i><img src="{{ asset('FrontendAssets/images/icons/arrow-1.svg') }}" alt="" /></i>
                        </span>
                        <span class="text-two">
                            Discover More 
                            <i><img src="{{ asset('FrontendAssets/images/icons/arrow-1.svg') }}" alt="" /></i>
                        </span>
                    </span>
                </a>
            </div>

            <!-- Title -->
            <h3 class="service-one_sub-title">{{ $service->heading ?? 'Untitled Service' }}</h3>

            <!-- Description -->
            <div class="service-one_text">{!! $service->description ?? 'No description available.' !!}</div>
        </div>
    </div>
@endforeach


								</div>

							</div>
						</div>

					</div>
				</div>
			</div>
	</section>
	<!-- End Program One -->
	
	<!-- Team One -->
	<section class="team-one d-none">
		<div class="team-one_pattern" style="background-image:url({{asset('FrontendAssets/images/background/pattern-7.png')}})"></div>
		<div class="auto-container">
			<div class="sec-title centered">
				<div class="sec-title_title">Our Expert Member</div>
				<h2 class="sec-title_heading">You Meet Expert Our <br> Leadership</h2>
			</div>
			<div class="three-item_carousel swiper-container">
				<div class="swiper-wrapper">

					<!-- Slide -->
					<div class="swiper-slide">
				
						<!-- Team Block One -->
						<div class="team-block_one">
							<div class="team-block_one-inner">
								<div class="team-block_one-image">
									<div class="team-block_one-shares">
										<div class="team-block_one-share_icon fa-classic fa-solid fa-share-nodes fa-fw"></div>
										<!-- Social Box -->
										<div class="team-block_one-socials">
											<a href="https://facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
											<a href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a>
											<a href="https://youtube.com/"><i class="fa-brands fa-youtube"></i></a>
											<a href="https://instagram.com/"><i class="fa-brands fa-instagram"></i></a>
										</div>
									</div>
									<img src="{{asset('FrontendAssets/images/resource/team-1.jpg')}}" alt="" />
									<div class="team-block_one-content">
										<h4 class="team-block_one-title"><a href="team-detail.html">Penelopa Miller</a></h4>
										<div class="team-block_one-designation">Cheif Financial officer</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
					<!-- Slide -->
					<div class="swiper-slide">
						<!-- Team Block One -->
						<div class="team-block_one">
							<div class="team-block_one-inner">
								<div class="team-block_one-image">
									<div class="team-block_one-shares">
										<div class="team-block_one-share_icon fa-classic fa-solid fa-share-nodes fa-fw"></div>
										<!-- Social Box -->
										<div class="team-block_one-socials">
											<a href="https://facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
											<a href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a>
											<a href="https://youtube.com/"><i class="fa-brands fa-youtube"></i></a>
											<a href="https://instagram.com/"><i class="fa-brands fa-instagram"></i></a>
										</div>
									</div>
									<img src="{{asset('FrontendAssets/images/resource/team-2.jpg')}}" alt="" />
									<div class="team-block_one-content">
										<h4 class="team-block_one-title"><a href="team-detail.html">William John</a></h4>
										<div class="team-block_one-designation">Cheif Financial officer</div>
									</div>
								</div>
							</div>
						</div>
					</div>
						
					<!-- Slide -->
					<div class="swiper-slide">
						<!-- Team Block One -->
						<div class="team-block_one">
							<div class="team-block_one-inner">
								<div class="team-block_one-image">
									<div class="team-block_one-shares">
										<div class="team-block_one-share_icon fa-classic fa-solid fa-share-nodes fa-fw"></div>
										<!-- Social Box -->
										<div class="team-block_one-socials">
											<a href="https://facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
											<a href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a>
											<a href="https://youtube.com/"><i class="fa-brands fa-youtube"></i></a>
											<a href="https://instagram.com/"><i class="fa-brands fa-instagram"></i></a>
										</div>
									</div>
									<img src="{{asset('FrontendAssets/images/resource/team-3.jpg')}}" alt="" />
									<div class="team-block_one-content">
										<h4 class="team-block_one-title"><a href="team-detail.html">John Smith</a></h4>
										<div class="team-block_one-designation">Cheif Financial officer</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
			
			<div class="team-one-arrow">
				<!-- If we need navigation buttons -->
				<div class="three-item_carousel-prev fas fa-arrow-left fa-fw"></div>
				<div class="three-item_carousel-next fas fa-arrow-right fa-fw"></div>
			</div>
			
			<div class="lower-box d-flex justify-content-between align-items-center flex-wrap">
				<div class="team-one_text">We are driven to improve the lives of our clients, our employees, our community through our <br> commitment to leadership, and the attention to detail.</div>
				<div class="team-one_btn">
					<a href="blog.html" class="theme-btn btn-style-three">
						<span class="btn-wrap">
							<span class="text-one">vIEW more <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
							<span class="text-two">vIEW more <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
						</span>
					</a>
				</div>
			</div>
			
		</div>
	</section>
	<!-- End Team One -->
	
<!-- Award One -->
	<section class="award-one">
		<div class="award-one_pattern" style="background-image:url({{asset('FrontendAssets/images/background/pattern-1.png')}})"></div>
		<div class="auto-container">
			<div class="inner-container">
				
				<div class="sec-title title-anim centered">
					<div class="sec-title_title">Our Achievements</div>
					<h2 class="sec-title_heading">Recognitions We’ve Earned</h2>
					<div class="sec-title_text">We take pride in delivering trusted, high-quality assembly and installation services recognized for excellence.</div>
				</div>
				
				<div class="animation_mode">
					
					@foreach($achievements as $achievement)
					<div class="award-block_one">
						<div class="award-block_one-inner">
							<span class="award-block_one-icon">
								<i class="fa-classic fa-solid fa-trophy fa-fw"></i>
							</span>
							<a class="award-block_one-title" href="#">{{$achievement->title}}  <i>{{$achievement->year}}</i></a>
						</div>
					</div>
                    @endforeach
					
				
					
				</div>
				
				
				<div class="animation_mode-two">
					
                    @foreach($achievements as $achievement)
					<div class="award-block_one">
						<div class="award-block_one-inner">
							<span class="award-block_one-icon">
								<i class="fa-classic fa-solid fa-trophy fa-fw"></i>
							</span>
							<a class="award-block_one-title" href="#">{{$achievement->title}}  <i>{{$achievement->year}}</i></a>
						</div>
					</div>
					@endforeach
					
					
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Award One -->

	<!-- Marketing One -->
	<section class="marketing-one d-none">
		<div class="outer-container">
			<div class="animation_mode">
				<h1>High-Quality Craftsmanship</h1>
				<span class="marketing-one_icon"><img src="{{asset('FrontendAssets/images/icons/star.png')}}" alt="" /></span>
				<h1 class="light">Home Construction</h1>
				<span class="marketing-one_icon"><img src="{{asset('FrontendAssets/images/icons/star.png')}}" alt="" /></span>
				<h1>Building Construction</h1>
				<span class="marketing-one_icon"><img src="{{asset('FrontendAssets/images/icons/star.png')}}" alt="" /></span>
			</div>
			<div class="animation_mode-two">
				<h1>Architecture & Building</h1>
				<span class="marketing-one_icon"><img src="{{asset('FrontendAssets/images/icons/star-1.png')}}" alt="" /></span>
				<h1 class="light">Material Recycling</h1>
				<span class="marketing-one_icon"><img src="{{asset('FrontendAssets/images/icons/star-1.png')}}" alt="" /></span>
				<h1>Tools and Equipment</h1>
				<span class="marketing-one_icon"><img src="{{asset('FrontendAssets/images/icons/star-1.png')}}" alt="" /></span>
				<h1>Building Construction</h1>
			</div>
		</div>
	</section>
	<!-- End Marketing One -->
	
	<!-- Testimonial One -->
		<section class="testimonial-one">
			<div class="testimonial-one_circle"></div>
			<div class="auto-container">
				<div class="d-flex justify-content-between align-items-center flex-wrap">
					<!-- Testimonial One Options -->
					<div class="testimonial-one_options d-flex align-items-center flex-wrap">
						<div class="testimonial-one_reviews">
							5.9K Reviews
							<div class="rating">
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
						</div>
						<ul class="testimonial-one__authors">
							<li><img src="{{asset('FrontendAssets/images/main-slider/author-1.png')}}" alt="" /></li>
							<li><img src="{{asset('FrontendAssets/images/main-slider/author-2.png')}}" alt="" /></li>
							<li><img src="{{asset('FrontendAssets/images/main-slider/author-3.png')}}" alt="" /></li>
							<li><img src="{{asset('FrontendAssets/images/main-slider/author-4.png')}}" alt="" /></li>
						</ul>
						<div class="testimonial-one__trusted">
							Trusted by
							<span>world leading companies</span>
						</div>
					</div>
					<!-- End Testimonial One Options -->

					<!-- Testimonial One Button -->
					<div class="testimonial-one_button d-none">
						<a href="javascript:;" class="theme-btn btn-style-three">
							<span class="btn-wrap">
								<span class="text-one">Discover More <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}"
											alt="" /></i></span>
								<span class="text-two">Discover More <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}"
											alt="" /></i></span>
							</span>
						</a>
					</div>
					<!-- End Testimonial One Button -->

				</div>

				<div class="testimonial-one_carousel">

					<div class="single-item_carousel swiper-container">
						<div class="swiper-wrapper">

							<!-- Slide -->
							<div class="swiper-slide">
								<!-- Testimonial Block One -->
								<div class="testimonial-block_one">
									<div class="testimonial-block_one-inner">
										<div class="testimonial-block_one-text">“The team at Assembly Services really
											knows their craft. Their professional approach and dedication made the
											entire swing set installation smooth and stress-free. They worked seamlessly
											with us and made sure everything was done safely and on time.”</div>
										<div class="testimonial-block_one-designation">
											Jessica Lee <span>Happy Customer</span>
										</div>
									</div>
								</div>
							</div>

							<!-- Slide -->
							<div class="swiper-slide">
								<!-- Testimonial Block One -->
								<div class="testimonial-block_one">
									<div class="testimonial-block_one-inner">
										<div class="testimonial-block_one-text">“The technicians were punctual,
											professional, and extremely skilled. They assembled our basketball goal
											quickly and made sure everything was perfectly secure. Highly recommend
											Assembly Services for any installation needs!”</div>
										<div class="testimonial-block_one-designation">
											Mark Thompson <span>Satisfied Client</span>
										</div>
									</div>
								</div>
							</div>

							<!-- Slide -->
							<div class="swiper-slide">
								<!-- Testimonial Block One -->
								<div class="testimonial-block_one">
									<div class="testimonial-block_one-inner">
										<div class="testimonial-block_one-text">“From booking to completion, the process
											was seamless. The team communicated clearly and installed our home gym
											equipment with great care. It feels great to have experts handle the heavy
											lifting!”</div>
										<div class="testimonial-block_one-designation">
											Ralph Adams <span>Customer, Proud Swing Set Owner</span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- If we need pagination -->
						<div class="single-item_carousel-pagination"></div>

					</div>

				</div>

			</div>
		</section>
		<!-- End Testimonial One -->
	
	<!-- Counter One -->
	<section class="counter-one d-none">
		<div class="counter-one_pattern" style="background-image:url({{asset('FrontendAssets/images/background/pattern-3.png')}})"></div>
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Counter One -->
				<div class="counter-block_one col-lg-3 col-md-6 col-sm-12">
					<div class="counter-block_one-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="counter-block_one-outline"></div>
						<div class="counter-block_one-count"><span class="odometer" data-count="48"></span><sup>+</sup></div>
						<div class="counter-block_one-text">completed <br> projects</div>
					</div>
				</div>
				
				<!-- Counter One -->
				<div class="counter-block_one col-lg-3 col-md-6 col-sm-12">
					<div class="counter-block_one-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="counter-block_one-outline"></div>
						<div class="counter-block_one-count"><span class="odometer" data-count="52"></span><sup>+</sup></div>
						<div class="counter-block_one-text">projects in <br> development</div>
					</div>
				</div>
				
				<!-- Counter One -->
				<div class="counter-block_one col-lg-3 col-md-6 col-sm-12">
					<div class="counter-block_one-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="counter-block_one-outline"></div>
						<div class="counter-block_one-count"><span class="odometer" data-count="2.3"></span>b<sup>+</sup></div>
						<div class="counter-block_one-text">total projects <br> cost</div>
					</div>
				</div>
				
				<!-- Counter One -->
				<div class="counter-block_one col-lg-3 col-md-6 col-sm-12">
					<div class="counter-block_one-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="counter-block_one-outline"></div>
						<div class="counter-block_one-count"><span class="odometer" data-count="18"></span>m<sup>+</sup></div>
						<div class="counter-block_one-text">square feet <br> of property</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Counter One -->
	
	<!-- Faq One -->
	<section class="faq-one d-none">
		<div class="faq-one_pattern" style="background-image:url({{asset('FrontendAssets/images/background/pattern-4.png')}})"></div>
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Image Column -->
				<div class="faq-one_image-column col-lg-5 col-md-6 col-sm-12">
					<div class="faq-one_image">
						<img src="{{asset('FrontendAssets/images/resource/faq.png')}}" alt="" />
					</div>
				</div>
				
				<!-- Image Column -->
				<div class="faq-one_accordian-column col-lg-7 col-md-6 col-sm-12">
					<div class="faq-one_accordian-outer">
						<!-- Sec Title -->
						<div class="sec-title">
							<div class="sec-title_title">
								Construction Company
							</div>
							<h2 class="sec-title_heading">regular Question for Customer </h2>
						</div>
						
						<!-- Accordion Box -->
						<ul class="accordion-box">
												
							<!-- Block -->
							<li class="accordion block active-block">
								<div class="acc-btn active"><div class="icon-outer"><span class="icon fa-classic fa-solid fa-arrow-right fa-fw"></span></div>What kind of warranty or guarantee does Elevate offer?</div>
								<div class="acc-content current">
									<div class="content">
										<div class="text">Fusce lacinia nulla consequat porta et viverra velit etiam, varius per condimentum lacus ultricies a placerat venatis semper donec id accumsan augue eleifend facili sis. Lectus arcu odio erat congue sociosqu ultricies</div>
									</div>
								</div>
							</li>
										
							<!-- Block -->
							<li class="accordion block">
								<div class="acc-btn"><div class="icon-outer"><span class="icon fa-classic fa-solid fa-arrow-right fa-fw"></span></div>Why should I choose elevate for my construction project?</div>
								<div class="acc-content">
									<div class="content">
										<div class="text">Fusce lacinia nulla consequat porta et viverra velit etiam, varius per condimentum lacus ultricies a placerat venatis semper donec id accumsan augue eleifend facili sis. Lectus arcu odio erat congue sociosqu ultricies</div>
									</div>
								</div>
							</li>
							
							<!-- Block -->
							<li class="accordion block">
								<div class="acc-btn"><div class="icon-outer"><span class="icon fa-classic fa-solid fa-arrow-right fa-fw"></span></div>What is the process for working with Elevate?</div>
								<div class="acc-content">
									<div class="content">
										<div class="text">Fusce lacinia nulla consequat porta et viverra velit etiam, varius per condimentum lacus ultricies a placerat venatis semper donec id accumsan augue eleifend facili sis. Lectus arcu odio erat congue sociosqu ultricies</div>
									</div>
								</div>
							</li>
							
							<!-- Block -->
							<li class="accordion block">
								<div class="acc-btn"><div class="icon-outer"><span class="icon fa-classic fa-solid fa-arrow-right fa-fw"></span></div>What types of projects does Elevate specialize in?</div>
								<div class="acc-content">
									<div class="content">
										<div class="text">Fusce lacinia nulla consequat porta et viverra velit etiam, varius per condimentum lacus ultricies a placerat venatis semper donec id accumsan augue eleifend facili sis. Lectus arcu odio erat congue sociosqu ultricies</div>
									</div>
								</div>
							</li>
							
						</ul>
						
					</div>
				</div>
				
			</div>
			
			<!-- Clients Box One -->
			<div class="clients-box_one">
				<div class="clients-one_slider swiper-container">
					<div class="swiper-wrapper">
						
						<!-- Slide -->
						<div class="swiper-slide">
							<div class="client-image">
								<a href="#"><img src="{{asset('FrontendAssets/images/clients/1.png')}}" alt="" /></a>
							</div>
						</div>

						<!-- Slide -->
						<div class="swiper-slide">
							<div class="client-image">
								<a href="#"><img src="{{asset('FrontendAssets/images/clients/2.png')}}" alt="" /></a>
							</div>
						</div>

						<!-- Slide -->
						<div class="swiper-slide">
							<div class="client-image">
								<a href="#"><img src="{{asset('FrontendAssets/images/clients/3.png')}}" alt="" /></a>
							</div>
						</div>

						<!-- Slide -->
						<div class="swiper-slide">
							<div class="client-image">
								<a href="#"><img src="{{asset('FrontendAssets/images/clients/4.png')}}" alt="" /></a>
							</div>
						</div>

						<!-- Slide -->
						<div class="swiper-slide">
							<div class="client-image">
								<a href="#"><img src="{{asset('FrontendAssets/images/clients/3.png')}}" alt="" /></a>
							</div>
						</div>

					</div>

				</div>
				
				<div class="text-center">
					<div class="client-one_subtitle">we’re proud to partner with best-in-class clients</div>
				</div>
				
			</div>
			<!-- End Clients Box One -->
			
		</div>
	</section>
	<!-- End Faq One -->
	
	<!-- Contact One -->
	<section class="contact-one d-none">
		<div class="auto-container">
			<div class="sec-title">
				<div class="d-flex justify-content-between align-items-end flex-wrap">
					<div class="left-box">
						<div class="sec-title_title">contact us</div>
						<h2 class="sec-title_heading">Let’s Work Together</h2>
					</div>
					<div class="right-box">
						<div class="sec-title_text">We’d love to share more with you, please complete this form and <br> our dedicated team will get back to you shortly.</div>
					</div>
				</div>
			</div>
			
			<div class="row clearfix">
				<!-- Column -->
				<div class="column col-lg-6 col-md-12 col-sm-12">
					<div class="row clearfix">
					
						<!-- Info Block One -->
						<div class="info-block_one col-lg-6 col-md-6 col-sm-6">
							<div class="info-block_one-inner">
								<div class="info-block_one-icon fa-classic fa-solid fa-phone fa-fw"></div>
								<strong>Call Us</strong>
								+00 (47) 939 4888
							</div>
						</div>
						
						<!-- Info Block One -->
						<div class="info-block_one col-lg-6 col-md-6 col-sm-6">
							<div class="info-block_one-inner">
								<div class="info-block_one-icon fa-classic fa-solid fa-envelope fa-fw"></div>
								<strong>Our Email Us</strong>
								example@gmail.com
							</div>
						</div>
						
						<!-- Info Block One -->
						<div class="info-block_one col-lg-6 col-md-6 col-sm-6">
							<div class="info-block_one-inner">
								<div class="info-block_one-icon fa-classic fa-solid fa-clock fa-fw"></div>
								<strong>Opening Hours</strong>
								Mon - Fri: 09am - 07pm
							</div>
						</div>
						
						<!-- Info Block One -->
						<div class="info-block_one col-lg-6 col-md-6 col-sm-6">
							<div class="info-block_one-inner">
								<div class="info-block_one-icon fa-classic fa-solid fa-map fa-fw"></div>
								<strong>Location</strong>
								1712 Down Street Monmouth
							</div>
						</div>
						
					</div>
				</div>
				<!-- Column -->
				<div class="column col-lg-6 col-md-12 col-sm-12">
					<!-- Contact Form -->
					<div class="contact-form">
						<form method="post" action="sendemail.php" id="contact-form">
							<div class="row clearfix">
							
								<div class="form-group col-lg-6 col-md-6 col-sm-12">
									<input type="text" name="username" placeholder="First Name" required>
								</div>
								
								<div class="form-group col-lg-6 col-md-6 col-sm-12">
									<input type="text" name="lastname" placeholder="Last Name" required>
								</div>
								
								<div class="form-group col-lg-6 col-md-6 col-sm-12">
									<input type="email" name="email" placeholder="Email address" required>
								</div>
								
								<div class="form-group col-lg-6 col-md-6 col-sm-12">
									<input type="text" name="services" placeholder="Services" required>
								</div>
								
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<textarea class="" placeholder="Your Massage"></textarea>
								</div>
								
								<div class="form-group">
									<div class="d-flex justify-content-between align-items-end flex-wrap">
										<div class="contact-form_text">We're excited to connect with you! <br> Required fields are marked *</div>
										<!-- Button Box -->
										<button class="theme-btn btn-style-three">
											<span class="btn-wrap">
												<span class="text-one">Contact Now <i><img src="assets/images/icons/arrow-1.svg" alt="" /></i></span>
												<span class="text-two">Contact Now <i><img src="assets/images/icons/arrow-1.svg" alt="" /></i></span>
											</span>
										</button>
									</div>
								</div>
							
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<div class="video-image">
				<img src="assets/images/resource/video.jpg" alt="" />
				<a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="contact-one_video lightbox-video"><span class="fa-classic fa-solid fa-play fa-fw"><i class="ripple"></i></span></a>
			</div>
			
		</div>
	</section>
	<!-- End Contact One -->

@endsection

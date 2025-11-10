<!-- Main Footer -->
<footer class="main-footer">
			<div class="main-footer_bg" style="background-image:url({{asset('FrontendAssets/images/background/footer-2.jpg')}})"></div>
			<div class="auto-container">
				<!-- Widgets Section -->
				<div class="widgets-section">
					<div class="row clearfix">

						<!-- Big Column -->
						<div class="big-column col-lg-6 col-md-12 col-sm-12">
							<div class="row clearfix">

								<!-- Footer Column -->
								<div class="main-footer_column col-lg-7 col-md-6 col-sm-12">
									<div class="logo-widget">
										<div class="main-footer_logo">
											<a href="index.html">
												<img src="{{asset($business_settings->light_logo_image ?? $business_settings->dark_logo_image)}}" alt="Assembly Services" title="">
												
											</a>
										</div>
										<div class="main-footer_text">At Assembly Services, we are committed to serving
											our clients, our team, and our community with reliability, precision, and
											care. From playsets and basketball hoops to exercise equipment and home
											gear, we take pride in delivering hassle-free assembly with attention to
											every detail. </div>
										<!-- Social Box -->
										<div class="main-footer_socials">
											<span>Follow Us:</span>
											<a href="{{ $business_settings->facebook_link }}"><i class="fa-brands fa-facebook-f"></i></a>
											<a href="{{ $business_settings->instagram_link }}"><i class="fa-brands fa-instagram"></i></a>
											<a href="{{ $business_settings->tiktok_link }}"><i class="fa-brands fa-tiktok"></i></a>
											<a href="{{ $business_settings->youtube_link }}"><i class="fa-brands fa-youtube"></i></a>

										</div>
									</div>
								</div>

								<!-- Footer Column -->
								<div class="main-footer_column col-lg-5 col-md-6 col-sm-12">
									<div class="links-widget">
										<h4 class="main-footer_title">Quick Links</h4>
										<ul class="main-footer_links">
											<li><a href="/">Home</a></li>
											<li><a href="{{ route('about') }}">About Us</a></li>
											<li><a href="{{ route('services') }}">Service</a></li>
											<li><a href="{{ route('projects') }}">Project</a></li>
											<li><a href="{{route('contact')}}">Contact Us</a></li>
										</ul>
									</div>
								</div>

							</div>
						</div>

						<!-- Big Column -->
						<div class="big-column col-lg-6 col-md-12 col-sm-12">
							<div class="row clearfix">

								<!-- Footer Column -->
								<div class="main-footer_column col-lg-6 col-md-6 col-sm-12">
									<div class="links-widget">
										<h4 class="main-footer_title">Our Services</h4>
										<ul class="main-footer_links">
											<li><a href="#">Support Center</a></li>
											<li><a href="#">Terms & Conditions</a></li>
											<li><a href="#">Privacy Policy</a></li>
											<!-- <li><a href="#">HR Training</a></li>
											<li><a href="#">Careers</a></li> -->
										</ul>
									</div>
								</div>

								<!-- Footer Column -->
								<div class="main-footer_column col-lg-6 col-md-6 col-sm-12">
									<div class="newsletter-widget">
										<h4 class="main-footer_title">Newsletter</h4>
										<div class="main-footer_text">Stay connected with us! Subscribe to our newsletter and never miss an update.</div>
										<div class="newsletter-box">
											<form id="footerNewsletterForm" method="post" action="javascript:;">
												@csrf
												<div class="form-group">
													<input type="email" id="footerNewsletterEmail" name="email" value=""
														placeholder="Enter Your Email Address" required>
													<button type="submit" class="theme-btn btn-style-three" id="footerNewsletterBtn">
														<span class="btn-wrap">
															<span class="text-one" id="footerNewsletterText">Subscribe <i><img
																		src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}"
																		alt="" /></i></span>
															<span class="text-two">Subscribe <i><img
																		src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}"
																		alt="" /></i></span>
														</span>
													</button>
												</div>
											</form>
										</div>
									</div>
								</div>

							</div>
						</div>

					</div>
				</div>

				<div class="main-footer_bottom">
					<div class="d-flex justify-content-between align-items-center flex-wrap">
						<!-- Copyright -->
						<div class="main-footer_copyright">{{$business_settings->footer_copyright_text}}
						</div>
						<ul class="main-footer_navs">
							<li><a href="#">Support Center</a></li>
							<li><a href="#">Terms & Conditions</a></li>
						</ul>
					</div>
				</div>

			</div>
		</footer>
		<!-- End Main Footer -->


        	<!-- Search Popup -->
		<div class="search-popup">
			<div class="color-layer"></div>
			<button class="close-search"><span class="fa-xmark"></span></button>
			<form method="post" action="#">
				<div class="form-group">
					<input type="search" name="search-field" value="" placeholder="Search Here" required="">
					<button class="fa fa-solid fa-magnifying-glass fa-fw" type="submit"></button>
				</div>
			</form>
		</div>
		<!-- End Search Popup -->

<!-- Footer Newsletter Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const footerNewsletterForm = document.getElementById('footerNewsletterForm');
    const footerNewsletterEmail = document.getElementById('footerNewsletterEmail');
    const footerNewsletterBtn = document.getElementById('footerNewsletterBtn');
    const footerNewsletterText = document.getElementById('footerNewsletterText');

    if (footerNewsletterForm) {
        footerNewsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = footerNewsletterEmail.value.trim();
            
            if (!email) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Email Required',
                    text: 'Please enter your email address.',
                    confirmButtonColor: '#3375d1'
                });
                return;
            }

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Invalid Email',
                    text: 'Please enter a valid email address.',
                    confirmButtonColor: '#3375d1'
                });
                return;
            }

            // Show loading state
            footerNewsletterBtn.disabled = true;
            if (footerNewsletterText) {
                footerNewsletterText.textContent = 'Subscribing...';
            }

            // Prepare form data
            const formData = new FormData();
            formData.append('email', email);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]')?.content || document.querySelector('input[name="_token"]')?.value);

            // Send AJAX request
            fetch('{{ route("newsletter.subscribe") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Reset button state
                footerNewsletterBtn.disabled = false;
                if (footerNewsletterText) {
                    footerNewsletterText.textContent = 'Subscribe';
                }

                if (data.success) {
                    // Success notification
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully Subscribed!',
                        text: data.message || 'Thank you for subscribing to our newsletter!',
                        confirmButtonColor: '#3375d1',
                        timer: 3000,
                        timerProgressBar: true
                    });
                    
                    // Clear form
                    footerNewsletterEmail.value = '';
                } else {
                    // Error notification
                    Swal.fire({
                        icon: 'error',
                        title: 'Subscription Failed',
                        text: data.message || 'Failed to subscribe. Please try again.',
                        confirmButtonColor: '#3375d1'
                    });
                }
            })
            .catch(error => {
                // Reset button state
                footerNewsletterBtn.disabled = false;
                if (footerNewsletterText) {
                    footerNewsletterText.textContent = 'Subscribe';
                }

                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Network Error',
                    text: 'Something went wrong. Please try again later.',
                    confirmButtonColor: '#3375d1'
                });
            });
        });
    }
});
</script>
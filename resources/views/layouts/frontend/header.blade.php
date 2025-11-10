<!-- Main Header -->
<header class="main-header header-style-one">
		
		<!-- Header Lower -->
		<div class="header-lower">
			<div class="auto-container">
				<div class="inner-container">
					<div class="d-flex justify-content-between align-items-center">
						
						<div class="logo-box">
							<div class="logo"><a href="index.html">
                            	<img src="{{asset($business_settings->light_logo_image ?? $business_settings->dark_logo_image)}}" alt="Assembly Services" title="Constrc">
                                 
                            </a>
                        </div>
						</div>
						
						<div class="nav-outer d-flex flex-wrap">
							<!-- Main Menu -->
							<nav class="main-menu navbar-expand-md">
								<div class="navbar-header">
									<!-- Toggle Button -->    	
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								
								<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
									<ul class="navigation clearfix">
										<li class=" has-mega-menu"><a href="/">Home</a>
											<!-- <div class="mega-menu">
												<div class="mega-menu-bar row clearfix">
													<div class="column col-lg-3 col-md-12 col-sm-12">
														<h6>Pages</h6>
														<ul>
															<li><a href="index.html">Homepage 01</a></li>
															<li><a href="index-2.html">Homepage 02</a></li>
															<li><a href="index-3.html">Homepage 03</a></li>
														</ul>
														<h6>One Pager</h6>
														<ul>
															<li><a href="index-1.html">Homepage 01</a></li>
															<li><a href="index-2-1.html">Homepage 02</a></li>
															<li><a href="index-3-1.html">Homepage 03</a></li>
														</ul>
													</div>
													<div class="column col-lg-3 col-md-12 col-sm-12">
														<h6>About us</h6>
														<ul>
															<li><a href="about.html">About us</a></li>
															<li><a href="faq.html">Faq</a></li>
															<li><a href="price.html">price</a></li>
															<li><a href="team.html">Team</a></li>
															<li><a href="team-detail.html">Team Detail</a></li>
															<li><a href="testimonial.html">Testimonial</a></li>
															<li><a href="privacy.html">Privacy Policy</a></li>
															<li><a href="terms.html">Terms & Condition</a></li>
															<li><a href="coming-soon.html">coming soon</a></li>
															<li><a href="not-found.html">Not Found</a></li>
														</ul>
													</div>
													<div class="column col-lg-3 col-md-12 col-sm-12">
														<h6>Portfolio</h6>
														<ul>
															<li><a href="project.html">project</a></li>
															<li><a href="project-detail.html">project detail</a></li>
														</ul>
														<h6>services</h6>
														<ul>
															<li><a href="services.html">services</a></li>
															<li><a href="services-2.html">services 02</a></li>
															<li><a href="service-detail.html">services detail</a></li>
															<li><a href="service-detail-2.html">services detail 02</a></li>
														</ul>
														<h6>Contact</h6>
														<ul>
															<li><a href="contact.html">Contact</a></li>
															<li><a href="contact-2.html">Contact 02</a></li>
														</ul>
													</div>
													<div class="column col-lg-3 col-md-12 col-sm-12">
														<h6>Our Shop</h6>
														<ul>
															<li><a href="shop.html">shop</a></li>
															<li><a href="shop-detail.html">shop detail</a></li>
															<li><a href="cart.html">shoping Cart</a></li>
															<li><a href="checkout.html">CheckOut</a></li>
															<li><a href="register.html">Register</a></li>
															<li><a href="coming-soon.html">coming soon</a></li>
														</ul>
														<h6>Blog</h6>
														<ul>
															<li><a href="blog.html">Blog 01</a></li>
															<li><a href="blog-2.html">Blog 02</a></li>
															<li><a href="blog-classic.html">Blog classic</a></li>
															<li><a href="blog-detail.html">Blog Detail</a></li>
															<li><a href="not-found.html">Not Found</a></li>
														</ul>
													</div>
												</div>
											</div> -->
										</li>
										<!-- <li class="dropdown"><a href="#">About</a> -->
										<li><a href="{{ route('about') }}">About</a>
											<!-- <ul>
												<li><a href="about.html">About us</a></li>
												<li><a href="faq.html">Faq</a></li>
												<li><a href="price.html">price</a></li>
												<li><a href="testimonial.html">Testimonial</a></li>
												<li><a href="privacy.html">Privacy Policy</a></li>
												<li><a href="terms.html">Terms & Condition</a></li>
												<li class="dropdown"><a href="#">Team</a>
													<ul>
														<li><a href="team.html">Team</a></li>
														<li><a href="team-detail.html">Team Detail</a></li>
													</ul>
												</li>
											</ul> -->
										</li>
										<li class=""><a href="{{ route('services') }}">Services</a>
											<!-- <ul>
												<li><a href="services.html">services</a></li>
												<li><a href="services-2.html">services 02</a></li>
												<li><a href="service-detail.html">services detail</a></li>
												<li><a href="service-detail-2.html">services detail 02</a></li>
											</ul> -->
										</li>
										<li class=""><a href="{{ route('projects') }}">Project</a>
											<!-- <ul>
												<li><a href="projects.html">project</a></li>
												<li><a href="project-detail.html">project detail</a></li>
											</ul> -->
										</li>
										<!-- <li class=""><a href="#">shop</a> -->
											<!-- <ul>
												<li><a href="shop.html">shop</a></li>
												<li><a href="shop-detail.html">shop detail</a></li>
												<li><a href="cart.html">shoping Cart</a></li>
												<li><a href="checkout.html">CheckOut</a></li>
												<li><a href="register.html">Register</a></li>
												<li><a href="coming-soon.html">coming soon</a></li>
											</ul> -->
										<!-- </li> -->
										<!-- <li class=""><a href="#">Blog</a> -->
											<!-- <ul>
												<li><a href="blog.html">Blog 01</a></li>
												<li><a href="blog-2.html">Blog 02</a></li>
												<li><a href="blog-classic.html">Blog classic</a></li>
												<li><a href="blog-detail.html">Blog Detail</a></li>
												<li><a href="not-found.html">Not Found</a></li>
											</ul> -->
										<!-- </li> -->
										<li class=""><a href="{{route('contact')}}">Contact</a>
											<!-- <ul>
												<li><a href="contact.html">Contact</a></li>
												<li><a href="contact-2.html">Contact 02</a></li>
											</ul> -->
										</li>
                                        <li class=""><a href="{{route('technicians')}}">All Technicians</a>
											
										</li>
									</ul>
								</div>
							</nav>
						</div>

						<!-- Main Menu End-->
						<div class="outer-box d-flex align-items-center flex-wrap">	
							
							@guest
							<!-- Button Box -->
							<div class="main-header_button">
								<a class="theme-btn btn-style-three" onclick="openSignupModal2025()" >
									<span class="btn-wrap">
										<span class="text-one">SIGN UP <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
										<span class="text-two">SIGN UP <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
									</span>
								</a>
								<a class="theme-btn btn-style-three"  onclick="openModal()" >
									<span class="btn-wrap">
										<span class="text-one">GET A QUOTE <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
										<span class="text-two">GET A QUOTE <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
									</span>
								</a>
							</div>
							@endguest

							@auth
							<div class="userDropdown">
                            <!-- User Dropdown Button -->
                            <button class="user-button" id="userButton">
                                <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</div>
                                <span class="user-name">{{ auth()->user()->name ?? 'User' }}</span>
                                <svg class="dropdown-arrow" id="dropdownArrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div class="dropdown-menu" id="dropdownMenu">
                                @php
                                    $user = auth()->user();
                                    $isIndividual = false;
                                    $isTechnician = false;
                                    try {
                                        $isIndividual = $user->hasRole('individual');
                                        $isTechnician = $user->hasRole('technician');
                                    } catch (\Exception $e) {
                                        // Handle error silently
                                    }
                                @endphp
                                
                                @if($isIndividual)
                                <a href="{{ route('user.profile') }}" class="menu-item">
                                    <svg class="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                    </svg>
                                    <span>Dashboard</span>
                                </a>
                                <a href="{{ route('user.profile.bookings') }}" class="menu-item">
                                    <svg class="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <span>Bookings</span>
                                </a>
                                @endif
                                
                                @if($isTechnician)
                                <a href="{{ route('technician.dashboard') }}" class="menu-item">
                                    <svg class="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                    </svg>
                                    <span>Dashboard</span>
                                </a>
                                <a href="{{ route('technician.jobs') }}" class="menu-item">
                                    <svg class="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <span>Jobs</span>
                                </a>
                                @endif
                                
                                <form method="POST" action="{{ route('logout') }}" class="menu-item">
                                    @csrf
                                    <button type="submit" class="menu-item" style="width: 100%; text-align: left; background: none; border: none; padding: 0; cursor: pointer;">
                                        <svg class="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        <span>Logout</span>
                                    </button>
                                </form>
                                
                              
                                
                             
                                
                         
                                 
                            </div>
                        </div>
						@endauth
							<!-- About Widget -->
							<span class="about-widget">
								<span class="hamburger">
									<span class="top-bun"></span>
									<span class="meat"></span>
									<span class="bottom-bun"></span>
								</span>
							</span>
							
							<!-- Mobile Navigation Toggler -->
							<div class="mobile-nav-toggler"><span class="icon fa-classic fa-solid fa-bars fa-fw"></span></div>

						</div>


						
					</div>
				</div>
			</div>
		</div>
		<!--End Header Lower-->
		
             <div class="modal-overlay_latest" id="signupModalOverlay2025" onclick="closeSignupModalOnOverlay2025(event)">
        <div class="modal" onclick="event.stopPropagation()">
            <div class="modal-header">
                <button class="close-btn" onclick="closeSignupModal2025()">&times;</button>
                <div class="icon-circle">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        <path d="M19 13h-2v2h-2v2h2v2h2v-2h2v-2h-2z"/>
                    </svg>
                </div>
                <h2 id="signupModalTitle2025">Create Account</h2>
            </div>

            <!-- Sign Up Forms -->
            <div id="signupSection2025">
                <div class="tabs">
                    <button class="tab active" onclick="switchSignupTab2025('customer')">Customer Account</button>
                    <button class="tab" onclick="switchSignupTab2025('technician')">Technician Account</button>
                </div>

                <div class="modal-content">
                    <!-- Customer Form -->
                    <div id="customerForm2025" class="tab-content active" >
                        <form onsubmit="handleSignupSubmit2025(event, 'customer')" method="POST" action="{{ route('register.attempt') }}">
                        @csrf
                            <div class="form-group">
                                <label for="customerName2025">Full Name</label>
                                <div class="input-wrapper">
                                    <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                    </svg>
                                    <input type="text" id="customerName2025" placeholder="Enter your full name" required name="name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="customerEmail2025">Email Address</label>
                                <div class="input-wrapper">
                                    <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                    </svg>
                                    <input type="email" id="customerEmail2025" placeholder="user@example.com" required name="email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="customerPassword2025">Password</label>
                                <div class="input-wrapper">
                                    <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                                    </svg>
                                    <input type="password" id="customerPassword2025" placeholder="Enter Your Password" required name="password">
                                    <button type="button" class="toggle-password" onclick="toggleSignupPassword2025('customerPassword2025')">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="customerPassword2025">Confirm Password</label>
                                <div class="input-wrapper">
                                    <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                                    </svg>
                                    <input type="password" id="customerPassword2025" placeholder="Confirm Password" required name="password_confirmation">
                                    <button type="button" class="toggle-password" onclick="toggleSignupPassword2025('customerPassword2025')">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="checkbox-wrapper">
                                <input type="checkbox" id="customerTerms2025" required>
                                <label for="customerTerms2025">I agree to the Terms & Conditions</label>
                            </div>

                            <button type="submit" class="submit-btn">

                                <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
                                    <path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                                Sign Up
                            </button>

                            <div class="divider">OR</div>

                            <div class="login-link">
                                Already have an account? <a href="#" onclick="showSignupLogin2025(event)">Login here</a>
                            </div>
                        </form>
                    </div>


                    <!-- Technician Form -->
                    <div id="technicianForm2025" class="tab-content">
                        <form onsubmit="handleSignupSubmit2025(event, 'technician')" method="POST" action="{{ route('register.attempt') }}">
                        @csrf
                          <input type="hidden" name="is_technician" value="1">
                            <div class="form-group">
                                <label for="techName2025">Full Name</label>
                                <div class="input-wrapper">
                                    <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                    </svg>
                                    <input type="text" id="techName2025" placeholder="Enter your full name" required name="name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="techEmail2025">Email Address</label>
                                <div class="input-wrapper">
                                    <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                    </svg>
                                    <input type="email" id="techEmail2025" placeholder="technician@gmail.com" required name="email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="techPassword2025">Password</label>
                                <div class="input-wrapper">
                                    <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                                    </svg>
                                    <input type="password" id="techPassword2025" placeholder="••••••••••••••" required name="password">
                                    <button type="button" class="toggle-password" onclick="toggleSignupPassword2025('techPassword2025')">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="techPassword2025">Password</label>
                                <div class="input-wrapper">
                                    <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                                    </svg>
                                    <input type="password" id="techPassword2025" placeholder="••••••••••••••" required name="password_confirmation">
                                    <button type="button" class="toggle-password" onclick="toggleSignupPassword2025('techPassword2025')">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="techCity2025">City/State</label>
                                <div class="input-wrapper">
                                    <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                    </svg>
                                    <input type="text" id="techCity2025" placeholder="e.g., New York, NY" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="techExperience2025">Past Work Experience</label>
                                <textarea id="techExperience2025" placeholder="Describe your relevant work experience..." required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="techDocuments2025">Legal Documents / Resume</label>
                                <input type="file" id="techDocuments2025" accept=".pdf,.doc,.docx" required>
                            </div>

                            <div class="form-group">
                                <label for="techDetails2025">Additional Details</label>
                                <textarea id="techDetails2025" placeholder="Any additional information you'd like to share..." name="about"></textarea>
                            </div>

                            <div class="checkbox-wrapper">
                                <input type="checkbox" id="techTerms2025" required>
                                <label for="techTerms2025">I agree to the Terms & Conditions</label>
                            </div>

                            <button type="submit" class="submit-btn">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
                                    <path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                                Sign Up
                            </button>

                            <div class="divider">OR</div>

                            <div class="login-link">
                                Already have an account? <a href="#" onclick="showSignupLogin2025(event)">Login here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Login Form -->
            <div id="loginSection2025" class="login-form">
                <div class="modal-content">
                    <button class="back-btn" onclick="showSignupForm2025()">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
                        </svg>
                        Back to Sign Up
                    </button>

                    <form onsubmit="handleSignupLoginSubmit2025(event)" method="POST" action="{{ route('login.attempt') }}">
                        @csrf
                        <div class="form-group">
                            <label for="loginEmail2025">Email or Username</label>
                            <div class="input-wrapper">
                                <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                                <input type="text" id="loginEmail2025" name="email_username" placeholder="Enter your email or username" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="loginPassword2025">Password</label>
                            <div class="input-wrapper">
                                <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                                </svg>
                                <input type="password" id="loginPassword2025" name="password" placeholder="Enter your password" required>
                                <button type="button" class="toggle-password" onclick="toggleSignupPassword2025('loginPassword2025')">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="checkbox-wrapper" style="margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <input type="checkbox" id="rememberMe2025" name="remember" value="1">
                                <label for="rememberMe2025">Remember me</label>
                            </div>
                            <a href="#" onclick="showForgotPassword2025(event)" style="color: #3375d1; text-decoration: none; font-size: 14px; font-weight: 500;">Forgot Password?</a>
                        </div>

                        <button type="submit" class="submit-btn" id="loginSubmitBtn2025">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
                                <path d="M11 7L9.6 8.4l2.6 2.6H2v2h10.2l-2.6 2.6L11 17l5-5-5-5zm9 12h-8v2h8c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-8v2h8v14z"/>
                            </svg>
                            <span id="loginSubmitText2025">Login</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Forgot Password Form -->
            <div id="forgotPasswordSection2025" class="forgot-password-form" style="display: none;">
                <div class="modal-content">
                    <button class="back-btn" onclick="showSignupLogin2025(event)">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
                        </svg>
                        Back to Login
                    </button>

                    <!-- Step 1: Enter Email -->
                    <div id="forgotPasswordStep1">
                        <h2 style="margin: 0 0 10px; font-size: 24px; font-weight: 600; color: #1a1a1a;">Reset Password</h2>
                        <p style="margin: 0 0 25px; color: #6b7280; font-size: 14px;">Enter your email address and we'll send you a verification code to reset your password.</p>
                        
                        <form onsubmit="handleForgotPasswordSubmit2025(event)">
                            <div class="form-group">
                                <label for="forgotEmail2025">Email Address</label>
                                <div class="input-wrapper">
                                    <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                    </svg>
                                    <input type="email" id="forgotEmail2025" placeholder="Enter your email address" required>
                                </div>
                            </div>

                            <button type="submit" class="submit-btn" id="forgotPasswordBtn2025">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                                Send Verification Code
                            </button>
                        </form>
                    </div>

                    <!-- Step 2: Enter OTP and New Password -->
                    <div id="forgotPasswordStep2" style="display: none;">
                        <h2 style="margin: 0 0 10px; font-size: 24px; font-weight: 600; color: #1a1a1a;">Enter Verification Code</h2>
                        <p style="margin: 0 0 25px; color: #6b7280; font-size: 14px;">We've sent a 6-digit code to <strong id="forgotPasswordEmailDisplay2025"></strong>. Please enter it below along with your new password.</p>
                        
                        <form onsubmit="handleResetPasswordSubmit2025(event)">
                            <input type="hidden" id="forgotPasswordEmailHidden2025">
                            
                            <div class="form-group">
                                <label for="forgotOtp2025">Verification Code</label>
                                <div class="input-wrapper">
                                    <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                                    </svg>
                                    <input type="text" id="forgotOtp2025" placeholder="Enter 6-digit code" maxlength="6" pattern="[0-9]{6}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="forgotNewPassword2025">New Password</label>
                                <div class="input-wrapper">
                                    <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                                    </svg>
                                    <input type="password" id="forgotNewPassword2025" placeholder="Enter new password" required minlength="8">
                                    <button type="button" class="toggle-password" onclick="toggleSignupPassword2025('forgotNewPassword2025')">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="forgotConfirmPassword2025">Confirm Password</label>
                                <div class="input-wrapper">
                                    <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                                    </svg>
                                    <input type="password" id="forgotConfirmPassword2025" placeholder="Confirm new password" required minlength="8">
                                    <button type="button" class="toggle-password" onclick="toggleSignupPassword2025('forgotConfirmPassword2025')">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <button type="submit" class="submit-btn" id="resetPasswordBtn2025">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
                                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                                </svg>
                                Reset Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


			<!-- get a quote modal -->

			 <div class="modal-overlay" id="modalOverlay" onclick="closeModalOnOutsideClick(event)">
        <div class="modal">
            <div class="modal-header">
                <button class="close-btn" onclick="closeModal()">×</button>
                <div class="icon-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-7-2h2v-4h4v-2h-4V7h-2v4H7v2h4z"/>
                    </svg>
                </div>
                <h2>Get a Quote</h2>
            </div>
            <div class="modal-body">
                <form id="quoteForm" onsubmit="handleQuoteSubmit(event)" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <div class="input-wrapper">
                            <i class="si-input-icon fas fa-user input-icon"></i>
                            <input type="text" id="fullName" name="fullname" placeholder="Enter your full name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-wrapper">
                            <i class="si-input-icon fas fa-envelope input-icon"></i>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <div class="input-wrapper">
                            <i class="si-input-icon fas fa-phone input-icon"></i>
                            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="service">Company Name of Swingset/Gazebo</label>
                        <div class="input-wrapper">
                            <i class="si-input-icon fas fa-briefcase input-icon"></i>
                            <select id="service" name="service" required>
                                <option value="">Select a service</option>
                                <option value="KidKraft">KidKraft</option>
                                <option value="Backyard Discoveries">Backyard Discoveries</option>
                                <option value="Lifetime">Lifetime</option>
                                <option value="Yardistry">Yardistry</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="swingSetImages">Upload pictures of the swing set box (packaging)</label>
                        <input type="file" id="swingSetImages" name="swingSetImages[]" accept="image/*" multiple required style="padding-left:20px;">
                    </div>

                    <div class="form-group">
                        <label for="city">City/State</label>
                        <div class="input-wrapper">
                            <svg class="input-icon" viewBox="0 0 24 24" fill="currentColor" width="20px">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            <input type="text" id="city" name="city" placeholder="e.g., New York, NY" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message">Project Details</label>
                        <div class="input-wrapper">
                            <i class="si-input-icon fas fa-comment-dots input-icon" style="top: 26px;"></i>
                            <textarea id="message" name="details" placeholder="Tell us about your project..." required></textarea>
                        </div>
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="terms" required>
                        <label for="terms">I agree to the Terms & Conditions and Privacy Policy</label>
                    </div>

                    <button type="submit" class="submit-btn" id="quoteSubmitBtn">
                        <i class="fas fa-paper-plane"></i>
                        <span id="quoteSubmitText">Submit Quote Request</span>
                    </button>

                    <div class="divider">OR</div>

                    <div class="login-link">
                        Already have an account? <a href="#" onclick="openSignupModal2025(); showSignupLogin2025(event);">Login here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

			<!-- get a quote modal -->

		<!-- Mobile Menu  -->
		<div class="mobile-menu">
			<div class="menu-backdrop"></div>
			<div class="close-btn"><span class="icon fa-xmark"></span></div>
			
			<nav class="menu-box">
				<div class="nav-logo"><a href="index.html">
					<!-- <img src="assets/images/mobile-logo.svg" alt="" title=""> -->
					 Assembly Services
				</a>
				</div>
				<div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
			</nav>
		</div>
		<!-- End Mobile Menu -->
	
	</header>
	<!-- End Main Header -->





		<!-- About Sidebar -->
		<div class="about-sidebar">
			<div class="gradient-layer"></div>
			<!-- Close Button -->
			<div class="close-sidebar-widget close-button">
				<span class="fa-solid fa-xmark fa-fw"></span>
			</div>
			<div class="sidebar-inner">
				<div class="upper-box">
					<div class="image">
						<img src="{{asset('FrontendAssets/images/background/canvas-iimg.jpg')}}" alt="" />
					</div>
					<div class="content-box">
						<h3>About <span>Assembly</span></h3>
						<div class="text">At Assembly Services, we are committed to serving our clients, our team, and
							our community with reliability, precision, and care. From playsets and basketball hoops to
							exercise equipment and home gear, we take pride in delivering hassle-free assembly with
							attention to every detail.</div>
						<ul class="about-sidebar_list">
							<!-- <li>Playset Assembly & Relocation</li> -->
							<li>Swing Set Installation</li>
							<li>Basketball Goal Assembly</li>
							<li>Exercise Equipment Setup</li>
							<li>Outdoor & Home Gear Assembly</li>
						</ul>
					</div>
				</div>
				<!-- Social Box -->
				<div class="social-box">
					<a href="https://facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
					<a href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a>
					<a href="https://youtube.com/"><i class="fa-brands fa-youtube"></i></a>
					<a href="https://instagram.com/"><i class="fa-brands fa-instagram"></i></a>
				</div>
			</div>
		</div>
		<!-- End About Sidebar -->

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Forgot Password Functions
function showForgotPassword2025(e) {
    if (e) e.preventDefault();
    document.getElementById('signupSection2025').style.display = 'none';
    document.getElementById('loginSection2025').style.display = 'none';
    document.getElementById('forgotPasswordSection2025').style.display = 'block';
    document.getElementById('forgotPasswordStep1').style.display = 'block';
    document.getElementById('forgotPasswordStep2').style.display = 'none';
    document.getElementById('signupModalTitle2025').textContent = 'Reset Password';
}

function handleForgotPasswordSubmit2025(event) {
    event.preventDefault();
    
    const email = document.getElementById('forgotEmail2025').value;
    const submitBtn = document.getElementById('forgotPasswordBtn2025');
    const originalText = submitBtn.innerHTML;
    
    if (!email) {
        Swal.fire({
            icon: 'warning',
            title: 'Email Required',
            text: 'Please enter your email address.',
            confirmButtonColor: '#3375d1'
        });
        return;
    }
    
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="white" style="animation: spin 1s linear infinite;"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/><path d="M12 6v6l4 2" stroke="white" stroke-width="2" fill="none"/></svg> Sending...';
    
    fetch('{{ route("password.send.otp") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || document.querySelector('input[name="_token"]')?.value,
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ email: email })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show step 2
            document.getElementById('forgotPasswordStep1').style.display = 'none';
            document.getElementById('forgotPasswordStep2').style.display = 'block';
            document.getElementById('forgotPasswordEmailDisplay2025').textContent = email;
            document.getElementById('forgotPasswordEmailHidden2025').value = email;
            
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Code Sent!',
                    text: 'Verification code sent to your email!',
                    confirmButtonColor: '#3375d1',
                    timer: 3000,
                    timerProgressBar: true
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: data.message || 'Failed to send verification code. Please try again.',
                    confirmButtonColor: '#3375d1'
                });
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
    });
}

function handleResetPasswordSubmit2025(event) {
    event.preventDefault();
    
    const email = document.getElementById('forgotPasswordEmailHidden2025').value;
    const otp = document.getElementById('forgotOtp2025').value;
    const password = document.getElementById('forgotNewPassword2025').value;
    const passwordConfirmation = document.getElementById('forgotConfirmPassword2025').value;
    const submitBtn = document.getElementById('resetPasswordBtn2025');
    const originalText = submitBtn.innerHTML;
    
    // Validate passwords match
    if (password !== passwordConfirmation) {
        Swal.fire({
            icon: 'warning',
            title: 'Password Mismatch',
            text: 'Passwords do not match. Please try again.',
            confirmButtonColor: '#3375d1'
        });
        return;
    }
    
    if (password.length < 8) {
        Swal.fire({
            icon: 'warning',
            title: 'Password Too Short',
            text: 'Password must be at least 8 characters long.',
            confirmButtonColor: '#3375d1'
        });
        return;
    }
    
    if (!otp || otp.length !== 6) {
        Swal.fire({
            icon: 'warning',
            title: 'Invalid Code',
            text: 'Please enter a valid 6-digit verification code.',
            confirmButtonColor: '#3375d1'
        });
        return;
    }
    
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="white" style="animation: spin 1s linear infinite;"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/><path d="M12 6v6l4 2" stroke="white" stroke-width="2" fill="none"/></svg> Resetting...';
    
    fetch('{{ route("password.reset.with.otp") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || document.querySelector('input[name="_token"]')?.value,
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            email: email,
            otp: otp,
            password: password,
            password_confirmation: passwordConfirmation
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Password Reset!',
                text: data.message || 'Password reset successfully! You can now login with your new password.',
                confirmButtonColor: '#3375d1',
                timer: 3000,
                timerProgressBar: true
            }).then(() => {
                // Close modal and show login
                closeSignupModal2025();
                setTimeout(() => {
                    openSignupModal2025();
                    showSignupLogin2025();
                }, 300);
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Reset Failed',
                text: data.message || 'Failed to reset password. Please try again.',
                confirmButtonColor: '#3375d1'
            });
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'An error occurred. Please try again.',
            confirmButtonColor: '#3375d1'
        });
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
    });
}

// Update showSignupLogin2025 to hide forgot password section
if (typeof showSignupLogin2025 === 'function') {
    const originalShowSignupLogin = showSignupLogin2025;
    window.showSignupLogin2025 = function(e) {
        if (e) e.preventDefault();
        document.getElementById('signupSection2025').style.display = 'none';
        document.getElementById('loginSection2025').style.display = 'block';
        document.getElementById('forgotPasswordSection2025').style.display = 'none';
        document.getElementById('signupModalTitle2025').textContent = 'Login';
    };
}

// Handle Quote Form Submission
function handleQuoteSubmit(event) {
    event.preventDefault();
    
    const form = document.getElementById('quoteForm');
    const submitBtn = document.getElementById('quoteSubmitBtn');
    const submitText = document.getElementById('quoteSubmitText');
    const originalText = submitText ? submitText.textContent : 'Submit Quote Request';
    
    // Validate files
    const fileInput = document.getElementById('swingSetImages');
    if (!fileInput.files || fileInput.files.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'File Required',
            text: 'Please upload at least one image of the swing set box.',
            confirmButtonColor: '#3375d1'
        });
        return;
    }
    
    // Disable button and show loading
    if (submitBtn) {
        submitBtn.disabled = true;
        if (submitText) {
            submitText.textContent = 'Submitting...';
        }
    }
    
    // Create FormData
    const formData = new FormData(form);
    
    // Submit via fetch
    fetch('{{ route("quote.store") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || document.querySelector('input[name="_token"]')?.value,
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Quote Submitted!',
                text: data.message || 'Thank you! Your quote request has been submitted successfully. We will get back to you soon.',
                confirmButtonColor: '#3375d1',
                timer: 3000,
                timerProgressBar: true
            }).then(() => {
                form.reset();
                closeModal();
            });
        } else {
            let errorMessage = data.message || 'Failed to submit quote request. Please try again.';
            if (data.errors) {
                const errorList = Object.values(data.errors).flat().join('<br>');
                errorMessage = errorList || errorMessage;
            }
            Swal.fire({
                icon: 'error',
                title: 'Submission Failed',
                html: errorMessage,
                confirmButtonColor: '#3375d1'
            });
            if (submitBtn) {
                submitBtn.disabled = false;
                if (submitText) {
                    submitText.textContent = originalText;
                }
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'An error occurred. Please try again.',
            confirmButtonColor: '#3375d1'
        });
        if (submitBtn) {
            submitBtn.disabled = false;
            if (submitText) {
                submitText.textContent = originalText;
            }
        }
    });
}
</script>
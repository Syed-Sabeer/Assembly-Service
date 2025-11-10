@extends('layouts.frontend.master')


@section('css')

@endsection

@section('content')

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
					<a href="https://www.facebook.com/share/14Lf2jSPayA/?mibextid=wwXIfr"><i class="fa-brands fa-facebook-f"></i></a>
					<a href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a>
					<a href="https://youtube.com/"><i class="fa-brands fa-youtube"></i></a>
					<a href="https://instagram.com/"><i class="fa-brands fa-instagram"></i></a>
				</div>
			</div>
		</div>
		<!-- End About Sidebar -->

		<!-- Slider One -->
		<section class="slider-one">
			<div class="main-slider swiper-container">
				<div class="swiper-wrapper">

				@foreach($heros as $hero)
					<!-- Slide -->  
					<div class="swiper-slide">
						<div class="slider-one_image-layer"
							style="background-image:url({{asset($hero->image)}})"></div>
						<div class="slider-one_pattern"
							style="background-image:url({{asset('FrontendAssets/images/main-slider/vector-1.png')}})"></div>
						<div class="auto-container">
							<!-- Content Column -->
							<div class="slider-one_content">
								<div class="slider-one_content-inner">
									<div class="slider-one_title">{{ $hero->badge_title }}</div>
									<h1 class="slider-one_heading">{{ $hero->title }}
									</h1>
									<div class="slider-one_text">{!! $hero->description !!}</div>
									<div
										class="slider-one_button d-flex align-items-center justify-content-center flex-wrap">
										<a href="{{ $hero->button_link }}" class="theme-btn btn-style-two">
											<span class="btn-wrap">
												<span class="text-one">Work With Us</span>
												<span class="text-two">Work With Us</span>
											</span>
										</a>
										<div class="slider-one_video">
											<a href="{{ $hero->video_link }}"
												class="lightbox-video play-box"><span class="fa fa-play"></span></a>
										</div>
									</div>
									<div class="slider-one_arrow"
										style="background-image:url({{asset('FrontendAssets/images/main-slider/vector-2.png')}})"></div>
								</div>
							</div>
						</div>
					</div>

                    @endforeach

				

				</div>

				<!-- If we need pagination -->
				<div class="slider-one_pagination"></div>

			</div>
			<!-- Slider One Socials -->
			<div class="slider-one_socials">
				<a href="#">facebook</a>
				<a href="#">instagram</a>
				<a href="#">twitter</a>
			</div>

			<!-- Slider Two Options -->
			<div class="slider-two_options">
				<div class="button">
					<a class="service-btn" href="javascript:;">More About Us <i class="fa-arrow-right"></i></a>
				</div>
				<div class="slider-two_authors">
					<ul>
						<li><img src="{{asset('FrontendAssets/images/main-slider/author-1.png')}}" alt="" /></li>
						<li><img src="{{asset('FrontendAssets/images/main-slider/author-2.png')}}" alt="" /></li>
						<li><img src="{{asset('FrontendAssets/images/main-slider/author-3.png')}}" alt="" /></li>
						<li><img src="{{asset('FrontendAssets/images/main-slider/author-4.png')}}" alt="" /></li>
					</ul>
					<div class="slider-two_reviews">
						25k+ <br> <span>Clients Review</span>
					</div>
				</div>
			</div>
			<!-- End Slider One Options -->

		</section>
		<!-- End Main Slider Section -->

		<section class="ca-bodyseaction d-none">
	

			<div class="ca-container">
				<div class="ca-header">
					<h1 class="ca-title">Product Catalogue</h1>
					<p class="ca-subtitle">Professional Assembly Services for Your Home & Outdoor Equipment</p>
				</div>

				<div class="ca-grid">
					<!-- Wooden Swing Sets -->
					<div class="ca-card">
						<span class="ca-badge">Popular</span>
						<div class="ca-icon-wrapper">
							<img src="{{asset('FrontendAssets/images/resource/serv1.jpg')}}" alt="Wooden Swing Sets">
						</div>
						<h3 class="ca-card-title">Wooden Swing Sets</h3>
						<p class="ca-card-description">Expert installation of premium wooden swing sets and playsets for
							endless family fun and outdoor memories.</p>
						<ul class="ca-features-list">
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Complete assembly &
								installation</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Safety inspection included
							</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> All tools & hardware
								provided</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Level ground preparation
							</li>
						</ul>
						<button class="ca-button">Request Assembly</button>
					</div>

					<!-- Playset Relocation -->
					<div class="ca-card">
						<div class="ca-icon-wrapper">
							<img src="{{asset('FrontendAssets/images/resource/service-2.jpg')}}" alt="Playset Relocation">
						</div>
						<h3 class="ca-card-title">Playset Relocation</h3>
						<p class="ca-card-description">Professional dismantling, transportation, and reassembly of used
							playsets to your new location with care.</p>
						<ul class="ca-features-list">
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Careful disassembly process
							</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Secure transportation</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Professional reassembly</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Structural integrity check
							</li>
						</ul>
						<button class="ca-button">Get Quote</button>
					</div>

					<!-- Basketball Goals -->
					<div class="ca-card">
						<div class="ca-icon-wrapper">
							<img src="{{asset('FrontendAssets/images/resource/serv3.jpg')}}" alt="Basketball Goals">
						</div>
						<h3 class="ca-card-title">Basketball Goals</h3>
						<p class="ca-card-description">Professional installation of in-ground and portable basketball
							hoops for your driveway or backyard court.</p>
						<ul class="ca-features-list">
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> In-ground installation</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Portable system assembly
							</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Height adjustment setup</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Stability verification</li>
						</ul>
						<button class="ca-button">Book Service</button>
					</div>

					<!-- Exercise Equipment -->
					<div class="ca-card">
						<span class="ca-badge">Featured</span>
						<div class="ca-icon-wrapper">
							<img src="{{asset('FrontendAssets/images/resource/service-1.jpg')}}" alt="Exercise Equipment">
						</div>
						<h3 class="ca-card-title">Exercise Equipment</h3>
						<p class="ca-card-description">Expert assembly of treadmills, ellipticals, weight benches, and
							all fitness equipment for your home gym.</p>
						<ul class="ca-features-list">
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Treadmill assembly</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Weight bench setup</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Multi-gym installation</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Function testing included
							</li>
						</ul>
						<button class="ca-button">Schedule Now</button>
					</div>

					<!-- Outdoor Equipment -->
					<div class="ca-card">
						<div class="ca-icon-wrapper">
							<img src="{{asset('FrontendAssets/images/resource/serv5.jpg')}}" alt="Outdoor Equipment">
						</div>
						<h3 class="ca-card-title">Outdoor Equipment</h3>
						<p class="ca-card-description">Assembly of trampolines, gazebos, patio furniture, grills, and
							other outdoor gear for your backyard oasis.</p>
						<ul class="ca-features-list">
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Trampoline installation</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Gazebo assembly</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Patio furniture setup</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Grill assembly</li>
						</ul>
						<button class="ca-button">Get Started</button>
					</div>

					<!-- Indoor Furniture -->
					<div class="ca-card">
						<div class="ca-icon-wrapper">
							<img src="{{asset('FrontendAssets/images/resource/about-furniture.jpg')}}" alt="Indoor Furniture">
						</div>
						<h3 class="ca-card-title">Indoor Furniture</h3>
						<p class="ca-card-description">Professional assembly of beds, desks, entertainment centers,
							shelving units, and all home furniture items.</p>
						<ul class="ca-features-list">
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Bedroom furniture assembly
							</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Office desk setup</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Storage solutions</li>
							<li class="ca-feature-item"><i class="fas fa-check-circle"></i> Entertainment centers</li>
						</ul>
						<button class="ca-button">Learn More</button>
					</div>
				</div>
			</div>
		</section>

		<section class="catalogue-section">
			<div class="parent_spinner">
				<div class="spinner">
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
			</div>


	<div class="new_catalogue">
    <div class="catalogue-header">
        <h1 class="catalogue-title">Product Catalogue</h1>

        <div class="tabs-container">
            @foreach($categories as $index => $category)
                <button 
                    class="tab-btn {{ $index === 0 ? 'active' : '' }}" 
                    data-tab="category-{{ $category->id }}">
                    {{ $category->title }}
                </button>
            @endforeach
        </div>
    </div>

    @foreach($categories as $index => $category)
        <div id="category-{{ $category->id }}" class="tab-content {{ $index === 0 ? 'active' : '' }}">
            <div class="slider-wrapper">
                <button class="slider-btn next" onclick="slide('category-{{ $category->id }}', -1)">‹</button>
                <div class="slider-container">
                    <div class="slider-track" id="category-{{ $category->id }}-track">
                        @forelse($category->products as $product)
                            <div class="product-card">
                                <img src="{{ asset($product->f_image ?? 'public/FrontendAssets/images/default.png') }}" 
                                     alt="{{ $product->name }}" 
                                     class="product-image">

                                <h3 class="product-title">{{ $product->title }}</h3>

                                <div class="product-brand">
                                    <span class="brand-icon">✓</span>
                                    <span>{{ $category->title }}</span>
                                </div>

                                <a href="{{ url('/product/'.$product->slug) }}">
                                    <button class="cta-button">Get a Quote</button>
                                </a>
                            </div>
                        @empty
                            <p>No products found in this category.</p>
                        @endforelse
                    </div>
                </div>
                <button class="slider-btn prev" onclick="slide('category-{{ $category->id }}', 1)">›</button>
            </div>
        </div>
    @endforeach
</div>



			<div class="disclaimer-banner">
				<div class="content-wrapper">
					<h1>Important Service Disclaimer</h1>

					<p class="disclaimer-text">
						Please be advised that the price for this item on the catalog page covers the professional
						installation service only for the wooden swing set shown.
					</p>

					<div class="highlight-box">
						<p class="highlight-text">
							The cost listed DOES NOT include the price of the wooden swing set kit itself.
						</p>
					</div>

					<p class="responsibility-text">
						The client is responsible for purchasing and providing the complete swing set kit prior to the
						scheduled installation. Our service is limited to the assembly and securing of the
						client-supplied materials.
					</p>
				</div>
			</div>
		</section>


		<!-- About One -->
		<section class="about-one">
			<div class="about-one_pattern-layer" style="background-image:url({{asset('FrontendAssets/images/background/pattern-1.png')}})">
			</div>
			<div class="about-one_cap" style="background-image:url({{asset('FrontendAssets/images/icons/about-cap.png')}})"></div>
			<div class="auto-container">
				<div class="sec-title title-anim">
					<div class="sec-title_title">WHO WE ARE</div>
					<h2 class="sec-title_heading">The most trusted assembly and installation service provider for
						families nationwide.</h2>
				</div>

				<div class="row clearfix">

					<!-- Image Column -->
					<div class="about-one_image-column col-lg-7 col-md-12 col-sm-12">
						<div class="about-one_image-outer">
							<div class="row clearfix">
								<div class="column col-lg-4 col-md-6 col-sm-6">
									<div class="image">
										<img src="{{asset('FrontendAssets/images/resource/about-furniture.jpg')}}" alt="" />
									</div>
									<div class="about-construction_image">
										<img src="{{asset('FrontendAssets/images/icons/about.png')}}" alt="" />
									</div>
									<!-- Button Box -->
									<!-- <div class="about-one_button">
										<a href="javascript:;" class="theme-btn btn-style-three">
											<span class="btn-wrap">
												<span class="text-one">learn more <i><img
															src="assets/images/icons/arrow-1.svg" alt="" /></i></span>
												<span class="text-two">learn more <i><img
															src="assets/images/icons/arrow-1.svg" alt="" /></i></span>
											</span>
										</a>
									</div> -->

								</div>
								<div class="column col-lg-8 col-md-6 col-sm-6">
									<div class="image">
										<img src="{{asset('FrontendAssets/images/resource/about.technique.jpg')}}" alt="" />
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Content Column -->
					<div class="about-one_content-column col-lg-5 col-md-12 col-sm-12">
						<div class="about-one_content-outer">

							<!-- Feature Block One -->
							<div class="feature-block_one">
								<h4 class="feature-block_one-title">Our vision</h4>
								<div class="feature-block_one-text">{{$about_details->about_vision}}</div>
							</div>

							<!-- Feature Block One -->
							<div class="feature-block_one">
								<h4 class="feature-block_one-title">Our mission</h4>
								<div class="feature-block_one-text">{{$about_details->about_mission}}
								</div>
							</div>

							<div class="row clearfix">

								<!-- Feature Block Two -->
								<div class="feature-block_two col-lg-6 col-md-6 col-sm-6">
									<div class="feature-block_two-inner">
										<h4 class="feature-block_two-title">Local Reach</h4>
										<div class="feature-block_two-icon">
											<i><img src="{{asset('FrontendAssets/images/icons/feature-1.svg')}}" alt="" /></i>
										</div>
										<div class="feature-block_two_count"><span class="odometer"
												data-count="{{$about_details->local_reach_value}}"></span><sup>+</sup></div>
										<div class="feature-block_two_text">Happy Families Served</div>
									</div>
								</div>

								<!-- Feature Block Two -->
								<div class="feature-block_two col-lg-6 col-md-6 col-sm-6">
									<div class="feature-block_two-inner">
										<h4 class="feature-block_two-title">Trusted Expertise</h4>
										<div class="feature-block_two-icon">
											<i><img src="{{asset('FrontendAssets/images/icons/feature-2.svg')}}" alt="" /></i>
										</div>
										<div class="feature-block_two_count"><span class="odometer"
												data-count="{{$about_details->trusted_expertise_value}}"></span><sup>+</sup></div>
										<div class="feature-block_two_text">Successful Playset & Equipment</div>
									</div>
								</div>

							</div>

						</div>
					</div>

				</div>

			</div>
		</section>
		<!-- End About One -->

	<!-- Program One -->
	<section class="service-one">
			<div class="service-one_shadow"></div>
			<div class="auto-container">
				<div class="inner-container py-5">
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


		<!-- Fluid One -->
		<section class="fluid-one">
			<div class="outer-container">
				<div class="clearfix">
					<!-- Left Box -->
					<div class="left-box">
						<div class="left-box_inner">
							<div class="fluid-one_image">
								<img src="{{asset('FrontendAssets/images/resource/assembly.jpg')}}" alt="Assembly Services Team" />
							</div>
						</div>
					</div>

					<!-- Right Box -->
					<div class="right-box clearfix">
						<div class="right-box_inner">
							<!-- Sec Title -->
							<div class="sec-title title-anim mb-4">
								<div class="sec-title_title">Assembly Services Team</div>
								<h2 class="sec-title_heading">{{ $home_details->heading }}</h2>
								<div class="sec-title_text">{!! $home_details->description !!}</div>
							</div>
							<!-- <p><b>By creating a technician profile, you’ll be able to:</b></p> -->
							<ul class="fluid-one_list">
@php
    $points = is_array($home_details->points) 
        ? $home_details->points 
        : json_decode($home_details->points, true);
@endphp

@if(!empty($points))
    <ul class="fluid-one_list">
        @foreach($points as $point)
            <li>
                <i class="fa-classic fa-solid fa-circle-check fa-fw"></i>
                {{ $point }}
            </li>
        @endforeach
    </ul>
@endif


							</ul>
							<div class="d-flex justify-content-between flex-wrap">
								<div class="fluid-one_experiance">{{ $home_details->experience }}<sup>+</sup><span>Experience</span></div>
								<div class="fluid-one_author">
									<div class="fluid-one_author-inner">
										<div class="fluid-one_author-image">
											<img src="{{asset('FrontendAssets/images/resource/author-1.png')}}" alt="" />
										</div>
										{{ $home_details->name }}
										<span>{{ $home_details->designation }}</span>
									</div>
								</div>
							</div>

							<div class="fluid-one_video d-flex justify-content-start align-items-center flex-wrap">
								<div class="fluid-one_author">
									<img src="{{asset('FrontendAssets/images/resource/author-2.png')}}" alt="" />
								</div>
								<div class="fluid-one_video-text">{{ $home_details->badge }}</div>
								
							</div>

						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- End Fluid One -->

			<!-- Project One -->
		<section class="project-one projectSec py-5">
			<div class="auto-container">
				<div class="sec-title title-anim centered">
					<div class="sec-title_title">Our Projects</div>
					<h2 class="sec-title_heading">Professional Swing Set <br> Installation Made Easy</h2>
				</div>
				<div class="project-style-one-items">

@foreach($projects as $project)
					<!-- Project Block One -->
					<div class="project-block_one">
						<div class="project-block_one-inner">
							<div class="project-block_one-image">
								<img src="{{asset($project->image)}}" alt="" />
								<div class="project-block_one-overlay">
									<div class="project-block_one-overlay_inner"
										style="background-image:url({{asset('FrontendAssets/images/background/project-1.png')}})">
										<div class="d-flex justify-content-between align-items-center flex-wrap">
											<div class="project-block_one-title">{{ $project->type }}</div>
											<div class="project-block_one-location"><i class="icon"><img
														src="{{asset('FrontendAssets/images/icons/location.svg')}}" alt="" /></i> {{ $project->location }}</div>
										</div>
										<h3 class="project-block_one-heading"><a href="{{ url('/project/'.$project->id) }}">{{ $project->title }}</a></h3>
										<div class="project-block_one-text">A full assembly of a 6-piece wooden swing
											set with monkey bars and slide. Completed in just 4 hours with safety checks
											included.</div>
										<a href="{{ url('/project/'.$project->id) }}" class="project-block_one-arrow">
											<i class="fa-classic fa-solid fa-arrow-right fa-fw"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
@endforeach

				</div>

			</div>
		</section>
		<!-- End Project One -->

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
                    {{--
					<div class="testimonial-one_button">
						<a href="javascript:;" class="theme-btn btn-style-three">
							<span class="btn-wrap">
								<span class="text-one">Discover More <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}"
											alt="" /></i></span>
								<span class="text-two">Discover More <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}"
											alt="" /></i></span>
							</span>
						</a>
					</div>
                    --}}
					<!-- End Testimonial One Button -->

				</div>

				<div class="testimonial-one_carousel">

					<div class="single-item_carousel swiper-container">
						<div class="swiper-wrapper">

            @foreach($testimonials as $testimonial)
							<!-- Slide -->
							<div class="swiper-slide">
								<!-- Testimonial Block One -->
								<div class="testimonial-block_one">
									<div class="testimonial-block_one-inner">
										<div class="testimonial-block_one-text">“{{$testimonial->review}}”</div>
										<div class="testimonial-block_one-designation">
											{{$testimonial->name}} <span>{{$testimonial->type}}</span>
										</div>
									</div>
								</div>
							</div>

            @endforeach



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
						<div class="counter-block_one-inner wow fadeInLeft" data-wow-delay="0ms"
							data-wow-duration="1500ms">
							<div class="counter-block_one-outline"></div>
							<div class="counter-block_one-count"><span class="odometer"
									data-count="48"></span><sup>+</sup></div>
							<div class="counter-block_one-text">completed <br> projects</div>
						</div>
					</div>

					<!-- Counter One -->
					<div class="counter-block_one col-lg-3 col-md-6 col-sm-12">
						<div class="counter-block_one-inner wow fadeInLeft" data-wow-delay="0ms"
							data-wow-duration="1500ms">
							<div class="counter-block_one-outline"></div>
							<div class="counter-block_one-count"><span class="odometer"
									data-count="52"></span><sup>+</sup></div>
							<div class="counter-block_one-text">projects in <br> development</div>
						</div>
					</div>

					<!-- Counter One -->
					<div class="counter-block_one col-lg-3 col-md-6 col-sm-12">
						<div class="counter-block_one-inner wow fadeInLeft" data-wow-delay="0ms"
							data-wow-duration="1500ms">
							<div class="counter-block_one-outline"></div>
							<div class="counter-block_one-count"><span class="odometer"
									data-count="2.3"></span>b<sup>+</sup></div>
							<div class="counter-block_one-text">total projects <br> cost</div>
						</div>
					</div>

					<!-- Counter One -->
					<div class="counter-block_one col-lg-3 col-md-6 col-sm-12">
						<div class="counter-block_one-inner wow fadeInLeft" data-wow-delay="0ms"
							data-wow-duration="1500ms">
							<div class="counter-block_one-outline"></div>
							<div class="counter-block_one-count"><span class="odometer"
									data-count="18"></span>m<sup>+</sup></div>
							<div class="counter-block_one-text">square feet <br> of property</div>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- End Counter One -->

		<!-- Faq One -->
		<section class="faq-one">
			<div class="faq-one_pattern" style="background-image:url({{asset('FrontendAssets/images/background/pattern-4.png')}})"></div>
			<div class="auto-container">
				<div class="row clearfix">

					<!-- Image Column -->
					<div class="faq-one_image-column col-lg-5 col-md-12 col-sm-12">
						<div class="faq-one_image titlt" data-tilt data-tilt-max="5">
							<img src="{{asset('FrontendAssets/images/resource/faqsman-2.jpg')}}" alt="" />
						</div>
					</div>

					<!-- Image Column -->
					<div class="faq-one_accordian-column col-lg-7 col-md-12 col-sm-12">
						<div class="faq-one_accordian-outer">
							<!-- Sec Title -->
							<div class="sec-title title-anim">
								<div class="sec-title_title">
									Construction Company
								</div>
								<h2 class="sec-title_heading">regular Question for Customer </h2>
							</div>

							<!-- Accordion Box -->
							<ul class="accordion-box">

								

							

								<!-- Block -->
                                 @foreach($faqs as $faq)
								<li class="accordion block">
									<div class="acc-btn">
										<div class="icon-outer"><span
												class="icon fa-classic fa-solid fa-arrow-right fa-fw"></span></div>Can
									{{$faq->title}}
									</div>
									<div class="acc-content">
										<div class="content">
											<div class="text">	{!! $faq->description !!}</div>
										</div>
									</div>
								</li>
                                @endforeach

								

							</ul>

						</div>
					</div>

				</div>

				<!-- Clients Box One -->
				<div class="clients-box_one">
					<div class="clients-one_slider swiper-container">
						<div class="swiper-wrapper">

                            @foreach($partners as $partner)
							<!-- Slide -->
							<div class="swiper-slide">
								<div class="client-image">
									<a href="#"><img src="{{ asset( $partner->logo) }}" alt="partner" /></a>
								</div>
							</div>
                            @endforeach
					
						

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
		<section class="contact-one">
			<div class="auto-container">
				<div class="sec-title">
					<div class="d-flex justify-content-between align-items-end flex-wrap">
						<div class="left-box">
							<div class="sec-title_title">contact us</div>
							<h2 class="sec-title_heading">Let’s Work Together</h2>
						</div>
						<div class="right-box">
							<div class="sec-title_text">We’d love to share more with you, please complete this form and
								<br> our dedicated team will get back to you shortly.
							</div>
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
									<div class="info-block_one-icon fa-classic fa-solid fa-envelope fa-fw"></div>
                                        <strong>Our Email Us</strong>
                                        {{$business_settings->email}}
                                    
								</div>
							</div>

							<!-- Info Block One -->
							<div class="info-block_one col-lg-6 col-md-6 col-sm-6">
								<div class="info-block_one-inner">
									<div class="info-block_one-icon fa-classic fa-solid fa-phone fa-fw"></div>
									<strong>Call Us</strong>
									{{$business_settings->phone}}
								</div>
							</div>

							

							<!-- Info Block One -->
							<div class="info-block_one col-lg-6 col-md-6 col-sm-6">
								<div class="info-block_one-inner">
									<div class="info-block_one-icon fa-classic fa-solid fa-clock fa-fw"></div>
									<strong>Opening Hours</strong>
								{{$business_settings->opening_hours}}
								</div>
							</div>

							<!-- Info Block One -->
							<!--<div class="info-block_one col-lg-6 col-md-6 col-sm-6">
								<div class="info-block_one-inner">
									<div class="info-block_one-icon fa-classic fa-solid fa-map fa-fw"></div>
									<strong>Location</strong>
									1712 Down Street Monmouth
								</div>
							</div> -->

						</div>
					</div>
					<!-- Column -->
					<div class="column col-lg-6 col-md-12 col-sm-12">
						<!-- Contact Form -->
					 @include('partials.frontend._contactForm')
					</div>
				</div>

				<div class="video-image expand-section">
					<img src="{{asset('FrontendAssets/images/resource/videoSec.jpg')}}" alt="" />
					
				</div>

			</div>
		</section>
		<!-- End Contact One -->

		<!-- Marketing One -->
		<section class="marketing-one">
			<div class="outer-container">

				<div class="animation_mode">	
                @foreach($news as $new)
                <h1>{{$new->title}}</h1>
					<span class="marketing-one_icon"><img src="{{asset('FrontendAssets/images/icons/star.png')}}" alt="" /></span>
                    @endforeach
				</div>
				<div class="animation_mode-two">
                    @foreach($news as $new)
					<h1>{{$new->title}}</h1>
					<span class="marketing-one_icon"><img src="{{asset('FrontendAssets/images/icons/star-1.png')}}" alt="" /></span>
					@endforeach
				</div>
                
			</div>
		</section>
		<!-- End Marketing One -->

		<!-- News One -->
		<section class="news-one">
			<div class="auto-container">
				<div class="sec-title">
					<div class="d-flex justify-content-between align-items-center flex-wrap">
						<div class="left-box">
							<div class="sec-title_title">Our Blog & News</div>
							<h2 class="sec-title_heading">Latest News Posts <br> And Articles</h2>
						</div>
						<!-- Button Box -->
						<div class="news-one_button">
							<a href="javascript:;" class="theme-btn btn-style-three">
								<span class="btn-wrap">
									<span class="text-one">vIEW aLL pOST <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}"
												alt="" /></i></span>
									<span class="text-two">vIEW aLL pOST <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}"
												alt="" /></i></span>
								</span>
							</a>
						</div>
					</div>
				</div>

				<div class="row clearfix">

                    @foreach($blogs as $blog)
					<!-- News Block -->
					<div class="news-block_one col-lg-4 col-md-6 col-sm-12">
						<div class="news-block_one-inner">
							<div class="news-block_one-image_outer">
				<div class="news-block_one-date">
                     {{ $blog->created_at->format('d M') }}
                    </div>
								<div class="news-block_one-image">
									<a href="{{ route('blog.detail', $blog->slug) }}"><img src="{{asset($blog->image)}}" alt="" /></a>
									    <img src="{{asset(asset($blog->image))}}" alt="" />
								</div>
							</div>
							<div class="news-block_one-content">
								<ul class="news-block_one-meta">
									<li><span class="icon fa-regular fa-comments fa-fw"></span>By Admin</li>
									<li><span class="icon fa-regular fa-user fa-fw"></span>02 Comments</li>
								</ul>
								<h4 class="news-block_one-title"><a href="{{ route('blog.detail', $blog->slug) }}">{{$blog->title}}</a></h4>
								<div class="news-block_one-button">
									<a class="news-block_one-more" href="{{ route('blog.detail', $blog->slug) }}">READ MORE</a>
								</div>
							</div>
						</div>
					</div>

                    @endforeach
			

				</div>
			</div>
		</section>
		<!-- End News One -->
        <script>
        // Initialize sliderPositions dynamically based on actual categories on the page
        const sliderPositions = {};
        
        // Initialize positions when DOM is ready
        function initializeSliderPositions() {
            document.querySelectorAll('[id$="-track"]').forEach(track => {
                if (track && track.id) {
                    const categoryId = track.id.replace('-track', '');
                    if (!sliderPositions.hasOwnProperty(categoryId)) {
                        sliderPositions[categoryId] = 0;
                    }
                }
            });
        }
        
        // Initialize on DOM ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initializeSliderPositions);
        } else {
            initializeSliderPositions();
        }

        function slide(category, direction) {
            const track = document.getElementById(`${category}-track`);
            if (!track || !track.children || track.children.length === 0) {
                return;
            }
            
            const cards = track.children;
            const cardWidth = cards[0].offsetWidth + 15;
            const containerWidth = track.parentElement.offsetWidth;
            const visibleCards = Math.floor(containerWidth / cardWidth);
            const maxPosition = -(cards.length - visibleCards) * cardWidth;

            // Initialize position if not exists
            if (typeof sliderPositions[category] === 'undefined') {
                sliderPositions[category] = 0;
            }

            sliderPositions[category] += direction * cardWidth;

            if (sliderPositions[category] > 0) {
                sliderPositions[category] = 0;
            } else if (sliderPositions[category] < maxPosition) {
                sliderPositions[category] = maxPosition;
            }

            track.style.transform = `translateX(${sliderPositions[category]}px)`;
        }

        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const targetTab = btn.dataset.tab;

                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

                btn.classList.add('active');
                document.getElementById(targetTab).classList.add('active');
            });
        });

        window.addEventListener('resize', () => {
            Object.keys(sliderPositions).forEach(category => {
                sliderPositions[category] = 0;
                const track = document.getElementById(`${category}-track`);
                if (track) {
                    track.style.transform = 'translateX(0)';
                }
            });
        });
    </script>
@endsection



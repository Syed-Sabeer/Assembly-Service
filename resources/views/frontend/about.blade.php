@extends('layouts.frontend.master')


@section('css')
@endsection

@section('content')


	<!-- Page Title -->
    <section class="page-title" style="background-image:url(/public/FrontendAssets/images/background/aboutBanner.jpg)">
        <div class="auto-container">
			<h2>About us</h2>
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<ul class="bread-crumb clearfix">
					<li><a href="index.html">Home</a></li>
					<li>About Us</li>
				</ul>
				<div class="page-title_text">At Assembly Services, we deliver professional indoor and outdoor equipment assembly with seamless, hassle-free execution.</div>
			</div>
        </div>
    </section>
    <!-- End Page Title -->

	<!-- About One -->
		<section class="about-one py-5">
			<div class="about-one_pattern-layer" style="background-image:url(assets/images/background/pattern-1.png)">
			</div>
			<div class="about-one_cap" style="background-image:url(assets/images/icons/about-cap.png)"></div>
			<div class="auto-container">
				<div class="sec-title title-anim">
					<div class="sec-title_title">WHO WE ARE</div>
					<h2 class="sec-title_heading">{{ $about_details->about_heading }}</h2>
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
															    src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
												<span class="text-two">learn more <i><img
															src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
											</span>
										</a>
									</div>-->

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
								<div class="feature-block_one-text">{{ $about_details->about_vision }}</div>
							</div>

							<!-- Feature Block One -->
							<div class="feature-block_one">
								<h4 class="feature-block_one-title">Our mission</h4>
								<div class="feature-block_one-text">{{ $about_details->about_mission }}
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
												data-count="{{ $about_details->local_reach_value }}"></span><sup>+</sup></div>
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
												data-count="{{ $about_details->trusted_expertise_value }}"></span><sup>+</sup></div>
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

	<!-- Customer One -->
	<section class="customer-one">
		<div class="auto-container">
			<div class="customer-one_bg">
				<div class="customer-one_pattern" style="background-image:url(assets/images/background/pattern-1.png)"></div>
			</div>
			<div class="inner-container py-5">
				<div class="sec-title centered">
					<div class="sec-title_title">Our Expertise Area</div>
					<h2 class="sec-title_heading">What We Build for <br> Customer</h2>
				</div>
				
				<div class="row clearfix" style="justify-content: center" >
					
					<!-- Customer Block One -->
					<div class="customer-block_one col-lg-4 col-md-6 col-sm-12">
						<div class="customer-block_one-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="customer-block_one-bg" style="background-image:url(/public/FrontendAssets/images/background/cards_img.png)"></div>
							<div class="customer-block_one-number">01</div>
							<div class="customer-block_one-icon">
								<img src="{{asset('FrontendAssets/images/icons/customer-1.svg')}}" alt="" />
							</div>
							<h3 class="customer-block_one-title"><a href="{{ route('services') }}">Outdoor Equipment</a></h3>
							<div class="customer-block_one-text">From wooden swing sets to playsets and basketball goals, we handle complete assembly and relocation with precision and safety.</div>
							<a class="customer-block_one-more" href="{{ route('services') }}">Read More <i class="fa-classic fa-solid fa-plus fa-fw"></i></a>
						</div>
					</div>
					
					<!-- Customer Block One -->
					<div class="customer-block_one col-lg-4 col-md-6 col-sm-12">
						<div class="customer-block_one-inner wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="customer-block_one-bg" style="background-image:url(/public/FrontendAssets/images/background/cards_img.png)"></div>
							<div class="customer-block_one-number">02</div>
							<div class="customer-block_one-icon">
								<img src="{{asset('FrontendAssets/images/icons/customer-2.svg')}}" alt="" />
							</div>
							<h3 class="customer-block_one-title"><a href="{{ route('services') }}">Indoor Equipment</a></h3>
							<div class="customer-block_one-text">We expertly assemble exercise machines, home gyms, and furniture, ensuring a sturdy and professional setup every time contact us for more info.</div>
							<a class="customer-block_one-more" href="{{ route('services') }}">Read More <i class="fa-classic fa-solid fa-plus fa-fw"></i></a>
						</div>
					</div>
					
					<!-- Customer Block One -->
					<!-- <div class="customer-block_one col-lg-4 col-md-6 col-sm-12">
						<div class="customer-block_one-inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="customer-block_one-bg" style="background-image:url(assets/images/background/cards_img.png)"></div>
							<div class="customer-block_one-number">03</div>
							<div class="customer-block_one-icon">
								<img src="{{asset('FrontendAssets/images/icons/customer-3.svg')}}" alt="" />
							</div>
							<h3 class="customer-block_one-title"><a href="javascript:;">Relocation Services</a></h3>
							<div class="customer-block_one-text">Moving? We provide disassembly, transport, and reinstallation for your playsets and other equipment, making your transition smooth and stress-free.</div>
							<a class="customer-block_one-more" href="javascript:;">Read More <i class="fa-classic fa-solid fa-plus fa-fw"></i></a>
						</div>
					</div>-->
					
				</div>
			</div>
		</div>
	</section>
	<!-- End Customer One -->
	
	<!-- About Three -->
	<section class="about-three py-5">
		<div class="about-three_big-title">about</div>
		<div class="about-three_pattern" style="background-image:url({{asset('FrontendAssets/images/background/about-three_pattern.png')}})"></div>
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Content Column -->
				<div class="about-three_content-column col-lg-6 col-md-12 col-sm-12">
					<div class="about-three_content-outer">
						<!-- Sec Title -->
						<div class="sec-title title-anim">
							<div class="sec-title_title">WHO WE ARE</div>
							<h2 class="sec-title_heading">{{ $about_details->whoarewe_heading }}</h2>
							<div class="sec-title_text">{{ $about_details->whoarewe_description }}</div>
						</div>
						<ul class="about-three_list">
                        @php 
                        $values = $about_details->whoarewe_points ?? [];
                        @endphp
                        @if(!empty($values))
                        @foreach($values as $value)
							<li><i class="fa-classic fa-solid fa-circle-check fa-fw"></i>{{ $value }}</li>
                            @endforeach
                            @endif

						</ul>
						<div class="about-three_info">
							<div class="d-flex justify-content-between align-items-center flex-wrap">
								<div class="about-three_text">{{ $about_details->whoarewe_value }}</div>
								<!-- <div class="about-three_author">
									John Smith
									<i>CEO & Founder</i>
									<span><img src="{{asset('FrontendAssets/images/resource/author-6.png')}}" alt="" /></span>
								</div>-->
							</div>
						</div>
						<div class="lower-box d-flex align-items-center flex-wrap">
							<!-- Button Box -->
							<!-- <div class="about-three_button">
								<a href="about.html" class="theme-btn btn-style-three">
									<span class="btn-wrap">
										<span class="text-one">learn more <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
										<span class="text-two">learn more <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
									</span>
								</a>
							</div>-->
							
							<!-- Phone Box -->
							<div class="about-three_phone">
								<div class="about-three_phone-inner">
									<span class="about-three_phone-icon fa-classic fa-solid fa-phone fa-fw"></span>
									Call Us 24/7 <br>
									    <a href="tel:{{$business_settings->phone}}">{{$business_settings->phone}}</a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
				<!-- Image Column -->
				<div class="about-three_images-column col-lg-6 col-md-12 col-sm-12">
					<div class="about-three_images-outer">
						<div class="about-three_image">
							<img src="{{asset('FrontendAssets/images/resource/about-5-5.jpg')}}" alt="" />
						</div>
						<div class="about-three_image-two">
							<img src="{{asset('FrontendAssets/images/resource/about6-6.jpg')}}" alt="" />
						</div>
						<div class="about-three_image-three">
							<img src="{{asset('FrontendAssets/images/resource/about7-7.jpg')}}" alt="" />
						</div>
						<div class="about-three_award">
							<span><img src="{{asset('FrontendAssets/images/icons/award.svg')}}" alt="" /></span>
							We’re a global award <br> wining company
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End About Three -->
	
	<!-- Counter Three -->
	<section class="counter-three">
		<div class="counter-three_pattern" style="background-image:url({{asset('FrontendAssets/images/background/pattern-4.png')}})"></div>
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Counter One -->
				<div class="counter-block_three col-lg-3 col-md-6 col-sm-12">
					<div class="counter-block_three-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="counter-block_three-count"><span class="odometer" data-count="{{ $about_details->about_tab_value1 }}"></span>+</div>
						<h4 class="counter-block_three-title"> {{ $about_details->about_tab_heading1 }}</h4>
						<div class="counter-block_three-text">{{ $about_details->about_tab_description1 }}</div>
					</div>
				</div>
				
				<!-- Counter One -->
				<div class="counter-block_three col-lg-3 col-md-6 col-sm-12">
					<div class="counter-block_three-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="counter-block_three-count"><span class="odometer" data-count="{{ $about_details->about_tab_value2 }}"></span>K+</div>
						<h4 class="counter-block_three-title">{{ $about_details->about_tab_heading2 }}</h4>
						<div class="counter-block_three-text">{{ $about_details->about_tab_description2 }}</div>
					</div>
				</div>
				
				<!-- Counter One -->
				<div class="counter-block_three col-lg-3 col-md-6 col-sm-12">
					<div class="counter-block_three-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="counter-block_three-count"><span class="odometer" data-count="{{ $about_details->about_tab_value3 }}"></span>%</div>
						<h4 class="counter-block_three-title">{{ $about_details->about_tab_heading3 }}</h4>
						<div class="counter-block_three-text">{{ $about_details->about_tab_description3 }}</div>
					</div>
				</div>
				
				<!-- Counter One -->
				<div class="counter-block_three col-lg-3 col-md-6 col-sm-12">
					<div class="counter-block_three-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="counter-block_three-count"><span class="odometer" data-count="{{ $about_details->about_tab_value4 }}"></span>+</div>
						<h4 class="counter-block_three-title">{{ $about_details->about_tab_heading4 }}</h4>
						<div class="counter-block_three-text">{{ $about_details->about_tab_description4 }}</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Counter Three -->
	
	<!-- Price One -->
	<section class="price-one d-none">
		<div class="price-one_circle"></div>
		<div class="price-one_shadow" style="background-image:url({{asset('FrontendAssets/images/background/price-one_bg.png')}})"></div>
		<div class="auto-container">
			<div class="sec-title title-anim centered">
				<div class="sec-title_title">Pricing plan</div>
				<h2 class="sec-title_heading">Choose our service plan.</h2>
			</div>
			
			<!-- Price Block One -->
			<div class="price-block_one">
				<div class="price-block_one-inner">
					<div class="price-block_one-shadow" style="background-image:url({{asset('FrontendAssets/images/background/pattern-6.png')}})"></div>
					<div class="row clearfix">
						<!-- Column -->
						<div class="column col-lg-4 col-md-6 col-sm-12">
							<h3 class="price-block_one-title">Personal</h3>
							<div class="price-block_one-text">Perfect for startups and small <br> businesses.</div>
						</div>
						<!-- Column -->
						<div class="column col-lg-4 col-md-6 col-sm-12">
							<ul class="price-block_one-list">
								<li>Business Solution</li>
								<li>24/7 Construction Service</li>
								<li>Great Customer Support</li>
								<li>24/7 Maintenance Service</li>
								<li>Weekly Project Updates</li>
							</ul>
						</div>
						<!-- Column -->
						<div class="column text-center col-lg-4 col-md-12 col-sm-12">
							<div class="price-block_one-price">$30.69 <span>/ Monthly</span></div>
							<div class="price-block_one-btn">
								<a href="javascript:;" class="theme-btn btn-style-one">
									<span class="btn-wrap">
										<span class="text-one">choose now <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
										<span class="text-two">choose now <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
									</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Price Block One -->
			<div class="price-block_one active">
				<div class="price-block_one-inner">
					<div class="price-block_one-shadow" style="background-image:url({{asset('FrontendAssets/images/background/pattern-6.png')}})"></div>
					<div class="price-block_one-featured">Featured</div>
					<div class="row clearfix">
						<!-- Column -->
						<div class="column col-lg-4 col-md-6 col-sm-12">
							<h3 class="price-block_one-title">Enterprise</h3>
							<div class="price-block_one-text">Perfect for startups and small <br> businesses.</div>
						</div>
						<!-- Column -->
						<div class="column col-lg-4 col-md-6 col-sm-12">
							<ul class="price-block_one-list">
								<li>Business Solution</li>
								<li>24/7 Construction Service</li>
								<li>Great Customer Support</li>
								<li>24/7 Maintenance Service</li>
								<li>Weekly Project Updates</li>
							</ul>
						</div>
						<!-- Column -->
						<div class="column text-center col-lg-4 col-md-12 col-sm-12">
							<div class="price-block_one-price">$59.69 <span>/ Monthly</span></div>
							<div class="price-block_one-btn">
								<a href="javascript:;" class="theme-btn btn-style-one">
									<span class="btn-wrap">
										<span class="text-one">choose now <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
										<span class="text-two">choose now <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
									</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Price Block One -->
			<div class="price-block_one">
				<div class="price-block_one-inner">
					<div class="price-block_one-shadow" style="background-image:url({{asset('FrontendAssets/images/background/pattern-6.png')}})"></div>
					<div class="row clearfix">
						<!-- Column -->
						<div class="column col-lg-4 col-md-6 col-sm-12">
							<h3 class="price-block_one-title">Premium</h3>
							<div class="price-block_one-text">Perfect for startups and small <br> businesses.</div>
						</div>
						<!-- Column -->
						<div class="column col-lg-4 col-md-6 col-sm-12">
							<ul class="price-block_one-list">
								<li>Business Solution</li>
								<li>24/7 Construction Service</li>
								<li>Great Customer Support</li>
								<li>24/7 Maintenance Service</li>
								<li>Weekly Project Updates</li>
							</ul>
						</div>
						<!-- Column -->
						<div class="column text-center col-lg-4 col-md-12 col-sm-12">
							<div class="price-block_one-price">$89.69 <span>/ Monthly</span></div>
							<div class="price-block_one-btn">
								<a href="javascript:;" class="theme-btn btn-style-one">
									<span class="btn-wrap">
										<span class="text-one">choose now <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
										<span class="text-two">choose now <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
									</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>
	<!-- End Price One -->
	
	<!-- Marketing Two -->
	<section class="marketing-two py-5">
		<div class="outer-container">
  <!-- Row 1 -->
  <div class="brands-mode">
    <div class="brand-conetnt">
      <h1>ASSEMBLY</h1>
      <span class="marketing-two_icon"></span>
      <h1 class="light">INSTALLATION</h1>
      <span class="marketing-two_icon"></span>
      <h1>RELOCATION</h1>
      <span class="marketing-two_icon"></span>
    </div>

    <div class="brand-conetnt">
      <h1>ASSEMBLY</h1>
      <span class="marketing-two_icon"></span>
      <h1 class="light">INSTALLATION</h1>
      <span class="marketing-two_icon"></span>
      <h1>RELOCATION</h1>
      <span class="marketing-two_icon"></span>
    </div>
  </div>

  <!-- Row 2 -->
  <div class="brands-mode">
    <div class="brand-conetnt two">
      <span class="marketing-two_icon"></span>
      <h1>PRECISION</h1>
      <span class="marketing-two_icon"></span>
      <h1 class="light">SAFETY</h1>
      <span class="marketing-two_icon"></span>
      <h1>EFFICIENCY</h1>
      <span class="marketing-two_icon"></span>
      <h1>TRUST</h1>
    </div>

    <div class="brand-conetnt two">
      <h1>PRECISION</h1>
      <span class="marketing-two_icon"></span>
      <h1 class="light">SAFETY</h1>
      <span class="marketing-two_icon"></span>
      <h1>EFFICIENCY</h1>
      <span class="marketing-two_icon"></span>
      <h1>TRUST</h1>
    </div>
  </div>
		</div>
	</section>
	<!-- End Marketing Two -->
	
	<!-- Testimonial One -->
	<section class="testimonial-one d-none">
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
				<div class="testimonial-one_button">
					<a href="{{ route('about') }}" class="theme-btn btn-style-three">
						<span class="btn-wrap">
							<span class="text-one">Discover More <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
							<span class="text-two">Discover More <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
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
									<div class="testimonial-block_one-text">“They know their business and their approach, professional efforts and manner of doing business  works well as a team player with the owners and their other  consultants.”</div>
									<div class="testimonial-block_one-designation">
										Ralph Adams <span>Construction Admin., Assistant Project Manager</span>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Slide -->
						<div class="swiper-slide">
							<!-- Testimonial Block One -->
							<div class="testimonial-block_one">
								<div class="testimonial-block_one-inner">
									<div class="testimonial-block_one-text">“They know their business and their approach, professional efforts and manner of doing business  works well as a team player with the owners and their other  consultants.”</div>
									<div class="testimonial-block_one-designation">
										Ralph Adams <span>Construction Admin., Assistant Project Manager</span>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Slide -->
						<div class="swiper-slide">
							<!-- Testimonial Block One -->
							<div class="testimonial-block_one">
								<div class="testimonial-block_one-inner">
									<div class="testimonial-block_one-text">“They know their business and their approach, professional efforts and manner of doing business  works well as a team player with the owners and their other  consultants.”</div>
									<div class="testimonial-block_one-designation">
										Ralph Adams <span>Construction Admin., Assistant Project Manager</span>
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
						<div class="sec-title title-anim">
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

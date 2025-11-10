@extends('layouts.frontend.master')


@section('css')
@endsection

@section('content')
	<!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset('FrontendAssets/images/background/banner2-Edited.jpg')}})">
        <div class="auto-container">
			<h2>Our Projects</h2>
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<ul class="bread-crumb clearfix">
					<li><a href="{{route('home')}}">Home</a></li>
					<li>Projects</li>
				</ul>
				<div class="page-title_text">Whether you need assembly, relocation, or installation, we deliver seamless and reliable service—all under one roof.</div>
			</div>
        </div>
    </section>
    <!-- End Page Title -->
	
	<!-- Project Four -->
	<section class="project-four d-none" style="background-image:url({{asset('FrontendAssets/images/background/pattern-13.png')}})">
		<div class="auto-container">
			<div class="sec-title centered">
				<div class="sec-title_title">Our Projects</div>
				<h2 class="sec-title_heading">We Provide Effective Solution <br> in Construction</h2>
			</div>
			
			<div class="row clearfix">
				
				<!-- Project Block Three -->
				<div class="project-block_three col-lg-4 col-md-6 col-sm-12">
					<div class="project-block_three-inner">
						<div class="project-block_three-image">
							<img src="{{asset('FrontendAssets/images/gallery/10.jpg')}}" alt="" />
							<div class="project-block_three-overlay">
								<div class="project-block_three-designation">Architecture</div>
								<div class="project-block_three-location"><i><img src="{{asset('FrontendAssets/images/icons/location-2.svg')}}" alt="" /></i> Spotswood, NJ</div>
								<h3 class="project-block_three-title"><a href="/project-details">Develop Comprehensive</a></h3>
								<!-- Button Box -->
								<div class="project-block_three_button">
									<a href="/project-details" class="theme-btn btn-style-one">
										<span class="btn-wrap">
											<span class="text-one">explore project <i><img src="{{asset('/public/FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
											<span class="text-two">explore project <i><img src="{{asset('/public/FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Project Block Three -->
				<div class="project-block_three col-lg-4 col-md-6 col-sm-12">
					<div class="project-block_three-inner">
						<div class="project-block_three-image">
								<img src="{{asset('FrontendAssets/images/gallery/11.jpg')}}" alt="" />
							<div class="project-block_three-overlay">
								<div class="project-block_three-designation">Architecture</div>
								<div class="project-block_three-location"><i><img src="{{asset('FrontendAssets/images/icons/location-2.svg')}}" alt="" /></i> Spotswood, NJ</div>
								<h3 class="project-block_three-title"><a href="{{route('about')}}">Work With Energetic Team</a></h3>
								<!-- Button Box -->
								<div class="project-block_three_button">
									<a href="{{route('about')}}" class="theme-btn btn-style-one">
										<span class="btn-wrap">
											<span class="text-one">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
											<span class="text-two">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Project Block Three -->
				<div class="project-block_three col-lg-4 col-md-6 col-sm-12">
					<div class="project-block_three-inner">
						<div class="project-block_three-image">
							<img src="{{asset('FrontendAssets/images/gallery/12.jpg')}}" alt="" />
							<div class="project-block_three-overlay">
								<div class="project-block_three-designation">Architecture</div>
								<div class="project-block_three-location"><i><img src="{{asset('FrontendAssets/images/icons/location-2.svg')}}" alt="" /></i> Spotswood, NJ</div>
								<h3 class="project-block_three-title"><a href="{{route('about')}}">Commercial & Residential Building</a></h3>
								<!-- Button Box -->
								<div class="project-block_three_button">
									<a href="{{route('about')}}" class="theme-btn btn-style-one">
										<span class="btn-wrap">
											<span class="text-one">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
											<span class="text-two">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Project Block Three -->
				<div class="project-block_three col-lg-4 col-md-6 col-sm-12">
					<div class="project-block_three-inner">
						<div class="project-block_three-image">
							<img src="{{asset('FrontendAssets/images/gallery/13.jpg')}}" alt="" />
							<div class="project-block_three-overlay">
								<div class="project-block_three-designation">Architecture</div>
								<div class="project-block_three-location"><i><img src="{{asset('FrontendAssets/images/icons/location-2.svg')}}" alt="" /></i> Spotswood, NJ</div>
								<h3 class="project-block_three-title"><a href="{{route('about')}}">Mixed-Use Development</a></h3>
								<!-- Button Box -->
								<div class="project-block_three_button">
											<a href="{{route('about')}}" class="theme-btn btn-style-one">
										<span class="btn-wrap">
											<span class="text-one">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
											<span class="text-two">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Project Block Three -->
				<div class="project-block_three col-lg-4 col-md-6 col-sm-12">
					<div class="project-block_three-inner">
						<div class="project-block_three-image">
							<img src="{{asset('FrontendAssets/images/gallery/14.jpg')}}" alt="" />
							<div class="project-block_three-overlay">
								<div class="project-block_three-designation">Architecture</div>
								<div class="project-block_three-location"><i><img src="{{asset('FrontendAssets/images/icons/location-2.svg')}}" alt="" /></i> Spotswood, NJ</div>
								<h3 class="project-block_three-title"><a href="{{route('about')}}">Premier Office Tower</a></h3>
								<!-- Button Box -->
								<div class="project-block_three_button">
									<a href="{{route('about')}}" class="theme-btn btn-style-one">
										<span class="btn-wrap">
											<span class="text-one">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
											<span class="text-two">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Project Block Three -->
				<div class="project-block_three col-lg-4 col-md-6 col-sm-12">
					<div class="project-block_three-inner">
						<div class="project-block_three-image">
							<img src="{{asset('FrontendAssets/images/gallery/15.jpg')}}" alt="" />
							<div class="project-block_three-overlay">
								<div class="project-block_three-designation">Architecture</div>
								<div class="project-block_three-location"><i><img src="{{asset('FrontendAssets/images/icons/location-2.svg')}}" alt="" /></i> Spotswood, NJ</div>
								<h3 class="project-block_three-title"><a href="{{route('about')}}">Greenview Apartments</a></h3>
								<!-- Button Box -->
								<div class="project-block_three_button">
									<a href="{{route('about')}}" class="theme-btn btn-style-one">
										<span class="btn-wrap">
											<span class="text-one">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
											<span class="text-two">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Project Block Three -->
				<div class="project-block_three col-lg-4 col-md-6 col-sm-12">
					<div class="project-block_three-inner">
						<div class="project-block_three-image">
							<img src="{{asset('FrontendAssets/images/gallery/16.jpg')}}	" alt="" />
							<div class="project-block_three-overlay">
								<div class="project-block_three-designation">Architecture</div>
								<div class="project-block_three-location"><i><img src="{{asset('FrontendAssets/images/icons/location-2.svg')}}" alt="" /></i> Spotswood, NJ</div>
								<h3 class="project-block_three-title"><a href="{{route('about')}}">Residential Complex</a></h3>
								<!-- Button Box -->
								<div class="project-block_three_button">
									<a href="{{route('about')}}" class="theme-btn btn-style-one">
										<span class="btn-wrap">
											<span class="text-one">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
											<span class="text-two">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Project Block Three -->
				<div class="project-block_three col-lg-4 col-md-6 col-sm-12">
					<div class="project-block_three-inner">
						<div class="project-block_three-image">
							<img src="{{asset('FrontendAssets/images/gallery/17.jpg')}}" alt="" />
							<div class="project-block_three-overlay">
								<div class="project-block_three-designation">Architecture</div>
								<div class="project-block_three-location"><i><img src="{{asset('FrontendAssets/images/icons/location-2.svg')}}" alt="" /></i> Spotswood, NJ</div>
								<h3 class="project-block_three-title"><a href="{{route('about')}}">Urban Heights Residence</a></h3>
								<!-- Button Box -->
								<div class="project-block_three_button">
									<a href="{{route('about')}}" class="theme-btn btn-style-one">
										<span class="btn-wrap">
											<span class="text-one">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
											<span class="text-two">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Project Block Three -->
				<div class="project-block_three col-lg-4 col-md-6 col-sm-12">
					<div class="project-block_three-inner">
						<div class="project-block_three-image">
							<img src="{{asset('FrontendAssets/images/gallery/18.jpg')}}" alt="" />
							<div class="project-block_three-overlay">
								<div class="project-block_three-designation">Architecture</div>
								<div class="project-block_three-location"><i><img src="{{asset('FrontendAssets/images/icons/location-2.svg')}}" alt="" /></i> Spotswood, NJ</div>
								<h3 class="project-block_three-title"><a href="">Vista at Councill Square</a></h3>
								<!-- Button Box -->
								<div class="project-block_three_button">
									<a href="{{route('about')}}" class="theme-btn btn-style-one">
										<span class="btn-wrap">
												<span class="text-one">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
											<span class="text-two">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			
			<!-- Styled Pagination -->
			<ul class="styled-pagination text-center">
				<li class="prev"><a href="#"><i class="fa-solid fa-angle-left fa-fw"></i></a></li>
				<li><a href="#" class="active">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li class="next"><a href="#"><i class="fa-solid fa-angle-right fa-fw"></i></a></li>
			</ul>
			<!-- End Styled Pagination -->
			
		</div>
	</section>
	<!-- End Project Four -->
	
	<!-- Project Two -->
	<section class="project-two py-5">
		<div class="project-two_bg" style="background-image:url({{asset('FrontendAssets/images/background/2.jpg')}})"></div>
		<div class="auto-container">
			<div class="sec-title light">
				<div class="sec-title_title">Our Projects</div>
				<h2 class="sec-title_heading">We Deliver Reliable Assembly <br> and Installation Solutions</h2>
			</div>
			
			<div class="outer-box">

			@foreach($projects as $project)
				<div class="project-block-four">
					<div class="inner-box">
						<div class="image-box">
							<figure class="image"><a href="{{ url('/project/'.$project->id) }}"><img src="{{asset($project->image)}}" alt="Image"></a></figure>
						</div>
						<div class="content-box">
							<span class="float-text">Assembly Services</span>
							<span class="cat"><i class="icon"><img src="{{asset('FrontendAssets/images/icons/location-1.svg')}}" alt="" /></i> {{ $project->location }}</span>
							<h3 class="title"><a href="{{ url('/project/'.$project->id) }}">{{ $project->title }}</a></h3>
							<div class="button">
								<a href="{{ url('/project/'.$project->id) }}" class="theme-btn btn-style-one">
									<span class="btn-wrap">
										<span class="text-one">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
										<span class="text-two">explore project <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
									</span>
								</a>
							</div>
						</div>
						<div class="content-box-hover">
							<h3 class="title"><a href="{{ url('/project/'.$project->id) }}">{{ $project->title }}</span></a></h3>
						</div>
						<div class="overlay-1"></div>
					</div>
				</div>
                @endforeach
				
		
			
			</div>
			
		</div>
	</section>
	<!-- End Project Two -->


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

								

								@foreach($faqs as $faq)
								<li class="accordion block">
									<div class="acc-btn">
										<div class="icon-outer"><span
												class="icon fa-classic fa-solid fa-arrow-right fa-fw"></span></div>
												{{$faq->title}}
									</div>
									<div class="acc-content">
										<div class="content">
											<div class="text">{!! $faq->description !!}</div>
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
	
	<!-- Clients Box One -->
	<div class="clients-box_one style-two d-none">
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

@endsection

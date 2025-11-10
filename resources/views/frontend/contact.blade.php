@extends('layouts.frontend.master')


@section('css')

@endsection

@section('content')



	<!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset('FrontendAssets/images/background/contact-banner2-Edited.jpg')}});     background-position: bottom;">
        <div class="auto-container">
			<h2>Contact Us</h2>
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<ul class="bread-crumb clearfix">
					<li><a href="index.html">Home</a></li>
					<li>Contact Us</li>
				</ul>
				<div class="page-title_text">Whether you’re building, remodeling, buying, or selling, we bring seamless project execution under one roof.</div>
			</div>
        </div>
    </section>
    <!-- End Page Title -->
	
	<!-- Contact Three -->
	<section class="contact-three" id="contact">
		<div class="page-top_pattern" style="background-image:url({{asset('FrontendAssets/images/background/pattern-13.png')}})"></div>
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Form Column -->
				<div class="contact-three_form-column col-lg-7 col-md-6 col-sm-12">
					<div class="contact-three_form-outer">
						<!-- Sec Title -->
						<div class="sec-title">
							<div class="sec-title_title">
								Keep In Touch
							</div>
							<h3 class="sec-title_heading">Get in touch with our <br> lovely team </h3>
						</div>
						
                              @include('partials.frontend._contactForm')
			
						
					</div>
				</div>
				
				<!-- Info Column -->
				<div class="contact-three_info-column col-lg-5 col-md-6 col-sm-12">
					<div class="contact-three_info-outer">
						<h3>Contact <br> Information</h3>
						<div class="contact-info_text">We’ve grown up with the internet revolution, <br> and we know how to deliver on its</div>
						
						<!-- Info Block -->
						<!-- <div class="contact-info_block">
							<div class="contact-info_block-inner">
								<div class="contact-info_block-icon">
									<i class="fa-classic fa-solid fa-location-dot fa-fw"></i>
								</div>
								<h4>Location</h4>
								<p>1712 Down Street Monmouth Alex <br> Junction, Florida 0852</p>
							</div>
						</div> -->

						<!-- Info Block -->
						<div class="contact-info_block">
							<div class="contact-info_block-inner">
								<div class="contact-info_block-icon">
									<i class="fa-classic fa-solid fa-phone fa-fw"></i>
								</div>
								<h4>Phone</h4>
								<p>{{$business_settings->phone}} <br> 
                                {{$business_settings->email}}</p>
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- End Faq One -->
	
	<!-- Map One -->
	<section class="map-one d-none">
		<div class="auto-container">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805184.6331292129!2d144.49266890254142!3d-37.97123689954809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2s!4v1574408946759!5m2!1sen!2s" allowfullscreen=""></iframe>
		</div>
	</section>
	<!-- End Map One -->
	
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
	
	<!-- Clients Box One -->
	<div class="clients-box_one style-two">
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

@section('script')

@endsection
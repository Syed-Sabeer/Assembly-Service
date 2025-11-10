@extends('layouts.frontend.master')


@section('css')
@endsection

@section('content')


	<!-- Page Title -->
    <section class="page-title" style="background-image:url({{ asset($service->bg_image ?? 'FrontendAssets/images/resource/service-detailbannerEdited.jpg') }})">
        <div class="auto-container">
			<h2>{{ $service->heading ?? 'Service Details' }}</h2>
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<ul class="bread-crumb clearfix">
					<li><a href="{{ route('home') }}">Home</a></li>
					<li><a href="{{ route('services') }}">Services</a></li>
					<li>{{ $service->heading ?? 'Service Details' }}</li>
				</ul>
				<div class="page-title_text">{{ \Illuminate\Support\Str::limit(strip_tags($service->description ?? "Whether you're building, remodeling, buying, or selling, we bring seamless project execution under one roof."), 100) }}</div>
			</div>
        </div>
    </section>
    <!-- End Page Title -->
	
	<!-- Sidebar Page Container -->
    <div class="sidebar-page-container left-sidebar">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar sticky-top">
						
						<!-- Category Widget -->
						<div class="sidebar-widget category-widget">
							<div class="sidebar-title">
								<h4>More Services</h4>
							</div>
							<ul class="category-list">
								@forelse($relatedServices as $relatedService)
								<li>
									<a href="{{ route('service.detail', $relatedService->slug ?? $relatedService->id) }}">
										<span class="icon fa-classic fa-solid fa-arrow-right fa-fw"></span>
										{{ $relatedService->heading }}
									</a>
								</li>
								@empty
								<li><a href="{{ route('services') }}">
									<span class="icon fa-classic fa-solid fa-arrow-right fa-fw"></span>
									View All Services
								</a></li>
								@endforelse
							</ul>
						</div>
						
					
						
					</aside>
				</div>
				
				<!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
					<!-- Service Detail -->
					<div class="service-detail">
						<div class="service-detail_inner">
							@if($service->bg_image)
							<div class="service-detail_image">
								<img src="{{ asset($service->bg_image) }}" alt="{{ $service->heading }}" />
								<div class="service-detail_tag">
									<span>Assembly Services</span>
								</div>
							</div>
							@endif
							<h2 class="service-detail_title">{{ $service->heading ?? 'Service Details' }}</h2>
							<div class="service-detail_description">
								{!! $service->description ?? '<p>No description available.</p>' !!}
							</div>
						
					
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Sidebar Page Container -->
	
	<!-- Marketing One -->
		<section class="marketing-one mb-4">
			<div class="outer-container">
				<div class="animation_mode">
					<h1>Skilled Assembly Technicians</h1>
					<span class="marketing-one_icon"><img src="assets/images/icons/star.png" alt="" /></span>
					<h1 class="light">Swing Set Assembly</h1>
					<span class="marketing-one_icon"><img src="assets/images/icons/star.png" alt="" /></span>
					<h1>Basketball Hoop Installation</h1>
					<span class="marketing-one_icon"><img src="assets/images/icons/star.png" alt="" /></span>
				</div>
				<div class="animation_mode-two">
					<h1>Fitness Equipment Setup</h1>
					<span class="marketing-one_icon"><img src="assets/images/icons/star-1.png" alt="" /></span>
					<h1 class="light">Reliable, On-Time Service</h1>
					<span class="marketing-one_icon"><img src="assets/images/icons/star-1.png" alt="" /></span>
					<h1>Technicians with Tools</h1>
					<span class="marketing-one_icon"><img src="assets/images/icons/star-1.png" alt="" /></span>
					<h1>Stress-Free Installations</h1>
				</div>
			</div>
		</section>
		<!-- End Marketing One -->
	
	<!-- Clients Box One -->
	<div class="clients-box_one style-two d-none">
		<div class="clients-one_slider swiper-container">
			<div class="swiper-wrapper">
				
				<!-- Slide -->
				<div class="swiper-slide">
					<div class="client-image">
						<a href="#"><img src="/public/FrontendAssets/images/clients/1.png" alt="" /></a>
					</div>
				</div>

				<!-- Slide -->
				<div class="swiper-slide">
					<div class="client-image">
						<a href="#"><img src="/public/FrontendAssets/images/clients/2.png" alt="" /></a>
					</div>
				</div>

				<!-- Slide -->
				<div class="swiper-slide">
					<div class="client-image">
						<a href="#"><img src="/public/FrontendAssets/images/clients/3.png" alt="" /></a>
					</div>
				</div>

				<!-- Slide -->
				<div class="swiper-slide">
					<div class="client-image">
						<a href="#"><img src="/public/FrontendAssets/images/clients/4.png" alt="" /></a>
					</div>
				</div>

				<!-- Slide -->
				<div class="swiper-slide">
					<div class="client-image">
						<a href="#"><img src="/public/FrontendAssets/images/clients/3.png" alt="" /></a>
					</div>
				</div>

			</div>

		</div>
		
		<div class="text-center">
			<div class="client-one_subtitle">we’re proud to partner with best-in-class clients</div>
		</div>
		
	</div>
	<!-- End Clients Box One -->

@endsection

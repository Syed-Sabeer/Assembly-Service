@extends('layouts.frontend.master')


@section('css')
@endsection

@section('content')
	
    <!-- Page Title -->
    <section class="page-title" style="background-image:url(/public/FrontendAssets/images/background/project-details.png); background-position: center;">
        <div class="auto-container">
			<h2>Project Details</h2>
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<ul class="bread-crumb clearfix">
					<li><a href="index.html">Home</a></li>
					<li>Project Details</li>
				</ul>
				<div class="page-title_text">Whether you’re building, remodeling, buying, or selling, we bring seamless project execution under one roof.</div>
			</div>
        </div>
    </section>
    <!-- End Page Title -->
	
	<!-- Project Detail -->
	<section class="project-detail py-5" style="background-image:url(assets/images/background/pattern-13.png)">
		<div class="auto-container">
			<div class="project-detail_location"><i><img src="assets/images/icons/location.svg" alt="" /></i> {{ $project->location }}</div>
			<h2 class="project-detail_heading">{{ $project->title }}</h2>
			<div class="project-detail_image">
				<img src="{{asset($project->image)}}" alt="" />
			</div>
			<ul class="project-detail_list">
				<li>
					<span class="icon"><img src="/public/FrontendAssets/images/icons/project-1.svg" alt="" /></span>
					Status
					<strong>{{ $project->status }}</strong>
				</li>
				<li>
					<span class="icon"><img src="/public/FrontendAssets/images/icons/project-2.svg" alt="" /></span>
					Project Type
					<strong>{{ $project->type }}</strong>
				</li>
				<li>
					<span class="icon"><img src="/public/FrontendAssets/images/icons/project-3.svg" alt="" /></span>
					Project Area
					<strong>{{ $project->area }} </strong>
				</li>
				<li>
					<span class="icon"><img src="/public/FrontendAssets/images/icons/project-4.svg" alt="" /></span>
					Commencement date
					<strong>{{ \Carbon\Carbon::parse($project->commencement_date)->format('d M, Y') }}</strong>
				</li>
				<li>
					<span class="icon"><img src="/public/FrontendAssets/images/icons/project-5.svg" alt="" /></span>
					Price 
					<strong>${{ $project->price_range }}</strong>
				</li>
			</ul>
			<h3>Project description</h3>
			<p>{!! $project->description !!}</p>
		
		</div>
	</section>
	<!-- End Project Detail -->
	
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

@endsection

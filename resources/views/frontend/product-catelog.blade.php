@extends('layouts.frontend.master')


@section('css')
@endsection

@section('content')

<!-- Page Title -->
    <section class="page-title" style="background-image:url(/public/FrontendAssets/images/background/shopdetails.png); background-position:center;">
        <div class="auto-container">
			<h2>Shop Detail</h2>
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<ul class="bread-crumb clearfix">
					<li><a href="index.html">Home</a></li>
					<li>Shop Detail</li>
				</ul>
				<div class="page-title_text">Whether you’re enhancing your backyard or creating a new play space, Skyfort II brings adventure, safety, and fun together under one sturdy roof.</div>
			</div>
        </div>
    </section>
    <!-- End Page Title -->
	
	<!-- Shop Detail -->
	<section class="shop-detail">
		<div class="auto-container">
			
			<div class="row clearfix">
				<!-- Gallery Column -->
				<div class="shop-detail_gallery-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="carousel-outer">
							<!-- Swiper -->
							<div class="swiper-container content-carousel">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<figure class="image"><a href="{{ asset($product->f_image ?? 'public/FrontendAssets/images/default.png') }}" class="lightbox-image"><img src="{{ asset($product->f_image ?? 'public/FrontendAssets/images/default.png') }}" alt=""></a></figure>
									</div>

@php
    $images = $product->other_images ?? [];
@endphp

                                    @if(!empty($images))
    @foreach($images as $image)
									<div class="swiper-slide">
										<figure class="thumb">
                                        <a href="{{ asset($image) }}" class="lightbox-image">
                                        <img src="{{ asset($image) }}" alt="">
                                        </a>
                                        </figure>
									</div>
                                       @endforeach
@endif
									
								</div>
							</div>

							<div class="swiper-container thumbs-carousel">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<figure class="thumb"><img src="{{ asset($product->f_image ?? 'public/FrontendAssets/images/default.png') }}" alt=""></figure>
									</div>
                                     @if(!empty($images))
    @foreach($images as $image)
									<div class="swiper-slide">
										<figure class="thumb">
                                        <a href="{{ asset($image) }}" class="lightbox-image">
                                        <img src="{{ asset($image) }}" alt="">
                                        </a>
                                        </figure>
									</div>
                                       @endforeach
@endif
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Content Column -->
				<div class="shop-detail_content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<h2 class="shop-detail_title">{{ $product->title }}</h2>
						<!-- Rating -->
						<div class="shop-detail_rating">
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="light fa fa-star"></span>
							<i>(4 customer review)</i>
						</div>
						 <div class="shop-detail_price">
						 <p><i style="font-weight: 600; color:black; font-size:20px;">Cost of installation</i></p>
						 ${{ $product->price }} USD</div>
						<div class="shop-detail_text">Skyfort II is a sturdy, all-in-one wooden playset offering slides, swings, and a fort for endless outdoor fun and adventure.</div>
						<div class="d-flex align-items-center flex-wrap">
							
							<!-- Quantity Box -->
							<!-- <div class="quantity-box">
								<div class="item-quantity">
									<input class="qty-spinner" type="text" value="1" name="quantity">
								</div>
							</div> -->

							<!-- Button Box -->
							<div class="button-box">
                            <a href="{{ url('/booking?product_id=' . $product->id) }}">
								<button type="submit" class="theme-btn btn-style-three">
									<span class="btn-wrap">
										<span class="text-one">Book Now <i class="fa-solid fa-plus fa-fw"></i></span>
										<span class="text-two">Book Now <i class="fa-solid fa-plus fa-fw"></i></span>
									</span>
								</button>
                            </a>
							</div>
							
						</div>

						<ul class="shop-detail_list">
						
							<li><span>CATEGORY: </span>{{ $product->category->title }}</li>
							<li><span>TAG: </span>{{ $product->tag }}</li>
						</ul>

						<!-- Social Box -->
						<ul class="shop-detail_socials">
							<li class="share">Share:</li>
							<li><a href="https://www.facebook.com/" class="fab fa-facebook-f"></a></li>
							<li><a href="https://www.twitter.com/" class="fab fa-twitter"></a></li>
							<li><a href="https://dribbble.com/" class="fab fa-dribbble"></a></li>
							<li><a href="https://www.linkedin.com/" class="fab fa-linkedin"></a></li>
						</ul>

					</div>
				</div>
			</div>

			<!-- Lower Box -->
			<div class="lower-box">
				
				<!-- Product Info Tabs -->
				<div class="product-info-tabs">
					<!-- Product Tabs -->
					<div class="prod-tabs tabs-box">
					
						<!-- Tab Btns -->
						<ul class="tab-btns tab-buttons clearfix">
							<li data-tab="#prod-info" class="tab-btn active-btn">Description</li>
							<li data-tab="#prod-review" class="tab-btn">Reviews (2)</li>
						</ul>
						
						<!-- Tabs Container -->
						<div class="tabs-content">
							
							<!-- Tab -->
							<div class="tab active-tab" id="prod-info">
								<div class="content">
									<p>{!! $product->description !!}</p>
								</div>
							</div>
							
							<!--Tab-->
							<div class="tab" id="prod-review">
								<h4 class="title">2 Reviews For win Your Friends</h4>
								
								<!--Reviews Container-->
								<div class="comments-area">
									<!--Comment Box-->
									<div class="comment-box">
										<div class="comment">
											<div class="author-thumb"><img src="/public/FrontendAssets/images/resource/author-1.png" alt=""></div>
											<div class="comment-inner">
												<div class="comment-info clearfix">Steven Rich – Jan 17, 2025:</div>
												<div class="rating">
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star light"></span>
												</div>
												<div class="text">The Skyfort II has completely transformed our backyard! My kids can’t get enough of it — they spend hours climbing, sliding, and playing in the fort. It’s sturdy, safe, and beautifully built. Definitely one of the best investments we’ve made for family fun.</div>
											</div>
										</div>
									</div>
									<!--Comment Box-->
									<div class="comment-box reply-comment">
										<div class="comment">
											<div class="author-thumb"><img src="/public/FrontendAssets/images/resource/author-2.png" alt=""></div>
											<div class="comment-inner">
												<div class="comment-info clearfix">William Cobus – April 21, 2025:</div>
												<div class="rating">
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star-half-empty"></span>
												</div>
												<div class="text">We absolutely love our Skyfort II. The design is solid and offers endless entertainment for our children. From swinging high to exploring the fort, it keeps them active and happy every single day. Highly recommended for anyone who wants to create lasting outdoor memories.</div>
											</div>
										</div>
									</div>
									
								</div>

							</div>
							
						</div>
					</div>
					
				</div>
				<!--End Product Info Tabs-->
				
			</div>
			<!-- End Lower Box -->

			<!-- Related Products -->
			<div class="related-products">
				<h3>Recent Products</h3>
				<div class="row clearfix">

					<!-- Shop Item -->
					<div class="shop-item col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="image">
								<a class="overlay-link" href="javascript:;"></a>
								<!-- <div class="sale">sale</div> -->
								<img src="/public/FrontendAssets/images/background/Boulder.jpg" alt="" />
								<div class="overlay-box">
									<ul class="cart-option">
										<li><a href="javascript:;"><span><img src="assets/images/icons/right-arrow.svg" alt="" /></span></a></li>
									</ul>
								</div>
							</div>
							<div class="lower-content">
								<h3><a href="javascript:;">Boulder Station</a></h3>
								<div class="d-flex justify-content-between align-items-center flex-wrap">
									<div class="price"> Kid Kraft</div>
									<!-- Rating -->
									<a href="javascript:;" class="cart"><span class="icon"><img src="assets/images/icons/shopping-basket.svg" alt="" /></span></a>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Shop Item -->
					<div class="shop-item col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="image">
								<a class="overlay-link" href="javascript:;"></a>
								<img src="/public/FrontendAssets/images/background/Summit.jpg" alt="" />
								<div class="overlay-box">
									<ul class="cart-option">
										<li><a href="javascript:;"><span><img src="assets/images/icons/right-arrow.svg" alt="" /></span></a></li>
									</ul>
								</div>
							</div>
							<div class="lower-content">
								<h3><a href="javascript:;">Summit View</a></h3>
								<div class="d-flex justify-content-between align-items-center flex-wrap">
									<div class="price"> Kid Kraft</div>
									<!-- Rating -->
									<a href="javascript:;" class="cart"><span class="icon"><img src="assets/images/icons/shopping-basket.svg" alt="" /></span></a>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Shop Item -->
					<div class="shop-item col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="image">
								<a class="overlay-link" href="javascript:;"></a>
								<img src="/public/FrontendAssets/images/background/Magnolia.jpg" alt="" />
								<div class="overlay-box">
									<ul class="cart-option">
										<li><a href="javascript:;"><span><img src="assets/images/icons/right-arrow.svg" alt="" /></span></a></li>
									</ul>
								</div>
							</div>
							<div class="lower-content">
								<h3><a href="javascript:;">Magnolia Falls</a></h3>
								<div class="d-flex justify-content-between align-items-center flex-wrap">
									<div class="price">Backyard Discoveries</div>
									<!-- Rating -->
									<a href="javascript:;" class="cart"><span class="icon"><img src="assets/images/icons/shopping-basket.svg" alt="" /></span></a>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Shop Item -->
					<div class="shop-item col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="image">
								<a class="overlay-link" href="javascript:;"></a>
								<img src="/public/FrontendAssets/images/background/Adventure.jpg" alt="" />
								<div class="overlay-box">
									<ul class="cart-option">
										<li><a href="javascript:;"><span><img src="assets/images/icons/right-arrow.svg" alt="" /></span></a></li>
									</ul>
								</div>
							</div>
							<div class="lower-content">
								<h3><a href="javascript:;">Adventure Tower</a></h3>
								<div class="d-flex justify-content-between align-items-center flex-wrap">
									<div class="price">Lifetime</div>
									<!-- Rating -->
									<a href="javascript:;" class="cart"><span class="icon"><img src="assets/images/icons/shopping-basket.svg" alt="" /></span></a>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</section>
	
	<!-- Marketing One -->
		<section class="marketing-one pb-5">
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
	
	<!-- End Clients Box One -->

@endsection

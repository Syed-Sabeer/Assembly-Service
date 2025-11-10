@extends('layouts.frontend.master')


@section('css')
@endsection

@section('content')






        <!-- Page Title -->
        <section class="page-title" style="background-image:url({{asset('FrontendAssets/images/background/blogbanner.jpg')}})">
            <div class="auto-container">
                <h2>Blog Detail</h2>
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Blog Detail</li>
                    </ul>
                    <div class="page-title_text">From new purchases to home upgrades, our team delivers hassle-free
                        assembly and installation services — making your projects simple, safe, and stress-free.</div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- Sidebar Page Container -->
        <div class="sidebar-page-container">
            <div class="page-top_pattern" style="background-image:url({{asset('FrontendAssets/images/background/pattern-13.png')}})"></div>
            <div class="auto-container">
                <div class="row clearfix">

                    <!-- Content Side -->
                    <div class="content-side col-lg-8 col-md-12 col-sm-12">
                        <div class="blog-detail">
                            <div class="blog-detail_inner">
                                <div class="blog-detail_image-outer">
                                    <div class="blog-detail_date">{{ $blog->created_at->format('d M') }}</div>
                                    <div class="news-detail_image">
                                        <img src="{{asset(asset($blog->image))}}" alt="blogImg" />
                                        <img src="{{asset(asset($blog->image))}}" alt="blogImg" />
                                    </div>
                                </div>
                                <div class="blog-detail_content">
                                    <ul class="blog-detail_meta">
                                        <li><span class="icon fa-regular fa-comments fa-fw"></span>By Admin</li>
                                        <li><span class="icon fa-regular fa-user fa-fw"></span>02 Comments</li>
                                    </ul>
                                    <h3 class="blog-detail_title">{{$blog->title}}</h3>
                                    <p> {!! $blog->content !!}</p>
                               
                                
                                    <div class="news-detail_image-two">
                                        <img src="{{asset('FrontendAssets/images/background/blogimg-3.jpg')}}" alt="" />
                                    </div>
                                  

                     

                                    <!-- Comments Area -->
                                    <div class="comments-area d-none">
                                        <div class="group-title">
                                            <h4>3 Replies Comments For Our Post</h4>
                                        </div>

                                        <div class="comment-box">
                                            <div class="comment">
                                                <div class="author-thumb"><img src="{{asset('FrontendAssets/images/resource/author-2.png')}}" alt="">
                                                </div>
                                                <div class="comment-info d-flex flex-wrap">
                                                    <strong>Shawn L. Camargo </strong>
                                                    <div class="comment-time">January 27, 2025</div>
                                                </div>
                                                <div class="text">Mauris non dignissim purus, ac commodo diam. Donec sit
                                                    amet lacinia nulla. Aliquam quis purus in justo pulvinar tempor.
                                                    Aliquam nulla, sollicitudin at euismod.</div>
                                                <div class="post-options">
                                                    <a class="reply-btn" href="#">Reply</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="comment-box reply-comment">
                                            <div class="comment">
                                                <div class="author-thumb"><img src="{{asset('FrontendAssets/images/resource/author-3.png')}}" alt="">
                                                </div>
                                                <div class="comment-info d-flex flex-wrap">
                                                    <strong>Archie J. Warren </strong>
                                                    <div class="comment-time">February 27, 2025</div>
                                                </div>
                                                <div class="text">Ut vulputate fermentum, lorem New Trend AWS Blog
                                                    Iiaculis lobortis consectetur. Vitae massa in lobortis. Interdum
                                                    purus sit urna, morbi ornare.</div>
                                                <div class="post-options">
                                                    <a class="reply-btn" href="#">Reply</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="comment-box">
                                            <div class="comment">
                                                <div class="author-thumb"><img src="{{asset('FrontendAssets/images/resource/author-4.png')}}" alt="">
                                                </div>
                                                <div class="comment-info d-flex flex-wrap">
                                                    <strong>Roland J. Crenshaw </strong>
                                                    <div class="comment-time">March 27, 2025</div>
                                                </div>
                                                <div class="text">Ut vulputate fermentum, lorem New Trend AWS Blog
                                                    Iiaculis lobortis consectetur. Vitae vulpu tate massa in lobortis.
                                                    Interdum purus sit urna, morbi ornare.</div>
                                                <div class="post-options">
                                                    <a class="reply-btn" href="#">Reply</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Comment Form -->
                                    <div class="comment-form-outer pt-4">
                                        <div class="group-title">
                                            <h4>Add a Review</h4>
                                            <p>Your email address will not be published. Required fields are marked *
                                            </p>
                                        </div>
                                        <!-- Comment Form -->
                                        <div class="comment-form">
                                            <form method="post" action="blog.html">
                                                <div class="row clearfix">

                                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                        <input type="text" name="username" placeholder="Name" required="">
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                        <input type="text" name="username" placeholder="Email" required="">
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                        <input type="text" name="subject" placeholder="Subject" required="">
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                        <textarea class="" name="message" placeholder="Message"></textarea>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                        <div class="d-flex align-items-center flex-wrap">
                                                            <button class="theme-btn btn-style-three">
															<span class="btn-wrap">
																<span class="text-one">submit review</span>
																<span class="text-two">submit review</span>
															</span>
														</button>
                                                            <div class="rating">
                                                                <strong>Rate this Product? *</strong>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                        <!-- End Comment Form -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Side -->
                    <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar sticky-top">

                            <!-- Sidebar Widget -->
                            <div class="sidebar-widget search-box">
                                <!-- Sidebar Title -->
                                <div class="sidebar-title">
                                    <h4>Search</h4>
                                </div>
                                <div class="widget-content">
                                    <form method="post" action="contact.html">
                                        <div class="form-group">
                                            <input type="search" name="search-field" value="" placeholder="Search Now" required>
                                            <button type="submit"><span class="icon fa fa-search"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Post Widget -->
                            <div class="sidebar-widget post-widget">
                                <div class="widget-content">
                                    <!-- Sidebar Title -->
                                    <div class="sidebar-title">
                                        <h4>Feature Posts</h4>
                                    </div>
                                    <div class="content">
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="thumb"><a
                                                    href="javascript:;"><img src="{{asset('FrontendAssets/images/background/blogg1.jpg')}}" alt=""></a>
                                            </div>
                                            <div class="post-date">April 2, 2025</div>
                                            <h4><a href="javascript:;">Renovation Done Right: Transform Backyard </a>
                                            </h4>
                                        </div>
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="thumb"><a
                                                    href="javascript:;"><img src="{{asset('FrontendAssets/images/background/blogg2.jpg')}}" alt=""></a>
                                            </div>
                                            <div class="post-date">April 2, 2025</div>
                                            <h4><a href="javascript:;">The Right Assembly & Installation Service</a>
                                            </h4>
                                        </div>
                                        <!-- Post -->
                                        <!-- <div class="post">
										<div class="thumb"><a href="javascript:;"><img src="{{asset('FrontendAssets/images/resource/post-thumb-5.jpg')}}" alt=""></a></div>
										<div class="post-date">April 2, 2025</div>
										<h4><a href="javascript:;">How to Choose the Right Assembly & Installation Partner for Your Business</a></h4>
									</div> -->
                                    </div>
                                </div>
                            </div>

                            <!-- Category Widget -->
                            <div class="sidebar-widget category-widget">
                                <div class="widget-content">
                                    <!-- Sidebar Title -->
                                    <div class="sidebar-title">
                                        <h4>Categories</h4>
                                    </div>
                                    <ul class="category-list_two">
                                        <li><a href="#">Wooden Swing Set Assembly</a></li>
                                        <li><a href="#">Custom Installation Requests</a></li>
                                        <li><a href="#">Pre-Delivery Consultation</a></li>
                                        <li><a href="#">Safety Checks & Inspections</a></li>
                                        <li><a href="#">Playset Moving & Installation</a></li>
                                        <li><a href="#">Structural Engineering</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Tags Widget -->
                            <div class="sidebar-widget popular-tags">
                                <div class="widget-content">
                                    <!-- Sidebar Title -->
                                    <div class="sidebar-title">
                                        <h4>Popular Tags</h4>
                                    </div>
                                    <div class="content">
                                        <a href="#">Assembly</a>
                                        <a href="#">Installation</a>
                                        <a href="#">Home Improvement</a>
                                        <a href="#">Outdoor Structures</a>
                                        <a href="#">Power & Energy</a>
                                        <a href="#">Projects</a>
                                        <!-- <a href="#">Technology</a> -->
                                    </div>
                                </div>
                            </div>

                        </aside>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Sidebar Page Container -->

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

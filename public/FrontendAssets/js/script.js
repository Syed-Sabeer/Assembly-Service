
    (function($) {

        "use strict";


    //Hide Loading Box (Preloader)
    function handlePreloader() {
		if($('.preloader').length){
        $('.preloader').delay(200).fadeOut(500);
		}
	}


    //Update Header Style and Scroll to Top
    function headerStyle() {
		if($('.main-header').length){
			var windowpos = $(window).scrollTop();
    var siteHeader = $('.main-header');
    var scrollLink = $('.scroll-to-top');

    var HeaderHight = $('.main-header').height();
			if (windowpos >= HeaderHight) {
        siteHeader.addClass('fixed-header');
    scrollLink.fadeIn(300);
			} else {
        siteHeader.removeClass('fixed-header');
    scrollLink.fadeOut(300);
			}
			
		}
	}

    headerStyle();


    //Submenu Dropdown Toggle
    if($('.main-header li').length){
        $('.main-header li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');

    //Dropdown Button
    $('.main-header li.dropdown .dropdown-btn').on('click', function() {
        $(this).prev('ul').slideToggle(500);
		});

		//Disable dropdown parent link
		$('.navigation li.dropdown > a').on('click', function(e) {
        e.preventDefault();
		});

		//Disable dropdown parent link
		$('.main-header .navigation li.dropdown > a,.hidden-bar .side-menu li.dropdown > a').on('click', function(e) {
        e.preventDefault();
		});

		$('.main-menu .navigation > li .mega-menu-bar > .column > ul').addClass('first-ul');
		$('.main-header .main-menu .navigation > li > ul').addClass('last-ul');

    $('.xs-sidebar-group .close-button').on('click', function(e) {
        $('.xs-sidebar-group.info-group').removeClass('isActive');
		});

    $('.about-widget').on('click', function(e) {
        $('.about-sidebar').addClass('active');
		});

    $('.about-sidebar .close-button').on('click', function(e) {
        $('.about-sidebar').removeClass('active');
		});

    $('.about-sidebar .gradient-layer').on('click', function(e) {
        $('.about-sidebar').removeClass('active');
		});
		
	}


    //Mobile Nav Hide Show
    if($('.mobile-menu').length){
		//$('.mobile-menu .menu-box').mCustomScrollbar();
		var mobileMenuContent = $('.main-header .nav-outer .main-menu').html();
    $('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);
    $('.sticky-header .main-menu').append(mobileMenuContent);



		//Hide / Show Submenu
		$('.mobile-menu .navigation > li.dropdown > .dropdown-btn').on('click', function(e) {
        console.log('btn clicked');
    e.preventDefault();
    var target = $(this).parent('li').children('ul');
    var target1 = $(this).parent('li').children('div.mega-menu');
    // console.log('target', $(target).is(':visible'));
    console.log('target1', $(target1).is(':visible'));

    if ($(target).is(':visible')){
        $(this).parent('li').removeClass('open');
    $(target).slideUp(500);
    $(this).parents('.navigation').children('li.dropdown').removeClass('open');
				$(this).parents('.navigation').children('li.dropdown > ul.last-ul').slideUp(500);
    return false;
			} else{
        $(this).parents('.navigation').children('li.dropdown').removeClass('open');
    $(this).parents('.navigation').children('li.dropdown').children('ul.last-ul').slideUp(500);
    $(this).parent('li').toggleClass('open');
    $(this).parent('li').children('ul.last-ul').slideToggle(500);
			}
    if ($(target1).is(':visible')) {
        console.log('Visible');
    $(this).parent('li').removeClass('open');
    $(target1).slideUp(500);
    $(this).parents('.navigation').children('li.dropdown').removeClass('open');
				$(this).parents('.navigation').children('li.dropdown > .mega-menu').slideUp(500);
				// return false;
			} else {
        console.log('Not Visible');
    $(this).parents('.navigation').children('li.dropdown').removeClass('open');
    $(this).parents('.navigation').children('li.dropdown').children('.mega-menu').slideUp(500);
    $('.first-ul').css('display', 'block');
    $(this).parent('li').toggleClass('open');
    $(this).parent('li').children('.mega-menu').slideToggle(500);
			}
		});


		//3rd Level Nav
		$('.mobile-menu .navigation > li.dropdown > ul  > li.dropdown > .dropdown-btn').on('click', function(e) {
        e.preventDefault();
    var targetInner = $(this).parent('li').children('ul');

    if ($(targetInner).is(':visible')){
        $(this).parent('li').removeClass('open');
    $(targetInner).slideUp(500);
				$(this).parents('.navigation > ul').find('li.dropdown').removeClass('open');
				$(this).parents('.navigation > ul').find('li.dropdown > ul').slideUp(500);
    return false;
			}else{
        $(this).parents('.navigation > ul').find('li.dropdown').removeClass('open');
				$(this).parents('.navigation > ul').find('li.dropdown > ul').slideUp(500);
    $(this).parent('li').toggleClass('open');
    $(this).parent('li').children('ul').slideToggle(500);
			}
		});

    //Menu Toggle Btn
    $('.mobile-nav-toggler').on('click', function() {
        $('body').addClass('mobile-menu-visible');

		});



    //Menu Toggle Btn
    $('.mobile-menu .menu-backdrop,.mobile-menu .close-btn').on('click', function() {
        $('body').removeClass('mobile-menu-visible');
			$('.mobile-menu .navigation > li').removeClass('open');
    $('.mobile-menu .navigation li ul').slideUp(0);
		});

    $(document).keydown(function(e){
	        if(e.keyCode == 27) {
        $('body').removeClass('mobile-menu-visible');
			$('.mobile-menu .navigation > li').removeClass('open');
    $('.mobile-menu .navigation li ul').slideUp(0);
        	}
	    });
		
	}


    //Add One Page nav
    if($('.scroll-nav').length) {
        $('.scroll-nav ul').onePageNav();
	}


    //Custom Scroll Linsk / Sidebar
    if($('.scroll-nav li a').length){
        $(".scroll-nav li a").on('click', function (e) {
            e.preventDefault();
            $('body').removeClass('mobile-menu-visible');
        });
	}



    //Header Search
    if($('.search-box-outer').length) {
        $('.search-box-outer').on('click', function () {
            $('body').addClass('search-active');
        });
    $('.close-search').on('click', function() {
        $('body').removeClass('search-active');
		});
	}




    //Event Countdown Timer
    if($('.time-countdown').length){
        $('.time-countdown').each(function () {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function (event) {
                var $this = $(this).html(event.strftime('' + '<div class="counter-column"><span class="count">%D</span>Days</div> ' + '<div class="counter-column"><span class="count">%H</span>Hours</div>  ' + '<div class="counter-column"><span class="count">%M</span>Minutes</div>  ' + '<div class="counter-column"><span class="count">%S</span>Seconds</div>'));
            });
        });
	}


    if($('.clock-wrapper').length){
        (function () {
            //generate clock animations
            var now = new Date(),
                hourDeg = now.getHours() / 12 * 360 + now.getMinutes() / 60 * 30,
                minuteDeg = now.getMinutes() / 60 * 360 + now.getSeconds() / 60 * 6,
                secondDeg = now.getSeconds() / 60 * 360,
                stylesDeg = [
                    "@-webkit-keyframes rotate-hour{from{transform:rotate(" + hourDeg + "deg);}to{transform:rotate(" + (hourDeg + 360) + "deg);}}",
                    "@-webkit-keyframes rotate-minute{from{transform:rotate(" + minuteDeg + "deg);}to{transform:rotate(" + (minuteDeg + 360) + "deg);}}",
                    "@-webkit-keyframes rotate-second{from{transform:rotate(" + secondDeg + "deg);}to{transform:rotate(" + (secondDeg + 360) + "deg);}}",
                    "@-moz-keyframes rotate-hour{from{transform:rotate(" + hourDeg + "deg);}to{transform:rotate(" + (hourDeg + 360) + "deg);}}",
                    "@-moz-keyframes rotate-minute{from{transform:rotate(" + minuteDeg + "deg);}to{transform:rotate(" + (minuteDeg + 360) + "deg);}}",
                    "@-moz-keyframes rotate-second{from{transform:rotate(" + secondDeg + "deg);}to{transform:rotate(" + (secondDeg + 360) + "deg);}}"
                ].join("");
            document.getElementById("clock-animations").innerHTML = stylesDeg;
        })();
    }




    gsap.to(".expand-section", {
        width: "100%",  // Expands to full width
    borderRadius:0,
    ease: "power2.out",
    scrollTrigger: {
        trigger: ".expand-section",
    start: "top 70%",
    end: "top 5%",
    scrub: true
		}
	});




    /* ==================================================
        Splite Text
    ================================================== */

        //header dropdown script

        const userButton = document.getElementById('userButton');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const dropdownArrow = document.getElementById('dropdownArrow');

        // Toggle dropdown - only if elements exist
        if (userButton && dropdownMenu && dropdownArrow) {
            userButton.addEventListener('click', function (e) {
                e.stopPropagation();
                dropdownMenu.classList.toggle('show');
                dropdownArrow.classList.toggle('open');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function (e) {
                if (!userButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.remove('show');
                    dropdownArrow.classList.remove('open');
                }
            });
        }

        // Handle menu item clicks
        function handleMenuClick(itemName) {
            console.log(itemName + ' clicked');
            alert(itemName + ' clicked!');
            dropdownMenu.classList.remove('show');
            dropdownArrow.classList.remove('open');
        }

//header dropdown script


    let ofsetHeight = document.querySelector(".project-style-one-items");
    if (ofsetHeight) {
        ScrollTrigger.matchMedia({
            "(min-width: 992px)": function () {

                let pbmitpanels = gsap.utils.toArray(".project-block_one");
                const spacer = 0;

                let pbmitheight = pbmitpanels[0].offsetHeight + 130;
                pbmitpanels.forEach((pbmitpanel, i) => {
                    //This is for padding between item
                    TweenMax.set(pbmitpanel, {
                        top: i * 0
                    });
                    const tween = gsap.to(pbmitpanel, {
                        scrollTrigger: {
                            trigger: pbmitpanel,
                            start: () => `top bottom-=100`,
                            end: () => `top top+=40`,
                            scrub: true,
                            invalidateOnRefresh: true
                        },
                        ease: "none",
                        //This is for scaling outsite 
                        scale: () => 1 - (pbmitpanels.length - i) * 0
                    });
                    ScrollTrigger.create({
                        trigger: pbmitpanel,
                        start: () => "top 140px",
                        endTrigger: '.project-style-one-items',
                        end: `bottom top+=${pbmitheight + (pbmitpanels.length * spacer)}`,
                        pin: true,
                        pinSpacing: false,
                    });
                });
            },
            "(max-width:1025px)": function () {
                ScrollTrigger.getAll().forEach(pbmitpanels => pbmitpanels.kill(true));
            }
        });
	}










    //Parallax Scene for Icons
    if($('.parallax-scene-1').length){
		var scene = $('.parallax-scene-1').get(0);
    var parallaxInstance = new Parallax(scene);
	}



    if($('.paroller').length){
        $('.paroller').paroller({
            factor: 0.2,            // multiplier for scrolling speed and offset, +- values for direction control  
            factorLg: 0.4,          // multiplier for scrolling speed and offset if window width is less than 1200px, +- values for direction control  
            type: 'foreground',     // background, foreground  
            direction: 'horizontal' // vertical, horizontal  
        });
	}



    //  Animation Fade Left End
    /////////////////////////////////////////////////////
    // CURSOR
    var cursor = $(".cursor"),
    follower = $(".cursor-follower");

    var posX = 0,
    posY = 0;

    var mouseX = 0,
    mouseY = 0;

    TweenMax.to({}, 0.016, {
        repeat: -1,
    onRepeat: function() {
        posX += (mouseX - posX) / 9;
    posY += (mouseY - posY) / 9;

    TweenMax.set(follower, {
        css: {
        left: posX - 12,
    top: posY - 12
			}
		});

    TweenMax.set(cursor, {
        css: {
        left: mouseX,
    top: mouseY
			}
		});
	}
	});

    $(document).on("mousemove", function(e) {
        mouseX = e.clientX;
    mouseY = e.clientY;
	});
    //circle
    $(".theme-btn, a").on("mouseenter", function() {
        cursor.addClass("active");
    follower.addClass("active");
	});
    $(".theme-btn, a").on("mouseleave", function() {
        cursor.removeClass("active");
    follower.removeClass("active");
	});
    // CURSOR End



    // Title Animation
    let splitTitleLines = gsap.utils.toArray(".title-anim");

    splitTitleLines.forEach(splitTextLine => {
      const tl = gsap.timeline({
        scrollTrigger: {
        trigger: splitTextLine,
    start: 'top 90%',
    end: 'bottom 60%',
    scrub: false,
    markers: false,
    toggleActions: 'play none none none'
        }
      });

    const itemSplitted = new SplitText(splitTextLine, {type: "words, lines" });
    gsap.set(splitTextLine, {perspective: 400 });
    itemSplitted.split({type: "lines" })
    tl.from(itemSplitted.lines, {duration: 1, delay: 0.3, opacity: 0, rotationX: -80, force3D: true, transformOrigin: "top center -50", stagger: 0.1 });
    });



    // Up Down animation
    let endTl = gsap.timeline({
        repeat: -1,
    delay: 0.5,
    scrollTrigger: {
        trigger: '.up-down_animation',
    start: 'bottom 100%-=50px'
    }
  });
    gsap.set('.up-down_animation', {
        opacity: 0
  });
    gsap.to('.up-down_animation', {
        opacity: 1,
    duration: 1,
    ease: 'power2.out',
    scrollTrigger: {
        trigger: '.up-down_animation',
    start: 'bottom 100%-=50px',
    once: true
    }
  });
    let mySplitText = new SplitText(".up-down_animation", {type: "" });
    let chars = mySplitText.chars;
    //let endGradient = chroma.scale(['#F9D371', '#F47340', '#EF2F88', '#8843F2']);
    endTl.to(chars, {
        duration: 0.5,
    scaleY: 0.6,
    ease: "power3.out",
    stagger: 0.04,
    transformOrigin: 'center bottom'
  });
    endTl.to(chars, {
        yPercent: -20,
    ease: "elastic",
    stagger: 0.03,
    duration: 0.8
  }, 0.5);
    endTl.to(chars, {
        scaleY: 1,
    ease: "elastic.out(2.5, 0.2)",
    stagger: 0.03,
    duration: 1.5
  }, 0.5);
    endTl.to(chars, {
        //color: (i, el, arr) => {
        //return endGradient(i / arr.length).hex();
        //},
        ease: "power2.out",
    stagger: 0.03,
    duration: 0.3
  }, 0.5);
    endTl.to(chars, {
        yPercent: 0,
    ease: "back",
    stagger: 0.03,
    duration: 0.8
  }, 0.7);
    endTl.to(chars, {
        color: '#ffffff',
    duration: 1.4,
    stagger: 0.05
  });



    // Main Slider
    var slider = new Swiper('.main-slider', {
        slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    autoplay: {
        enabled: true,
    delay: 6000,
		},
    // Navigation arrows
    navigation: {
        nextEl: '.main-slider-next',
    prevEl: '.main-slider-prev',
    clickable: true,
		},
    //Pagination
    pagination: {
        el: ".slider-one_pagination",
    clickable: true,
    renderBullet: function (index, className) {
        let formattedIndex = (index + 1).toString().padStart(2, '0'); // Ensures two-digit format
    return '<span class="' + className + '">' + formattedIndex + "</span>";
    },
		},
    speed: 500,
    breakpoints: {
        '1600': {
        slidesPerView: 1,
			},
    '1200': {
        slidesPerView: 1,
			},
    '992': {
        slidesPerView: 1,
			},
    '768': {
        slidesPerView: 1,
			},
    '576': {
        slidesPerView: 1,
			},
    '0': {
        slidesPerView: 1,
			},
		},
	});




    // Single One Slider
    var slider = new Swiper('.single-item_carousel', {
        slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    autoplay: {
        enabled: true,
    delay: 6000
		},
    // Navigation arrows
    navigation: {
        nextEl: '.single-item_carousel-next',
    prevEl: '.single-item_carousel-prev',
    clickable: true,
		},
    //Pagination
    pagination: {
        el: ".single-item_carousel-pagination",
    clickable: true,
		},
    speed: 500,
    breakpoints: {
        '1600': {
        slidesPerView: 1,
			},
    '1200': {
        slidesPerView: 1,
			},
    '992': {
        slidesPerView: 1,
			},
    '768': {
        slidesPerView: 1,
			},
    '576': {
        slidesPerView: 1,
			},
    '0': {
        slidesPerView: 1,
			},
		},
	});





    // Two One Slider
    var slider = new Swiper('.two-item_carousel', {
        slidesPerView: 2,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        enabled: true,
    delay: 6000
		},
    // Navigation arrows
    navigation: {
        nextEl: '.two-item_carousel-next',
    prevEl: '.two-item_carousel-prev',
    clickable: true,
		},
    //Pagination
    pagination: {
        el: ".two-item_carousel-pagination",
    clickable: true,
		},
    speed: 500,
    breakpoints: {
        '1600': {
        slidesPerView: 2,
			},
    '1200': {
        slidesPerView: 2,
			},
    '992': {
        slidesPerView: 2,
			},
    '768': {
        slidesPerView: 1,
			},
    '576': {
        slidesPerView: 1,
			},
    '0': {
        slidesPerView: 1,
			},
		},
	});





    // Three One Slider
    var slider = new Swiper('.three-item_carousel', {
        slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        enabled: true,
    delay: 6000
		},
    // Navigation arrows
    navigation: {
        nextEl: '.three-item_carousel-next',
    prevEl: '.three-item_carousel-prev',
    clickable: true,
		},
    //Pagination
    pagination: {
        el: ".three-item_carousel-pagination",
    clickable: true,
		},
    speed: 500,
    breakpoints: {
        '1600': {
        slidesPerView: 3,
			},
    '1200': {
        slidesPerView: 3,
			},
    '992': {
        slidesPerView: 2,
			},
    '768': {
        slidesPerView: 2,
			},
    '576': {
        slidesPerView: 1,
			},
    '0': {
        slidesPerView: 1,
			},
		},
	});





    // Four One Slider
    var slider = new Swiper('.four-item_carousel', {
        slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        enabled: true,
    delay: 6000
		},
    // Navigation arrows
    navigation: {
        nextEl: '.four-item_carousel-next',
    prevEl: '.four-item_carousel-prev',
    clickable: true,
		},
    //Pagination
    pagination: {
        el: ".four-item_carousel-pagination",
    clickable: true,
		},
    speed: 500,
    breakpoints: {
        '1600': {
        slidesPerView: 4,
			},
    '1500': {
        slidesPerView: 3,
			},
    '1200': {
        slidesPerView: 3,
			},
    '992': {
        slidesPerView: 3,
			},
    '768': {
        slidesPerView: 2,
			},
    '576': {
        slidesPerView: 2,
			},
    '0': {
        slidesPerView: 1,
			},
		},
	});





    if ($(".animation_mode").length) {
        $('.animation_mode').marquee({
            speed: 50,
            gap: 20,
            delayBeforeStart: 0,
            direction: 'left',
            duplicated: true,
            pauseOnHover: true,
            startVisible: true,
        });
	}



    //Tabs Box
    if($('.tabs-box').length){
        $('.tabs-box .tab-buttons .tab-btn').on('click', function (e) {
            e.preventDefault();
            var target = $($(this).attr('data-tab'));

            if ($(target).is(':visible')) {
                return false;
            } else {
                target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
                $(this).addClass('active-btn');
                target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
                target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
                $(target).fadeIn(300);
                $(target).addClass('active-tab');
            }
        });
	}




    //Progress Bar
    if($('.progress-line').length){
        $('.progress-line').appear(function () {
            var el = $(this);
            var percent = el.data('width');
            $(el).css('width', percent + '%');
        }, { accY: 0 });
	}


    //Fact Counter + Text Count
    if($('.count-box').length){
        $('.count-box').appear(function () {

            var $t = $(this),
                n = $t.find(".count-text").attr("data-stop"),
                r = parseInt($t.find(".count-text").attr("data-speed"), 10);

            if (!$t.hasClass("counted")) {
                $t.addClass("counted");
                $({
                    countNum: $t.find(".count-text").text()
                }).animate({
                    countNum: n
                }, {
                    duration: r,
                    easing: "linear",
                    step: function () {
                        $t.find(".count-text").text(Math.floor(this.countNum));
                    },
                    complete: function () {
                        $t.find(".count-text").text(this.countNum);
                    }
                });
            }

        }, { accY: 0 });
	}




    //Add One Page nav
    if($('.scroll-nav').length) {
        $('.scroll-nav ul').onePageNav();
	}


    //Custom Scroll Linsk / Sidebar
    if($('.scroll-nav li a').length){
        $(".scroll-nav li a").on('click', function (e) {
            e.preventDefault();
            $('body').removeClass('mobile-menu-visible');
        });
	}




    // Testimonial Section Four Carousel
    if($('.shop-detail').length){
		var thumbsCarousel = new Swiper('.shop-detail .thumbs-carousel', {
        spaceBetween: 15,
    slidesPerView: 4,
    //direction: 'vertical',
    breakpoints: {
        320: {
        //direction: 'horizontal',
        slidesPerView: 3, 
		      },
    640: {
        //direction: 'horizontal',
        slidesPerView: 4, 
		      } ,
    1023: {
        slidesPerView: 4, 
		      } 
		  
		   }
	    });

    var contentCarousel = new Swiper('.shop-detail .content-carousel', {
        spaceBetween: 0,
    loop:true,
    navigation: {
        nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
	      },
    thumbs: {
        swiper: thumbsCarousel
	      },
	    });
	}



    //Jquery Spinner / Quantity Spinner
    if($('.qty-spinner').length){
        $("input.qty-spinner").TouchSpin({
            verticalbuttons: true
        });
	}



    //Custom Seclect Box
    if($('.custom-select-box').length){
        $('.custom-select-box').selectmenu().selectmenu('menuWidget').addClass('overflow');
	}




    if ($(".animation_mode-two").length) {
        $('.animation_mode-two').marquee({
            speed: 50,
            gap: 20,
            delayBeforeStart: 0,
            direction: 'right',
            duplicated: true,
            pauseOnHover: true,
            startVisible: true,
        });
	}



    // Clients Slider
    var slider = new Swiper('.clients-one_slider', {
        slidesPerView: 5,
    spaceBetween: 10,
    loop: true,
    autoplay: {
        enabled: true,
    delay: 2000,
		},
    // Navigation arrows
    navigation: {
        nextEl: '.clients-one_slider_button-next',
    prevEl: '.clients-one_slider_button-prev',
    clickable: true,
		},
    //Pagination
    pagination: {
        el: ".clients-one_pagination",
    clickable: true,
		},
    speed: 500,
    breakpoints: {
        '1600': {
        slidesPerView: 5,
			},
    '1200': {
        slidesPerView: 5,
			},
    '992': {
        slidesPerView: 4,
			},
    '768': {
        slidesPerView: 3,
			},
    '576': {
        slidesPerView: 3,
			},
    '0': {
        slidesPerView: 2,
			},
		},
	});




    // Accordion Box
    if($('.accordion-box').length){
        $(".accordion-box").on('click', '.acc-btn', function () {

            var outerBox = $(this).parents('.accordion-box');
            var target = $(this).parents('.accordion');

            if ($(this).next('.acc-content').is(':visible')) {
                //return false;
                $(this).removeClass('active');
                $(this).next('.acc-content').slideUp(300);
                $(outerBox).children('.accordion').removeClass('active-block');
            } else {
                $(outerBox).find('.accordion .acc-btn').removeClass('active');
                $(this).addClass('active');
                $(outerBox).children('.accordion').removeClass('active-block');
                $(outerBox).find('.accordion').children('.acc-content').slideUp(300);
                target.addClass('active-block');
                $(this).next('.acc-content').slideDown(300);
            }
        });
	}




    // Active Class
    let selectedIndex = 0;
    $('.service-one_title').on('mousemove', function (e) {
        $(this).addClass('active').siblings().removeClass('active');
    let arr = [...$('.service-one_titles .service-one_title')];
		arr.forEach((value, index) => {
			if ($(value).hasClass('active')) {
        selectedIndex = index + 1;
			}
		});
    $('.service-one_images_outer .service-one_image:nth-child(' + selectedIndex + ')').addClass('active').siblings().removeClass('active');
	});




    // LightBox Image
    if($('.lightbox-image').length) {
        $('.lightbox-image').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
	}


    // Odometer
    if ($(".odometer").length) {
        $('.odometer').appear();
    $('.odometer').appear(function(){
			var odo = $(".odometer");
    odo.each(function() {
				var countNumber = $(this).attr("data-count");
    $(this).html(countNumber);
			});
    window.odometerOptions = {
        format: 'd',
			};
		});
	}



    // LightBox Video
    if($('.lightbox-video').length) {
        $('.lightbox-video').magnificPopup({
            // disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            iframe: {
                patterns: {
                    youtube: {
                        index: 'youtube.com',
                        id: 'v=',
                        src: 'https://www.youtube.com/embed/%id%'
                    },
                },
                srcAction: 'iframe_src',
            },
            fixedContentPos: false
        });
	}



    //Contact Form Validation
    if($('#contact-form').length){
        $('#contact-form').validate({
            rules: {
                username: {
                    required: true
                },
                lastname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                services: {
                    required: true
                },
                message: {
                    required: true
                }
            }
        });
	}



    // Scroll to a Specific Div
    if($('.scroll-to-target').length){
        $(".scroll-to-target").on('click', function () {
            var target = $(this).attr('data-target');
            // animate
            $('html, body').animate({
                scrollTop: $(target).offset().top
            }, 1500);

        });
	}



    // Elements Animation
    if($('.wow').length){
		var wow = new WOW(
    {
        boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true       // act on asynchronously loaded content (default is true)
		  }
    );
    wow.init();
	}



    /* ==========================================================================
       When document is Scrollig, do
       ========================================================================== */

    $(window).on('scroll', function() {
        headerStyle();
	});

    /* ==========================================================================
       When document is loading, do
       ========================================================================== */

    $(window).on('load', function() {
        handlePreloader();
	});	

})(window.jQuery);


    function openSignupModal2025() {
        document.getElementById('signupModalOverlay2025').classList.add('active');
}

    function closeSignupModal2025() {
        document.getElementById('signupModalOverlay2025').classList.remove('active');
    // Reset to signup section when closing
    setTimeout(() => {
        showSignupForm2025();
    }, 300);
}

    function closeSignupModalOnOverlay2025(event) {
    if (event.target.id === 'signupModalOverlay2025') {
        closeSignupModal2025();
    }
}

    function switchSignupTab2025(tab) {
    // Update tab buttons
    const tabs = document.querySelectorAll('.modal-overlay_latest .tab');
    tabs.forEach(t => t.classList.remove('active'));
    event.target.classList.add('active');

    // Update tab content
    const contents = document.querySelectorAll('.modal-overlay_latest .tab-content');
    contents.forEach(c => c.classList.remove('active'));
    document.getElementById(tab === 'customer' ? 'customerForm2025' : 'technicianForm2025').classList.add('active');
}

    function toggleSignupPassword2025(inputId) {
    const input = document.getElementById(inputId);
    input.type = input.type === 'password' ? 'text' : 'password';
}

    function showSignupLogin2025(e) {
        if (e) e.preventDefault();
        document.getElementById('signupSection2025').style.display = 'none';
        document.getElementById('loginSection2025').style.display = 'block';
        document.getElementById('forgotPasswordSection2025').style.display = 'none';
        document.getElementById('signupModalTitle2025').textContent = 'Login';
    }
    
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
            alert('Please enter your email address.');
            return;
        }
        
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="white" style="animation: spin 1s linear infinite;"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/><path d="M12 6v6l4 2" stroke="white" stroke-width="2" fill="none"/></svg> Sending...';
        
        const sendOtpUrl = '/password/send-otp';
        fetch(sendOtpUrl, {
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
                alert('Verification code sent to your email!');
            } else {
                alert(data.message || 'Failed to send verification code. Please try again.');
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
            alert('Passwords do not match. Please try again.');
            return;
        }
        
        if (password.length < 8) {
            alert('Password must be at least 8 characters long.');
            return;
        }
        
        if (!otp || otp.length !== 6) {
            alert('Please enter a valid 6-digit verification code.');
            return;
        }
        
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="white" style="animation: spin 1s linear infinite;"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/><path d="M12 6v6l4 2" stroke="white" stroke-width="2" fill="none"/></svg> Resetting...';
        
        const resetPasswordUrl = '/password/reset-with-otp';
        fetch(resetPasswordUrl, {
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
                alert(data.message || 'Password reset successfully! You can now login with your new password.');
                // Close modal and show login
                closeSignupModal2025();
                setTimeout(() => {
                    openSignupModal2025();
                    showSignupLogin2025();
                }, 300);
            } else {
                alert(data.message || 'Failed to reset password. Please try again.');
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

    function showSignupForm2025() {
        document.getElementById('signupSection2025').style.display = 'block';
    document.getElementById('loginSection2025').classList.remove('active');
    document.getElementById('signupModalTitle2025').textContent = 'Create Account';
}



    // Close modal on Escape key
    document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        const modalOverlay = document.getElementById('signupModalOverlay2025');
    if (modalOverlay && modalOverlay.classList.contains('active')) {
        closeSignupModal2025();
        }
    }
});



    // get a quote script

    function openModal() {
        document.getElementById('modalOverlay').classList.add('active');
    document.body.style.overflow = 'hidden';
        }

    function closeModal() {
        document.getElementById('modalOverlay').classList.remove('active');
    document.body.style.overflow = 'auto';
        }

    function closeModalOnOutsideClick(event) {
            if (event.target === document.getElementById('modalOverlay')) {
        closeModal();
            }
        }

    function handleSubmit(event) {
        event.preventDefault();

    const formData = {
        fullName: document.getElementById('fullName').value,
    email: document.getElementById('email').value,
    phone: document.getElementById('phone').value,
    service: document.getElementById('service').value,
    budget: document.getElementById('budget').value,
    message: document.getElementById('message').value
            };

    console.log('Quote Request Submitted:', formData);
    alert('Thank you! Your quote request has been submitted successfully. We will get back to you soon.');

    document.getElementById('quoteForm').reset();
    closeModal();
        }

    document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
        closeModal();
            }
        });
    // get a quote script

    let activeChips = new Set();

    function applyFilters() {
	const searchTerm = document.getElementById('tmSearchInput').value.toLowerCase().trim();
    const specialty = document.getElementById('tmSpecialtySelect').value;
    const availability = document.getElementById('tmAvailabilitySelect').value;

    const cards = document.querySelectorAll('.tm-card');
    let visibleCount = 0;

	cards.forEach(card => {
        let show = true;

    // Search filter
    if (searchTerm) {
			const cardText = card.textContent.toLowerCase();
    show = show && cardText.includes(searchTerm);
		}

    // Specialty filter
    if (specialty) {
        show = show && card.dataset.specialty === specialty;
		}

    // Availability filter
    if (availability) {
			const isAvailable = card.dataset.available === 'true';
    show = show && ((availability === 'available' && isAvailable) ||
    (availability === 'busy' && !isAvailable));
		}

    // Chip filters
    if (activeChips.has('certified')) {
        show = show && card.dataset.certified === 'true';
		}
    if (activeChips.has('toprated')) {
        show = show && parseFloat(card.dataset.rating) >= 4.5;
		}
    if (activeChips.has('experienced')) {
        show = show && parseInt(card.dataset.experience) >= 10;
		}

    card.style.display = show ? 'flex' : 'none';
    if (show) visibleCount++;
	});

    updateResultsCount(visibleCount);
    toggleNoResults(visibleCount === 0);
}

    function toggleChip(button) {
	const filter = button.dataset.filter;
    button.classList.toggle('tm-active');

    if (button.classList.contains('tm-active')) {
        activeChips.add(filter);
	} else {
        activeChips.delete(filter);
	}

    applyFilters();
}

    function clearFilters() {
        document.getElementById('tmSearchInput').value = '';
    document.getElementById('tmSpecialtySelect').value = '';
    document.getElementById('tmAvailabilitySelect').value = '';

	document.querySelectorAll('.tm-chip.tm-active').forEach(chip => {
        chip.classList.remove('tm-active');
	});

    activeChips.clear();

	document.querySelectorAll('.tm-card').forEach(card => {
        card.style.display = 'flex';
	});

    updateResultsCount(document.querySelectorAll('.tm-card').length);
    toggleNoResults(false);
}

    function updateResultsCount(count) {
        document.getElementById('tmResultsCount').textContent = count;
}

    function toggleNoResults(show) {
        document.getElementById('tmGrid').style.display = show ? 'none' : 'grid';
    document.getElementById('tmNoResults').style.display = show ? 'block' : 'none';
}

    // Real-time search
    document.getElementById('tmSearchInput').addEventListener('input', applyFilters);
    document.getElementById('tmSpecialtySelect').addEventListener('change', applyFilters);
    document.getElementById('tmAvailabilitySelect').addEventListener('change', applyFilters);

    // Enter key for search
    document.getElementById('tmSearchInput').addEventListener('keypress', function (e) {
	if (e.key === 'Enter') {
        applyFilters();
	}
});

    // Handle signup form submission
    function handleSignupSubmit2025(event, type) {
	// Allow form to submit normally - Laravel will handle validation and redirects
	// The 302 redirect is expected behavior after successful registration
	const form = event.target;

    // Basic client-side validation is already handled by HTML5 required attributes
    // Let the form submit normally so Laravel can process it and redirect
    return true;
}

    // Handle login form submission
    function handleSignupLoginSubmit2025(event) {
        event.preventDefault();
        
        const form = event.target;
        const submitBtn = document.getElementById('loginSubmitBtn2025');
        const submitText = document.getElementById('loginSubmitText2025');
        const originalText = submitText ? submitText.textContent : 'Login';
        
        // Disable button and show loading state
        if (submitBtn) {
            submitBtn.disabled = true;
            if (submitText) {
                submitText.textContent = 'Logging in...';
            }
        }
        
        // Get form data
        const formData = new FormData(form);
        
        // Submit via fetch
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            redirect: 'follow'
        })
        .then(response => {
            // Check if response is a redirect (status 302 or redirected)
            if (response.redirected || response.status === 302) {
                // Success - redirect to the URL provided by Laravel
                window.location.href = response.url || window.location.href;
                return null;
            }
            
            // Check if response is OK
            if (response.ok) {
                return response.json().catch(() => {
                    // If JSON parsing fails, it might be a redirect
                    window.location.reload();
                    return null;
                });
            }
            
            // Handle error responses
            return response.json().then(data => {
                throw new Error(data.message || 'Login failed');
            }).catch(err => {
                if (err.message) {
                    throw err;
                }
                // If it's not JSON, try to reload (might be a redirect)
                window.location.reload();
                return null;
            });
        })
        .then(data => {
            if (data) {
                if (data.success) {
                    // Success - redirect
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    } else {
                        window.location.reload();
                    }
                } else {
                    // Show error message
                    const errorMsg = data.message || (data.errors ? Object.values(data.errors).flat().join(', ') : 'Login failed. Please try again.');
                    alert(errorMsg);
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        if (submitText) {
                            submitText.textContent = originalText;
                        }
                    }
                }
            }
        })
        .catch(error => {
            console.error('Login error:', error);
            const errorMsg = error.message || 'An error occurred. Please try again.';
            alert(errorMsg);
            if (submitBtn) {
                submitBtn.disabled = false;
                if (submitText) {
                    submitText.textContent = originalText;
                }
            }
        });
        
        return false;
    }

function epOpenModal() {
    document.getElementById('epModalOverlay').classList.add('ep-active');
    document.body.style.overflow = 'hidden';
}

function epCloseModal() {
    document.getElementById('epModalOverlay').classList.remove('ep-active');
    document.body.style.overflow = 'auto';
}

function epCloseOnOutsideClick(event) {
    if (event.target.id === 'epModalOverlay') {
        epCloseModal();
    }
}

function epPreviewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('epProfilePic').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}

function epAddCertification() {
    const list = document.getElementById('epCertificationsList');
    const newCard = document.createElement('div');
    newCard.className = 'ep-item-card';
    newCard.innerHTML = `
                <div class="ep-item-header">
                    <strong>New Certification</strong>
                    <div class="ep-item-actions">
                        <button class="ep-icon-btn" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="ep-icon-btn ep-delete" title="Delete" onclick="this.closest('.ep-item-card').remove()">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="ep-form-row">
                    <div class="ep-form-group">
                        <label class="ep-label">Certification Name</label>
                        <input type="text" class="ep-input" placeholder="Enter certification name">
                    </div>
                    <div class="ep-form-group">
                        <label class="ep-label">Issuing Organization</label>
                        <input type="text" class="ep-input" placeholder="Enter organization">
                    </div>
                    <div class="ep-form-group">
                        <label class="ep-label">Year</label>
                        <input type="number" class="ep-input" placeholder="Year">
                    </div>
                </div>
            `;
    list.appendChild(newCard);
}

function epAddEducation() {
    const list = document.getElementById('epEducationList');
    const newCard = document.createElement('div');
    newCard.className = 'ep-item-card';
    newCard.innerHTML = `
                <div class="ep-item-header">
                    <strong>New Education</strong>
                    <div class="ep-item-actions">
                        <button class="ep-icon-btn" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="ep-icon-btn ep-delete" title="Delete" onclick="this.closest('.ep-item-card').remove()">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="ep-form-row">
                    <div class="ep-form-group">
                        <label class="ep-label">Degree/Diploma</label>
                        <input type="text" class="ep-input" placeholder="Enter degree">
                    </div>
                    <div class="ep-form-group">
                        <label class="ep-label">Institution</label>
                        <input type="text" class="ep-input" placeholder="Enter institution">
                    </div>
                </div>
                <div class="ep-form-row">
                    <div class="ep-form-group">
                        <label class="ep-label">Start Year</label>
                        <input type="number" class="ep-input" placeholder="Start year">
                    </div>
                    <div class="ep-form-group">
                        <label class="ep-label">End Year</label>
                        <input type="number" class="ep-input" placeholder="End year">
                    </div>
                    <div class="ep-form-group">
                        <label class="ep-label">Location</label>
                        <input type="text" class="ep-input" placeholder="Location">
                    </div>
                </div>
            `;
    list.appendChild(newCard);
}

function epAddProject() {
    const list = document.getElementById('epProjectsList');
    const newCard = document.createElement('div');
    const uniqueId = 'epProjectImg' + Date.now();
    newCard.className = 'ep-item-card';
    newCard.innerHTML = `
                <div class="ep-item-header">
                    <strong>New Project</strong>
                    <div class="ep-item-actions">
                        <button class="ep-icon-btn" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="ep-icon-btn ep-delete" title="Delete" onclick="this.closest('.ep-item-card').remove()">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="ep-form-group">
                    <label class="ep-label">Project Name</label>
                    <input type="text" class="ep-input" placeholder="Enter project name">
                </div>
                <div class="ep-form-group">
                    <label class="ep-label">Description</label>
                    <textarea class="ep-textarea" placeholder="Describe the project..."></textarea>
                </div>
                <div class="ep-form-row">
                    <div class="ep-form-group">
                        <label class="ep-label">Year</label>
                        <input type="number" class="ep-input" placeholder="Year">
                    </div>
                    <div class="ep-form-group">
                        <label class="ep-label">Tags (comma-separated)</label>
                        <input type="text" class="ep-input" placeholder="tag1, tag2, tag3">
                    </div>
                </div>
                <div class="ep-form-group">
                    <label class="ep-label">Project Image</label>
                    <button class="ep-upload-btn" onclick="document.getElementById('${uniqueId}').click()">
                        <i class="fas fa-image"></i>
                        Upload Image
                    </button>
                    <input type="file" id="${uniqueId}" class="ep-hidden" accept="image/*">
                </div>
            `;
    list.appendChild(newCard);
}

function epSaveProfile() {
    alert('Profile saved successfully! ✓\n\nAll your changes have been saved.');
    epCloseModal();
}

// Close modal on Escape key
document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
        epCloseModal();
    }
});

// Add delete functionality to existing items
document.addEventListener('click', function (event) {
    if (event.target.closest('.ep-icon-btn.ep-delete')) {
        const card = event.target.closest('.ep-item-card');
        if (card && confirm('Are you sure you want to delete this item?')) {
            card.remove();
        }
    }
});

// Handle project image preview
document.addEventListener('change', function (event) {
    if (event.target.type === 'file' && event.target.id.startsWith('epProjectImg')) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const preview = event.target.closest('.ep-form-group').querySelector('.ep-project-image-preview');
                if (preview) {
                    preview.src = e.target.result;
                } else {
                    const newPreview = document.createElement('img');
                    newPreview.className = 'ep-project-image-preview';
                    newPreview.src = e.target.result;
                    newPreview.alt = 'Project Preview';
                    event.target.closest('.ep-form-group').appendChild(newPreview);
                }
            };
            reader.readAsDataURL(file);
        }
    }
});

let prCurrentSlide = 0;
const prTotalSlides = 4;

function prInitCarousel() {
    const prIndicatorsContainer = document.getElementById('prIndicators');
    for (let i = 0; i < prTotalSlides; i++) {
        const prIndicator = document.createElement('div');
        prIndicator.className = 'pr-indicator' + (i === 0 ? ' pr-active' : '');
        prIndicator.onclick = () => prGoToSlide(i);
        prIndicatorsContainer.appendChild(prIndicator);
    }
}

function prUpdateCarousel() {
    const prTrack = document.getElementById('prCarouselTrack');
    const prIndicators = document.querySelectorAll('.pr-indicator');

    prTrack.style.transform = `translateX(-${prCurrentSlide * 100}%)`;

    prIndicators.forEach((indicator, index) => {
        if (index === prCurrentSlide) {
            indicator.classList.add('pr-active');
        } else {
            indicator.classList.remove('pr-active');
        }
    });
}

function prNextSlide() {
    prCurrentSlide = (prCurrentSlide + 1) % prTotalSlides;
    prUpdateCarousel();
}

function prPreviousSlide() {
    prCurrentSlide = (prCurrentSlide - 1 + prTotalSlides) % prTotalSlides;
    prUpdateCarousel();
}

function prGoToSlide(index) {
    prCurrentSlide = index;
    prUpdateCarousel();
}

// Auto-advance carousel
setInterval(prNextSlide, 5000);

// Initialize carousel on page load
prInitCarousel();




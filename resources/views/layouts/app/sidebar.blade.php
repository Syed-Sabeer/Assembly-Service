<!-- Page Sidebar Start-->
        <div class="sidebar-wrapper" data-sidebar-layout="stroke-svg">
          <div>
            <div class="logo-wrapper">
              <a href="index.html">
                <!-- <h6> -->
               Assembly Services
                <!-- </h6> -->
                <!-- <img class="img-fluid for-light" src="" alt="">
                <img class="img-fluid for-dark" src="" alt=""> -->

              </a>
              <div class="back-btn"><i class="fa-solid fa-angle-left"></i></div>
              <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="{{asset('AdminAssets/images/logo/logo-icon.png')}}" alt=""></a></div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn"><a href="index.html"><img class="img-fluid" src="{{asset('AdminAssets/images/logo/logo-icon.png')}}" alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa-solid fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="pin-title sidebar-main-title">
                    <div>
                      <h6>Pinned</h6>
                    </div>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6 class="lan-1">General</h6>
                    </div>
                  </li>



             <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                      <svg class="stroke-icon">
                        <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-home')}}"></use>
                      </svg>
                      <svg class="fill-icon">
                          <use href="{{asset('AdminAssets/svg/icon-sprite.svg#fill-home')}}"></use>
                      </svg><span>Dashboard</span></a></li>


                  <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                    {{-- <label class="badge badge-light-primary">13</label> --}}
                    <a class="sidebar-link sidebar-title" href="#">
                      <svg class="stroke-icon">
                        <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-widget')}}"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="{{asset('AdminAssets/svg/icon-sprite.svg#fill-widget')}}"></use>
                      </svg><span class="lan-3">CMS Crud</span></a>
                    <ul class="sidebar-submenu">
                      <li><a class="lan-4 {{ request()->routeIs('admin.faq.*') ? 'active' : '' }}" href="{{route('admin.faq.index')}}">FAQs</a></li>
          
                      <li><a class="lan-5 {{ request()->routeIs('admin.newsbar.*') ? 'active' : '' }}" href="{{route('admin.newsbar.index')}}">Newsbar</a></li>
                      <li><a class="lan-5 {{ request()->routeIs('admin.achievement.*') ? 'active' : '' }}" href="{{route('admin.achievement.index')}}">Achievement</a></li>
                      <li><a class="lan-5 {{ request()->routeIs('admin.testimonial.*') ? 'active' : '' }}" href="{{route('admin.testimonial.index')}}">Testimonial</a></li>
                      <li><a class="lan-5 {{ request()->routeIs('admin.hero.*') ? 'active' : '' }}" href="{{route('admin.hero.index')}}">Hero</a></li>
                      
                      <li><a class="lan-4 {{ request()->routeIs('admin.service.*') ? 'active' : '' }}" href="{{route('admin.service.index')}}">Services</a></li>
                 
                      <li><a class="lan-5 {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}" href="{{route('admin.blog.index')}}">Blog</a></li>

                      <li><a class="lan-5 {{ request()->routeIs('admin.partner.*') ? 'active' : '' }}" href="{{route('admin.partner.index')}}">Partners Logo</a></li>

                    </ul>
                  </li>

                   <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                    {{-- <label class="badge badge-light-primary">13</label> --}}
                    <a class="sidebar-link sidebar-title" href="#">
                      <svg class="stroke-icon">
                        <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-social')}}"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="{{asset('AdminAssets/svg/icon-sprite.svg#fill-social')}}"></use>
                      </svg><span class="lan-3">CMS Pages</span></a>
                    <ul class="sidebar-submenu">
                      <li><a class="lan-4" href="{{route('admin.website.index')}}">Home Page</a></li>
                      <li><a class="lan-4 {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}" href="{{route('admin.contact.index')}}">Contact Page</a></li>
                      <li><a class="lan-4 {{ request()->routeIs('admin.about.*') ? 'active' : '' }}" href="{{route('admin.about.index')}}">About Page</a></li>



                    </ul>
                  </li>
                     <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                
                    <a class="sidebar-link sidebar-title" href="#">
                      <svg class="stroke-icon">
                        <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-knowledgebase')}}"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="{{asset('AdminAssets/svg/icon-sprite.svg#fill-knowledgebase')}}"></use>
                      </svg><span class="lan-3">Submission</span></a>
                    <ul class="sidebar-submenu">
                      <li><a class="lan-4 {{ request()->routeIs('admin.newsletterlist') || request()->routeIs('admin.newsletter.*') ? 'active' : '' }}" href="{{route('admin.newsletterlist')}}">Newsletter</a></li>
                      <li><a class="lan-4 {{ request()->routeIs('admin.contactlist') || request()->routeIs('admin.contact.*') ? 'active' : '' }}" href="{{route('admin.contactlist')}}">Contact</a></li>




                    </ul>
                  </li>


                 

                      
       <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('admin.product.index') || request()->routeIs('admin.product.*') ? 'active' : '' }}" href="{{route('admin.product.index')}}">
                      <svg class="stroke-icon">
                        <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-board')}}"></use>
                      </svg>
                      <svg class="fill-icon">
                          <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-board')}}"></use>
                      </svg><span>Products</span></a></li>


                      <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('admin.project.index') || request()->routeIs('admin.project.*') ? 'active' : '' }}" href="{{route('admin.project.index')}}">
                      <svg class="stroke-icon">
                        <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-project')}}"></use>
                      </svg>
                      <svg class="fill-icon">
                          <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-project')}}"></use>
                      </svg><span>Projects</span></a></li>


                       <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('admin.category.index') || request()->routeIs('admin.category.*') ? 'active' : '' }}" href="{{route('admin.category.index')}}">
                      <svg class="stroke-icon">
                        <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-internationalization')}}"></use>
                      </svg>
                      <svg class="fill-icon">
                          <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-internationalization')}}"></use>
                      </svg><span>Categories</span></a></li>

                      <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('admin.customers.index') || request()->routeIs('admin.customers.*') ? 'active' : '' }}" href="{{route('admin.customers.index')}}">
                      <svg class="stroke-icon">
                        <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-user')}}"></use>
                      </svg>
                      <svg class="fill-icon">
                          <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-user')}}"></use>
                      </svg><span>Customers</span></a></li>

                      <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('admin.technician.index') || request()->routeIs('admin.technician.*') ? 'active' : '' }}" href="{{route('admin.technician.index')}}">
                      <svg class="stroke-icon">
                        <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-user')}}"></use>
                      </svg>
                      <svg class="fill-icon">
                          <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-user')}}"></use>
                      </svg><span>Technicians</span></a></li>

                      <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('admin.bookings.index') || request()->routeIs('admin.bookings.*') ? 'active' : '' }}" href="{{route('admin.bookings.index')}}">
                      <svg class="stroke-icon">
                        <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-blog')}}"></use>
                      </svg>
                      <svg class="fill-icon">
                          <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-blog')}}"></use>
                      </svg><span>Bookings</span></a></li>

                      <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('admin.reviews.index') || request()->routeIs('admin.reviews.*') ? 'active' : '' }}" href="{{route('admin.reviews.index')}}">
                      <svg class="stroke-icon">
                        <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-bookmark')}}"></use>
                      </svg>
                      <svg class="fill-icon">
                          <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-bookmark')}}"></use>
                      </svg><span>Reviews</span></a></li>

                    

                      <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('admin.quotes.index') || request()->routeIs('admin.quotes.*') ? 'active' : '' }}" href="{{route('admin.quotes.index')}}">
                      <svg class="stroke-icon">
                        <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-email')}}"></use>
                      </svg>
                      <svg class="fill-icon">
                          <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-email')}}"></use>
                      </svg><span>Quotes</span></a></li>
                         
              <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('admin.company.settings') || request()->routeIs('admin.company.*') ? 'active' : '' }}" href="{{route('admin.company.settings')}}">
                      <svg class="stroke-icon">
                        <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-icons')}}"></use>
                      </svg>
                      <svg class="fill-icon">
                          <use href="{{asset('AdminAssets/svg/icon-sprite.svg#stroke-icons')}}"></use>
                      </svg><span>Business Settings</span></a></li>


                    

                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>
        <!-- Page Sidebar Ends-->

<header class="header">
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 order-1 order-lg-1">
                    <ul class="header-top-menu-list">
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Status</a></li>
                        <li><a href="#">Writers</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 order-3 order-lg-2">
                    <div class="header-top-contact-info">
                        <div class="header-top-single-contact-item">
                            <div class="header-top-contact-icon">
                                <img src="{{asset('front_assets/images/icons/contact-call.png')}}" alt="">
                            </div>
                            <div class="header-top-contact-text text-size-small">
                                <a href="tel:970262-1413">+91 9478563210</a>
                            </div>
                        </div>

                        <div class="header-top-single-contact-item">
                            <div class="header-top-contact-icon">
                                <img src="{{asset('front_assets/images/icons/contact-emaill.png')}}" alt="">
                            </div>
                            <div class="header-top-contact-text">
                                <a href="mailto:demo@gmail.com">demo@gmail.com</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 order-2 order-lg-3">
                    <div class="header-top-right-side">
                        <div class="wayder">
                            <span class="wayder-icon"><img src="{{asset('front_assets/images/icons/wayder.png')}}" alt="" /></span>
                            <span class="wayder-text">28° C</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mid-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-2 col-5">
                    <div class="logo">
                        <a href="{{url('/')}}">
                            <img src="{{asset('front_assets/images/logo/logo.png')}}" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 d-md-block d-none">
                    <div class="header-add-banner text-center">
                        <a href="#">
                            <img src="{{asset('front_assets/images/banners/header-add-banner.jpg')}}" alt="" />
                            <h6 class="header-add-text">Advertisement Section
                                <!-- <span>50% Off</span> -->
                            </h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-7">
                    <div class="header-mid-right-side">
                        <a href="javascript:void(0)" id="search-overlay-trigger" class="single-action-item">
                            <i class="icofont-search-2"></i>
                        </a>
                        @if(session('LOGIN') === true)
                        <a target="_blank" href="{{route('admin.dashboard')}}" class="single-action-item">
                            <i class="icofont-dashboard"></i>
                        </a>
                        <a href="{{route('logout')}}" class="single-action-item">
                            <i class="icofont-logout"></i>
                        </a>
                        @else
                        <a href="{{route('user-login')}}" class="single-action-item">
                            <i class="icofont-login"></i>
                        </a>
                        <a href="{{route('user-register')}}" class="single-action-item">
                            <i class="icofont-ui-user"></i>
                        </a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-9">
                    <ul class="social-share-area mt-15 mb-15">
                        <li><a href="#"><i class="icofont-facebook"></i></a></li>
                        <li><a href="#"><i class="icofont-skype"></i></a></li>
                        <li><a href="#"><i class="icofont-twitter"></i></a></li>
                        <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-8 col-3">
                    <div class="main-menu-area text-end">
                        <nav class="navigation-menu">
                            <ul>
                                <li>
                                    <a href="#"><span>About</span></a>
                                </li>
                                <li class="has-children"><a href="#" onclick="return false;"><span>Category</span></a>
                                    <ul class="submenu">
                                        @php
                                        $menu_cats = categoriesTop(6);
                                        @endphp
                                        @forelse($menu_cats as $cat)
                                        <li><a href="{{route('front.posts-by-category', $cat->category_slug)}}"><span>{{$cat->category_name}}</span></a> </li>
                                        @empty
                                        @endforelse
                                        <li><a href="{{route('front.category-all')}}"><span>All Categories</span></a> </li>
                                    </ul>
                                </li>

                                <li><a href="{{route('front.posts-all')}}"><span>All Posts</span></a></li>
                                <li><a href="#"><span>Contact </span></a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- mobile menu -->
                    <div class="mobile-menu-right">
                        <div class="mobile-navigation-icon d-block d-lg-none" id="mobile-menu-trigger">
                            <i></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
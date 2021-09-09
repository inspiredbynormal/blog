<!-- Start Header -->
<header class="header axil-header  header-light header-sticky ">
    <div class="header-wrap">
        <div class="row justify-content-between align-items-center">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-12">
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img class="dark-logo" src="{{asset('front_assets/images/logo/logo-b.png')}}" alt="Demoblog logo">
                        <img class="light-logo" src="{{asset('front_assets/images/logo/logo-w.png')}}" alt="Demoblog logo">
                    </a>
                </div>
            </div>

            <div class="col-xl-6 d-none d-xl-block">
                <div class="mainmenu-wrapper">
                    <nav class="mainmenu-nav">
                        <!-- Start Mainmanu Nav -->
                        <ul class="mainmenu">
                            @php
                            $menu_cats = categories();
                            @endphp
                            @forelse($menu_cats as $cat)
                            <li><a href="{{route('front.posts-by-category', $cat->category_slug)}}">{{$cat->category_name}}</a></li>
                            @empty
                            @endforelse
                            <li><a href="{{route('front.category-all')}}">More...</a></li>
                            <li><a href="{{route('front.posts-all')}}">All Posts</a></li>
                        </ul>
                        <!-- End Mainmanu Nav -->
                    </nav>
                </div>
            </div>

            <div class="col-xl-3 col-lg-8 col-md-8 col-sm-9 col-12">
                <div class="header-search text-right d-flex align-items-center">
                    <form class="header-search-form" action="{{route('front.search-posts')}}" method="GET">
                        <div class="axil-search form-group">
                            <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                            <input type="search" name="search" class="form-control" placeholder="search">
                        </div>
                    </form>

                    <div class="mainmenu-wrapper">
                        <nav class="mainmenu-nav">
                            <!-- Start Mainmanu Nav -->
                            <ul class="mainmenu">
                                <li class="menu-item-has-children"><a href="#" style="font-size:30px;"><i class="fas fa-user-circle"></i></a>
                                    <ul class="axil-submenu submenu-custom">
                                        @if(session('LOGIN') === true)
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="{{route('admin.dashboard')}}">
                                                <span class="hover-flip-item">
                                                    <span data-text="Dashboard">Dashboard</span>
                                                </span>
                                            </a>
                                        </li>
                                        @else

                                        <li>
                                            <a class="hover-flip-item-wrapper" href="{{route('user-login')}}">
                                                <span class="hover-flip-item">
                                                    <span data-text="Login">Login</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="{{route('user-register')}}">
                                                <span class="hover-flip-item">
                                                    <span data-text="Register">Register</span>
                                                </span>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </li>

                        </nav>
                    </div>


                    <!-- Start Hamburger Menu  -->
                    <div class="hamburger-menu d-block d-xl-none">
                        <div class="hamburger-inner">
                            <div class="icon"><i class="fal fa-bars"></i></div>
                        </div>
                    </div>
                    <!-- End Hamburger Menu  -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Start Header -->



<!-- cfdfggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg -->
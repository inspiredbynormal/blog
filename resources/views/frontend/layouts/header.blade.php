<header class="sticky-header">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between">
            <div class="site-logo">
                <a href="{{url('/')}}"><img src="{{asset('front_assets/img/logo.png')}}" alt="Genial"></a>
            </div>
            <div class="header-right">
                <div class="search-area">
                    <a href="javascript:void(0)" class="search-btn"><i class="fas fa-search"></i></a>
                    <div class="search-form">
                        <a href="#" class="search-close"><i class="fal fa-times"></i></a>
                        <form action="{{route('front.search-posts')}}" method="GET">
                            <input type="search" name="search" placeholder="Type here to search">
                        </form>
                        <div class="search-overly"></div>
                    </div>
                </div>

                <div class="offcanvas-panel">
                    <a href="javascript:void(0)" class="panel-btn">
                        <span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </a>
                    <div class="panel-overly"></div>
                    <div class="offcanvas-items">
                        <!-- Navbar Toggler -->
                        <a href="javascript:void(0)" class="panel-close">
                            Back <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>

                        <ul class="offcanvas-menu">
                            <li><a href="{{route('front.category-all')}}">Categories</a></li>
                            <li><a href="{{route('front.posts-all')}}">All Posts</a></li>

                            @if(session('LOGIN') === true)
                            <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            @else
                            <li><a href="{{route('user-login')}}">Login</a></li>
                            <li><a href="{{route('user-register')}}">Register</a></li>
                            @endif


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
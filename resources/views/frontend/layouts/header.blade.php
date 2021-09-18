<!-- Navigation-->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <!--logo-->
        <div class="logo">
            <a href="{{url('/')}}">
                <img src="{{asset('front_assets/img/logo-dark.png')}}" alt="" class="logo-dark">
                <img src="{{asset('front_assets/img/logo-white.png')}}" alt="" class="logo-white">
            </a>
        </div>

        <!--navbar-collapse-->
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav ml-auto mr-auto">


                <li class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown"> Category </a>
                    <ul class="dropdown-menu fade-up">

                        @php
                        $menu_cats = categoriesTop(6);
                        @endphp
                        @forelse($menu_cats as $cat)
                        <li><a class="dropdown-item" href="{{route('front.posts-by-category', $cat->category_slug)}}"><span>{{$cat->category_name}}</span></a> </li>
                        @empty
                        @endforelse
                        <li><a class="dropdown-item" href="{{route('front.category-all')}}"><span>All Categories</span></a> </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('front.posts-all')}}"> All Posts </a>
                </li>
            </ul>
        </div>
        <!--/-->

        <!--navbar-right-->
        <div class="navbar-right ml-auto">
            <div class="social-icones">
                <ul class="list-inline">

                    @if(session('LOGIN') === true)
                    <li>
                        <a href="{{route('admin.dashboard')}}" target="_blank"><i class="fas fa-tachometer-alt"></i></a>
                    </li>
                    <li>
                        <a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i></a>
                    </li>
                    @else
                    <li>
                        <a href="{{route('user-login')}}"><i class="fas fa-lock"></i></a>
                    </li>
                    <li>
                        <a href="{{route('user-register')}}"><i class="fas fa-user"></i></a>
                    </li>
                    @endif

                </ul>
            </div>
            <div class="theme-switch-wrapper">
                <label class="theme-switch" for="checkbox">
                    <input type="checkbox" id="checkbox" />
                    <span class="slider round ">
                        <i class="far  fa-sun icon-light"></i>
                        <i class="far fa-moon icon-dark"></i>
                    </span>
                </label>
            </div>

            <div class="search-icon">
                <i class="far fa-search"></i>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</nav>
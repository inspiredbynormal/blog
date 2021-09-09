<!-- Start Mobile Menu Area  -->
<div class="popup-mobilemenu-area">
    <div class="inner">
        <div class="mobile-menu-top">
            <div class="logo">
                <a href="{{url('/')}}">
                    <img class="dark-logo" src="{{asset('front_assets/images/logo/logo-b.png')}}" alt="Logo Images">
                    <img class="light-logo" src="{{asset('front_assets/images/logo/logo-w.png')}}" alt="Logo Images">
                </a>
            </div>
            <div class="mobile-close">
                <div class="icon">
                    <i class="fal fa-times"></i>
                </div>
            </div>
        </div>
        <ul class="mainmenu">
            <li class="menu-item-has-children"><a href="#">Categories</a>
                <ul class="axil-submenu">
                    @php
                    $menu_cats = categories();
                    @endphp
                    @forelse($menu_cats as $cat)
                    <li><a href="{{route('front.posts-by-category', $cat->category_slug)}}">{{$cat->category_name}}</a></li>
                    @empty
                    @endforelse
                </ul>
            </li>

            <li><a href="{{route('front.category-all')}}">More Categories</a></li>
            <li><a href="{{route('front.posts-all')}}">All Posts</a></li>
        </ul>

    </div>
</div>
<!-- End Mobile Menu Area  -->
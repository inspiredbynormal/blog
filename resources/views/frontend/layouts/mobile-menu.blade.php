<div class="mobile-menu-overlay" id="mobile-menu-overlay">
    <div class="mobile-menu-overlay__inner">
        <div class="mobile-menu-overlay__header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8">
                        <!-- logo -->
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <img src="{{asset('front_assets/images/logo/logo.png')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-4">
                        <!-- mobile menu content -->
                        <div class="mobile-menu-content text-end">
                            <span class="mobile-navigation-close-icon" id="mobile-menu-close-trigger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu-overlay__body">
            <nav class="offcanvas-navigation">
                <ul>

                    <li><a href="#"><span>About</span></a></li>
                    <li class="has-children">
                        <a href="#" onclick="return false;">Category</a>
                        <ul class="sub-menu">
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

                    <li><a href="{{route('front.posts-all')}}"><span>All Posts </span></a></li>
                    <li><a href="#"><span>Contact </span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
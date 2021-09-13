@extends('frontend.layouts.master')

@section('content')

<!-- Hero Area Start -->
<div class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-inner-area">
                    <!-- Hero Category Area Start -->
                    <div class="hero-category-area">
                        @php
                        $menu_cats = categories();
                        @endphp
                        @forelse($menu_cats as $cat)
                        <a href="{{route('front.posts-by-category', $cat->category_slug)}}" class="single-hero-category-item" data-aos="fade-up">
                            <img src="{{asset('storage/media/category/'. $cat->category_image)}}" alt="">
                            <div class="hero-category-inner-box">
                                <h3 class="title">{{$cat->category_name}}</h3>
                                <i class="icon icofont-long-arrow-right"></i>
                            </div>
                        </a>
                        @empty
                        @endforelse
                    </div><!-- Hero Category Area End -->

                    <!-- Hero Banner Area Start -->
                    <div class="hero-banner-area" data-aos="fade-up">
                        @forelse($gallery_post as $post)
                        <a class="mt-3" href="{{route('front.blog-details', [$post->post_slug])}}">
                            <img src="{{asset('storage/media/post/'. $post->post_image)}}" alt="">
                        </a>
                        @empty
                        @endforelse
                    </div>
                    <!-- Hero Banner Area End -->

                    <div class="hero-blog-post">
                        @forelse($gallery_post as $post)
                        <!-- Single-hero-blog-post Start -->
                        <div class="single-hero-blog-post" data-aos="fade-up">
                            <div class="hero-blog-post-top">
                                <div class="hero-blog-post-category">
                                    <a href="{{route('front.posts-by-category', $post->category->category_slug)}}" class="marketing">{{$post->category->category_name}}</a>
                                </div>
                                <div class="hero-blog-post-author">
                                    By <a href="#">{{$post->user->name}}</a>
                                </div>
                            </div>
                            <h3 class="hero-blog-post-title">
                                <a href="{{route('front.blog-details', [$post->post_slug])}}">{{Str::limit($post->post_title, 45)}}
                                </a>
                            </h3>
                            <p class="post-short-details">
                                {{Str::limit($post->post_short_desc, 60)}}
                            </p>
                            <div class="hero-blog-post-meta">
                                <div class="post-meta-left-side">
                                    <span class="post-date">
                                        <i class="icofont-ui-calendar"></i>
                                        <a href="#">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</a>
                                    </span>
                                </div>
                                <div class="post-meta-right-side">
                                    <a href="#"><img src="{{asset('front_assets/images/icons/small-bookmark.png')}}" alt="" /></a>
                                    <a href="#"><img src="{{asset('front_assets/images/icons/heart.png')}}" alt="" /></a>
                                </div>
                            </div>
                        </div><!-- Single-hero-blog-post End -->
                        @empty
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
</div> <!-- Hero Area End -->


<div class="bg-gray-1">
    <!-- Trending Topic Area Start -->
    <div class="trending-topic-area section-space--ptb_80">
        <div class="container">
            <div class="row align-items-center">
                <div class="trending-topic-section-title">
                    <h3>Trending Topic</h3>
                    <div class="trending-topic-navigation mt-30">
                        <div class="trending-topic-button-prev navigation-button"><i class="icofont-long-arrow-left"></i></div>
                        <div class="trending-topic-button-next navigation-button"><i class="icofont-long-arrow-right"></i></div>
                    </div>
                </div>
                <div class="trending-topic-item-wrap">
                    <div class="swiper-container trending-topic-slider-active">
                        <div class="swiper-wrapper">
                            @forelse($categories as $category)
                            <div class="swiper-slide" data-aos="fade-up">
                                <div class="single-trending-topic-item">
                                    <a href="{{route('front.posts-by-category', $category->category_slug)}}">
                                        <img src="{{asset('storage/media/category/'. $category->category_image)}}" alt="">
                                        <h4 class="title">{{$category->category_name}}</h4>
                                    </a>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Trending Topic Area End -->
</div>


<!-- Recent Reading List Area Start -->
<div class="recent-reading-list-area section-space--pb_80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="recent-reading-header">
                    <div class="section-title">
                        <h3>Recent Reading List</h3>
                    </div>
                    <div class="recent-reading-slider-navigation mt-2 mb-2">
                        <div class="recent-reading-button-prev navigation-button"><i class="icofont-long-arrow-left"></i></div>
                        <div class="recent-reading-button-next navigation-button"><i class="icofont-long-arrow-right"></i></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="swiper-container recent-reading-slider-active">
            <div class="swiper-wrapper">
                @forelse($postsGroups as $postGroup)
                <div class="swiper-slide">
                    @forelse($postGroup as $key => $post)
                    <!-- Single Recent Reading Post Start -->
                    <div class="single-recent-reading-post" data-aos="fade-up">
                        <a class="recent-reading-post-thum" href="{{route('front.blog-details', [$post->post_slug])}}">
                            <img src="{{asset('storage/media/post/'. $post->post_image)}}" alt="">
                        </a>
                        <div class="recent-reading-post-content">
                            <div class="recent-reading-post-author">
                                By <a href="#">{{$post->user->name}}</a>
                            </div>
                            <h6 class="title"><a href="{{route('front.blog-details', [$post->post_slug])}}">{{Str::limit($post->post_title,40)}}</a></h6>
                            <div class="recent-reading-post-meta">
                                <span class="post-date">
                                    <i class="icofont-ui-calendar"></i>
                                    <a href="#">{{ Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }}</a>
                                </span>
                                <!-- <span>10 min read</span> -->
                            </div>
                        </div>
                    </div>
                    <!-- Single Recent Reading Post End -->
                    @empty
                    @endforelse
                </div>
                @empty
                @endforelse
            </div>
        </div>

    </div>
</div>
<!-- Recent Reading List Area End -->

<!-- Bottom Add Banner Area Start -->
<div class="bottom-add-banner-area section-space--pb_80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="#" class="bottom-add-banner-box" data-aos="fade-up">
                    <img src="{{asset('front_assets/images/banners/bottom-add-banner.jpg')}}" alt="">
                    <h6 class="bottom-add-text">Advertisement Section
                        <!-- <span>50% Off</span> -->
                    </h6>
                </a>
            </div>
        </div>
    </div>
</div> <!-- Bottom Add Banner Area End -->

@endsection
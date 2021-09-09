@extends('frontend.layouts.master')

@section('content')


<!-- Start Banner Area -->
<h1 class="d-none">Home Default Blog</h1>
<div class="slider-area bg-color-grey">
    <div class="axil-slide slider-style-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-activation axil-slick-arrow">
                        <!-- Start Single Slide  -->
                        @forelse($gallery_post as $post)
                        <div class="content-block">
                            <!-- Start Post Thumbnail  -->
                            <div class="post-thumbnail">
                                <a href="{{route('front.blog-details', [$post->post_slug])}}">
                                    <img src="{{asset('storage/media/post/'. $post->post_image)}}" alt="Post Images">
                                </a>
                            </div>
                            <!-- End Post Thumbnail  -->

                            <!-- Start Post Content  -->
                            <div class="post-content">
                                <div class="post-cat">
                                    <div class="post-cat-list">
                                        <a class="hover-flip-item-wrapper" href="{{route('front.posts-by-category', $post->category->category_slug)}}">
                                            <span class="hover-flip-item">
                                                <span data-text="{{$post->category->category_name}}">{{$post->category->category_name}}</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <h2 class="title"><a href="{{route('front.blog-details', [$post->post_slug])}}">{{$post->post_title}}</a></h2>
                                <!-- Post Meta  -->
                                <div class="post-meta-wrapper with-button">
                                    <div class="post-meta">
                                        <div class="post-author-avatar border-rounded">
                                            <img src="{{asset('storage/media/user/'.$post->user->avatar)}}" alt="Author Images">
                                        </div>
                                        <div class="content">
                                            <h6 class="post-author-name">
                                                <a class="hover-flip-item-wrapper" href="#">
                                                    <span class="hover-flip-item">
                                                        <span data-text="{{$post->user->name}}">{{$post->user->name}}</span>
                                                    </span>
                                                </a>
                                            </h6>
                                            <ul class="post-meta-list">
                                                <li>{{ Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }}</li>
                                                <!-- <li>300k Views</li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <ul class="social-share-transparent justify-content-end">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fas fa-link"></i></a></li>
                                    </ul>
                                    <div class="read-more-button cerchio">
                                        <a class="axil-button button-rounded hover-flip-item-wrapper" href="{{route('front.blog-details', [$post->post_slug])}}">
                                            <span class="hover-flip-item">
                                                <span data-text="Read Post">Read Post</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Post Content  -->
                        </div>
                        @empty
                        @endforelse
                        <!-- End Single Slide  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner Area -->

<!-- Start Featured Area  -->
@if($gallery_post)
<div class="axil-featured-post axil-section-gap bg-color-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 class="title">More Featured Posts.</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($gallery_post as $post)
            <!-- Start Single Post  -->
            <div class="col-lg-6 col-xl-6 col-md-12 col-12 mt--30">
                <div class="content-block content-direction-column axil-control is-active post-horizontal thumb-border-rounded">
                    <div class="post-content">
                        <div class="post-cat">
                            <div class="post-cat-list">
                                <a class="hover-flip-item-wrapper" href="{{route('front.posts-by-category', $post->category->category_slug)}}">
                                    <span class="hover-flip-item">
                                        <span data-text="{{$post->category->category_name}}">{{$post->category->category_name}}</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <h4 class="title"><a href="{{route('front.blog-details', [$post->post_slug])}}">{{$post->post_title}}</a></h4>
                        <div class="post-meta">
                            <div class="post-author-avatar border-rounded">
                                <img src="{{asset('storage/media/user/'.$post->user->avatar)}}" alt="Author Images">
                            </div>
                            <div class="content">
                                <h6 class="post-author-name">
                                    <a class="hover-flip-item-wrapper" href="#">
                                        <span class="hover-flip-item">
                                            <span data-text="{{$post->user->name}}">{{$post->user->name}}</span>
                                        </span>
                                    </a>
                                </h6>
                                <ul class="post-meta-list">
                                    <li>{{ Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }}</li>
                                    <!-- <li>300k Views</li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="post-thumbnail post-thumb-feature">
                        <a href="{{route('front.blog-details', [$post->post_slug])}}">
                            <img src="{{asset('storage/media/post/'. $post->post_image)}}" alt="Post Images">
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Single Post  -->
            @empty
            @endforelse
        </div>
    </div>
</div>
@endif
<!-- End Featured Area  -->



<!-- Start Categories List  -->
<div class="axil-categories-list axil-section-gap bg-color-grey">
    <div class="container">
        <div class="row align-items-center mb--30">
            <div class="col-lg-6 col-md-8 col-sm-8 col-12">
                <div class="section-title">
                    <h2 class="title">Trending Topics</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-4 col-12">
                <div class="see-all-topics text-left text-sm-right mt_mobile--20">
                    <a class="axil-link-button" href="#">See All Topics</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Start List Wrapper  -->
                <div class="list-categories d-flex flex-wrap">

                    <!-- Start Single Category  -->
                    <div class="single-cat">
                        <div class="inner">
                            <a href="#">
                                <div class="thumbnail">
                                    <img src="{{asset('front_assets/images/post-images/post-sm-01.jpg')}}" alt="post categories images">
                                </div>
                                <div class="content">
                                    <h5 class="title">Sports &#38; Fitness </h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End Single Category  -->

                    <!-- Start Single Category  -->
                    <div class="single-cat">
                        <div class="inner">
                            <a href="#">
                                <div class="thumbnail">
                                    <img src="{{asset('front_assets/images/post-images/post-sm-02.jpg')}}" alt="post categories images">
                                </div>
                                <div class="content">
                                    <h5 class="title">Travel</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End Single Category  -->

                    <!-- Start Single Category  -->
                    <div class="single-cat">
                        <div class="inner">
                            <a href="#">
                                <div class="thumbnail">
                                    <img src="{{asset('front_assets/images/post-images/post-sm-03.jpg')}}" alt="post categories images">
                                </div>
                                <div class="content">
                                    <h5 class="title">lifestyle</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End Single Category  -->

                    <!-- Start Single Category  -->
                    <div class="single-cat">
                        <div class="inner">
                            <a href="#">
                                <div class="thumbnail">
                                    <img src="{{asset('front_assets/images/post-images/post-sm-04.jpg')}}" alt="post categories images">
                                </div>
                                <div class="content">
                                    <h5 class="title">Health</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End Single Category  -->

                    <!-- Start Single Category  -->
                    <div class="single-cat">
                        <div class="inner">
                            <a href="#">
                                <div class="thumbnail">
                                    <img src="{{asset('front_assets/images/post-images/post-sm-05.jpg')}}" alt="post categories images">
                                </div>
                                <div class="content">
                                    <h5 class="title">Animals</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End Single Category  -->

                    <!-- Start Single Category  -->
                    <div class="single-cat">
                        <div class="inner">
                            <a href="#">
                                <div class="thumbnail">
                                    <img src="{{asset('front_assets/images/post-images/post-sm-06.jpg')}}" alt="post categories images">
                                </div>
                                <div class="content">
                                    <h5 class="title">Food &#38; Drink</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End Single Category  -->

                </div>
                <!-- Start List Wrapper  -->
            </div>
        </div>
    </div>
</div>
<!-- Start Categories List  -->


<!-- Start Post List Wrapper  -->
<div class="axil-post-list-area post-listview-visible-color axil-section-gap bg-color-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-8">
                <div class="axil-banner">
                    <div class="thumbnail">
                        <a href="#">
                            <img class="w-100" src="{{asset('front_assets/images/add-banner/banner-01.png')}}" alt="Banner Images">
                        </a>
                    </div>
                </div>


                @forelse($gallery_post as $post)
                <!-- Start Post List  -->
                <div class="content-block post-list-view axil-control is-active mt--30">
                    <div class="post-thumbnail">
                        <a href="{{route('front.blog-details', [$post->post_slug])}}">
                            <img src="{{asset('storage/media/post/'. $post->post_image)}}" alt="Post Images">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="post-cat">
                            <div class="post-cat-list">
                                <a class="hover-flip-item-wrapper" href="#">
                                    <span class="hover-flip-item">
                                        <span data-text="{{$post->category->category_name}}">{{$post->category->category_name}}</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <h4 class="title"><a href="{{route('front.blog-details', [$post->post_slug])}}">{{$post->post_title}}</a></h4>
                        <div class="post-meta-wrapper">
                            <div class="post-meta">
                                <div class="content">
                                    <h6 class="post-author-name">
                                        <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                <span data-text="{{$post->user->name}}">{{$post->user->name}}</span>
                                            </span>
                                        </a>
                                    </h6>
                                    <ul class="post-meta-list">
                                        <li>{{ Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }}</li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="social-share-transparent justify-content-end">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fas fa-link"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Post List  -->
                @empty
                @endforelse


            </div>
            <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40">
                <!-- Start Sidebar Area  -->
                <div class="sidebar-inner">

                    <!-- Start Single Widget  -->
                    <div class="axil-single-widget widget widget_categories mb--30">
                        <ul>
                            @forelse($categories as $category)
                            <li class="cat-item">
                                <a href="{{route('front.posts-by-category', $category->category_slug)}}" class="inner">
                                    <div class="thumbnail">
                                        <img src="{{asset('storage/media/category/'. $category->category_image)}}" alt="">
                                    </div>
                                    <div class="content">
                                        <h5 class="title">{{$category->category_name}}</h5>
                                    </div>
                                </a>
                            </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                    <!-- End Single Widget  -->

                    <!-- Start Single Widget  -->
                    <div class="axil-single-widget widget widget_postlist mb--30">
                        <h5 class="widget-title">Popular on Blogar</h5>
                        <!-- Start Post List  -->
                        <div class="post-medium-block">
                            @forelse($posts as $post)
                            <!-- Start Single Post  -->
                            <div class="content-block post-medium mb--20">
                                <div class="post-thumbnail">
                                    <a href="{{route('front.blog-details', [$post->post_slug])}}">
                                        <img src="{{asset('storage/media/post/'. $post->post_image)}}" alt="Post Images">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h6 class="title"><a href="{{route('front.blog-details', [$post->post_slug])}}">{{Str::limit($post->post_title, 25)}}</a></h6>
                                    <div class="post-meta">
                                        <ul class="post-meta-list">
                                            <li>{{ Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }}</li>
                                            <!-- <li>300k Views</li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Post  -->
                            @empty
                            @endforelse
                        </div>
                        <!-- End Post List  -->

                    </div>
                    <!-- End Single Widget  -->

                    <!-- Start Single Widget  -->
                    <div class="axil-single-widget widget widget_instagram mb--30">
                        <h5 class="widget-title">Instagram</h5>
                        <!-- Start Post List  -->
                        <ul class="instagram-post-list-wrapper">
                            <li class="instagram-post-list">
                                <a href="#">
                                    <img src="{{asset('front_assets/images/small-images/instagram-01.jpg')}}" alt="Instagram Images">
                                </a>
                            </li>
                            <li class="instagram-post-list">
                                <a href="#">
                                    <img src="{{asset('front_assets/images/small-images/instagram-02.jpg')}}" alt="Instagram Images">
                                </a>
                            </li>
                            <li class="instagram-post-list">
                                <a href="#">
                                    <img src="{{asset('front_assets/images/small-images/instagram-03.jpg')}}" alt="Instagram Images">
                                </a>
                            </li>
                            <li class="instagram-post-list">
                                <a href="#">
                                    <img src="{{asset('front_assets/images/small-images/instagram-04.jpg')}}" alt="Instagram Images">
                                </a>
                            </li>
                            <li class="instagram-post-list">
                                <a href="#">
                                    <img src="{{asset('front_assets/images/small-images/instagram-05.jpg')}}" alt="Instagram Images">
                                </a>
                            </li>
                            <li class="instagram-post-list">
                                <a href="#">
                                    <img src="{{asset('front_assets/images/small-images/instagram-06.jpg')}}" alt="Instagram Images">
                                </a>
                            </li>
                        </ul>
                        <!-- End Post List  -->
                    </div>
                    <!-- End Single Widget  -->
                </div>
                <!-- End Sidebar Area  -->

            </div>
        </div>
    </div>
</div>
<!-- End Post List Wrapper  -->



@endsection
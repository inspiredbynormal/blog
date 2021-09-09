@extends('frontend.layouts.master')

@section('content')
<!-- Start Post List Wrapper  -->
<div class="axil-post-list-area axil-section-gap bg-color-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-8">
                @forelse($posts as $post)
                <!-- Start Post List  -->
                <div class="content-block post-list-view mt--30">
                    <div class="post-thumbnail">
                        <a href="{{route('front.blog-details', [$post->post_slug])}}">
                            <img src="{{asset('storage/media/post/'. $post->post_image)}}" alt="Post Images">
                        </a>
                    </div>
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
                        <h4 class="title"><a href="{{route('front.blog-details', [$post->post_slug])}}">{{Str::limit($post->post_title, 50)}}</a></h4>
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
                                        <!-- <li>3 min read</li> -->
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
                <div class="content-block post-list-view mt--30">
                    <h2>No Posts Found</h2>
                </div>
                @endforelse

                <div class="d-flex justify-content-center mb-3  mt-5">
                    {{$posts->links()}}
                </div>
            </div>
            <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40">
                <!-- Start Sidebar Area  -->
                <div class="sidebar-inner">


                    <!-- Start Single Widget  -->
                    <div class="axil-single-widget widget widget_postlist mb--30">
                        <h5 class="widget-title">Popular on Blog</h5>
                        <!-- Start Post List  -->
                        <div class="post-medium-block">
                            @forelse($gallery_post as $post)
                            <!-- Start Single Post  -->
                            <div class="content-block post-medium mb--20">
                                <div class="post-thumbnail">
                                    <a href="{{route('front.blog-details', [$post->post_slug])}}">
                                        <img src="{{asset('storage/media/post/'. $post->post_image)}}" alt="Post Images">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h6 class="title"><a href="{{route('front.blog-details', [$post->post_slug])}}">{{$post->post_title}}</a></h6>
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
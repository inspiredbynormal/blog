@extends('frontend.layouts.master')

@section('breadcrumb')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_box text-center">
                    <!-- <h2 class="breadcrumb-title">@@title</h2> -->
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">{{$category->category_name}}</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
@endsection

@section('content')
<!-- Blog Details Wrapper Start -->
<div class="blog-details-wrapper section-space--ptb_80">
    <div class="container">
        <div class="row row--17">
            @forelse($posts as $post)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <!-- Single Following Post Start -->
                <div class="single-following-post" data-aos="fade-up">
                    <a href="{{route('front.blog-details', [$post->post_slug])}}" class="following-post-thum">
                        <img src="{{asset('storage/media/post/'. $post->post_image)}}" alt="">
                    </a>
                    <div class="following-post-content">
                        <div class="following-blog-post-top">
                            <div class="trending-blog-post-category">
                                <a href="{{route('front.posts-by-category', $post->category->category_slug)}}" class="business">{{$post->category->category_name}}</a>
                            </div>
                            <div class="following-blog-post-author">
                                By <a href="#">{{$post->user->name}}</a>
                            </div>
                        </div>
                        <h5 class="following-blog-post-title">
                            <a href="{{route('front.blog-details', [$post->post_slug])}}">{{Str::limit($post->post_title, 65)}}
                            </a>
                        </h5>
                        <div class="following-blog-post-meta">
                            <div class="post-meta-left-side">
                                <span class="post-date">
                                    <i class="icofont-ui-calendar"></i>
                                    <a href="#">{{ Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }}</a>
                                </span>
                                <!-- <span>10 min read</span> -->
                            </div>
                            <div class="post-meta-right-side">
                                <a href="#"><img src="assets/images/icons/small-bookmark.png" alt="" /></a>
                                <a href="#"><img src="assets/images/icons/heart.png" alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div><!-- Single Following Post End -->
            </div>
            @empty
            <div class="col-12">
                <h2>No Posts Found</h2>
            </div>
            @endforelse
        </div>
    </div>
</div> <!-- Blog Details Wrapper End -->


@endsection
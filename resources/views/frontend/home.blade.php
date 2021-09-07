@extends('frontend.layouts.master')

@section('content')
<!--====== Banner Area Start ======-->
<section class="banner-section">
    <div class="banner-slider">
        @forelse($gallery_post as $post)
        <div class="sinlge-banner">
            <div class="banner-wrapper">
                <div class="banner-bg" style="background-image: url({{asset('storage/media/post/'. $post->post_image)}});"></div>
                <div class="banner-content" data-animation="fadeInUp" data-delay="0.3s">
                    <h3 class="title" data-animation="fadeInUp" data-delay="0.6s">
                        <a href="{{route('front.blog-details', [$post->post_slug])}}">
                            {{$post->post_title}}
                        </a>
                    </h3>
                    <ul class="meta" data-animation="fadeInUp" data-delay="0.8s">
                        <li><a href="#">By - {{$post->user->name}}</a></li>
                        <li><a href="{{route('front.posts-by-category', $post->category->category_slug)}}">{{$post->category->category_name}}</a></li>
                    </ul>
                    <p data-animation="fadeInUp" data-delay="1s">
                        {{$post->post_short_desc}}...
                    </p>
                    <a href="{{route('front.blog-details', [$post->post_slug])}}" class="read-more" data-animation="fadeInUp" data-delay="1.2s">
                        Read More <i class="fas fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @empty
        @endforelse
    </div>
    <div class="banner-nav"></div>
</section>
<!--====== Banner Area End ======-->




<!--====== Post Area Start ======-->
<section class="post-area no-sidebar">
    <div class="container-fluid">
        <div class="post-area-inner">
            <!-- Entry Post -->
            <div class="entry-posts two-column masonary-posts row">
                @forelse($posts as $post)
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="entry-post">
                        <div class="entry-thumbnail">
                            <img src="{{asset('storage/media/post/'. $post->post_image)}}" alt="Image">
                        </div>
                        <div class="entry-content">
                            <h4 class="title">
                                <a href="{{route('front.blog-details', [$post->post_slug])}}">
                                    {{Str::limit($post->post_title, 25)}}
                                </a>
                            </h4>
                            <ul class="post-meta">
                                <li class="date">
                                    <p>{{ Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }}</p>
                                </li>
                                <li class="categories">
                                    <a href="{{route('front.posts-by-category', $post->category->category_slug)}}">{{$post->category->category_name}}</a>
                                </li>
                            </ul>
                            <p>
                                {{Str::limit($post->post_short_desc, 100)}}
                            </p>
                            <a href="{{route('front.blog-details', [$post->post_slug])}}" class="read-more">
                                Read More <i class="fas fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>

            <div class="">
                <div class="text-center">
                    <a href="{{route('front.posts-all')}}" class="load-more-btn">All Posts</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Post Area End ======-->

@endsection
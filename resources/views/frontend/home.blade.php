@extends('frontend.layouts.master')

@section('content')

<!--hero-->
<section class="hero hero-2 hero-carousel d-flex align-items-center">
    <div class="container ">
        <div class="owl-carousel">
            @forelse($gallery_post as $post)
            <div class="row d-flex align-items-center">
                <div class="col-lg-5">
                    <div class="image">
                        <a href="{{route('front.blog-details', [$post->post_slug])}}">
                            <img src="{{asset('storage/media/post/'. $post->post_image)}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="post">
                        <a href="{{route('front.posts-by-category', $post->category->category_slug)}}" class="categorie">
                            <i class="icon_circle-slelected"></i>{{$post->category->category_name}}
                        </a>
                        <h3>
                            <a href="{{route('front.blog-details', [$post->post_slug])}}">{{Str::limit($post->post_title, 100)}}</a>
                        </h3>
                        <p>{{Str::limit($post->post_short_desc, 100)}}</p>
                        <div class="info">
                            <ul class="list-inline">
                                <li>
                                    <a href="#">
                                        <img src="{{ ($post->user->avatar == NULL) ? asset('front_assets/img/user/no-user-image.jpg') : asset('storage/media/user/'. $post->user->avatar)}}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">{{$post->user->name}}</a>
                                </li>
                                <li class="dot"></li>
                                <li>{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</li>
                                <!-- <li class="dot"></li> -->
                                <!-- <li>5 min Read</li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="row d-flex align-items-center">
                <div class="col-12">
                    No Posts found
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!--categories-->
<div class="categorie-section pt-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="cat-list">
                    @forelse($categories as $category)
                    <li>
                        <a class="item" href="{{route('front.posts-by-category', $category->category_slug)}}">
                            <div class="image">
                                <img src="{{asset('storage/media/category/'. $category->category_image)}}" alt="">
                            </div>
                            <p>{{$category->category_name}}</p>
                        </a>
                    </li>
                    @empty
                    @endforelse

                </ul>
            </div>
        </div>
    </div>
</div>

<!--Posts-->
<section class="section mt-50 mb-70">
    <div class="container">
        <div class="row">
            @forelse($posts as $post)
            <div class="col-lg-6">
                <div class="post-box">
                    <div class="image">
                        <a href="{{route('front.blog-details', [$post->post_slug])}}">
                            <img src="{{asset('storage/media/post/'. $post->post_image)}}" alt="">
                        </a>
                    </div>
                    <div class="content">
                        <a href="{{route('front.posts-by-category', $post->category->category_slug)}}" class="categorie">
                            <i class="icon_circle-slelected"></i>{{$post->category->category_name}}
                        </a>
                        <h5>
                            <a href="{{route('front.blog-details', [$post->post_slug])}}">{{Str::limit($post->post_title, 50)}}</a>
                        </h5>

                        <div class="meta">
                            <ul class="list-inline">

                                <li>
                                    <a href="#">{{$post->user->name}}</a>
                                </li>
                                <li class="dot"></li>
                                <li>{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</section>


@endsection
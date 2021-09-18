@extends('frontend.layouts.master')


@section('content')

<section class="categorie-section mt-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="categorie-title">
                    <small>
                        <a href="{{url('/')}}">Home</a>
                        <span class="arrow_carrot-right"></span> Posts
                    </small>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="mb-70">
    <div class="container">
        <div class="row">
            @forelse($posts as $post)
            <div class="col-lg-6 ">
                <div class="post-list">
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
            <div class="col-12">
                <h6>No posts found in this category</h6>
            </div>
            @endforelse
        </div>
        <div class="row mt-20">
            <div class="col-lg-12">
                <div class="load-posts text-center">
                    {{$posts->links()}}
                    <!-- <a href="#" class="btn-custom"> More posts</a> -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
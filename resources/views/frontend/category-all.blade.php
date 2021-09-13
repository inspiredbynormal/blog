@extends('frontend.layouts.master')

@section('content')
<!-- Blog Details Wrapper Start -->
<div class="blog-details-wrapper section-space--ptb_80">
    <div class="container">
        <div class="row row--17">
            @forelse($categories as $category)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <!-- Single Following Post Start -->
                <div class="single-following-post" data-aos="fade-up">
                    <a href="{{route('front.posts-by-category', $category->category_slug)}}" class="following-post-thum">
                        <img src="{{asset('storage/media/category/'. $category->category_image)}}" alt="">
                    </a>
                    <div class="following-post-content">
                        <h5 class="following-blog-post-title">
                            <a href="{{route('front.posts-by-category', $category->category_slug)}}">{{$category->category_name}}
                            </a>
                        </h5>
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
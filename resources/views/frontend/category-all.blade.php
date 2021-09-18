@extends('frontend.layouts.master')

@section('content')

<!-- Categorie-->
<section class="categorie-section  mt-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 text-center m-auto">
                <div class="categorie-title">

                    <small>
                        <a href="{{url('/')}}">Home</a>
                        <span class="arrow_carrot-right"></span> Categories
                    </small>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Posts-->
<section class="mb-70">
    <div class="container">
        <div class="row">
            @forelse($categories as $category)
            <div class="col-lg-3 col-md-4">
                <!--Post-1-->
                <div class="post-round">
                    <div class="image">
                        <a href="{{route('front.posts-by-category', $category->category_slug)}}">
                            <img src="{{asset('storage/media/category/'. $category->category_image)}}" alt="">
                        </a>
                    </div>
                    <div class="content">
                        <a href="{{route('front.posts-by-category', $category->category_slug)}}l" class="categorie">
                            <i class="icon_circle-slelected"></i>{{$category->category_name}}
                        </a>


                    </div>
                </div>
                <!--/-->
            </div>
            @empty
            <div class="col-12">
                <h6>No category Found</h6>
            </div>
            @endforelse

        </div>

    </div>
</section>

@endsection
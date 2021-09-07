@extends('frontend.layouts.master')

@section('content')

<!--====== Shop Wrapper Start ======-->
<section class="shop-wrapper section-gap-80-120">
    <div class="container-fluid">

        <div class="product-area">
            <div class="product-loop row justify-content-center">
                @forelse($categories as $category)
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-product">
                        <div class="product-thumb">
                            <img class="category-image" src="{{asset('storage/media/category/'. $category->category_image)}}" alt="ProductImage">
                            <div class="more-btn">
                                <a href="{{route('front.posts-by-category', $category->category_slug)}}" class="more-link">See Posts</a>
                            </div>
                        </div>
                        <h5 class="title"><a href="{{route('front.posts-by-category', $category->category_slug)}}">{{$category->category_name}}</a></h5>

                    </div>
                </div>
                @empty
                @endforelse


            </div>

        </div>
    </div>
</section>
<!--====== Shop Wrapper End ======-->

@endsection

@section('front_script')

@endsection
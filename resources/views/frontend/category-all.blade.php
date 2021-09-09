@extends('frontend.layouts.master')

@section('content')
<!-- Start Categories List  -->
<div class="axil-categories-list axil-section-gap bg-color-grey">
    <div class="container">
        <div class="row align-items-center mb--30">
            <div class="col-lg-6 col-md-8 col-sm-8 col-12">
                <div class="section-title">
                    <h2 class="title">All Category</h2>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Start List Wrapper  -->
                <div class="list-categories d-flex flex-wrap">
                    @forelse($categories as $category)
                    <!-- Start Single Category  -->
                    <div class="single-cat">
                        <div class="inner">
                            <a href="{{route('front.posts-by-category', $category->category_slug)}}">
                                <div class="thumbnail">
                                    <img src="{{asset('storage/media/category/'. $category->category_image)}}" alt="post categories images">
                                </div>
                                <div class="content">
                                    <h5 class="title">{{$category->category_name}} </h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End Single Category  -->
                    @empty
                    <div class="text-center">
                        <h2>Sorry no category found</h2>
                    </div>
                    @endforelse


                </div>
                <!-- Start List Wrapper  -->
            </div>
        </div>
    </div>
</div>
<!-- Start Categories List  -->

@endsection
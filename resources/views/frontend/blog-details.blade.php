@extends('frontend.layouts.master')

@section('content')

<!-- Blog Details Wrapper Start -->
<div class="blog-details-wrapper section-space--ptb_80">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12">
                <!-- blog details Post Start -->
                <div class="blog-details-post-wrap">
                    <div class="blog-details-thum">
                        <img class="w-100" src="{{asset('storage/media/post/'. $post->post_image)}}" alt="">
                    </div>
                    <div class="blog-details-post-content">
                        <div class="blog-details-meta-box">
                            <div class="post-meta-left-side mb-2">
                                <div class="trending-blog-post-category">
                                    <a href="{{route('front.posts-by-category', $post->category->category_slug)}}">{{$post->category->category_name}}</a>
                                </div>
                                <div class="following-blog-post-author">
                                    By <a href="#">{{$post->user->name}}</a>
                                </div>
                            </div>

                            <div class="post-mid-side mb-2">
                                <span class="post-meta-left-side">
                                    <span class="post-date">
                                        <i class="icofont-ui-calendar"></i>
                                        <a href="#">{{ Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }}</a>
                                    </span>
                                </span>
                                <!-- <span>10 min read</span> -->
                            </div>

                            <div class="post-meta-right-side mb-2">
                                <a href="#"><img src="assets/images/icons/small-bookmark.png" alt="" /></a>
                                <a href="#"><img src="assets/images/icons/heart.png" alt="" /></a>
                            </div>
                        </div>
                        <h3 class="following-blog-post-title">
                            <a href="#">{{$post->post_title}}
                            </a>
                        </h3>

                        <div class="post-details-text">


                            <blockquote class="blockquote-box">
                                <p class="blockquote-text">{{$post->post_short_desc}}</p>
                            </blockquote>

                            <p>
                                {!! nl2br($post->post_desc) !!}
                            </p>



                            <div class="blog-details-tag-and-share-area">
                                <div class="post-tag">
                                    <a href="#" class="btn-medium fashion">Fashion</a>
                                    <a href="#" class="btn-medium health">Health</a>
                                    <a href="#" class="btn-medium travel">Travel</a>
                                </div>
                                <ul class="social-share-area">
                                    <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                    <li><a href="#"><i class="icofont-skype"></i></a></li>
                                    <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                    <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                                </ul>
                            </div>

                        </div>

                        <!-- Related Post Area Start -->
                        <div class="related-post-area section-space--pt_60">
                            <div class="row">
                                <div class="col-lg-8 col-7">
                                    <div class="section-title mb-30">
                                        <h3 class="title">Related Post</h3>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-5">
                                    <div class="related-post-slider-navigation text-end">
                                        <div class="related-post-button-prev navigation-button"><i class="icofont-long-arrow-left"></i></div>
                                        <div class="related-post-button-next navigation-button"><i class="icofont-long-arrow-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Swiper -->
                            <div class="swiper-container related-post-slider-active">
                                <div class="swiper-wrapper">
                                    @forelse($related_posts as $post)
                                    <div class="swiper-slide">
                                        <!-- Single Following Post Start -->
                                        <div class="single-related-post">
                                            <div class="related-post-thum">
                                                <img src="{{asset('storage/media/post/'. $post->post_image)}}" alt="">
                                            </div>
                                            <div class="following-post-content">
                                                <div class="following-blog-post-top">
                                                    <div class="trending-blog-post-category">
                                                        <a href="{{route('front.posts-by-category', $post->category->category_slug)}}">{{$post->category->category_name}}</a>
                                                    </div>
                                                    <div class="following-blog-post-author">
                                                        By <a href="#">{{$post->user->name}}</a>
                                                    </div>
                                                </div>
                                                <h5 class="following-blog-post-title">
                                                    <a href="{{route('front.blog-details', [$post->post_slug])}}">{{$post->post_title}}</a>
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
                                                        <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                                                        <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- Single Following Post End -->
                                    </div>
                                    @empty
                                    <h6 class="text-left">No related post found</h6>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <!-- Related Post Area End -->

                        <!-- Comment Area Start -->
                        <div class="comment-area section-space--pt_60">
                            <div class="section-title">
                                <h3 class="title">Leave a comment</h3>
                            </div>
                            <div id="comment_response"></div>
                            @if(session('LOGIN') == true)
                            <form action="#" class="comment-form-area" id="commentFrmSubmit">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                @csrf
                                <div class="row">
                                    @if(session('LOGIN') == true && session('ROLE') == 'admin')
                                    @php
                                    $user = userDetails(session('ADMIN_ID'));
                                    @endphp
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input name="name" type="text" placeholder="Enter your name" value="{{$user->name}}" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input name="email" type="email" placeholder="Your Email" value="{{$user->email}}" required disabled>
                                        </div>
                                    </div>
                                    @elseif(session('LOGIN') == true && session('ROLE') == 'editor')
                                    @php
                                    $user = userDetails(session('EDITOR_ID'))
                                    @endphp

                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="text" name="name" placeholder="Enter your name" value="{{$user->name}}" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="email" name="email" placeholder="Your Email" value="{{$user->email}}" required disabled>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <textarea name="comment_msg" placeholder="Massage"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="submit-button text-center">
                                            <button class="btn-large btn-primary" type="submit"> Submit Now <i class="icofont-long-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @else
                            <p><a class="mt-3 p-3 btn-primary" href="{{route('user-login')}}">Please login to write your comment</a></p>
                            @endif

                        </div>
                        <!-- Comment Area End -->


                    </div>
                </div>
                <!-- blog details Post End -->
            </div>
            <div class="col-lg-3 col-12">
                <div class="following-author-area">
                    <div class="author-image">
                        <img src="{{asset('storage/media/user/'. $post->user->avatar)}}" alt="">
                    </div>
                    <div class="author-title">
                        <h4><a href="#">{{$post->user->name}}</a></h4>
                    </div>
                    <div class="author-details">
                        <p>Lorem psum has been industry
                            standard dumy text since the when
                            and scrambled make specimen
                            book has survived.</p>

                        <div class="author-post-share">
                            <ul class="social-share-area">
                                <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                <li><a href="#"><i class="icofont-skype"></i></a></li>
                                <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- Hero Category Area Start -->
                <div class="blog-details-category-area mt-5">
                    @forelse($categories as $category)
                    <a href="{{route('front.posts-by-category', $category->category_slug)}}" class="single-hero-category-item">
                        <img src="{{asset('storage/media/category/'. $category->category_image)}}" alt="">
                        <div class="hero-category-inner-box">
                            <h3 class="title">{{$category->category_name}}</h3>
                            <i class="icon icofont-long-arrow-right"></i>
                        </div>
                    </a>
                    @empty
                    @endforelse
                </div><!-- Hero Category Area End -->

                <!-- Stay In Touch Area Start -->
                <div class="stay-in-touch-area mt-5">
                    <div class="section-title">
                        <h3>Stay In Touch</h3>
                    </div>
                    <div class="stay-in-touch-box">
                        <div class="single-touch-col">
                            <a href="#!" class="single-touch facebook">
                                <div class="touch-socail-icon">
                                    <i class="icofont-facebook"></i>
                                </div>
                                <p class="touch-title">5,685K</p>
                            </a>
                        </div>
                        <div class="single-touch-col">
                            <a href="#!" class="single-touch twitter">
                                <div class="touch-socail-icon">
                                    <i class="icofont-twitter"></i>
                                </div>
                                <p class="touch-title">6,97K+</p>
                            </a>
                        </div>
                        <div class="single-touch-col">
                            <a href="#!" class="single-touch behance">
                                <div class="touch-socail-icon">
                                    <i class="icofont-behance"></i>
                                </div>
                                <p class="touch-title">6,97K+</p>
                            </a>
                        </div>
                        <div class="single-touch-col">
                            <a href="#!" class="single-touch youtube">
                                <div class="touch-socail-icon">
                                    <i class="icofont-youtube-play"></i>
                                </div>
                                <p class="touch-title">5,685K</p>
                            </a>
                        </div>
                        <div class="single-touch-col">
                            <a href="#!" class="single-touch dribbble">
                                <div class="touch-socail-icon">
                                    <i class="icofont-dribbble"></i>
                                </div>
                                <p class="touch-title">6,97K+</p>
                            </a>
                        </div>
                        <div class="single-touch-col">
                            <a href="#!" class="single-touch linkedin">
                                <div class="touch-socail-icon">
                                    <i class="icofont-linkedin"></i>
                                </div>
                                <p class="touch-title">6,97K+</p>
                            </a>
                        </div>
                    </div>
                </div> <!-- Stay In Touch Area End -->

            </div>
        </div>

    </div>
</div> <!-- Blog Details Wrapper End -->





@endsection


@section('front_script')
<script>
    $(document).ready(function() {
        $("#commentFrmSubmit").on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "{{route('user.comment.submit')}}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $("#commentFrmSubmit").trigger("reset");

                    if (response.status === 'error') {
                        $("#comment_response").html(`<div class="alert alert-danger">${response.message}</div>`);
                    } else {
                        $("#comment_response").html(`<div class="alert alert-success">${response.message}</div>`);
                    }

                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            });
        })
    });
</script>
@endsection
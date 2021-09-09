@extends('frontend.layouts.master')

@section('content')

<!-- Start Banner Area -->
<div class="banner banner-single-post post-formate post-standard alignwide">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Start Single Slide  -->
                <div class="content-block">
                    <!-- Start Post Thumbnail  -->
                    <div class="post-thumbnail">
                        <img src="{{asset('storage/media/post/'. $post->post_image)}}" alt="Post Images">
                    </div>
                    <!-- End Post Thumbnail  -->
                    <!-- Start Post Content  -->
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
                        <h1 class="title">{{$post->post_title}}</h1>
                        <!-- Post Meta  -->
                        <div class="post-meta-wrapper">
                            <div class="post-meta">
                                <div class="post-author-avatar border-rounded">
                                    <img src="{{asset('storage/media/user/'.$post->user->avatar)}}" alt="Author Images">
                                </div>
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
                                        <!-- <li>300k Views</li> -->
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
                    <!-- End Post Content  -->
                </div>
                <!-- End Single Slide  -->
            </div>
        </div>
    </div>
</div>
<!-- End Banner Area -->

<!-- Start Post Single Wrapper  -->
<div class="post-single-wrapper axil-section-gap bg-color-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="axil-post-details">
                    <p class="has-medium-font-size">{{$post->post_short_desc}}</p>

                    <p>{!! nl2br($post->post_desc) !!}</p>

                    <div class="tagcloud">
                        <a href="#">Design</a>
                        <a href="#">Life Style</a>
                        <a href="#">Web Design</a>
                        <a href="#">Development</a>
                        <a href="#">Design</a>
                        <a href="#">Life Style</a>
                    </div>


                    <!-- Start Author  -->
                    <div class="about-author">
                        <div class="media">
                            <div class="thumbnail">
                                <a href="#">
                                    <img src="{{($post->user->avatar != NULL)? asset('storage/media/user/'. $post->user->avatar) : asset('front_assets/img/no_image_available.png')}}" alt="Author Images">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="author-info">
                                    <h5 class="title">
                                        <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                <span data-text="{{$post->user->name}}">{{$post->user->name}}</span>
                                            </span>
                                        </a>
                                    </h5>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Author  -->

                    <!-- Start Comment Form Area  -->
                    <div class="axil-comment-area">
                        <!-- Start Comment Area  -->
                        <div class="axil-comment-area">
                            <h4 class="title">{{count($post->comments)}} Comments</h4>
                            <ul class="comment-list">
                                @forelse($post->comments as $comment)
                                <!-- Start Single Comment  -->
                                <li class="comment">
                                    <div class="comment-body">
                                        <div class="single-comment">
                                            <div class="comment-img">
                                                <img src="{{($comment->user->avatar != NULL)? asset('storage/media/user/'. $comment->user->avatar) : asset('front_assets/img/no_image_available.png')}}" alt="Author Images">
                                            </div>
                                            <div class="comment-inner">
                                                <h6 class="commenter">
                                                    <a class="hover-flip-item-wrapper" href="#">
                                                        <span class="hover-flip-item">
                                                            <span data-text="{{$comment->user->name}}">{{$comment->user->name}}</span>
                                                        </span>
                                                    </a>
                                                </h6>
                                                <div class="comment-meta">
                                                    <div class="time-spent">{{ Carbon\Carbon::parse($comment->created_at)->toDayDateTimeString() }}</div>

                                                </div>
                                                <div class="comment-text">
                                                    <p class="b2">{{$comment->comment_msg}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                                <!-- End Single Comment  -->
                                @empty

                                @endforelse
                            </ul>
                        </div>
                        <!-- End Comment Area  -->

                        <!-- Start Comment Respond  -->
                        <div class="comment-respond">
                            <h4 class="title">Post a comment</h4>

                            @if(session('LOGIN') == true)
                            <form action="#">
                                <p class="comment-notes"><span id="email-notes">Your email address will not be
                                        published.</span> Required fields are marked <span class="required">*</span></p>
                                <div class="row row--10">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <label>Your Name</label>
                                            <input id="name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <label>Your Email</label>
                                            <input id="email" type="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <label>Your Website</label>
                                            <input id="website" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Leave a Reply</label>
                                            <textarea name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="comment-form-cookies-consent">
                                            <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
                                            <label for="wp-comment-cookies-consent">Save my name, email, and
                                                website in this browser for the next time I comment.</label>
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-submit cerchio">
                                            <input name="submit" type="submit" id="submit" class="axil-button button-rounded" value="Post Comment">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @else
                            <div class="add-comment-button cerchio">
                                <a class="axil-button button-rounded" href="{{route('user-login')}}" tabindex="0"><span>Please login to write your comment</span></a>
                            </div>
                            @endif
                        </div>
                        <!-- End Comment Respond  -->



                    </div>
                    <!-- End Comment Form Area  -->


                </div>
            </div>
            <div class="col-lg-4">
                <!-- Start Sidebar Area  -->
                <div class="sidebar-inner">
                    <!-- Start Single Widget  -->
                    <div class="axil-single-widget widget widget_categories mb--30">
                        <ul>
                            @forelse($categories as $category)
                            <li class="cat-item">
                                <a href="{{route('front.posts-by-category', $category->category_slug)}}" class="inner">
                                    <div class="thumbnail">
                                        <img src="{{asset('storage/media/category/'. $category->category_image)}}" alt="">
                                    </div>
                                    <div class="content">
                                        <h5 class="title">{{$category->category_name}}</h5>
                                    </div>
                                </a>
                            </li>
                            @empty
                            @endforelse

                        </ul>
                    </div>
                    <!-- End Single Widget  -->


                    <!-- Start Single Widget  -->
                    <div class="axil-single-widget widget widget_postlist mb--30">
                        <h5 class="widget-title">Related Posts</h5>
                        <!-- Start Post List  -->
                        <div class="post-medium-block">
                            @forelse($related_posts as $post)
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
                            <h6 class="text-left">No related post found</h6>
                            @endforelse
                        </div>
                        <!-- End Post List  -->

                    </div>
                    <!-- End Single Widget  -->

                    <!-- Start Single Widget  -->
                    <div class="axil-single-widget widget widget_newsletter mb--30">
                        <!-- Start Post List  -->
                        <div class="newsletter-inner text-center">
                            <h4 class="title mb--15">Never Miss A Post!</h4>
                            <p class="b2 mb--30">Sign up for free and be the first to <br /> get notified about updates.</p>
                            <form action="#">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Your Email ">
                                </div>
                                <div class="form-submit">
                                    <button class="cerchio axil-button button-rounded"><span>Subscribe</span></button>
                                </div>
                            </form>
                        </div>
                        <!-- End Post List  -->
                    </div>
                    <!-- End Single Widget  -->


                    <!-- Start Single Widget  -->
                    <div class="axil-single-widget widget widget_tag_cloud mb--30">
                        <h5 class="widget-title">Archives</h5>
                        <!-- Start Post List  -->
                        <div class="tagcloud">
                            <a href="#">Design</a>
                            <a href="#">Development</a>
                            <a href="#">Graphic</a>
                            <a href="#">UI/UX Design</a>
                            <a href="#">HTML</a>
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
<!-- End Post Single Wrapper  -->



@endsection
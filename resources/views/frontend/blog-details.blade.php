@extends('frontend.layouts.master')

@section('content')
<!--post-single-top-->
<section class="post-single-top d-flex align-items-center">
    <div class="container ">
        <div class="row ">
            <div class="col-lg-12">
                <div class="post-single-header">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-7 b-order-2">
                            <div class="desc">
                                <a href="{{route('front.posts-by-category', $post->category->category_slug)}}" class="categorie">
                                    <i class="icon_circle-slelected"></i>{{$post->category->category_name}}
                                </a>
                                <h4>{{$post->post_title}}</h4>
                                <p>{{$post->post_short_desc}}
                                </p>
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

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 b-order-1">
                            <div class="image">
                                <img src="{{asset('storage/media/post/'. $post->post_image)}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--post-single-->
<section class="post-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 m-auto">
                <div class="post-single-body">
                    <div class="content">
                        {!! nl2br($post->post_desc) !!}
                    </div>
                </div>



                <!--author-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="author  box bg-light mt-5">
                            <div class="image">
                                <a href="#" class="image">
                                    <img src="{{ ($post->user->avatar == NULL) ? asset('front_assets/img/user/no-user-image.jpg') : asset('storage/media/user/'. $post->user->avatar)}}" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <h5>
                                    <span>Hi, I'm {{$post->user->name}}</span>
                                </h5>

                                <div class="social-icones">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-behance"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-dribbble"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Related posts-->
                <div class="row mb-50">
                    <div class="col-12">
                        <h5 class="mb-30">Related Posts</h5>
                    </div>
                    @forelse($related_posts as $rpost)
                    <div class="col-lg-6">
                        <div class="related-posts box bg-light ">
                            <div class="small-post ">
                                <div class="image">
                                    <a href="{{route('front.blog-details', [$rpost->post_slug])}}">
                                        <img src="{{asset('storage/media/post/'. $rpost->post_image)}}" alt="...">

                                    </a>

                                </div>

                                <div class="content">
                                    <p>
                                        <a href="{{route('front.blog-details', [$rpost->post_slug])}}">{{$rpost->post_title}}</a>
                                    </p>
                                    <small><span class="dot"></span> {{ Carbon\Carbon::parse($rpost->created_at)->diffForHumans() }}</small>
                                </div>

                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <h6 class="text-left">No related post found</h6>
                    </div>
                    @endforelse
                </div>

                <!--Comments-->
                <div class="mb-100">
                    <h5 class="mb-30">{{count($comments)}} Comments</h5>
                    <ul class="comments">
                        @forelse($comments as $comment)
                        <li class="comment-item">
                            <img src="{{ ($comment->user->avatar == NULL) ? asset('front_assets/img/user/no-user-image.jpg') : asset('storage/media/user/'. $comment->user->avatar)}}" alt="">
                            <div class="content">
                                <ul class="info list-inline">
                                    <li>{{$comment->user->name}}</li>
                                    <li> - </li>
                                    <li>{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</li>
                                </ul>
                                <p>{!! nl2br($comment->comment_msg) !!}</p>
                            </div>
                        </li>
                        @empty
                        @endforelse
                    </ul>
                    <!--Leave-comments-->
                    <h5 class="mb-30">Leave a Reply</h5>
                    <div id="comment_response"></div>
                    @if(session('LOGIN') == true)
                    <form class="form" method="POST" id="commentFrmSubmit">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <p>Your email adress will not be published ,Requied fileds are marked*.</p>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="comment_msg" id="comment_msg" cols="30" rows="5" class="form-control" placeholder="Message*" required="required"></textarea>
                                </div>
                            </div>
                            @if(session('ROLE') == 'admin')
                            @php
                            $user = userDetails(session('ADMIN_ID'));
                            @endphp

                            @elseif(session('ROLE') == 'editor')
                            @php
                            $user = userDetails(session('EDITOR_ID'));
                            @endphp
                            @endif
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name*" required="required" value="{{$user->name}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email*" required="required" value="{{$user->email}}" disabled>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" name="submit" class="btn-custom">
                                    Send Comment
                                </button>
                            </div>
                        </div>
                    </form>
                    @else
                    <p><a class="mt-3 p-3 btn-custom" href="{{route('user-login')}}">Please login to write your comment</a></p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</section>
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
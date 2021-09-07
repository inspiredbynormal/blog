@extends('frontend.layouts.master')

@section('content')
<!--====== Post Details Start ======-->
<section class="post-details-area">
    <div class="container container-1000">
        <div class="post-details">
            <div class="entry-header">
                <h2 class="title">{{$post->post_title}}</h2>
                <ul class="post-meta">
                    <li>{{ Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }}</li>
                    <li><a href="{{route('front.posts-by-category', $post->category->category_slug)}}">{{$post->category->category_name}}</a></li>
                </ul>
                <p class="short-desc">
                    {{$post->post_short_desc}}
                </p>
            </div>
            <div class="entry-media text-center">
                <img src="{{asset('storage/media/post/'. $post->post_image)}}" alt="image">
            </div>
            <div class="entry-content">
                <p class="has-dropcap">
                    {!! nl2br($post->post_desc) !!}
                </p>
            </div>
            <div class="entry-footer">
                <div class="post-author">
                    <div class="author-img">
                        <img src="{{($post->user->avatar != NULL)? asset('storage/media/user/'. $post->user->avatar) : asset('front_assets/img/no_image_available.png')}}" alt="PostAuthor">
                    </div>
                    <h5><a href="#">{{$post->user->name}}</a></h5>
                </div>
            </div>

            <div class="related-posts">
                <h4 class="related-title">Related Posts</h4>
                <div class="related-loop row justify-content-start">
                    @forelse($related_posts as $post)
                    <div class="col-lg-6 col-md-6 col-sm-10">
                        <div class="related-post-box">
                            <div class="thumb">
                                <img src="{{asset('storage/media/post/'. $post->post_image)}}" alt="image">
                            </div>
                            <h5 class="title">
                                <a href="{{route('front.blog-details', [$post->post_slug])}}">
                                    {{$post->post_title}}
                                </a>
                            </h5>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <h6 class="text-left">No related post found</h6>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="comment-template mt-4">
            <h4 class="template-title">{{count($post->comments)}} Comments</h4>

            <ul class="comment-list">
                @forelse($post->comments as $comment)
                <li>
                    <div class="comment-body">
                        <div class="comment-author">
                            <img src="{{($comment->user->avatar != NULL)? asset('storage/media/user/'. $comment->user->avatar) : asset('front_assets/img/no_image_available.png')}}" alt="image">
                        </div>
                        <div class="comment-content">
                            <h6 class="comment-author">{{$comment->user->name}}</h6>
                            <p>
                                {{$comment->comment_msg}}
                            </p>
                            <div class="comment-footer">
                                <span class="date"> {{ Carbon\Carbon::parse($comment->created_at)->toDayDateTimeString() }}</span>
                            </div>
                        </div>
                    </div>
                </li>
                @empty

                @endforelse

            </ul>

            <h4 class="template-title">Leave your comment</h4>
            <div id="comment_response"></div>
            <div class="comment-form">
                @if(session('LOGIN') == true)
                <form action="#" id="commentFrmSubmit">
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    @csrf
                    <div class="row">
                        @if(session('LOGIN') == true && session('ROLE') == 'admin')
                        @php
                        $user = userDetails(session('ADMIN_ID'));
                        @endphp
                        <div class="col-sm-6">
                            <input name="name" type="text" placeholder="Enter your name" value="{{$user->name}}" required disabled>
                        </div>
                        <div class="col-sm-6">
                            <input name="email" type="email" placeholder="Your Email" value="{{$user->email}}" required disabled>
                        </div>
                        @elseif(session('LOGIN') == true && session('ROLE') == 'editor')
                        @php
                        $user = userDetails(session('EDITOR_ID'))
                        @endphp
                        <div class="col-sm-6">
                            <input type="text" name="name" placeholder="Enter your name" value="{{$user->name}}" required disabled>
                        </div>
                        <div class="col-sm-6">
                            <input type="email" name="email" placeholder="Your Email" value="{{$user->email}}" required disabled>
                        </div>
                        @endif

                        <div class="col-12">
                            <textarea name="comment_msg" placeholder="Your message here" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit">Submit <i class="far fa-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
                @else
                <p><a class="btn-custom" href="{{route('user-login')}}">Please login to write your comment</a></p>
                @endif
            </div>
        </div>
    </div>
</section>
<!--====== Post Details End ======-->

@endsection

@section('front_script')
<script>
    $(document).ready(function() {
        $("#commentFrmSubmit").on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            // console.log(formData);


            $.ajax({
                url: "{{route('user.comment.submit')}}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $("#commentFrmSubmit").trigger("reset");
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    if (response.status === 'error') {
                        $("#comment_response").html(`<div class="alert alert-danger">${response.message}</div>`);
                    } else {
                        $("#comment_response").html(`<div class="alert alert-success">${response.message}</div>`);
                    }
                }
            });
        })
    });
</script>
@endsection
@extends('frontend.layouts.master')

@section('content')
<section class="shopping-login-page">
    <div class="container">
        <div class="login-wrapper">
            <div class="row no-gutters">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-box">
                        <div class="">
                            @if(session('msg'))
                            <div class="alert alert-{{session('type') == 'error' ? 'danger' : 'success'}}">
                                {{session('msg')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>
                        <div>
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="form-title">
                            <h3>Login</h3>
                        </div>
                        <form class="login-form" method="POST" action="{{route('user-login-submit')}}">
                            @csrf
                            <p>
                                <label for="email">Email address<span class="required">*</span></label>
                                <input type="text" id="email" name="email" value="{{old('email')}}">
                            </p>
                            <p>
                                <label for="password">Password<span class="required">*</span></label>
                                <input type="password" id="password" name="password" autocomplete="off">
                            </p>
                            <p class="text-center">
                                <button type="submit" class="form-btn">Login</button>
                            </p>

                            <p>Not yet registered. </p>
                            <h6><a href="{{route('user-register')}}">Register Now</a></h6>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
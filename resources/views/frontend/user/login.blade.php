@extends('frontend.layouts.master')

@section('breadcrumb')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_box text-center">
                    <!-- <h2 class="breadcrumb-title">@@title</h2> -->
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Log In</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
@endsection



@section('content')
<div class="login-register-page-area section-space--ptb_80">
    <div class="container">
        <div class="row ">
            <div class="col-lg-6 m-auto">
                <div class="login-content">

                    <div class="login-header mb-40">
                        <h5>LOG IN YOUR ACCOUNT</h5>
                    </div>

                    <div class="">
                        @if(session('msg'))
                        <div class="alert alert-{{session('type') == 'error' ? 'danger' : 'success'}}">
                            {{session('msg')}}
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


                    <form method="POST" action="{{route('user-login-submit')}}">
                        @csrf
                        <input placeholder="Enter Email" type="email" id="email" name="email" value="{{old('email')}}" required>
                        <input placeholder="Enter Password" type="password" id="password" name="password" autocomplete="off" required>

                        <button type="submit" class="btn-primary btn-large">Log in</button>
                        <div class="member-register mt-5">
                            <p> Not a member? <a href="{{route('user-register')}}"> Register now</a></p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
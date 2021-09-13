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
                        <li class="breadcrumb-item active">Register</li>
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
                        <h3 class="mb-2">Register</h3>
                        <h5>Become a member</h5>
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


                    <form method="POST" action="{{route('user-register-submit')}}">
                        @csrf
                        <input placeholder="Enter Name" type="text" id="name" name="name" required value="{{old('name')}}">
                        <input placeholder="Enter Email" type="email" id="email" name="email" value="{{old('email')}}" required>
                        <input placeholder="Enter Password" type="password" id="password" name="password" autocomplete="off" required>


                        <button type="submit" class="btn-primary btn-large">Register Now</button>
                        <div class="member-register mt-5">
                            <p> A member? <a href="{{route('user-login')}}"> Log in now</a></p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
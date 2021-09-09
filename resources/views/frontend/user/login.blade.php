@extends('frontend.layouts.master')

@section('content')
<!-- Start Banner Area  -->
<div class="axil-banner banner-style-1 bg_image bg_image--3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner">
                    <h1 class="title">Login</h1>
                    <p class="description">Wherever &#38; whenever you need us. We are here for you – contact us for all your support needs.<br /> be it technical, general queries or information support.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner Area  -->
<!-- Start Post List Wrapper  -->
<div class="axil-post-list-area axil-section-gap bg-color-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-8 offset-xl-2 offset-lg-2">
                <!-- Start About Area  -->
                <div class="axil-about-us">

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

                    <!-- Start Contact Form  -->
                    <div class="axil-section-gapTop axil-contact-form-area">
                        <h4 class="title mb--10">Login with us</h4>
                        <form id="contact-form" method="POST" action="{{route('user-login-submit')}}" class="axil-contact-form contact-form--1 row">
                            @csrf

                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label for="email">Your Email</label>
                                    <input type="text" id="email" name="email" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-submit">
                                    <button name="submit" type="submit" id="submit" class="axil-button button-rounded btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Contact Form  -->
                </div>
                <!-- End About Area  -->
            </div>

        </div>
    </div>
</div>
<!-- End Post List Wrapper  -->
@endsection
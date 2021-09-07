@extends('frontend.layouts.master')

@section('content')
<section class="shopping-login-page">
    <div class="container">
        <div class="login-wrapper">
            <div class="row no-gutters">
                <div class="col-lg-6 offset-lg-3">
                    <div class="reg-box">
                        <div class="form-title">
                            <h3>Register</h3>
                            <p>I'm a new customer and would like to register.</p>
                        </div>
                        <form class="login-form" method="POST" action="{{route('user-register-submit')}}">
                            @csrf
                            <p>
                                <label for="name">Name<span class="required">*</span></label>
                                <input type="text" id="name" name="name">
                            </p>
                            <p>
                                <label for="email">Email address<span class="required">*</span></label>
                                <input type="email" id="email" name="email">
                            </p>
                            <p>
                                <label for="password">Password<span class="required">*</span></label>
                                <input type="password" id="password" name="password">
                            </p>
                            <p class="text-center">
                                <button type="submit" class="form-btn">Register</button>
                            </p>
                            <p>Already registered.</p>
                            <h6><a href="{{route('user-login')}}">Login Now</a></h6>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
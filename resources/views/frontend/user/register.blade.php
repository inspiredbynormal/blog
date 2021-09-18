@extends('frontend.layouts.master')




@section('content')

<!--contact-->
<section class="contact mb-70" style="margin-top: 91px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="login-header mb-40 mt-5">
                    <h5>Register Now</h5>
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
            </div>
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="{{route('user-register-submit')}}" class="form" id="main_contact_form">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name*" required="required" value="{{old('name')}}">
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email*" required="required" value="{{old('email')}}">
                    </div>

                    <div class="form-group">
                        <input type="password" id="password" name="password" autocomplete="off" required="required" class="form-control" placeholder="Password*">
                    </div>

                    <button type="submit" name="submit" class="btn-custom">
                        Log in
                    </button>

                    <div class="member-register mt-5">
                        <p> Already member? <a href="{{route('user-login')}}"> Login now</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
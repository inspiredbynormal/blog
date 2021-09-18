<!doctype html>
<html lang="en">


<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!-- favicon -->
    <link rel="icon" sizes="16x16" href="{{asset('front_assets/img/favicon.png')}}">

    <!-- Title -->
    <title> Demo Blog </title>

    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{asset('front_assets/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/elegant-font-icons.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/owl.carousel.css')}}">

    <!-- main style -->
    <link rel="stylesheet" href="{{asset('front_assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/custom.css')}}">
</head>

<body>
    <!--loading -->
    <div class="loading">
        <div class="circle"></div>
    </div>

    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')

    @include('frontend.layouts.search')



    <!-- jQuery first, then Popper.js')}}, then Bootstrap JS -->
    <script src="{{asset('front_assets/js/jquery-3.5.0.min.js')}}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="{{asset('front_assets/js/popper.min.js')}}"></script>
    <script src="{{asset('front_assets/js/bootstrap.min.js')}}"></script>

    <!-- JS Plugins  -->
    <!-- <script src="{{asset('front_assets/js/ajax-contact.js')}}"></script> -->
    <script src="{{asset('front_assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front_assets/js/switch.js')}}"></script>

    <!-- JS main  -->
    <script src="{{asset('front_assets/js/main.js')}}"></script>
    @yield('front_script')


</body>


</html>
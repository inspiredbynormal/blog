<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DemoBlog</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('front_assets/images/favicon.png')}}">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front_assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/vendor/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/vendor/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/vendor/base.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/plugins/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/style.css')}}">

</head>

<body>
    <div class="main-wrapper">
        <div class="mouse-cursor cursor-outer"></div>
        <div class="mouse-cursor cursor-inner"></div>

        <div id="my_switcher" class="my_switcher">
            <ul>
                <li>
                    <a href="javascript: void(0);" data-theme="light" class="setColor light">
                        <span title="Light Mode">Light</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                        <span title="Dark Mode">Dark</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Start Header -->
        @include('frontend.layouts.header')
        <!-- Start Header -->

        <!-- Start Mobile Menu Area  -->
        @include('frontend.layouts.mobile-menu')
        <!-- End Mobile Menu Area  -->

        @yield('content')

        <!-- Start Footer Area  -->
        @include('frontend.layouts.footer')
        <!-- End Footer Area  -->

        <!-- Start Back To Top  -->
        <a id="backto-top"></a>
        <!-- End Back To Top  -->

    </div>

    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{asset('front_assets/js/vendor/modernizr.min.js')}}"></script>
    <!-- jQuery JS -->
    <script src="{{asset('front_assets/js/vendor/jquery.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('front_assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('front_assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{asset('front_assets/js/vendor/tweenmax.min.js')}}"></script>
    <script src="{{asset('front_assets/js/vendor/js.cookie.js')}}"></script>
    <script src="{{asset('front_assets/js/vendor/jquery.style.switcher.js')}}"></script>


    <!-- Main JS -->
    <script src="{{asset('front_assets/js/main.js')}}"></script>

</body>

</html>
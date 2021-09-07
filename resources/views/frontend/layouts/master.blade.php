<!DOCTYPE html>
<html lang="en-US">



<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--====== Title ======-->
    <title> Demo Blog </title>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('front_assets/img/favicon.ico')}}" type="img/png" />
    <!--====== Animate Css ======-->
    <link rel="stylesheet" href="{{asset('front_assets/css/animate.min.css')}}">
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('front_assets/css/bootstrap.min.css')}}" />
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{asset('front_assets/css/font-awesome.min.css')}}" />
    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{asset('front_assets/css/magnific-popup.css')}}" />
    <!--====== Slick  css ======-->
    <link rel="stylesheet" href="{{asset('front_assets/css/slick.css')}}" />
    <!--====== Nice Select ======-->
    <link rel="stylesheet" href="{{asset('front_assets/css/jquery-nice-select.min.css')}}" />
    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('front_assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('front_assets/css/custom.css')}}" />
</head>

<body>


    <!--====== Header part start ======-->
    @include('frontend.layouts.header')
    <!--====== Header part end ======-->

    @yield('content')

    <!--====== Footer Area Start ======-->
    @include('frontend.layouts.footer')
    <!--====== Footer Area End ======-->
    <!--====== jquery js ======-->
    <script src="{{asset('front_assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <!-- <script src="{{asset('front_assets/js/vendor/jquery-1.12.4.min.js')}}"></script> -->
    <script src="{{asset('front_assets/js/vendor/jquery.js')}}"></script>
    <!--====== Bootstrap js ======-->
    <script src="{{asset('front_assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front_assets/js/popper.min.js')}}"></script>
    <!--====== Slick js ======-->
    <script src="{{asset('front_assets/js/slick.min.js')}}"></script>
    <!--====== Images Loaded ======-->
    <script src="{{asset('front_assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <!--====== Isotope js ======-->
    <script src="{{asset('front_assets/js/isotope.pkgd.min.js')}}"></script>
    <!--====== Magnific Popup js ======-->
    <script src="{{asset('front_assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!--====== Nice Select js ======-->
    <script src="{{asset('front_assets/js/jquery.nice-select.min.js')}}"></script>
    <!--====== Main js ======-->
    <script src="{{asset('front_assets/js/main.js')}}"></script>

    @yield('front_script')

</body>



</html>
<!DOCTYPE html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Demo Blog</title>
    <meta name="description" content="Bunzo is one of the most popular blog template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <link rel="canonical" href="#" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Bunzo - Blog HTML Template" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="icon" href="{{asset('front_assets/images/favicon.png')}}">

    <!-- CSS
        ============================================ -->

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="{{asset('front_assets/css/vendor/bootstrap.min.css')}}">  -->

    <!-- Gordita Fonts CSS -->
    <link rel="stylesheet" href="{{asset('front_assets/fonts/gordita-fonts.css')}}" />

    <!-- Icofont CSS -->
    <!-- <link rel="stylesheet" href="{{asset('front_assets/css/vendor/icofont.min.css')}}" /> -->

    <!-- Light gallery CSS -->
    <!-- <link rel="stylesheet" href="{{asset('front_assets/css/plugins/lightgallery.min.css')}}"> -->

    <!-- Swiper bundle CSS -->
    <!-- <link rel="stylesheet" href="{{asset('front_assets/css/plugins/swiper-bundle.min.css')}}" /> -->

    <!-- AOS CSS -->
    <!-- <link rel="stylesheet" href="{{asset('front_assets/css/plugins/aos.css')}}"> -->


    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css')}} & plugins.min.css')}} for better website load performance and remove css files from avobe) -->

    <link rel="stylesheet" href="{{asset('front_assets/css/vendor/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/plugins/plugins.min.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('front_assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/custom.css')}}">

</head>




<body>

    <!--========  header area =========-->
    @include('frontend.layouts.header')
    <!--======== End of header area  =========-->

    @yield('breadcrumb')


    <div id="main-wrapper">
        <div class="site-wrapper-reveal">

            @yield('content')

        </div>
    </div>



    <!--======  footer area =======-->
    @include('frontend.layouts.footer')
    <!--=====  End of footer area ========-->




    <!--====================  scroll top ====================-->
    <a href="#" class="scroll-top" id="scroll-top">
        <i class="arrow-top icofont-swoosh-up"></i>
        <i class="arrow-bottom icofont-swoosh-up"></i>
    </a>
    <!--====================  End of scroll top  ====================-->

    <!--====================  search overlay ====================-->
    <div class="search-overlay" id="search-overlay">

        <div class="search-overlay__header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <!-- search content -->
                        <div class="search-content text-end">
                            <span class="mobile-navigation-close-icon" id="search-close-trigger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-overlay__inner">
            <div class="search-overlay__body">
                <div class="search-overlay__form">
                    <form action="{{route('front.search-posts')}}" method="GET">
                        <input type="search" placeholder="Search" name="search">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of search overlay  ====================-->

    <!--====================  mobile menu overlay ====================-->
    @include('frontend.layouts.mobile-menu')
    <!--====================  End of mobile menu overlay  ====================-->








    <!-- JS
    ============================================ -->
    <!-- Modernizer JS -->
    <!-- <script src="{{asset('front_assets/js/vendor/modernizr-2.8.3.min.js')}}"></script> -->

    <!-- jQuery JS -->
    <!-- <script src="{{asset('front_assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('front_assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script> -->

    <!-- Bootstrap JS -->
    <!-- <script src="{{asset('front_assets/js/vendor/bootstrap.min.js')}}"></script> -->

    <!-- Light gallery JS -->
    <!-- <script src="{{asset('front_assets/js/plugins/lightgallery.min.js')}}"></script> -->

    <!-- Isotope JS -->
    <!-- <script src="{{asset('front_assets/js/plugins/isotope.min.js')}}"></script> -->

    <!-- Masonry JS -->
    <!-- <script src="{{asset('front_assets/js/plugins/masonry.min.js')}}"></script> -->

    <!-- ImagesLoaded JS -->
    <!-- <script src="{{asset('front_assets/js/plugins/images-loaded.min.js')}}"></script> -->

    <!-- Swiper Bundle JS -->
    <!-- <script src="{{asset('front_assets/js/plugins/swiper-bundle.min.js')}}"></script> -->

    <!-- AOS JS -->
    <!-- <script src="{{asset('front_assets/js/plugins/aos.js')}}"></script> -->

    <!-- Ajax JS -->
    <!-- <script src="{{asset('front_assets/js/plugins/ajax.mail.js')}}"></script> -->

    <!-- Plugins JS (Please remove the comment from below plugins.min.js')}} for better website load performance and remove plugin js files from avobe) -->
    <script src="{{asset('front_assets/js/vendor/vendor.min.js')}}"></script>
    <script src="{{asset('front_assets/js/plugins/plugins.min.js')}}"></script>


    <!-- Main JS -->
    <script src="{{asset('front_assets/js/main.js')}}"></script>
    @yield('front_script')

</body>


<!-- Mirrored from template.hasthemes.com/bunzo/bunzo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Sep 2021 06:45:43 GMT -->

</html>
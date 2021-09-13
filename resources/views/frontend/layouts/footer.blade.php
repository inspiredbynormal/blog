<footer class="footer-area footer-one">
    <div class="footer-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="{{url('/')}}">
                                <img src="{{asset('front_assets/images/logo/logo-white.png')}}" alt="">
                            </a>
                        </div>
                        <p>Lorem Ipsum is simply dummy text
                            the printing and typesetting industry
                            has been the industry's standard
                            text ever since.
                        </p>
                        <ul class="footer-socail-share">
                            <li><a href="#"><i class="icofont-facebook"></i></a></li>
                            <li><a href="#"><i class="icofont-skype"></i></a></li>
                            <li><a href="#"><i class="icofont-twitter"></i></a></li>
                            <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6">
                    <div class="footer-widget footer-subscribe-center">
                        <div class="footer-widget-title">
                            <h4 class="title">Subscribe</h4>
                        </div>
                        <div class="footer-subscribe-wrap">
                            <div class="single-input">
                                <input type="text" placeholder="Your Name">
                            </div>
                            <div class="single-input">
                                <input type="email" placeholder="Email Address">
                            </div>
                            <div class="button-box">
                                <button class="btn-primary btn-large" type="submit">Subscribe Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="footer-menu-widget">
                        <div class="single-footer-menu">
                            <div class="footer-widget-title">
                                <h4 class="title">Company</h4>
                            </div>
                            <ul class="footer-widget-menu-list">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#!">Local Print Ads</a></li>
                                <li><a href="#">FAQ’s</a></li>
                                <li><a href="#!">Careers</a></li>
                            </ul>
                        </div>
                        <div class="single-footer-menu">
                            <div class="footer-widget-title">
                                <h4 class="title">Quick Links</h4>
                            </div>
                            <ul class="footer-widget-menu-list">
                                <li><a href="#!">Privacy Policy</a></li>
                                <li><a href="#!">Discussion</a></li>
                                <li><a href="#!">Terms & Conditions</a></li>
                                <li><a href="#!">Customer Support</a></li>
                                <li><a href="#!">Course FAQ’s</a></li>
                            </ul>
                        </div>
                        <div class="single-footer-menu">
                            <div class="footer-widget-title">
                                <h4 class="title">Category</h4>
                            </div>
                            <ul class="footer-widget-menu-list">
                                @php
                                $menu_cats = categoriesTop(5);
                                @endphp
                                @forelse($menu_cats as $cat)
                                <li><a href="{{route('front.posts-by-category', $cat->category_slug)}}">{{$cat->category_name}}</a> </li>
                                @empty
                                @endforelse

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-bottom-inner">
                        <div class="copy-right-text">
                            <p>© {{date('Y')}} . Made with ❤️ by <a target="_blank" rel="noopener" href="#">SM Solutions</a></p>
                        </div>
                        <div class="button-right-box">
                            <a href="#!" class="btn-primary btn-large">Share your thinking <i class="icofont-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
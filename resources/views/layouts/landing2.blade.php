<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ABCLOGISTIC ||</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicons/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicons/favicon.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicons/favicon.png') }}" />
    <link rel="manifest" href="{{ asset('assets/images/favicons/site.webmanifest') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="ABCLOGISTIC" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/css/01-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/02-animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/03-custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/05-flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/06-font-awesome-all.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/07-jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/08-jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/09-nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/11-owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/12-owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/13-jquery-ui.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/module-css/01-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/02-about.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/03-services.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/04-testimonial.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/05-team.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/06-blog.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/07-brand.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/08-contact.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/09-counter.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/10-error.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/11-faq.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/12-footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/13-page-header.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/14-shop.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/15-video.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/awards.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/banner.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/cta.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/design-interior.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/feature.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/pricing.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/projects.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/quote.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/skill.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/sliding-text.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/why-choose.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/working-process.css') }}" />
    @yield('styles')

    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}" />
    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <style>
        #background-video {
            position: absolute;
            top: 65%;
            left: 50%;
            width: auto;
            height: auto;
            min-width: 100%;
            min-height: 100%;
            transform: translate(-50%, -50%);
            z-index: -1;
        }
    </style>
    @if (app()->isLocale('ar'))
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Tajawal', sans-serif;
            }
        </style>
    @endif
</head>

<body>

    <!-- Start Preloader -->
    <div class="loader-wrap">
        <div class="preloader">
            <div class="preloader-close">x</div>
            <div id="handle-preloader" class="handle-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <span data-text-preloader="A" class="letters-loading"> A </span>
                        <span data-text-preloader="B" class="letters-loading"> B </span>
                        <span data-text-preloader="C" class="letters-loading"> C </span>
                        <span data-text-preloader="L" class="letters-loading"> L </span>
                        <span data-text-preloader="O" class="letters-loading"> O </span>
                        <span data-text-preloader="G" class="letters-loading"> G </span>
                        <span data-text-preloader="i" class="letters-loading"> i </span>
                        <span data-text-preloader="s" class="letters-loading"> s </span>
                        <span data-text-preloader="t" class="letters-loading"> t </span>
                        <span data-text-preloader="i" class="letters-loading"> i </span>
                        <span data-text-preloader="c" class="letters-loading"> c </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    <div class="page-wrapper">

        <!--Start Main Header One-->
        <header class="main-header main-header-one">
            <nav class="main-menu">
                <div class="main-menu__wrapper">
                    <div class="container">
                        <div class="main-header-one__inner">
                            <div class="main-header-one__top">
                                <div class="main-header-one__top-inner">
                                    <div class="main-header-one__top-left">
                                        <div class="header-contact-style1">
                                            <ul>
                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-phone"></span>
                                                    </div>

                                                    <div class="text-box">
                                                        <p><span>Talk to Us</span> <a href="tel:920024444">+966 92002
                                                                4444</a></p>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-email"></span>
                                                    </div>

                                                    <div class="text-box">
                                                        <p><span>Mail Us</span> <a href="info@abclogistic.com">info@abclogistic.com</a>
                                                        </p>
                                                    </div>
                                                </li>

                                                <li>
                                                    @if (localePrefix() == '_en')
                                                        <a class="text-box" href="{{ route('change_locale', 'ar') }}">
                                                            <span>لعربية <span> (sa)</span></span>
                                                        </a>
                                                    @else
                                                        <a class="text-box" href="{{ route('change_locale', 'en') }}">
                                                            <span>English<span> (US)</span></span>
                                                        </a>
                                                    @endif
                                                </li>
                                                <li hidden>

                                                    <div class="more_lang">

                                                        <div class="lang selected" data-value="en">

                                                        </div>

                                                        <div class="lang" data-value="sa">

                                                        </div>

                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="main-header-one__top-right">
                                        <div class="header-social-links">
                                            <a href="#"><span class="icon-facebook-f"></span></a>
                                            <a href="#"><span class="icon-twitter1"></span></a>
                                            <a href="#"><span class="icon-instagram"></span></a>
                                            <a href="#"><span class="icon-linkedin"></span></a>
                                        </div>

                                        <div class="header-search-box">
                                            <a href="#" class="main-menu__search search-toggler">Search
                                                <i class="icon-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="main-header-one__bottom">
                                <div class="main-menu__wrapper-inner">
                                    <div class="main-header-one__bottom-inner">
                                        <div class="main-header-one__bottom-left">
                                            <div class="logo-box">
                                                <a href="index.html"><img src="{{ asset('assets/images/resources/logoabc1.png') }}" style="max-height: 42px;" alt=""></a>
                                            </div>

                                            <div class="main-header-one__bottom-menu">
                                                <div class="main-menu__main-menu-box">
                                                    <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                                    <ul class="main-menu__list">
                                                        <li>
                                                            <a href="/">{{ __('Home') }} </a>
                                                        </li>
                                                        <li>
                                                            <a href="/about">{{ __('About Us') }}</a>
                                                        </li>
                                                        <li class="dropdown">
                                                            <a href="#">{{ __('Services') }}</a>
                                                            <ul>
                                                                <li><a href="/services">Services</a></li>
                                                                <li><a href="/international-transport">International
                                                                        Transport </a>
                                                                </li>
                                                                <li><a href="/track-transport">Local Track
                                                                        Transport</a>
                                                                </li>
                                                                <li><a href="/personal-delivery">Fast
                                                                        Personal Delivery</a>
                                                                </li>
                                                                <li><a href="/ocean-transport">Safe Ocean
                                                                        Transport</a>
                                                                </li>
                                                                <li><a href="/warehouse-facility">Warehouse
                                                                        Facility</a>
                                                                </li>
                                                                <li><a href="/emergency-transport">Emergency
                                                                        Transport </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a href="/new-jobs">{{ __('Jobs') }}</a>
                                                        </li>
                                                        <li>
                                                            <a href="/e-services">{{ __('E-Services') }}</a>
                                                        </li>
                                                        <li>
                                                            <a href="/contact">{{ __('Contact') }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="main-header-one__bottom-right">
                                            <div class="main-header-one__bottom-right-btn">
                                                <a href="/trackorder">Track Order
                                                    <i class="icon-right-arrow21"></i>
                                                </a>
                                            </div>

                                            <div class="login-box">
                                                <a href="https://app.abclogistic.com/login"><i class="fa fa-sign-in"></i> <span>Member <br>
                                                        Login</span> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!--End Main Header One-->

        <div class="stricky-header stricky-header--style1 stricked-menu main-menu">
            <div class="sticky-header__content"></div>
            <!-- /.sticky-header__content -->
        </div>
        <!-- /.stricky-header -->

        @yield('content')

        <footer class="footer-one footer-one--two">
            <div class="footer-one__pattern">
                <img src="assets/images/pattern/footer-v1-pattern.png" alt="#">
            </div>
            <div class="shape3 float-bob-y">
                <img src="assets/images/shapes/footer-v2-shape3.png" alt="">
            </div>
            <div class="footer-one__top">
                <div class="container">

                    <div class="footer-one--two__cta">
                        <div class="shape1">
                            <img class="float-bob-x3" src="assets/images/shapes/footer-v2-shape2.png" alt="">
                        </div>
                        <div class="shape2">
                            <img class="float-bob-y" src="assets/images/shapes/footer-v2-shape1.png" alt="">
                        </div>
                        <div class="footer-one--two__cta-inner">
                            <div class="text-box">
                                <h2>Efficient, Safe, & Swift Logistics Solution!</h2>
                            </div>

                            <div class="btn-box">
                                <a class="thm-btn" href="contact.html">Contact with Us
                                    <i class="icon-right-arrow21"></i>
                                    <span class="hover-btn hover-bx"></span>
                                    <span class="hover-btn hover-bx2"></span>
                                    <span class="hover-btn hover-bx3"></span>
                                    <span class="hover-btn hover-bx4"></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="footer-one__top-inner">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                <div class="footer-widget__single footer-one__about">
                                    <div class="footer-one__about-logo">
                                        <a href="index.html"><img src="assets/images/resources/footer-logo.png" alt=""></a>
                                    </div>
                                    <p class="footer-one__about-text">Logistic service provider company plays a pivotal role in the global supply chain logistic service provider.</p>

                                    <div class="footer-one__about-contact-info">
                                        <div class="icon">
                                            <span class="icon-support"></span>
                                        </div>

                                        <div class="text-box">
                                            <p>Make a Call</p>
                                            <h4><a href="tel:+1234567890">+966 92002 4444</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                                <div class="footer-widget__single footer-one__quick-links">
                                    <div class="title">
                                        <h2>Quick Links <span class="icon-plane3"></span></h2>
                                    </div>

                                    <ul class="footer-one__quick-links-list">
                                        <li><a href="index.html"><span class="icon-right-arrow1"></span> Home</a></li>
                                        <li><a href="about.html"><span class="icon-right-arrow1"></span> About Us</a>
                                        </li>
                                        <li><a href="service.html"><span class="icon-right-arrow1"></span> Service</a>
                                        </li>
                                        <li><a href="project.html"><span class="icon-right-arrow1"></span> Latest
                                                Project</a></li>
                                        <li><a href="contact.html"><span class="icon-right-arrow1"></span> Contact
                                                Us</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                                <div class="footer-widget__single footer-one__contact">
                                    <div class="title">
                                        <h2>Get In Touch <span class="icon-plane3"></span></h2>
                                    </div>

                                    <div class="footer-one__contact-box">
                                        <ul>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-address"></span>
                                                </div>
                                                <div class="text-box">
                                                    <p>2775 King abdulaziz Street Road <br> Dammam, KSA</p>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="icon">
                                                    <span class="icon-email"></span>
                                                </div>
                                                <div class="text-box">
                                                    <p><a href="mailto:yourmail@email.com">info@abclogistic.com</a></p>
                                                    <p><a href="mailto:yourmail@email.com">info@abclogistic.com</a></p>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="icon">
                                                    <span class="icon-phone"></span>
                                                </div>
                                                <div class="text-box">
                                                    <p><a href="tel:920024444">+966 92002 4444 </a></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                                <div class="footer-widget__single footer-one__subscribe">
                                    <div class="title">
                                        <h2>Subscribe Us <span class="icon-plane3"></span></h2>
                                    </div>

                                    <p class="footer-one__subscribe-text">Sign up for alerts, our latest blogs, <br> thoughts, and insights</p>

                                    <div class="footer-one__subscribe-form">
                                        <form class="subscribe-form" action="#">
                                            <input type="email" name="email" placeholder="Your E-mail">
                                            <button type="submit" class="thm-btn">Subcribe
                                                <i class="icon-right-arrow21"></i>
                                                <span class="hover-btn hover-bx"></span>
                                                <span class="hover-btn hover-bx2"></span>
                                                <span class="hover-btn hover-bx3"></span>
                                                <span class="hover-btn hover-bx4"></span>
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-one__bottom">
                <div class="container">

                    <div class="footer-one__bottom-inner">
                        <div class="footer-one__bottom-text">
                            <p>© Copyright 2025 <a href="index.html">ABCLOGISTIC CO.</a> All Rights Reserved</p>
                        </div>

                        <div class="footer-one__social-links">
                            <ul>
                                <li>
                                    <a href="#"><span class="icon-facebook-f"></span></a>
                                </li>

                                <li>
                                    <a href="#"><span class="icon-instagram"></span></a>
                                </li>

                                <li>
                                    <a href="#"><span class="icon-twitter1"></span></a>
                                </li>
                                <li>
                                    <a href="#"><span class="icon-linkedin"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--End Footer Two-->

    </div>
    <!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="{{ asset('assets/images/resources/abclogo1.png') }}" width="150" alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="info@abclogistic.com">info@abclogistic.com</a>
                </li>
                <li>
                    <i class="icon-phone"></i>
                    <a href="tel:920024444">920024444</a>
                </li>
            </ul>
            <!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
                <!-- /.mobile-nav__social -->
            </div>
            <!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label>
                <!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="fas fa-search"></i>
                    <span class="hover-btn hover-bx"></span>
                    <span class="hover-btn hover-bx2"></span>
                    <span class="hover-btn hover-bx3"></span>
                    <span class="hover-btn hover-bx4"></span>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
        <span class="scroll-to-top__text"> Go Back Top</span>
    </a>


    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/wNumb.min.js') }}"></script>
    <script src="{{ asset('assets/js/curved-text/jquery.circleType.js') }}"></script>
    <script src="{{ asset('assets/js/curved-text/jquery.fittext.js') }}"></script>
    <script src="{{ asset('assets/js/curved-text/jquery.lettering.min.js') }}"></script>
    <script src="{{ asset('assets/js/gsap/gsap.js') }}"></script>
    <script src="{{ asset('assets/js/gsap/ScrollTrigger.js') }}"></script>
    <script src="{{ asset('assets/js/gsap/SplitText.js') }}"></script>


    <script src="{{ asset('assets/js/01-bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/02-countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/03-jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/js/04-jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/05-jquery-sidebar-content.js') }}"></script>
    <script src="{{ asset('assets/js/06-marquee.min.js') }}"></script>
    <script src="{{ asset('assets/js/07-owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/08-jarallax.min.js') }}"></script>
    <script src="{{ asset('assets/js/09-odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/10-jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/11-jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/12-wow.js') }}"></script>
    <script src="{{ asset('assets/js/13-isotope.js') }}"></script>


    <!-- template js -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @yield('scripts')
</body>

</html>

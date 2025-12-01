<section class="about-one">
    <div class="container">
        <div class="row">
            <!--Start About One Content-->
            <div class="col-xl-7">
                <div class="about-one__content">
                    <div class="sec-title tg-heading-subheading animation-style2">
                        <div class="sec-title__tagline">
                            <div class="line"></div>
                            @if (app()->getLocale() == 'ar')
                                <div>
                                    <h4>{{ __('شركتنا') }}</h4>
                                </div>
                                <div class="icon">
                                    <span class="icon-plane2 float-bob-x3"></span>
                                </div>
                            @else
                                <div class="text tg-element-title">
                                    <h4>{{ __('Our Company') }}</h4>
                                </div>
                                <div class="icon">
                                    <span class="icon-plane2 float-bob-x3"></span>
                                </div>
                            @endif
                        </div>
                        @if (app()->getLocale() == 'ar')
                            <h2 class="">{{ __('خبرتنا تكمن في') }} <br>
                                <span>{{ __('حلول اللوجستيات') }}</span>
                            </h2>
                        @else
                            <h2 class="sec-title__title tg-element-title">{{ __('Our Expertise Stands in') }} <br>
                                <span>{{ __('Logistics Solutions') }}</span>
                            </h2>
                        @endif
                    </div>

                    <div class="about-one__content-text1">
                        <p>{{ __('Founded in 2014 by businessman Mr. Zafer Mushabab Al-Jabri, ABC Logistics is a proud extension of the esteemed Al-Jabri family, renowned for its deep-rooted legacy in the transportation and logistics sector. Our journey began in 2006 with the establishment of Zafer Al-Jabri Transportation, which laid the foundation for what has become a distinguished logistics entity trusted by leading clients across Saudi Arabia. We specialize in delivering integrated logistics solutions that blend local expertise with global standards.') }}
                        </p>
                    </div>

                    <div class="about-one__content-text2">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="about-one__content-text2-single">
                                    <div class="about-one__content-text2-single-top">
                                        <div class="icon">
                                            <span class="icon-worldwide-shipping-1"></span>
                                        </div>

                                        <div class="title-box">
                                            <h3>{{ __('Top-Tier Services') }}</h3>
                                        </div>
                                    </div>

                                    <p>{{ __('Providing the highest quality logistics and transportation services across The Country.') }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="about-one__content-text2-single">
                                    <div class="about-one__content-text2-single-top">
                                        <div class="icon">
                                            <span class="icon-24-hours-service"></span>
                                        </div>

                                        <div class="title-box">
                                            <h3>{{ __('24/7 Dedicated Support') }}</h3>
                                        </div>
                                    </div>

                                    <p>{{ __('Our expert team is available around the clock to ensure smooth operations.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="about-one__content-bottom">
                        <div class="btn-box">
                            <a class="thm-btn" href="/about">{{ __('More About Us') }}
                                <i class="icon-right-arrow21"></i>
                                <span class="hover-btn hover-bx"></span>
                                <span class="hover-btn hover-bx2"></span>
                                <span class="hover-btn hover-bx3"></span>
                                <span class="hover-btn hover-bx4"></span>
                            </a>
                        </div>

                        <div class="contact-box">
                            <div class="icon">
                                <span class="icon-phone2"></span>
                            </div>

                            <div class="text-box">
                                <p>{{ __('Make A Phone Call') }}</p>
                                <h4><a href="tel:920024444">+966 55 000 8 555 </a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End About One Content-->

            <!--Start About One Img-->
            <div class="col-xl-5">
                <div class="about-one__img">
                    <div class="shape1 float-bob-y"><img src="{{ asset('assets/images/shapes/about-v1-shape1.png') }}" alt="">
                    </div>
                    <div class="shape2 float-bob-y"><img src="{{ asset('assets/images/shapes/about-v1-shape2.png') }}" alt="">
                    </div>
                    <div class="about-one__img1 reveal">
                        <img src="{{ asset('assets/images/about/about-v1-img1.jpg') }}" alt="">
                    </div>

                    <div class="about-one__img2">
                        <div class="about-one__img2-inner reveal">
                            <img src="{{ asset('assets/images/about/about-v1-img2.jpg') }}" alt="">
                        </div>

                        <div class="about-one__circle-text">
                            <div class="about-one__round-text-box">
                                <div class="inner">
                                    <div class="about-one__curved-circle rotate-me">
                                        {{ __('IN BUSINESS SINCE 2006') }}
                                    </div>
                                </div>
                                <div class="overlay-icon-box">
                                    <a href="#"><i class="icon-location1"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="shape3 float-bob-y">
                            <img src="{{ asset('assets/images/shapes/about-v1-shape3.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!--End About One Img-->
        </div>
    </div>
</section>
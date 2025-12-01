<section class="skill-one">
    <div class="container">
        <div class="row">
            <!--Start Skill One Img-->
            <div class="col-xl-5">
                <div class="skill-one__img">
                    <div class="shape1 float-bob-y"><img src="{{ asset('assets/images/shapes/skill-v1-shape1.png') }}"
                            alt="">
                    </div>
                    <div class="shape2 float-bob-y"><img src="{{ asset('assets/images/shapes/skill-v1-shape2.png') }}"
                            alt="">
                    </div>
                    <div class="skill-one__img1 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <img src="{{ asset('assets/images/resources/skill-v1-img1.jpg') }}" alt="">
                    </div>
                    <div class="skill-one__img2 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="inner">
                            <img src="{{ asset('assets/images/resources/skill-v1-img2.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!--End Skill One Img-->

            <!--Start Skill One Content-->
            <div class="col-xl-7">
                <div class="skill-one__content">
                    <div class="sec-title tg-heading-subheading animation-style2">
                        <div class="sec-title__tagline">
                            <div class="line"></div>
                            <div class="text tg-element-title">
                                <h4>{{ __('Our Expertise') }}</h4>
                            </div>
                            <div class="icon">
                                <span class="icon-plane2 float-bob-x3"></span>
                            </div>
                        </div>
                        <h4 class="sec-title__title tg-element-title">{{ __('Premier Logistics Solutions') }} <br> {{ __('Trusted for') }}
                            <span>{{ __('Excellence') }}</span></h4>
                    </div>

                    <div class="skill-one__content-text">
                        <p>{{ __('As a leading logistic service provider, we excel in orchestrating seamless supply chain solutions, ensuring goods move efficiently from origin to destination. Our expertise in shipping, management, and customs clearance sets us apart in delivering reliable and innovative transportation services.') }}</p>
                    </div>

                    <ul class="skill-one__progress">
                        <li>
                            <div class="skill-one__progress-single">
                                <div class="title-box">
                                    <p>{{ __('Shipping') }}</p>
                                </div>
                                <div class="bar">
                                    <div class="bar-inner count-bar" data-percent="95%">
                                        <div class="count-text">95%</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="skill-one__progress-single">
                                <div class="title-box">
                                    <p>{{ __('Management') }}</p>
                                </div>
                                <div class="bar">
                                    <div class="bar-inner count-bar" data-percent="90%">
                                        <div class="count-text">90%</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="skill-one__progress-single">
                                <div class="title-box">
                                    <p>{{ __('Customs Clearance') }}</p>
                                </div>
                                <div class="bar">
                                    <div class="bar-inner count-bar" data-percent="85%">
                                        <div class="count-text">85%</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="skill-one__content-btn">
                        <a class="thm-btn" href="/about">{{ __('Book Your Shipment') }} <i class="icon-right-arrow21"></i>
                            <span class="hover-btn hover-bx"></span>
                            <span class="hover-btn hover-bx2"></span>
                            <span class="hover-btn hover-bx3"></span>
                            <span class="hover-btn hover-bx4"></span>
                        </a>
                    </div>
                </div>
            </div>
            <!--End Skill One Content-->
        </div>
    </div>
</section>

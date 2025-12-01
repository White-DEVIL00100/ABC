@extends('layouts.landing')
@section('content')
    <!--Start Page Header-->
    <section class="page-header">
        <div class="page-header__bg"
            style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg.jpg') }})">
        </div>
        <div class="page-header__pattern"><img src="{{ asset('assets/images/pattern/page-header-pattern.png') }}"
                alt=""></div>
        <div class="container">
            <div class="page-header__inner">
                <h2>Service</h2>
                <ul class="thm-breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><span class="icon-right-arrow21"></span></li>
                    <li>Service</li>
                </ul>
            </div>
        </div>
    </section>
    @include('landing.components.our_services')
    @include('landing.components.expertise')
    @include('landing.components.goods_to_handle')
@endsection

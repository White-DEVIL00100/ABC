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
                <h2>{{ __('About us') }}</h2>
                <ul class="thm-breadcrumb">
                    <li><a href="index.html">{{ __('Home') }}</a></li>
                    <li><span class="icon-right-arrow21"></span></li>
                    <li>{{ __('About us') }}</li>
                </ul>
            </div>
        </div>
    </section>

    @include('landing.components.our_company')
    @include('landing.components.our_services')
    @include('landing.components.quotation')
    @include('landing.components.team_word')
@endsection

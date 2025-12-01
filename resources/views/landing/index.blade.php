@extends('layouts.landing')

@section('content')
    <!--Start Banner One-->
    @include('landing.components.banners')
    @include('landing.components.our_company')
    @include('landing.components.our_services')
    @include('landing.components.expertise')
    @include('landing.components.quotation')
    @include('landing.components.skills')
    @include('landing.components.team_word')
    @include('landing.components.faq')
    @include('landing.components.maintenance')
    @include('landing.components.counter')
    @include('landing.components.goods_to_handle')
    @include('landing.components.partners')
@endsection
@section('scripts')
    @stack('secondary_scripts')
@endsection

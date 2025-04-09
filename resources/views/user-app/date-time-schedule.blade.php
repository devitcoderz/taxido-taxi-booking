@extends('user-app.layout')

    @section('title')
        <title>Taxido - User App </title>
@endsection

@section('style')

    <!-- calendar css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/calendar.min.css')}}">

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('user/home')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>

                <h3 class="fw-medium  title-color">Date Time Schedule</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- date-time section starts -->
    <section class="date-time-section section-b-space">
        <div class="heading-part white-background p-3">
            <h4 class="text-center mx-auto fw-500 title-color w-75">What time would you want to be picked up?</h4>
        </div>
        <div class="custom-container">
            <div id="calendar" class="w-100"></div>
            <div id="time" class="w-100"></div>

        </div>

        <div class="fixed-btn">
            <div class="custom-container">
                <a href="{{url('user/search-location')}}" class="btn theme-btn download-btn w-100">Done</a>
            </div>
        </div>
    </section>
    <!-- date-time section starts -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    @endsection

    @section('script')

        <!-- calendar js -->
        <script src="{{asset('assets/js/calendar.min.js')}}"></script>
        <script src="{{asset('assets/js/custom-calendar.js')}}"></script>

@endsection
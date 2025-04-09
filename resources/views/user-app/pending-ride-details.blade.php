@extends('user-app.layout')

@section('title')
        <title>Taxido - User App </title>
@endsection

@section('style')
    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/swiper-bundle.min.css')}}">
@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{'user/my-rides'}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"></i>
                </a>

                <h3 class="fw-medium  title-color">Pending Ride</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- cancel ride details section starts -->
    <section class="section-b-space pt-0">

        <div class="custom-container">
            <div class="my-ride-details-page">
                <div class="profile-head">
                    <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p5.png')}}" alt="profile">
                    <div class="profile-content">
                        <div>
                            <h5>Jonathan Higgins</h5>
                            <div class="flex-align-center gap-1">
                                <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                <h5 class="fw-normal title-color">4.8</h5>
                                <span class="content-color fw-normal">(127)</span>
                            </div>
                        </div>

                        <span class="status secondary-color fw-normal">Pending</span>
                    </div>
                </div>
                <div class="payment-method-part">
                    <div class="d-flex align-content-center justify-content-between mt-2 mt-sm-3">
                        <h6 class="title-color fw-normal">Payment method : Cash</h6>
                        <h4 class="success-color fw-semibold">$256</h4>
                    </div>
                    <p class="mt-1 fw-normal content-color">The total of $24 has a GST of $2 included.</p>
                </div>
                <div class="d-flex align-content-center justify-content-between mt-3">
                    <h6 class="content-color fw-normal">Date</h6>
                    <h5 class="title-color fw-normal">15 Feb’25,10:15 AM</h5>
                </div>
                <div class="d-flex align-content-center justify-content-between mt-2">
                    <h6 class="content-color fw-normal">Booking ID</h6>
                    <h5 class="title-color fw-normal">#12000052</h5>
                </div>
                <div class="d-flex align-content-center justify-content-between mt-2">
                    <h6 class="content-color fw-normal">Mobile Number</h6>
                    <h5 class="title-color fw-normal">+1 (704) 88 6008</h5>
                </div>

                <img class="img-fluid route-map w-100 mt-3" src="{{asset('assets/images/route-map.png')}}" alt="map">
            </div>
            <img class="img-fluid hangging-img1" src="{{asset('assets/images/svg/hangging.svg')}}" alt="hangging">
            <img class="img-fluid hangging-img2" src="{{asset('assets/images/svg/hangging.svg')}}" alt="hangging">
            <ul class="ride-location-listing driver-location-list position-relative mt-3 p-3">
                <li>
                    <div class="location-box">
                        <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}" alt="location">
                        <h5 class="fw-light title-color">17, Yonge St, Toronto, Canada</h5>
                    </div>
                </li>

                <li>
                    <div class="location-box">
                        <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                        <h5 class="fw-light title-color border-0">20, Yonge St, Toronto, Canada</h5>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- cancel ride details section end -->

@section('script')

    <!-- swiper js -->
    <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/custom-swiper.js')}}"></script>

@endsection
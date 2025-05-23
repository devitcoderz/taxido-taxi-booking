@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
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
                <a href="{{url('driver/my-rides')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>

                <h3 class="fw-medium  title-color">Completed Ride</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- cancel ride details section starts -->
    <section class="pt-0">
        <div class="custom-container">
            <div class="accept-ride-details-box mt-3">
                <div class="my-ride-details-page p-0 mt-0">
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

                            <span class="status success-color fw-normal">Complete</span>
                        </div>
                    </div>

                    <div class="rating-part">
                        <h5 class="fw-medium title-color mt-3 mb-2">Rate Us</h5>
                        <div class="rating-box mb-0">
                            <ul class="rating-list">
                                <li>
                                    <img class="img-fluid star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                </li>
                                <li>
                                    <img class="img-fluid star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                </li>
                                <li>
                                    <img class="img-fluid star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                </li>
                                <li>
                                    <img class="img-fluid star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                </li>
                                <li>
                                    <img class="img-fluid star" src="{{asset('assets/images/svg/star-plan.svg')}}"
                                        alt="star-plan">
                                </li>
                            </ul>
                            <h4 class="fw-medium title-color">4/5</h4>
                        </div>
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
        <div class="bill-details">
            <div class="custom-container">
                <h5 class="fw-medium title-color bill-title">Bill Details</h5>
                <div class="total-detail mt-2">
                    <div class="sub-total pb-3">
                        <h5 class="fw-normal title-color">Ride Fare</h5>
                        <h5 class="fw-normal title-color">$46</h5>
                    </div>

                    <div class="sub-total pb-3">
                        <h5 class="fw-normal title-color">Total Access Fee</h5>
                        <h5 class="fw-normal title-color">$9.6</h5>
                    </div>
                    <div class="sub-total pb-3">
                        <h5 class="fw-normal title-color">Coupon Savings</h5>
                        <h5 class="fw-normal error-color">-$11</h5>
                    </div>
                    <div class="grand-total">
                        <h5 class="fw-normal title-color">Total Bill</h5>
                        <h5 class="fw-normal amount success-color">$39</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="bill-details">
            <div class="custom-container">
                <h5 class="fw-medium title-color bill-title">Payment Method</h5>
                <div class="total-detail mt-2">
                    <div class="sub-total pb-3">
                        <h5 class="fw-normal title-color">Payment ID</h5>
                        <h5 class="fw-normal title-color">#0111</h5>
                    </div>

                    <div class="sub-total pb-3">
                        <h5 class="fw-normal title-color">Method type</h5>
                        <h5 class="fw-normal title-color">Cash</h5>
                    </div>
                    <div class="sub-total">
                        <h5 class="fw-normal title-color">Status</h5>
                        <h5 class="fw-normal success-color">Paid</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed-btn">
            <div class="custom-container">
                <a href="#" class="btn gray-btn download-btn w-100" id="print" onclick="window.print();">
                    <i class="iconsax icon" data-icon="logout-2"> </i> Download Invoice</a>
            </div>
        </div>
    </section>
    <!-- cancel ride details section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->
@endsection
@section('script')
    <!-- swiper js -->
    <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/custom-swiper.js')}}"></script>
@endsection
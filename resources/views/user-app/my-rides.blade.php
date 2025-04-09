@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')

@endsection

@section('content')
    <!-- header starts -->
    @include('user-app.partials.header')
    <!-- header end -->

    <!-- my ride section starts -->
    <section class="section-b-space">

        <ul class="nav nav-pills my-ride-tab w-100 border-0 m-0" id="Tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pill-active-tab" data-bs-toggle="pill"
                    data-bs-target="#active-tab">Active Ride</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link " id="pill-pending-tab" data-bs-toggle="pill"
                    data-bs-target="#pending-tab">Pending Ride</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pill-complete-tab" data-bs-toggle="pill" data-bs-target="#complete-tab">
                    Complete Ride</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pill-cancel-tab" data-bs-toggle="pill" data-bs-target="#cancel-tab">Cancel
                    Ride</button>
            </li>
        </ul>
        <div class="custom-container">
            <div class="tab-content ride-content" id="TabContent">
                <div class="tab-pane fade active show" id="active-tab">
                    <ul class="my-ride-list">
                        <li>
                            <div class="my-ride-box">
                                <div class="my-ride-head">
                                    <a href="#" class="my-ride-img">
                                        <img class="img-fluid my-ride-icon" src="{{asset('assets/images/svg/car-img.svg')}}"
                                            alt="receipt">
                                    </a>

                                    <div class="my-ride-content flex-column">
                                        <div class="flex-spacing">
                                            <a href="#">
                                                <h6 class="title-color fw-medium">ID : 12000052</h6>
                                            </a>
                                            <span class="status accent-color fw-normal">Active</span>
                                        </div>
                                        <div class="flex-spacing  mt-2">
                                            <h6 class="fw-mediun success-color">$256</h6>
                                            <h6 class="fw-normal content-color">15 Feb'25 at 10:15 AM</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-ride-details">
                                    <div class="ride-info">
                                        <div class="ride-info-content">
                                            <div class="d-flex align-content-center gap-2 lh-base">
                                                <h5 class="fw-normal title-color">Aathryn Murphy</h5>
                                                <div class="flex-align-center gap-1">
                                                    <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                                    <h5 class="fw-normal title-color">4.8</h5>
                                                    <span class="count content-color fw-normal">(127)</span>
                                                </div>
                                            </div>
                                            <h6 class="fw-normal content-color mt-1">Tesla car</h6>
                                        </div>
                                        <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p5.png')}}"
                                            alt="p5">
                                    </div>

                                    <ul class="ride-location-listing mt-3">
                                        <li class="location-box">
                                            <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                alt="location">
                                            <h5 class="fw-light title-color">12, custber St, ottawa, Canada</h5>
                                        </li>

                                        <li class="location-box">
                                            <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                            <h5 class="fw-light title-color border-0">86, custber St, Toronto, Canada
                                            </h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="tab-pane fade" id="pending-tab">
                    <ul class="my-ride-list">
                        <li>
                            <div class="my-ride-box">
                                <div class="my-ride-head">
                                    <a href="{{url('user/pending-ride-details')}}" class="my-ride-img">
                                        <img class="img-fluid my-ride-icon" src="{{asset('assets/images/svg/car-img.svg')}}"
                                            alt="receipt">
                                    </a>

                                    <div class="my-ride-content flex-column">
                                        <div class="flex-spacing">
                                            <a href="{{url('user/pending-ride-details')}}">
                                                <h6 class="title-color fw-medium">ID : 12000018</h6>
                                            </a>
                                            <span class="status secondary-color fw-normal">Pending</span>
                                        </div>
                                        <div class="flex-spacing  mt-2">
                                            <h6 class="fw-mediun success-color">$239</h6>
                                            <h6 class="fw-normal content-color">10 Feb'25 at 9:39 AM</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-ride-details">
                                    <div class="ride-info">
                                        <div class="ride-info-content">
                                            <div class="d-flex align-content-center gap-2 lh-base">
                                                <h5 class="fw-normal title-color">David Bryan</h5>
                                                <div class="flex-align-center gap-1">
                                                    <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                                    <h5 class="fw-normal title-color">4.5</h5>
                                                    <span class="count content-color fw-normal">(110)</span>
                                                </div>
                                            </div>
                                            <h6 class="fw-normal content-color mt-1">Tesla car</h6>
                                        </div>
                                        <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p6.png')}}"
                                            alt="p5">
                                    </div>
                                    <ul class="ride-location-listing mt-3">
                                        <li class="location-box">
                                            <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                alt="location">
                                            <h5 class="fw-light title-color">17, Yonge St, Ottawa, Canada</h5>
                                        </li>

                                        <li class="location-box">
                                            <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                            <h5 class="fw-light title-color border-0">20, Yonge St, Toronto, Canada
                                            </h5>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="my-ride-box">
                                <div class="my-ride-head">
                                    <a href="{{url('user/pending-ride-details')}}" class="my-ride-img">
                                        <img class="img-fluid my-ride-icon" src="{{asset('assets/images/svg/car-img.svg')}}"
                                            alt="receipt">
                                    </a>

                                    <div class="my-ride-content flex-column">
                                        <div class="flex-spacing">
                                            <a href="{{url('user/pending-ride-details')}}">
                                                <h6 class="title-color fw-medium">ID : 12000052</h6>
                                            </a>
                                            <span class="status secondary-color fw-normal">Pending</span>
                                        </div>
                                        <div class="flex-spacing  mt-2">
                                            <h6 class="fw-mediun success-color">$150</h6>
                                            <h6 class="fw-normal content-color">15 Feb'25 at 10:15 AM</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-ride-details">
                                    <div class="ride-info">
                                        <div class="ride-info-content">
                                            <div class="d-flex align-content-center gap-2 lh-base">
                                                <h5 class="fw-normal title-color">Aathryn Murphy</h5>
                                                <div class="flex-align-center gap-1">
                                                    <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                                    <h5 class="fw-normal title-color">4.8</h5>
                                                    <span class="count content-color fw-normal">(127)</span>
                                                </div>
                                            </div>
                                            <h6 class="fw-normal content-color mt-1">Tesla car</h6>
                                        </div>
                                        <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p5.png')}}"
                                            alt="p5">
                                    </div>
                                    <ul class="ride-location-listing mt-3">
                                        <li class="location-box">
                                            <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                alt="location">
                                            <h5 class="fw-light title-color">12, custber St, ottawa, Canada</h5>
                                        </li>

                                        <li class="location-box">
                                            <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                            <h5 class="fw-light title-color border-0">86, custber St, Toronto, Canada
                                            </h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="tab-pane fade" id="complete-tab">
                    <ul class="my-ride-list">
                        <li>
                            <div class="my-ride-box">
                                <div class="my-ride-head">
                                    <a href="{{url('user/complete-ride-details')}}" class="my-ride-img">
                                        <img class="img-fluid my-ride-icon" src="{{asset('assets/images/svg/car-img.svg')}}"
                                            alt="receipt">
                                    </a>

                                    <div class="my-ride-content flex-column">
                                        <div class="flex-spacing">
                                            <a href="{{url('user/complete-ride-details')}}">
                                                <h6 class="title-color fw-medium">ID : 12403478</h6>
                                            </a>
                                            <span class="status success-color fw-normal">Complete</span>
                                        </div>
                                        <div class="flex-spacing  mt-2">
                                            <h6 class="fw-mediun success-color">$120</h6>
                                            <h6 class="fw-normal content-color">11 Feb'25 at 6:15 PM</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-ride-details">
                                    <div class="ride-info">
                                        <div class="ride-info-content">
                                            <div class="d-flex align-content-center gap-2 lh-base">
                                                <h5 class="fw-normal title-color">Lisa Smith</h5>
                                                <div class="flex-align-center gap-1">
                                                    <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                                    <h5 class="fw-normal title-color">4.4</h5>
                                                    <span class="count content-color fw-normal">(17)</span>
                                                </div>
                                            </div>
                                            <h6 class="fw-normal content-color mt-1">Tesla car</h6>
                                        </div>
                                        <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p2.png')}}"
                                            alt="p5">
                                    </div>
                                    <ul class="ride-location-listing mt-3">
                                        <li class="location-box">
                                            <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                alt="location">
                                            <h5 class="fw-light title-color">32, monstry cir, ottawa, Canada</h5>
                                        </li>

                                        <li class="location-box">
                                            <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                            <h5 class="fw-light title-color border-0">20, suberin St, Toronto, Canada
                                            </h5>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="tab-pane fade" id="cancel-tab">
                    <ul class="my-ride-list">
                        <li>
                            <div class="my-ride-box">
                                <div class="my-ride-head">
                                    <a href="{{url('user/cancel-ride-details')}}" class="my-ride-img">
                                        <img class="img-fluid my-ride-icon" src="{{asset('assets/images/svg/car-img.svg')}}"
                                            alt="receipt">
                                    </a>

                                    <div class="my-ride-content flex-column">
                                        <div class="flex-spacing">
                                            <a href="{{url('user/cancel-ride-details')}}">
                                                <h6 class="title-color fw-medium">ID : 124864052</h6>
                                            </a>
                                            <span class="status error-color fw-normal">Cancel</span>
                                        </div>
                                        <div class="flex-spacing  mt-2">
                                            <h6 class="fw-mediun success-color">$166</h6>
                                            <h6 class="fw-normal content-color">14 Feb'25 at 8:10 AM</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-ride-details">
                                    <div class="ride-info">
                                        <div class="ride-info-content">
                                            <div class="d-flex align-content-center gap-2 lh-base">
                                                <h5 class="fw-normal title-color">Mathyu Brown</h5>
                                                <div class="flex-align-center gap-1">
                                                    <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                                    <h5 class="fw-normal title-color">4.1</h5>
                                                    <span class="count content-color fw-normal">(12)</span>
                                                </div>
                                            </div>
                                            <h6 class="fw-normal content-color mt-1">Tesla car</h6>
                                        </div>
                                        <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p8.png')}}"
                                            alt="p5">
                                    </div>
                                    <ul class="ride-location-listing mt-3">
                                        <li class="location-box">
                                            <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                alt="location">
                                            <h5 class="fw-light title-color">20, suberin St, Toronto, Canada</h5>
                                        </li>

                                        <li class="location-box">
                                            <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                            <h5 class="fw-light title-color border-0">12, custber St, ottawa, Canada
                                            </h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- my ride section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- bottom navbar start -->
    @include('user-app.partials.bottom-navbar')
    <!-- bottom navbar end -->

    <!-- sidebar starts -->
    @include('user-app.partials.sidear')
    <!-- sidebar end -->

    @endsection

    @section('script')

@endsection
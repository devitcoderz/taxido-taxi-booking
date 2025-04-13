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
                <div class="flex-align-center gap-2">
                    <a href="#offcanvasLeft" data-bs-toggle="offcanvas">
                        <i class="iconsax icon-btn" data-icon="text-align-left"> </i>
                    </a>
                    <h3 class="categories-title"> My Ride</h3>
                </div>

                <div class="flex-align-center gap-sm-3 gap-2">
                    <a href="{{url('driver/chatting')}}">
                        <i class="iconsax icon-btn" data-icon="messages-2"> </i>
                    </a>
                    <a href="{{url('driver/notification')}}">
                        <i class="iconsax icon-btn noti-icon" data-icon="bell-2"> </i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- my ride section starts -->
    <section class="section-b-space">
        <ul class="nav nav-pills my-ride-tab w-100 border-0 m-0" id="Tab" role="tablist">

            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pill-pending-tab" data-bs-toggle="pill"
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
                <div class="tab-pane fade active show" id="pending-tab">
                    <ul class="my-ride-list driver-ride-list">
                        <li class="white-background">
                            <div class="my-ride-box">
                                <div class="my-ride-head">
                                    <a href="{{url('driver/pending-ride-details')}}" class="my-ride-img">
                                        <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p5.png')}}"
                                            alt="p5">
                                    </a>

                                    <div class="my-ride-content flex-column">
                                        <div class="flex-spacing">
                                            <a href="{{url('driver/pending-ride-details')}}">
                                                <h6 class="title-color fw-medium">Peter Thornton</h6>
                                            </a>
                                            <h5 class="fw-mediun success-color">$256</h5>
                                        </div>
                                        <div class="flex-align-center gap-3">
                                            <div class="flex-align-center gap-1">
                                                <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                                <h5 class="fw-normal title-color">4.8</h5>
                                                <span class="content-color fw-normal">(127)</span>
                                            </div>
                                            <div class="flex-align-center gap-1">
                                                <i class="iconsax icon" data-icon="route-1"> </i>
                                                <h6 class="fw-normal title-color">3 km</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-ride-details">
                                    <div class="ride-info">
                                        <h6 class="fw-normal title-color">15 May’25 at 10:15 AM</h6>
                                        <div class="flex-align-center gap-2">
                                            <a href="{{url('driver/chatting')}}">
                                                <img class="img-fluid communication-icon"
                                                    src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                            </a>
                                            <a href="tel:+4733378901">
                                                <img class="img-fluid communication-icon"
                                                    src="{{asset('assets/images/svg/call-fill.svg')}}" alt="call">
                                            </a>
                                        </div>
                                    </div>
                                    <ul class="ride-location-listing">
                                        <li class="border-0 shadow-none">
                                            <div class="location-box">
                                                <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                    alt="location">
                                                <h5 class="fw-light title-color">17, Yonge St, Toronto, Canada</h5>
                                            </div>
                                        </li>

                                        <li class="border-0 shadow-none">
                                            <div class="location-box">
                                                <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                <h5 class="fw-light title-color border-0">20, Yonge St, Toronto, Canada
                                                </h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <a href="{{url('driver/ride-verification')}}" class="btn theme-btn w-100 mt-3">Pickup Customer</a>

                            </div>
                        </li>
                    </ul>
                </div>

                <div class="tab-pane fade" id="complete-tab">
                    <ul class="my-ride-list driver-ride-list">
                        <li class="white-background">
                            <div class="my-ride-box">
                                <div class="my-ride-head">
                                    <a href="{{url('driver/complete-ride-details')}}" class="my-ride-img">
                                        <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p5.png')}}"
                                            alt="p5">
                                    </a>

                                    <div class="my-ride-content flex-column">
                                        <div class="flex-spacing">
                                            <a href="{{url('driver/complete-ride-details')}}">
                                                <h6 class="title-color fw-medium">Aathryn Murphy</h6>
                                            </a>
                                            <h5 class="fw-mediun success-color">$220</h5>
                                        </div>
                                        <div class="flex-align-center gap-3">
                                            <div class="flex-align-center gap-1">
                                                <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                                <h5 class="fw-normal title-color">4.6</h5>
                                                <span class="content-color fw-normal">(65)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-ride-details">
                                    <div class="ride-info">
                                        <h6 class="fw-normal title-color">4 May’25 at 9:10 AM</h6>
                                        <div class="flex-align-center gap-1">
                                            <i class="iconsax icon" data-icon="route-1"> </i>
                                            <h6 class="fw-normal title-color">2 km</h6>
                                        </div>
                                    </div>
                                    <ul class="ride-location-listing">
                                        <li class="border-0 shadow-none">
                                            <div class="location-box">
                                                <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                    alt="location">
                                                <h5 class="fw-light title-color">12, custber St, ottawa, Canada</h5>
                                            </div>
                                        </li>

                                        <li class="border-0 shadow-none">
                                            <div class="location-box">
                                                <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                <h5 class="fw-light title-color border-0">86, custber St, Toronto,
                                                    Canada
                                                </h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="white-background">
                            <div class="my-ride-box">
                                <div class="my-ride-head">
                                    <a href="{{url('driver/complete-ride-details')}}" class="my-ride-img">
                                        <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p4.png')}}"
                                            alt="p5">
                                    </a>

                                    <div class="my-ride-content flex-column">
                                        <div class="flex-spacing">
                                            <a href="complete-ride-details.blade.php">
                                                <h6 class="title-color fw-medium">Templeton Peck</h6>
                                            </a>
                                            <h5 class="fw-mediun success-color">$180</h5>
                                        </div>
                                        <div class="flex-align-center gap-3">
                                            <div class="flex-align-center gap-1">
                                                <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                                <h5 class="fw-normal title-color">4.2</h5>
                                                <span class="content-color fw-normal">(17)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-ride-details">
                                    <div class="ride-info">
                                        <h6 class="fw-normal title-color">18 May’25 at 4:40 PM</h6>
                                        <div class="flex-align-center gap-1">
                                            <i class="iconsax icon" data-icon="route-1"> </i>
                                            <h6 class="fw-normal title-color">1 km</h6>
                                        </div>
                                    </div>
                                    <ul class="ride-location-listing">
                                        <li class="border-0 shadow-none">
                                            <div class="location-box">
                                                <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                    alt="location">
                                                <h5 class="fw-light title-color">32, monstry cir, ottawa, Canada</h5>
                                            </div>
                                        </li>

                                        <li class="border-0 shadow-none">
                                            <div class="location-box">
                                                <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                <h5 class="fw-light title-color border-0">35, custber St, ottawa, Canada
                                                </h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="tab-pane fade" id="cancel-tab">
                    <ul class="my-ride-list driver-ride-list">
                        <li class="white-background">
                            <div class="my-ride-box">
                                <div class="my-ride-head">
                                    <a href="{{url('driver/cancel-ride-details')}}" class="my-ride-img">
                                        <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p5.png')}}"
                                            alt="p5">
                                    </a>

                                    <div class="my-ride-content flex-column">
                                        <div class="flex-spacing">
                                            <a href="{{url('driver/cancel-ride-details')}}">
                                                <h6 class="title-color fw-medium">Peter Thornton</h6>
                                            </a>
                                            <h5 class="fw-mediun success-color">$256</h5>
                                        </div>
                                        <div class="flex-align-center gap-3">
                                            <div class="flex-align-center gap-1">
                                                <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                                <h5 class="fw-normal title-color">4.8</h5>
                                                <span class="content-color fw-normal">(127)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-ride-details">
                                    <div class="ride-info">
                                        <h6 class="fw-normal title-color">5 May’25 at 2:10 PM</h6>
                                        <div class="flex-align-center gap-1">
                                            <i class="iconsax icon" data-icon="route-1"> </i>
                                            <h6 class="fw-normal title-color">1 km</h6>
                                        </div>
                                    </div>
                                    <ul class="ride-location-listing">
                                        <li class="border-0 shadow-none">
                                            <div class="location-box">
                                                <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                    alt="location">
                                                <h5 class="fw-light title-color">20, suberin St, Toronto, Canada</h5>
                                            </div>
                                        </li>

                                        <li class="border-0 shadow-none">
                                            <div class="location-box">
                                                <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                <h5 class="fw-light title-color border-0">12, custber St, ottawa, Canada
                                                </h5>
                                            </div>
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
    @include('driver-app.partials.bottom-navbar')
    <!-- bottom navbar end -->

    <!-- sidebar starts -->
    @include('driver-app.partials.sidebar')
    <!-- sidebar end -->

@endsection
@section('script')

@endsection
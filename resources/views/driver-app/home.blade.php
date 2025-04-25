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
    <header id="header" class="main-header">
        <div class="custom-container">
            <div class="header-panel">
                <div class="flex-align-center gap-2">
                    <a href="#offcanvasLeft" data-bs-toggle="offcanvas">
                        <i class="iconsax icon-btn" data-icon="text-align-left"> </i>
                    </a>
                    <img class="img-fluid logo" src="{{asset('assets/images/logo/driver/driver-logo-white.png')}}" alt="logo">
                </div>


                <div class="flex-align-center gap-sm-3 gap-2">
                    <a href="{{url('driver/notification')}}">
                        <i class="iconsax icon-btn noti-icon" data-icon="bell-2"> </i>
                    </a>

                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- earning section starts -->
    <section>
        <div class="custom-container">
            <ul class="total-ride-list mt-0 p-0">
                <li>
                    <a href="{{url('driver/wallet')}}" class="ride-box">
                        <div class="flex-spacing gap-1">
                            <h4>$3100</h4>
                            <div class="ride-icon">
                                <i class="iconsax icon" data-icon="wallet-open"> </i>
                            </div>
                        </div>
                        <div class="flex-spacing gap-1 mt-1">
                            <h6 class="d-flex flex-wrap">Total Earnings</h6>
                            <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('driver/my-rides')}}" class="ride-box">
                        <div class="flex-spacing gap-1">
                            <h4>16</h4>
                            <div class="ride-icon">
                                <i class="iconsax icon" data-icon="smart-car"> </i>
                            </div>
                        </div>
                        <div class="flex-spacing gap-1 mt-1">
                            <h6 class="d-flex flex-wrap">Complete Ride</h6>
                            <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{url('driver/my-rides')}}" class="ride-box">
                        <div class="flex-spacing gap-1">
                            <h4>02</h4>
                            <div class="ride-icon">
                                <i class="iconsax icon" data-icon="car"> </i>
                            </div>
                        </div>
                        <div class="flex-spacing gap-1 mt-1">
                            <h6 class="d-flex flex-wrap">Pending Ride</h6>
                            <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('driver/my-rides')}}" class="ride-box">
                        <div class="flex-spacing gap-1">
                            <h4>04</h4>
                            <div class="ride-icon">
                                <i class="iconsax icon" data-icon="driving"> </i>
                            </div>
                        </div>
                        <div class="flex-spacing gap-1 mt-1">
                            <h6 class="d-flex flex-wrap">Cancel Ride</h6>
                            <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <!-- earning section end -->

    <!-- upcoming ride section starts -->
    <section class="upcoming-ride-section ">
        <div class="custom-container">
            <div class="title">
                <h4>New Upcoming Ride</h4>
            </div>
            <ul class="my-ride-list driver-ride-list mt-0">
                <li>
                    <div class="my-ride-box">
                        <div class="my-ride-head">
                            <a href="{{url('driver/accept-ride')}}" class="my-ride-img">
                                <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p5.png')}}" alt="p5">
                            </a>

                            <div class="my-ride-content flex-column">
                                <div class="flex-spacing">
                                    <a href="{{url('driver/accept-ride')}}">
                                        <h5 class="title-color fw-medium">Peter Thornton</h5>
                                    </a>
                                    <div class="flex-align-center">
                                        <div class="flex-align-center gap-1 pe-2">
                                            <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                            <h5 class="fw-normal title-color p-0">4.8</h5>
                                        </div>
                                        <h5 class="fw-mediun theme-color price ps-2 pe-0">$256</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-ride-details">
                            <div class="ride-info">
                                <div class="flex-align-center gap-1">
                                    <img class="icon img-fluid" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                        alt="location">
                                    <h6 class="fw-normal title-color">10 km</h6>
                                </div>
                                <h6 class="fw-normal title-color">10 May’25 at 4:10 AM</h6>
                            </div>
                            <ul class="ride-location-listing">
                                <li class="border-0 shadow-none box-background">
                                    <div class="location-box bg-transparent">
                                        <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                            alt="location">
                                        <h5 class="fw-light title-color">17, Yonge St, Toronto, Canada</h5>
                                    </div>
                                </li>

                                <li class="border-0 shadow-none box-background">
                                    <div class="location-box bg-transparent">
                                        <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                        <h5 class="fw-light title-color border-0">20, Avenue St, Toronto, Canada</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="my-ride-box">
                        <div class="my-ride-head">
                            <a href="{{url('driver/accept-ride')}}" class="my-ride-img">
                                <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p6.png')}}" alt="p5">
                            </a>

                            <div class="my-ride-content flex-column">
                                <div class="flex-spacing">
                                    <a href="{{url('driver/accept-ride')}}">
                                        <h5 class="title-color fw-medium">Tony Danza</h5>
                                    </a>
                                    <div class="flex-align-center">
                                        <div class="flex-align-center gap-1 pe-2">
                                            <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                            <h5 class="fw-normal title-color p-0">4.4</h5>
                                        </div>
                                        <h5 class="fw-mediun theme-color price ps-2 pe-0">$158</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-ride-details">
                            <div class="ride-info">
                                <div class="flex-align-center gap-1">
                                    <img class="icon img-fluid" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                        alt="location">
                                    <h6 class="fw-normal title-color">8 km</h6>
                                </div>
                                <h6 class="fw-normal title-color">15 May’25 at 10:15 AM</h6>
                            </div>
                            <ul class="ride-location-listing">
                                <li class="border-0 shadow-none box-background">
                                    <div class="location-box bg-transparent">
                                        <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                            alt="location">
                                        <h5 class="fw-light title-color">10, Avenue St, Toronto, Canada</h5>
                                    </div>
                                </li>

                                <li class="border-0 shadow-none box-background">
                                    <div class="location-box bg-transparent">
                                        <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                        <h5 class="fw-light title-color border-0">35, Critch Cir, Toronto, Canada
                                        </h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- upcoming ride section end -->

    <!-- active offer section starts -->
    <section class="upcoming-ride-section">
        <div class="custom-container">
            <div class="title">
                <h4>Today’s Offer</h4>
            </div>
            <ul class="my-ride-list driver-ride-list mt-0">
                @foreach($userriderequests as $userriderequest)
                <li>
                    <div class="my-ride-box">
                        <div class="my-ride-head">
                            <a href="{{route('driver.accept_ride',['id'=>$userriderequest->id])}}" class="my-ride-img">
                                <img class="img-fluid profile-img" src="{{ $userriderequest->user->profile ? asset('storage/'.$userriderequest->user->profile) : asset('assets/images/profile/p5.png') }}" alt="p5">
                            </a>

                            <div class="my-ride-content flex-column">
                                <div class="flex-spacing">
                                    <a href="{{route('driver.accept_ride',['id'=>$userriderequest->id])}}">
                                        <h5 class="title-color fw-medium">{{ $userriderequest->user->name }}</h5>
                                    </a>
                                    <div class="flex-align-center">
                                        <div class="flex-align-center gap-1 pe-2">
                                            <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                            <h5 class="fw-normal title-color p-0">4.8</h5>
                                        </div>
                                        <h5 class="fw-mediun theme-color price ps-2 pe-0">${{ $userriderequest->fare }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-ride-details">
                            <div class="ride-info">
                                <div class="flex-align-center gap-1">
                                    <img class="icon img-fluid" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                         alt="location">
                                    <h6 class="fw-normal title-color">{{ $userriderequest->distance }} km</h6>
                                </div>
                                <h6 class="fw-normal title-color">{{ $userriderequest->delivery_date }}</h6>
                            </div>
                            <ul class="ride-location-listing">
                                <li class="border-0 shadow-none box-background">
                                    <div class="location-box bg-transparent">
                                        <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                             alt="location">
                                        <h5 class="fw-light title-color">{{ $userriderequest->pickup_location }}</h5>
                                    </div>
                                </li>

                                <li class="border-0 shadow-none box-background">
                                    <div class="location-box bg-transparent">
                                        <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                        <h5 class="fw-light title-color border-0">{{ $userriderequest->destination_location }}</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </section>
    <!-- active offer section end -->

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

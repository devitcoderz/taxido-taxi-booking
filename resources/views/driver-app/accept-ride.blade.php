@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
@endsection

@section('style')


@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header position-absolute bg-transparent">
        <div class="custom-container">
            <div class="header-panel p-0">
                <a href="{{url('driver/home')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- Select ride section starts -->
    <div class="location-map position-relative w-100 h-100" id="map"></div>
    <div class="theme-content-bg ride-content-bg">
        <form action="{{ route('driver.request_fare') }}" method="post">
            @csrf
            <input type="hidden" name="userriderequest_id" value="{{ $userriderequest->id }}">
            <div class="my-ride-box">
                <div class="my-ride-head">
                    <a href="{{url('driver/accept-ride-confirmed')}}" class="my-ride-img">
                        <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p4.png')}}" alt="p5">
                    </a>

                    <div class="my-ride-content flex-column">
                        <div class="flex-spacing">
                            <a href="#">
                                <h5 class="p-0 title-color fw-medium">Peter Thornton</h5>
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
                            <img class="icon img-fluid" src="{{asset('assets/images/svg/location-fill.svg')}}" alt="location">
                            <h6 class="fw-normal title-color">{{ $userriderequest->distance }} km</h6>
                        </div>
                        <h6 class="fw-normal title-color">{{ $userriderequest->delivery_date }}</h6>
                    </div>
                    <ul class="ride-location-listing">
                        <li class="border-0 shadow-none">
                            <div class="location-box">
                                <img class="icon bg-transparent" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                    alt="location">
                                <h5 class="fw-light title-color px-0">{{ $userriderequest->pickup_location }}</h5>
                            </div>
                        </li>

                        <li class="border-0 shadow-none">
                            <div class="location-box">
                                <img class="icon bg-transparent" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                <h5 class="fw-light title-color px-0 border-0">{{ $userriderequest->pickup_location }}
                                </h5>
                            </div>
                        </li>
                    </ul>
                </div>

                <h5 class="mt-3 mb-2 px-0 fw-medium title-color">Offer Your Fare</h5>

                <div class="fare-box">
                    <div class="icon sub"> -10 </div>
                    <input type="number" value="{{ $userriderequest->fare }}" name="requested_fare" min="1" max="1000">
                    <div class="icon add"> +10 </div>
                </div>

            </div>

            <button type="submit" class="btn theme-btn w-100 mt-3">Request Fare</button>
            <a href="{{route('driver.accept_ride_confirmed',['userriderequest_id' => $userriderequest->id])}}" class="btn theme-btn w-100 mt-3">Accept Fare on ${{ $userriderequest->fare }}</a>
        </form>
    </div>
@endsection
@section('script')
    <!-- map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>
    <script src="{{asset('assets/js/custom-map.js')}}"></script>

    <!-- iconsax js -->
    <script src="{{asset('assets/js/quantity.js')}}"></script>

@endsection

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
                <a href="{{url('user/home')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>

                <h3 class="fw-medium  title-color">Targeted Transport Routes</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- active offer section starts -->
    <section class="upcoming-ride-section">
        <div class="custom-container">
            <div class="title">
                <h4>Carrier's Routes</h4>
            </div>
            <ul class="my-ride-list driver-ride-list mt-0" id="userRideList">
                @forelse($matches as $match)
                    <li>
                        <div class="my-ride-box">
                            <form action="{{ url('user/select-ride-targetted') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $pickupAddress ? $pickupAddress : '' }}" id="pickupAddress" name="pickup_location">
                                <input type="hidden" value="{{ $destinationAddress ? $destinationAddress : '' }}" id="destinationAddress" name="destination_location">
                                <input type="hidden" id="distance" name="distance">
                                <input type="hidden" value="{{ $match->driver_id }}" name="driver_id">
                                <div class="my-ride-head">
                                    <button type="submit" class="my-ride-img btn btn-outline-none">
                                        <img class="img-fluid profile-img"
                                             src="{{ $match->user?->profile ? asset('storage/' . $match->user->profile) : asset('assets/images/profile/p5.png') }}"
                                             alt="p5">
                                    </button>

                                    <div class="my-ride-content flex-column">
                                        <div class="flex-spacing">
                                            <button type="submit" class="btn btn-outline-none">
                                                <h5 class="title-color fw-medium">{{ $match->user?->name }}</h5>
                                            </button>
                                            <div class="flex-align-center">
                                                <div class="flex-align-center gap-1 pe-2">
                                                    <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                                    <h5 class="fw-normal title-color p-0">4.8</h5>
                                                </div>
                                                {{--                                            <h5 class="fw-mediun theme-color price ps-2 pe-0">{{ $match->fare_currency }} {{ $match->fare }}</h5>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="my-ride-details">
                                <div class="ride-info">
                                    <div class="flex-align-center gap-1">
                                        <img class="icon img-fluid" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                             alt="location">
                                        <h6 class="fw-normal title-color">{{ $match->distance }} km</h6>
                                    </div>
                                    <h6 class="fw-normal title-color">{{ $match->departure_date }}</h6>
                                </div>
                                <div class="d-flex flex-row">
                                    @php
                                        $parcel_pictures = $match->parcel_pictures ? json_decode($match->parcel_pictures) : '';
                                    @endphp
                                    @if($parcel_pictures)
                                        @foreach($parcel_pictures as $parcel_picture)
                                            <img src="{{ asset('storage/'. $parcel_picture) }}" class="me-1" width="50" height="50" alt="loading">
                                        @endforeach
                                    @endif
                                </div>
                                <ul class="ride-location-listing">
                                    <li class="border-0 shadow-none box-background">
                                        <div class="location-box bg-transparent">
                                            <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                 alt="location">
                                            <h5 class="fw-light title-color">{{ $match->pickup_location }}</h5>
                                        </div>
                                    </li>

                                    @php
                                        $locations = json_decode($match->destination_location, true); // returns array
                                    @endphp

                                    @foreach($locations as $location)
                                        <li class="border-0 shadow-none box-background">
                                            <div class="location-box bg-transparent">
                                                <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                <h5 class="fw-light title-color border-0">{{ $location }}</h5>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </li>
                @empty
                    <p>No Carrier Available for This Route.</p>
                @endforelse
            </ul>
        </div>
    </section>
    <!-- active offer section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    @endsection

    @section('script')

        <!-- swiper js -->
        <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/custom-swiper.js')}}"></script>

        <script>
            function initMap() {
                const pickupAddress = document.getElementById('pickupAddress').value;
                const destinationAddress = document.getElementById('destinationAddress').value;

                if (!pickupAddress || !destinationAddress) return;

                const geocoder = new google.maps.Geocoder();
                const directionsService = new google.maps.DirectionsService();

                geocoder.geocode({ address: pickupAddress }, function (pickupResults, pickupStatus) {
                    if (pickupStatus === "OK") {
                        geocoder.geocode({ address: destinationAddress }, function (destResults, destStatus) {
                            if (destStatus === "OK") {
                                const request = {
                                    origin: pickupResults[0].formatted_address,
                                    destination: destResults[0].formatted_address,
                                    travelMode: 'DRIVING'
                                };

                                directionsService.route(request, function (result, status) {
                                    if (status === 'OK') {
                                        let totalDistance = 0;
                                        result.routes[0].legs.forEach(leg => {
                                            totalDistance += leg.distance.value; // in meters
                                        });

                                        const distanceInKm = (totalDistance / 1000).toFixed(2);
                                        console.log(`Distance: ${distanceInKm} km`);
                                        document.getElementById('distance').value = distanceInKm;
                                    } else {
                                        console.error("Route request failed:", status);
                                    }
                                });
                            } else {
                                console.error("Destination geocoding failed:", destStatus);
                            }
                        });
                    } else {
                        console.error("Pickup geocoding failed:", pickupStatus);
                    }
                });
            }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&libraries=places,geometry&callback=initMap" async defer></script>

@endsection

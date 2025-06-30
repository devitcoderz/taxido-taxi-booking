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
    @include('user-app.partials.header')
    <!-- header end -->

    <style>
        .search-button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            position: absolute; /* position as needed */
            right: 50px; /* adjust to align with icon */
            top: 50%;
            transform: translateY(-50%);
        }
    </style>

    <!-- search section starts -->
    <section class="home-profile-section section-b-space pt-0">
        <div class="custom-container">
            <form action="{{url('user/targeted-transport-route')}}" method="get">
                @csrf
                <div class="form-input">
                    <input type="search" name="desination_location" class="form-control with-icon"
                           placeholder="Search for a targeted transport route" id="pac-input1">
                    <input type="hidden" name="pickup_location" class="form-control with-icon" id="pac-input2">
                    <button type="submit" class="search-button">
                        <i class="iconsax search-icon" data-icon="search-normal-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </section>
    <!-- search section end -->

    <!-- slider section starts -->
    <section>
        <div class="swiper banner1 home-banner">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="img-fluid slider-img w-100" src="{{asset('assets/images/slider/slider1.png')}}" alt="slider">
                </div>
                <div class="swiper-slide">
                    <img class="img-fluid slider-img w-100" src="{{asset('assets/images/slider/slider2.png')}}" alt="slider">
                </div>
            </div>
        </div>
    </section>
    <!-- slider section end -->

    <!-- category section starts -->
    <section>
        <div class="title px-20">
            <h3>Top Categories</h3>
        </div>

        <ul class="categories-list px-20">
            <li>
                <a href="{{url('user/search-location')}}" class="categories-box">
                    <div class="d-flex flex-column flex-nowrap justify-content-between h-100">
                        <h6>Ride</h6>
                        <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>
                    </div>
                    <img class="img-fluid categories-img" src="{{asset('assets/images/categories/1.svg')}}" alt="c1">
                </a>
            </li>
            <li>
                <a href="{{url('user/outstation')}}" class="categories-box">
                    <div class="d-flex flex-column flex-nowrap justify-content-between h-100">
                        <h6>Outstation</h6>
                        <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>

                    </div>
                    <img class="img-fluid categories-img" src="{{asset('assets/images/categories/2.svg')}}" alt="c1">
                </a>
            </li>
            <li>
                <a href="{{url('user/rental')}}" class="categories-box">
                    <div class="d-flex flex-column flex-nowrap justify-content-between h-100">
                        <h6>Rental</h6>
                        <i class="iconsax arrow-icon" data-icon="arrow-right"> </i>
                    </div>
                    <img class="img-fluid categories-img" src="{{asset('assets/images/categories/3.svg')}}" alt="c1">
                </a>
            </li>
        </ul>
    </section>
    <!-- category section end -->

    <!-- offer section starts -->
    <section>
        <div class="custom-container">
            <div class="title">
                <h3>Today’s Offer</h3>
            </div>

            <div class="row gy-3">
                <div class="col-12">
                    <div class="coupon-box">
                        <div class="coupon-details">
                            <div class="coupon-content">
                                <a href="{{url('user/accept-ride-details')}}" class="coupon-name">
                                    <img class="img-fluid coupon-img" src="{{asset('assets/images/profile/p6.png')}}" alt="c1">
                                    <div>
                                        <h5 class="fw-normal title-color">Johnson Smith</h5>
                                    </div>
                                </a>
                                <div class="rating">
                                    <img class="img-fluid star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                    <h6>4.5</h6>
                                </div>
                            </div>
                            <p>Up to 10 km from Wankover city area</p>

                            <ul class="content-list">
                                <li><i class="iconsax icon" data-icon="car"></i>Mini Sedan</li>
                                <li><i class="iconsax icon" data-icon="user-1"></i>4 Person</li>
                            </ul>
                            <div class="flex-align-center pt-2">
                                <h6 class="content-color fw-normal">Valid till: 4/5/2025</h6>
                            </div>
                        </div>
                        <div class="coupon-discount">20% OFF</div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="coupon-box">
                        <div class="coupon-details">
                            <div class="coupon-content">
                                <a href="{{url('user/accept-ride-details')}}" class="coupon-name">
                                    <img class="img-fluid coupon-img" src="{{asset('assets/images/profile/p5.png')}}" alt="c1">
                                    <div>
                                        <h5 class="fw-normal title-color">mike Dowson</h5>
                                    </div>
                                </a>
                                <div class="rating">
                                    <img class="img-fluid star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                    <h6>4.2</h6>
                                </div>
                            </div>
                            <p>Up to 50 km from Wankover city area</p>

                            <ul class="content-list">
                                <li><i class="iconsax icon" data-icon="car"></i>Mini Sedan</li>
                                <li><i class="iconsax icon" data-icon="user-1"></i>4 Person</li>
                            </ul>
                            <div class="flex-align-center pt-2">
                                <h6 class="content-color fw-normal">Valid till: 14/5/2025</h6>
                            </div>
                        </div>
                        <div class="coupon-discount">50% OFF</div>

                    </div>
                </div>

                <div class="col-12">
                    <div class="coupon-box">
                        <div class="coupon-details">
                            <div class="coupon-content">
                                <a href="{{url('user/accept-ride-details')}}" class="coupon-name">
                                    <img class="img-fluid coupon-img" src="{{asset('assets/images/profile/p4.png')}}" alt="c1">
                                    <div>
                                        <h5 class="fw-normal title-color">Aathryn Murphy</h5>
                                    </div>
                                </a>
                                <div class="rating">
                                    <img class="img-fluid star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                    <h6>4.3</h6>
                                </div>
                            </div>
                            <p>Up to 15 km from Wankover city area</p>

                            <ul class="content-list">
                                <li><i class="iconsax icon" data-icon="car"></i>Mini Sedan</li>
                                <li><i class="iconsax icon" data-icon="user-1"></i>4 Person</li>
                            </ul>
                            <div class="flex-align-center pt-2">
                                <h6 class="content-color fw-normal">Valid till: 21/5/2025</h6>
                            </div>
                        </div>
                        <div class="coupon-discount">30% OFF</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- offer section end -->

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

    <!-- swiper js -->
    <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/custom-swiper.js')}}"></script>

    <script>
        let destinationLocation = null;

        function preventFormSubmitOnEnter(inputElement) {
            inputElement.addEventListener("keydown", function (e) {
                if (e.key === "Enter") e.preventDefault();
            });
        }

        function initMap() {
            // Pickup Location
            const input1 = document.getElementById("pac-input1");
            preventFormSubmitOnEnter(input1);
            const autocomplete1 = new google.maps.places.Autocomplete(input1, {
                fields: ["geometry", "formatted_address"],
            });
            autocomplete1.addListener("place_changed", () => {
                const place = autocomplete1.getPlace();
                if (!place.geometry) return;
                destinationLocation = place;
            });

            // Autofill Pickup Location using Geolocation + Geocoder
            const pickupInput = document.getElementById("pac-input2");
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((position) => {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;

                    const geocoder = new google.maps.Geocoder();
                    const latlng = { lat, lng };

                    geocoder.geocode({ location: latlng }, (results, status) => {
                        if (status === "OK" && results[0]) {
                            pickupInput.value = results[0].formatted_address;
                        } else {
                            console.warn("Geocoder failed due to: " + status);
                        }
                    });
                }, (error) => {
                    console.warn("Geolocation error:", error.message);
                });
            } else {
                console.warn("Geolocation is not supported by this browser.");
            }

        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&libraries=places,geometry&callback=initMap" async defer></script>

@endsection

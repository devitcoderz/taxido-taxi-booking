@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')

    <!-- header starts -->
    <header id="header" class="main-header inner-page-header position-absolute bg-transparent">
        <div class="custom-container">
            <div class="header-panel p-0">
                <a href="{{url('user/choose-rider')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- Select ride section starts -->
    <div class="location-map position-relative w-100 h-100" id="map"></div>

    <div class="theme-content-bg">
        <h5>Vehicle Type</h5>
        <ul class="ride-tab">
            <li class="w-100">
                <input type="radio" class="btn-check" name="options-base" id="btn-check-1" checked>
                <label class="btn selact-ride-box" for="btn-check-1">

                    <img class="img-fluid vehicle-img mt-0" src="{{asset('assets/images/svg/bike-img.svg')}}" alt="bike">
                    <span class="flex-spacing">
                        <span class="title-color text-start vehicle-name">Bike</span>
                        <a href="#vehicle-details" data-bs-toggle="offcanvas">
                            <i class="iconsax icon" data-icon="info-circle"> </i>
                        </a>
                    </span>
                </label>
            </li>

            <li class="w-100">
                <input type="radio" class="btn-check" name="options-base" id="btn-check-2">
                <label class="btn selact-ride-box" for="btn-check-2">

                    <img class="img-fluid vehicle-img mt-0" src="{{asset('assets/images/svg/car-img.svg')}}" alt="bike">
                    <span class="flex-spacing">
                        <span class="title-color text-start vehicle-name">Car</span>
                        <a href="#vehicle-details" data-bs-toggle="offcanvas">
                            <i class="iconsax icon" data-icon="info-circle"> </i>
                        </a>
                    </span>
                </label>
            </li>

            <li class="w-100">
                <input type="radio" class="btn-check" name="options-base" id="btn-check-3">
                <label class="btn selact-ride-box" for="btn-check-3">

                    <img class="img-fluid vehicle-img mt-0" src="{{asset('assets/images/svg/auto-img.svg')}}" alt="bike">
                    <span class="flex-spacing">
                        <span class="title-color text-start vehicle-name">Auto</span>
                        <a href="#vehicle-details" data-bs-toggle="offcanvas">
                            <i class="iconsax icon" data-icon="info-circle"> </i>
                        </a>
                    </span>
                </label>
            </li>
        </ul>

        <p class="price-content">Minimum price for this fare is <span class="fw-semibold">$80</span> per
            ride. you can bid your price below.
        </p>

        <form class="theme-form px-20" method="post" action="{{ route('user.driver_fare_request') }}">
            @csrf
            <input type="hidden" name="pickup_location" value="{{ $request->pickup_location }}">
            <input type="hidden" name="destination_location" value="{{ $request->destination_location }}">
            <div class="form-group">
                <label class="form-label mb-2" for="Inputstreet">Offer your fare</label>
                <input type="text" class="form-control" id="Inputstreet" placeholder="Enter fare amount" name="fare">
            </div>
            <div class="form-group">
                <label class="form-label mb-2" for="delivery_date">Select Date and Time</label>
                <input type="text" class="form-control" id="delivery_date" name="delivery_date">
            </div>

            <h5 class="p-0 mt-3 mb-2 fw-medium title-color">Payment Method</h5>
            <div class="order-type">
                <div class="flex-spacing gap-3 w-100">
                    <div class="form-check form-check3">
                        <input class="form-check-input" type="radio" value="cash" name="payment_method" id="fixed45" checked>
                        <label class="form-check-label box-background" for="fixed45">
                            <span class="check-box"></span>
                            <span class="name">Cash</span>
                        </label>
                    </div>

                    <div class="form-check form-check3">
                        <input class="form-check-input" value="online" type="radio" name="payment_method" id="fixed469">
                        <label class="form-check-label box-background" for="fixed469">
                            <span class="check-box"></span>
                            <span class="name">Online-Payment</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="custom-container">
                <button type="submit" class="btn theme-btn w-100 my-3 auth-btn">Book Ride</button>
            </div>
        </form>
    </div>
    <!-- Select ride section end -->


    <!-- vehicle offcanvas starts -->
    <div class="offcanvas offcanvas-bottom ride-offcanvas" tabindex="-1" id="vehicle-details">
        <div class="offcanvas-body p-0">
            <div class="vehicle-details-head">
                <div class="d-flex align-content-center">
                    <h4 class="vehicle-title" id="offcanvasBottomLabel">Tesla car</h4>
                    <div class="flex-align-center gap-1 ">
                        <img class="icon ps-1" src="{{asset('assets/images/svg/profile-fill.svg')}}" alt="profile">
                        <span class="fw-normal title-color">4</span>
                    </div>
                </div>
                <h3 class="success-color fw-semibold">$50 <span class="fw-normal content-color"><del>$57</del></span>
                </h3>
            </div>
            <div class="vehicle-details">
                <div class="vehicle-image">
                    <img class="img-fluid vehicle" src="{{asset('assets/images/svg/car-img.svg')}}" alt="car">
                </div>
                <div class="timing">
                    <i class="iconsax icon" data-icon="clock"> </i>
                    <h5>5 min away</h5>
                </div>
                <h6 class="fw-normal content-color pt-1">Comfortable sedans, top-quality drivers</h6>
            </div>
            <div class="terms-section">
                <h5>Terms</h5>
                <ul class="terms-list">
                    <li>No Smoking and Drinking </li>
                    <li>Not damage interior in Vehicle</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- vehicle offcanvas end -->

    @endsection

    @section('script')

        <!-- map js -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>
        <script src="{{asset('assets/js/custom-map.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            flatpickr("#delivery_date", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                minDate: "today"  // Optional: disables past dates
            });
        </script>
@endsection

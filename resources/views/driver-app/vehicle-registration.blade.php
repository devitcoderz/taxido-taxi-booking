@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
@endsection

@section('style')

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="auth-header inner-page-header white-background pb-3">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('driver/driver-document-verify')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <img class="img-fluid logo" src="{{asset('assets/images/logo/driver/driver-logo.png')}}" alt="logo">
                <img class="img-fluid logo-dark" src="{{asset('assets/images/logo/driver/driver-logo-dark.png')}}" alt="logo">
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- header starts -->
    <form method="POST" class="auth-form" action="{{route('driver.vehicle-registration')}}" enctype="multipart/form-data">
    <section class="auth-content-bg">
        <div class="custom-container">
            <ul class="line-design">
                <li class="active"></li>
                <li class="active"></li>
                <li></li>
            </ul>

            <div class="auth-title">
                <h2>Vehicle Registration</h2>
                <h6>Explore your life by joining with Ride.</h6>
            </div>

            <ul class="vehicle-types-list">
                <li>
                    <input type="radio" class="btn-check" name="options" id="btn-check-1">
                    <label class="btn vehicle-type-button" for="btn-check-1"> <img class="img-fluid vehicle-img"
                            src="{{asset('assets/images/svg/bike-img2.svg')}}" alt="bike">
                        Bike
                    </label>
                </li>
                <li>
                    <input type="radio" class="btn-check" name="options" id="btn-check-2">
                    <label class="btn vehicle-type-button" for="btn-check-2"> <img class="img-fluid vehicle-img"
                            src="{{asset('assets/images/svg/car-img2.svg')}}" alt="car">
                        Car
                    </label>
                </li>
                <li>
                    <input type="radio" class="btn-check" name="options" id="btn-check-3">
                    <label class="btn vehicle-type-button" for="btn-check-3"> <img class="img-fluid vehicle-img"
                            src="{{asset('assets/images/svg/van-img2.svg')}}" alt="van">
                        Van
                    </label>
                </li>
                <li>
                    <input type="radio" class="btn-check" name="options" id="btn-check-4">
                    <label class="btn vehicle-type-button" for="btn-check-4"> <img class="img-fluid vehicle-img"
                            src="{{asset('assets/images/svg/bus-img2.svg')}}" alt="bus">
                        Bus
                    </label>
                </li>
            </ul>

            @php
                $user_id = $user_id ?? (Auth::guard('driver')->check() ? Auth::guard('driver')->id() : null);
            @endphp

            @if($user_id)
                <input type="hidden" name="user_id" value="{{ $user_id }}">
            @else
                <script>window.location.href = "{{ url('driver/signup') }}";</script>
            @endif
                @csrf
                <div class="form-group mt-0">
                    <label class="form-label mb-2" for="Inputname">Vehicle Name</label>
                    <div class="position-relative">
                        <input type="text" class="form-control white-background" name="vehicle_name" id="Inputname"
                            placeholder="Enter vehicle name">
                        <i class="iconsax icon" data-icon="car"></i>
                    </div>
                </div>
                <div class="form-group ">

                    <label class="form-label mb-2" for="Inputdate">Registration Date</label>
                    <div class="position-relative">
                        <input type="date" class="form-control white-background" name="registeration_date" id="Inputdate">
                        <i class="iconsax icon" data-icon="calendar-1"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label mb-2" for="InputVehicle">Select Vehicle Type</label>
                    <div class="position-relative">
                        <input type="text" class="form-control white-background" name="vehicle_type" id="InputVehicle"
                            placeholder="Enter vehicle type">
                        <i class="iconsax icon" data-icon="car"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label mb-2" for="InputColor">Vehicle Color</label>
                    <div class="position-relative">
                        <input type="text" class="form-control white-background" name="vehicle_color" id="InputColor"
                            placeholder="Enter vehicle color">
                        <i class="iconsax icon" data-icon="color-filter"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label mb-2" for="Inputseats">Maximum Seats</label>
                    <div class="position-relative">
                        <input type="number" class="form-control white-background" name="max_seats" id="Inputseats"
                            placeholder="Enter maximum seats">
                        <i class="iconsax icon" data-icon="users"></i>
                    </div>
                </div>

        </div>
    </section>

    <section class="rules-section pt-0 section-b-space">
        <div class="custom-container">
            <h3 class="fw-semibold title-color mb-3">Select Your Rule</h3>
            <div class="form-check mb-2">
                <label class="form-check-label" for="check1">
                    Max, 2 in the back
                </label>
                <input class="form-check-input" type="checkbox" name="rule[]" value="Max, 2 in the back" id="check1" checked>
            </div>
            <div class="form-check mb-2">
                <label class="form-check-label" for="check2">
                    Food is not allowed to be eaten in cars.
                </label>
                <input class="form-check-input" type="checkbox" value="Food is not allowed to be eaten in cars." name="rule[]" id="check2">
            </div>
            <div class="form-check mb-2">
                <label class="form-check-label" for="check3">
                    I apologize, but this is not a pet
                </label>
                <input class="form-check-input" type="checkbox" value="I apologize, but this is not a pet" name="rule[]" id="check3">
            </div>
            <div class="form-check mb-2">
                <label class="form-check-label" for="check4">
                    Please, no smoking in the car
                </label>
                <input class="form-check-input" type="checkbox" value="Please, no smoking in the car" name="rule[]" id="check4">
            </div>
            <div class="form-check mb-0">
                <label class="form-check-label" for="check5">
                    No alcohol closed/open
                </label>
                <input class="form-check-input" type="checkbox" value="No alcohol closed/open" name="rule[]" id="check5">
            </div>
        </div>
    </section>
    <div class="fixed-btn">
        <div class="custom-container">
            <button type="submit" class="btn theme-btn w-100 mt-0 auth-btn">Next</a>
        </div>
    </div>
    </form>
    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

@endsection
@section('script')


@endsection

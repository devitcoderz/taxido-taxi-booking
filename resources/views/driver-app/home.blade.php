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

    <!-- upcoming ride section starts -->
    <section class="upcoming-ride-section d-none">
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
            <ul class="my-ride-list driver-ride-list mt-0" id="userRideList">
                @forelse($userriderequests as $userriderequest)
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
                                        <h5 class="fw-mediun theme-color price ps-2 pe-0">{{ $userriderequest->fare_currency }} {{ $userriderequest->fare }}</h5>
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
                                <h6 class="fw-normal title-color">{{ $userriderequest->departure_date }}</h6>
                            </div>
                            @php
                                $means = json_decode($userriderequest->means_of_transport, true);
                            @endphp
                            <div class="d-flex flex-column">
                                <p>Type of Package :- {{ $userriderequest->packagetype->title }}</p>
                                <p>Sub Type of Package :- {{ $userriderequest->packagesubtype->title }}</p>
                                <p>Length of Package :- {{ $userriderequest->length_of_package }}</p>
                                <p>Width of Package :- {{ $userriderequest->width_of_package }}</p>
                                <p>Weight of Package :- {{ $userriderequest->weight_of_package }}</p>
                                <p>Quantity of Package :- {{ $userriderequest->quantity_of_package }}</p>
                                <p>Mean of Transports :- {{ is_array($means) ? implode(', ', $means) : '' }}</p>
                                <p>Comments :- {{ $userriderequest->comments }}</p>
                            </div>
                            <div class="d-flex flex-row">
                                @php
                                $parcel_pictures = $userriderequest->parcel_pictures ? json_decode($userriderequest->parcel_pictures) : '';
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
                                        <h5 class="fw-light title-color">{{ $userriderequest->pickup_location }}</h5>
                                    </div>
                                </li>

                                @php
                                    $locations = json_decode($userriderequest->destination_location, true); // returns array
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
                    <p>No Ride requests available.</p>
                @endforelse
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

    <script>
        setInterval(() => {
            console.log("Timeout triggered");  // Debug
            getUserRideRequest();
        }, 10000);

        function getUserRideRequest() {
            $.ajax({
                url: `/user/get-user-ride-request`,
                method: 'GET',
                success: function(response) {
                    if (response && response.length) {
                        let html = '';

                        response.forEach(ride => {
                            // Parse destination_location
                            let destinations = [];
                            try {
                                destinations = JSON.parse(ride.destination_location);
                            } catch (e) {
                                destinations = [ride.destination_location];
                            }

                            let destinationHtml = destinations.map(dest => `
                        <li class="border-0 shadow-none box-background">
                            <div class="location-box bg-transparent">
                                <img class="icon" src="/assets/images/svg/gps.svg" alt="gps">
                                <h5 class="fw-light title-color border-0">${dest}</h5>
                            </div>
                        </li>`).join('');

                            // Parse parcel_pictures
                            let parcelPicturesHtml = '';
                            if (ride.parcel_pictures) {
                                try {
                                    const pictures = JSON.parse(ride.parcel_pictures);
                                    parcelPicturesHtml = pictures.map(pic => `
                                <img src="/storage/${pic}" class="me-1" width="50" height="50" alt="parcel">
                            `).join('');
                                } catch (e) {
                                    console.warn("Invalid parcel_pictures JSON:", e);
                                }
                            }

                            let transportData = ride.means_of_transport; // e.g. '["1","7"]'
                            let transportArray = [];

                            try {
                                transportArray = JSON.parse(transportData);
                            } catch (e) {
                                console.error("Invalid JSON:", transportData);
                            }

                            let displayText = Array.isArray(transportArray) ? transportArray.join(', ') : '';

                            let profileImg = ride.user.profile
                                ? `/storage/${ride.user.profile}`
                                : '/assets/images/profile/p5.png';

                            html += `
                    <li>
                        <div class="my-ride-box">
                            <div class="my-ride-head">
                                <a href="/driver/accept-ride/${ride.id}" class="my-ride-img">
                                    <img class="img-fluid profile-img" src="${profileImg}" alt="profile">
                                </a>
                                <div class="my-ride-content flex-column">
                                    <div class="flex-spacing">
                                        <a href="/driver/accept-ride/${ride.id}">
                                            <h5 class="title-color fw-medium">${ride.user.name}</h5>
                                        </a>
                                        <div class="flex-align-center">
                                            <div class="flex-align-center gap-1 pe-2">
                                                <img class="star" src="/assets/images/svg/star.svg" alt="star">
                                                <h5 class="fw-normal title-color p-0">4.8</h5>
                                            </div>
                                            <h5 class="fw-mediun theme-color price ps-2 pe-0">${ride.fare_currency} ${ride.fare}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="my-ride-details">
                                <div class="ride-info">
                                    <div class="flex-align-center gap-1">
                                        <img class="icon img-fluid" src="/assets/images/svg/location-fill.svg" alt="location">
                                        <h6 class="fw-normal title-color">${ride.distance} km</h6>
                                    </div>
                                    <h6 class="fw-normal title-color">${ride.departure_date}</h6>
                                </div>

                                <div class="d-flex flex-column">
                                    <p>Type of Package :- ${ride.packagetype.title}</p>
                                    <p>Sub Type of Package :- ${ride.packagesubtype.title}</p>
                                    <p>Length of Package :- ${ride.length_of_package}</p>
                                    <p>Width of Package :- ${ride.width_of_package}</p>
                                    <p>Weight of Package :- ${ride.weight_of_package}</p>
                                    <p>Quantity of Package :- ${ride.quantity_of_package}</p>
                                    <p>Mean of Transports :- ${displayText}</p>
                                    <p>Comments :- ${ride.comments}</p>
                                </div>

                                <div class="d-flex flex-row mb-2">
                                    ${parcelPicturesHtml}
                                </div>

                                <ul class="ride-location-listing">
                                    <li class="border-0 shadow-none box-background">
                                        <div class="location-box bg-transparent">
                                            <img class="icon" src="/assets/images/svg/location-fill.svg" alt="location">
                                            <h5 class="fw-light title-color">${ride.pickup_location}</h5>
                                        </div>
                                    </li>
                                    ${destinationHtml}
                                </ul>
                            </div>
                        </div>
                    </li>`;
                        });

                        $('#userRideList').html(html);
                    } else {
                        $('#userRideList').html('<p>No Ride requests available.</p>');
                    }
                },
                error: function(xhr) {
                    console.error("Error fetching fare requests:", xhr.responseText);
                }
            });
        }


    </script>

@endsection

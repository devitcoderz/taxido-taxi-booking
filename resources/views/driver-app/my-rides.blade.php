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
                        data-bs-target="#active-tab">My Current Transports</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pill-personal_offers-tab" data-bs-toggle="pill"
                        data-bs-target="#personal_offers-tab">My Personal Offers</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pill-pending-tab" data-bs-toggle="pill"
                    data-bs-target="#pending-tab">My Transport on Hold</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pill-complete-tab" data-bs-toggle="pill" data-bs-target="#complete-tab">My Completed Transfers</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pill-cancel-tab" data-bs-toggle="pill" data-bs-target="#cancel-tab">My Cancelled Transports</button>
            </li>
        </ul>

        <div class="custom-container">
            <div class="tab-content ride-content" id="TabContent">

                <div class="tab-pane fade active show" id="active-tab">
                    <ul class="my-ride-list driver-ride-list">
                        @foreach($active_rides as $active_ride)
                            <li class="white-background">
                                <div class="my-ride-box">
                                    <div class="my-ride-head">
                                        <a href="{{url('driver/ride-details?ride_id='.$active_ride->id)}}" class="my-ride-img">
                                            <img class="img-fluid profile-img" src="{{ $active_ride->user->profile ? asset('storage/'.$active_ride->user->profile) : asset('assets/images/profile/p5.png')}}"
                                                 alt="p5">
                                        </a>

                                        <div class="my-ride-content flex-column">
                                            <div class="flex-spacing">
                                                <a href="{{url('driver/ride-details?ride_id='.$active_ride->id)}}">
                                                    <h6 class="title-color fw-medium">{{ $active_ride->user->name }}</h6>
                                                </a>
                                                <h5 class="fw-mediun success-color">{{ $active_ride->fare_currency}} {{ $active_ride->fare }}</h5>
                                            </div>
                                            <div class="flex-align-center gap-3">
                                                <div class="flex-align-center gap-1">
                                                    <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                                    <h5 class="fw-normal title-color">4.8</h5>
                                                    <span class="content-color fw-normal">(127)</span>
                                                </div>
                                                <div class="flex-align-center gap-1">
                                                    <i class="iconsax icon" data-icon="route-1"> </i>
                                                    <h6 class="fw-normal title-color">{{ $active_ride->distance }} km</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ url('driver/track-ride') }}" class="btn theme-btn w-100 auth-btn mt-3">Track Ride</a>

                                    <div class="my-ride-details">
                                        <div class="ride-info">
                                            <h6 class="fw-normal title-color">{{ $active_ride->departure_date }}</h6>
                                            <div class="flex-align-center gap-2">
                                                <a href="{{url('driver/chatting')}}">
                                                    <img class="img-fluid communication-icon"
                                                         src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                                </a>
                                                <a href="tel:{{ $active_ride->user->phone }}">
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
                                                    <h5 class="fw-light title-color">{{ $active_ride->pickup_location }}</h5>
                                                </div>
                                            </li>
                                            @php
                                                $locations = json_decode($active_ride->destination_location, true); // returns array
                                            @endphp
                                            @foreach($locations as $location)
                                                <li class="border-0 shadow-none">
                                                    <div class="location-box">
                                                        <img class="icon bg-transparent" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                        <h5 class="fw-light title-color px-0 border-0">{{ $location }}
                                                        </h5>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-pane fade" id="personal_offers-tab">
                    <ul class="my-ride-list driver-ride-list" id="userRideList">
                        @forelse($personal_offers as $personal_offer)
                            <li>
                                <div class="my-ride-box">
                                    <div class="my-ride-head">
                                        <a href="{{route('driver.accept_ride',['id'=>$personal_offer->id])}}" class="my-ride-img">
                                            <img class="img-fluid profile-img" src="{{ $personal_offer->user->profile ? asset('storage/'.$personal_offer->user->profile) : asset('assets/images/profile/p5.png') }}" alt="p5">
                                        </a>

                                        <div class="my-ride-content flex-column">
                                            <div class="flex-spacing">
                                                <a href="{{route('driver.accept_ride',['id'=>$personal_offer->id])}}">
                                                    <h5 class="title-color fw-medium">{{ $personal_offer->user->name }}</h5>
                                                </a>
                                                <div class="flex-align-center">
                                                    <div class="flex-align-center gap-1 pe-2">
                                                        <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                                        <h5 class="fw-normal title-color p-0">4.8</h5>
                                                    </div>
                                                    <h5 class="fw-mediun theme-color price ps-2 pe-0">{{ $personal_offer->fare_currency }} {{ $personal_offer->fare }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="my-ride-details">
                                        <div class="ride-info">
                                            <div class="flex-align-center gap-1">
                                                <img class="icon img-fluid" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                     alt="location">
                                                <h6 class="fw-normal title-color">{{ $personal_offer->distance }} km</h6>
                                            </div>
                                            <h6 class="fw-normal title-color">{{ $personal_offer->departure_date }}</h6>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <p>Type of Package :- {{ $personal_offer->packagetype->title }}</p>
                                            <p>Sub Type of Package :- {{ $personal_offer->packagesubtype->title }}</p>
                                            <p>Length of Package :- {{ $personal_offer->length_of_package }}</p>
                                            <p>Width of Package :- {{ $personal_offer->width_of_package }}</p>
                                            <p>Weight of Package :- {{ $personal_offer->weight_of_package }}</p>
                                            <p>Quantity of Package :- {{ $personal_offer->quantity_of_package }}</p>
                                            <p>Comments :- {{ $personal_offer->comments }}</p>
                                        </div>
                                        <div class="d-flex flex-row">
                                            @php
                                                $parcel_pictures = $personal_offer->parcel_pictures ? json_decode($personal_offer->parcel_pictures) : '';
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
                                                    <h5 class="fw-light title-color">{{ $personal_offer->pickup_location }}</h5>
                                                </div>
                                            </li>

                                            @php
                                                $locations = json_decode($personal_offer->destination_location, true); // returns array
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
                            <p>No Personal Ride Offers Available.</p>
                        @endforelse
                    </ul>
                </div>

                <div class="tab-pane fade" id="pending-tab">
                    <ul class="my-ride-list driver-ride-list">
                        @foreach($pending_rides as $pending_ride)
                            <li class="white-background">
                                <div class="my-ride-box">
                                    <div class="my-ride-head">
                                        <a href="{{url('driver/ride-details?ride_id='.$pending_ride->id)}}" class="my-ride-img">
                                            <img class="img-fluid profile-img" src="{{ $pending_ride->user->profile ? asset('storage/'.$pending_ride->user->profile) : asset('assets/images/profile/p5.png')}}"
                                                 alt="p5">
                                        </a>

                                        <div class="my-ride-content flex-column">
                                            <div class="flex-spacing">
                                                <a href="{{url('driver/ride-details?ride_id='.$pending_ride->id)}}">
                                                    <h6 class="title-color fw-medium">{{ $pending_ride->user->name }}</h6>
                                                </a>
                                                <h5 class="fw-mediun success-color">{{ $pending_ride->fare_currency}} {{ $pending_ride->fare }}</h5>
                                            </div>
                                            <div class="flex-align-center gap-3">
                                                <div class="flex-align-center gap-1">
                                                    <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">
                                                    <h5 class="fw-normal title-color">4.8</h5>
                                                    <span class="content-color fw-normal">(127)</span>
                                                </div>
                                                <div class="flex-align-center gap-1">
                                                    <i class="iconsax icon" data-icon="route-1"> </i>
                                                    <h6 class="fw-normal title-color">{{ $pending_ride->distance }} km</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="my-ride-details">
                                        <div class="ride-info">
                                            <h6 class="fw-normal title-color">{{ $pending_ride->delivery_date }}</h6>
                                            <div class="flex-align-center gap-2">
                                                <a href="{{url('driver/chatting')}}">
                                                    <img class="img-fluid communication-icon"
                                                         src="{{asset('assets/images/svg/messages-fill.svg')}}" alt="messages">
                                                </a>
                                                <a href="tel:{{ $pending_ride->user->phone }}">
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
                                                    <h5 class="fw-light title-color">{{ $pending_ride->pickup_location }}</h5>
                                                </div>
                                            </li>
                                            @php
                                                $locations = json_decode($pending_ride->destination_location, true); // returns array
                                            @endphp
                                            @foreach($locations as $location)
                                                <li class="border-0 shadow-none">
                                                    <div class="location-box">
                                                        <img class="icon bg-transparent" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                        <h5 class="fw-light title-color px-0 border-0">{{ $location }}
                                                        </h5>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <a href="{{url('driver/start-ride/'.$pending_ride->id)}}" class="btn theme-btn w-100 mt-3">Pickup Customer</a>

                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-pane fade" id="complete-tab">
                    <ul class="my-ride-list driver-ride-list">
                        @foreach($completed_rides as $completed_ride)
                            <li class="white-background">
                                <div class="my-ride-box">
                                    <div class="my-ride-head">
                                        <a href="{{url('driver/ride-details?ride_id='.$completed_ride->id)}}" class="my-ride-img">
                                            <img class="img-fluid profile-img" src="{{ $completed_ride->user->profile ? asset('storage/'.$completed_ride->user->profile) : asset('assets/images/profile/p5.png')}}"
                                                 alt="p5">
                                        </a>

                                        <div class="my-ride-content flex-column">
                                            <div class="flex-spacing">
                                                <a href="{{url('driver/ride-details?ride_id='.$completed_ride->id)}}">
                                                    <h6 class="title-color fw-medium">{{ $completed_ride->user->name }}</h6>
                                                </a>
                                                <h5 class="fw-mediun success-color">{{ $completed_ride->fare_currency}} {{ $completed_ride->fare }}</h5>
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
                                            <h6 class="fw-normal title-color">{{ $completed_ride->delivery_date }}</h6>
                                            <div class="flex-align-center gap-1">
                                                <i class="iconsax icon" data-icon="route-1"> </i>
                                                <h6 class="fw-normal title-color">{{ $completed_ride->distance }} km</h6>
                                            </div>
                                        </div>
                                        <ul class="ride-location-listing">
                                            <li class="border-0 shadow-none">
                                                <div class="location-box">
                                                    <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                         alt="location">
                                                    <h5 class="fw-light title-color">{{ $completed_ride->pickup_location }}</h5>
                                                </div>
                                            </li>

                                            @php
                                                $locations = json_decode($completed_ride->destination_location, true); // returns array
                                            @endphp
                                            @foreach($locations as $location)
                                                <li class="border-0 shadow-none">
                                                    <div class="location-box">
                                                        <img class="icon bg-transparent" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                        <h5 class="fw-light title-color px-0 border-0">{{ $location }}
                                                        </h5>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-pane fade" id="cancel-tab">
                    <ul class="my-ride-list driver-ride-list">
                        @foreach($cancelled_rides as $cancelled_ride)
                            <li class="white-background">
                                <div class="my-ride-box">
                                    <div class="my-ride-head">
                                        <a href="{{url('driver/ride-details?ride_id='.$cancelled_ride->id)}}" class="my-ride-img">
                                            <img class="img-fluid profile-img" src="{{ $cancelled_ride->user->profile ? asset('storage/'.$cancelled_ride->user->profile) : asset('assets/images/profile/p5.png')}}"
                                                 alt="p5">
                                        </a>

                                        <div class="my-ride-content flex-column">
                                            <div class="flex-spacing">
                                                <a href="{{url('driver/ride-details?ride_id='.$cancelled_ride->id)}}">
                                                    <h6 class="title-color fw-medium">{{ $cancelled_ride->user->name }}</h6>
                                                </a>
                                                <h5 class="fw-mediun success-color">{{ $cancelled_ride->fare_currency}} {{ $cancelled_ride->fare }}</h5>
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
                                            <h6 class="fw-normal title-color">{{ $cancelled_ride->delivery_date }}</h6>
                                            <div class="flex-align-center gap-1">
                                                <i class="iconsax icon" data-icon="route-1"> </i>
                                                <h6 class="fw-normal title-color">{{ $cancelled_ride->distance }} km</h6>
                                            </div>
                                        </div>
                                        <ul class="ride-location-listing">
                                            <li class="border-0 shadow-none">
                                                <div class="location-box">
                                                    <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}"
                                                         alt="location">
                                                    <h5 class="fw-light title-color">{{ $cancelled_ride->pinkup_location }}</h5>
                                                </div>
                                            </li>

                                            @php
                                                $locations = json_decode($cancelled_ride->destination_location, true); // returns array
                                            @endphp
                                            @foreach($locations as $location)
                                                <li class="border-0 shadow-none">
                                                    <div class="location-box">
                                                        <img class="icon bg-transparent" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                                                        <h5 class="fw-light title-color px-0 border-0">{{ $location }}
                                                        </h5>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endforeach
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

    <script>
        setInterval(() => {
            console.log("Timeout triggered");  // Debug
            getUserRideRequest();
        }, 10000);

        function getUserRideRequest() {
            $.ajax({
                url: `/user/get-personal-ride-request`,
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
                        $('#userRideList').html('<p>No Personal Ride Offers Available.</p>');
                    }
                },
                error: function(xhr) {
                    console.error("Error fetching fare requests:", xhr.responseText);
                }
            });
        }


    </script>

@endsection

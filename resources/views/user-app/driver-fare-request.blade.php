@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('user/selact-ride')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <a href="#alert" data-bs-toggle="offcanvas">
                    <span class="fw-medium theme-color">Cancel Ride</span>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- driver request section starts -->
    <section class="pt-0 driver-request section-b-space">
        <div class="custom-container">
            <ul class="driver-list" id="driverFareList">
{{--                <li>--}}
{{--                    <div class="driver-box">--}}
{{--                        <div class="profile-head">--}}
{{--                            <div class="flex-align-center gap-2">--}}
{{--                                <img class="img-fluid profile-img" src="{{asset('assets/images/profile/p8.png')}}"--}}
{{--                                    alt="profile">--}}
{{--                                <h5>Tesla car</h5>--}}
{{--                            </div>--}}
{{--                            <h4 class="fw-medium success-color">$100</h4>--}}
{{--                        </div>--}}
{{--                        <div class="flex-spacing mt-2">--}}
{{--                            <h5 class="fw-normal title-color">Jonathan Higgins</h5>--}}
{{--                            <h6 class="fw-normal content-color">4 min</h6>--}}
{{--                        </div>--}}
{{--                        <div class="flex-spacing mt-2">--}}
{{--                            <div class="flex-align-center gap-1">--}}
{{--                                <img class="star" src="{{asset('assets/images/svg/star.svg')}}" alt="star">--}}
{{--                                <h5 class="fw-normal title-color">4.8</h5>--}}
{{--                                <span class="content-color fw-normal">(127)</span>--}}
{{--                            </div>--}}
{{--                            <h6 class="fw-normal content-color">4 km</h6>--}}
{{--                        </div>--}}

{{--                        <div class="grid-btn mt-2">--}}
{{--                            <a href="#alert" data-bs-toggle="offcanvas" class="btn gray-btn w-100 m-0">Skip</a>--}}
{{--                            <a href="{{url('user/accept-ride-details')}}" class="btn theme-btn w-100 m-0">Accept</a>--}}
{{--                        </div>--}}
{{--                        <div class="progress mt-2" role="progressbar">--}}
{{--                            <div class="progress-bar w-0"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
            </ul>
        </div>
    </section>
    <!-- driver request section end -->

    <!-- alert offcanvas starts -->
    <div class="offcanvas offcanvas-bottom ride-offcanvas" tabindex="-1" id="alert">
        <div class="offcanvas-body p-0">
            <div class="alert-part">
                <div class="title-content w-75 text-center mx-auto">
                    <h3 class="fw-medium justify-content-center">Are you sure you want to cancel ?</h3>
                </div>
                <div class="flex-align-center gap-3 mt-4">
                    <a href="{{url('user/driver-fare-request')}}" class="btn gray-btn w-100 m-0">No</a>
                    <a href="#reasons" data-bs-toggle="offcanvas" class="btn theme-btn w-100">Yes, Cancel</a>
                </div>
            </div>
        </div>
    </div>
    <!-- alert offcanvas end -->

    <!-- reasons offcanvas starts -->
    <div class="offcanvas offcanvas-bottom ride-offcanvas" tabindex="-1" id="reasons">
        <div class="offcanvas-body p-0">
            <div class="alert-part">
                <div class="title-content">
                    <h3 class="justify-content-center">Why do you want to cancel?</h3>
                </div>

                <ul class="reasons-list">
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed01">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/user-cross.svg')}}"
                                    alt="user-cross"> Driver asks for extra fare</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed01">
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed02">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/user-speak.svg')}}"
                                    alt="user-speak"> Driver asked me to cancel</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed02">
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed03">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/security-time.svg')}}"
                                    alt="security"> Driver asked to go directly</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed03">
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed04">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/timer.svg')}}" alt="timer">
                                Wait time was too long</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed04">
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed05">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/message-remove.svg')}}"
                                    alt="messages"> Driver doesn’t answer</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed05">
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed06">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/driving-fill.svg')}}"
                                    alt="driving">Complaint about the rider</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed06">
                        </div>
                    </li>
                    <li class="reasons-box">
                        <div class="form-check">
                            <label class="form-check-label" for="fixed07">
                                <img class="img-fluid reasons-icon" src="{{asset('assets/images/svg/clock-circle.svg')}}"
                                    alt="clock">Driver getting closer</label>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed07">
                        </div>
                    </li>
                </ul>
                <div class="mt-5">
                    <a href="{{url('user/home')}}" class="btn theme-btn w-100 mt-0">Close</a>
                </div>
            </div>
        </div>
    </div>
    <!-- reasons offcanvas end -->

    @endsection

    @section('script')

        <!-- map js -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>
        <script src="{{asset('assets/js/custom-map.js')}}"></script>

        <script>
            const userId = {{ Auth::guard('user')->id() }};
            const userRequestId = {{ $userriderequest_id }};

            getDriverFareRequest();

            setInterval(() => {
                console.log("Timeout triggered");  // Debug
                getDriverFareRequest();
            }, 2000);

            function getDriverFareRequest() {
                $.ajax({
                    url: `/user/get-driver-fare-request?userriderequest_id=${userRequestId}`,
                    method: 'GET',
                    success: function(response) {
                        if (response && response.length) {
                            let html = '';

                            response.forEach(item => {
                                html += `
                        <li>
                            <div class="driver-box">
                                <div class="profile-head">
                                    <div class="flex-align-center gap-2">
                                        <img class="img-fluid profile-img" src="${item.driver?.profile ? '/storage/' + item.driver.profile : '/assets/images/profile/p8.png'}" alt="profile">
                                        <h5>${item.driver?.vehicle_type}</h5>
                                    </div>
                                    <h4 class="fw-medium success-color">$${item.requested_fare}</h4>
                                </div>
                                <div class="flex-spacing mt-2">
                                    <h5 class="fw-normal title-color">${item.driver?.name ?? 'Unknown Driver'}</h5>
                                    <h6 class="fw-normal content-color">4 min</h6>
                                </div>
                                <div class="flex-spacing mt-2">
                                    <div class="flex-align-center gap-1">
                                        <img class="star" src="/assets/images/svg/star.svg" alt="star">
                                        <h5 class="fw-normal title-color">4.8</h5>
                                        <span class="content-color fw-normal">(127)</span>
                                    </div>
                                    <h6 class="fw-normal content-color">4 km</h6>
                                </div>
                                <div class="grid-btn mt-2">
                                    <a href="#alert" data-bs-toggle="offcanvas" class="btn gray-btn w-100 m-0">Skip</a>
                                    <a href="/user/accept-ride-details?driverfarerequest_id=${item.id}&driver_id=${item.driver_id}" class="btn theme-btn w-100 m-0">Accept</a>
                                </div>
                                <div class="progress mt-2" role="progressbar">
                                    <div class="progress-bar w-0"></div>
                                </div>
                            </div>
                        </li>
                    `;
                            });

                            $('#driverFareList').html(html);
                        } else {
                            $('#driverFareList').html('<li><p>No fare requests available.</p></li>');
                        }
                    },
                    error: function(xhr) {
                        console.error("Error fetching fare requests:", xhr.responseText);
                    }
                });
            }

        </script>

@endsection

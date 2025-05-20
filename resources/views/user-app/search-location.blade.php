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
                <div class="flex-spacing gap-2 w-100">
                    <a href="{{url('user/home')}}">
                        <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                    </a>

                    <select class="form-select rider-options">
                        <option selected>Switch Rider</option>
                        <option value="1">My Self</option>
                    </select>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <form method="get" action="{{ route('user.selact_ride') }}">
        @csrf
    <!-- location section starts -->
    <section class="location-section pt-0">
        <div class="custom-container">
            <ul class="pickup-location-listing">
                <li>
                    <div class="location-box">
                        <img class="icon" src="{{asset('assets/images/svg/location-fill.svg')}}" alt="location">
                        <input type="text" id="pac-input" class="form-control" required placeholder="Pickup location" name="pickup_location">
                        <div id="infowindow-content">
                            <span id="place-name" class="title"></span><br />
                            <span id="place-address"></span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="location-box">
                        <img class="icon" src="{{asset('assets/images/svg/gps.svg')}}" alt="gps">
                        <input type="text" required id="pac-input2" class="form-control border-0"
                            placeholder="Enter destination" name="destination_location">
                        <i class="iconsax add-stop" data-icon="add"></i>
                        <div id="infowindow-content2">
                            <span id="place-name2" class="title"></span><br />
                            <span id="place-address2"></span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- location section starts -->

    <!-- categories place list starts -->
    <section class="category-place-section">
        <div class="custom-container">
            <ul class="categories-place-list">
                <li>
                    <a href="#" class="categories-place-box">
                        <img class="place-icon" src="{{asset('assets/images/svg/home-fill.svg')}}" alt="home">
                        <h5>Home</h5>
                    </a>
                </li>
                <li>
                    <a href="#" class="categories-place-box">
                        <img class="place-icon" src="{{asset('assets/images/svg/work-fill.svg')}}" alt="home">
                        <h5>Work</h5>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <!-- categories place list end -->

    <!-- recent search list starts -->
    <section>
        <div class="custom-container">
            <h3 class="title-color fw-medium mb-2">Recent</h3>
            <ul class="recent-place-list">
                <li>
                    <div class="recent-box">
                        <div class="recent-icon">
                            <img class="icon" src="{{asset('assets/images/svg/history.svg')}}" alt="history">
                        </div>
                        <div>
                            <h5>Koramangala</h5>
                            <p>17600 Yonge St., Toronto, L3Y 4Z1</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="recent-box">
                        <div class="recent-icon">
                            <img class="icon" src="{{asset('assets/images/svg/history.svg')}}" alt="history">
                        </div>
                        <div>
                            <h5>Purdys Chocolatier</h5>
                            <p> 149 St. John Street, Oshawa, L1H 7M3</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="recent-box">
                        <div class="recent-icon">
                            <img class="icon" src="{{asset('assets/images/svg/history.svg')}}" alt="history">
                        </div>
                        <div>
                            <h5>Toronto Eaton Centre</h5>
                            <p>1222 Ross Street, Toronto, H3B 4W8</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="recent-box">
                        <div class="recent-icon">
                            <img class="icon" src="{{asset('assets/images/svg/history.svg')}}" alt="history">
                        </div>
                        <div>
                            <h5>Toronto PATH</h5>
                            <p> 486 Eglinton Avenue, Montreal, M4P 1A6</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="recent-box">
                        <div class="recent-icon">
                            <img class="icon" src="{{asset('assets/images/svg/history.svg')}}" alt="history">
                        </div>
                        <div>
                            <h5>Purdys Chocolatier</h5>
                            <p> 659 Tanner Street, Vancouver, V5R 2T4</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="fixed-btn">
            <div class="custom-container">
                <button type="submit" class="btn theme-btn w-100">Done</button>
            </div>
        </div>
    </section>
    <!-- recent search list end -->
    </form>
    <!-- ride-offcanvas starts -->
    <div class="offcanvas ride-offcanvas" tabindex="-1" id="ride">
        <div class="offcanvas-body p-0">
            <h3>Someone else taking this ride?</h3>
            <p>Choose a contact so that they also get driver number, vehicle details and ride OTP via SMS.</p>

            <div class="form-check">
                <label class="form-check-label" for="fixed1"> <i class="iconsax icon" data-icon="user-1"></i>
                    My Self</label>
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed1" checked="">
            </div>
            <a href="{{ url('user/choose-rider') }}" class="choose-contact">
                <div class="flex-align-center gap-2">
                    <img class="img-fluid user-icon" src="{{asset('assets/images/svg/user-octagon.svg')}}" alt="user">
                    <h5>Choose another contact</h5>
                </div>
                <i class="iconsax icon-btn" data-icon="chevron-right"> </i>

            </a>
        </div>
        <div class="offcanvas-footer flex-align-center flex-nowrap gap-3 border-0 pt-3 px-0 pb-0">
            <a href="{{ url('user/selact-ride') }}" class="btn gray-btn title-color w-100 mt-0">Skip</a>
            <a href="{{ url('user/selact-ride') }}" class="btn theme-btn w-100 mt-0">Continue</a>
        </div>
    </div>
    <!-- ride-offcanvas end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    @endsection

    @section('script')
        <script>
            function preventFormSubmitOnEnter(inputElement) {
                inputElement.addEventListener("keydown", function (e) {
                    if (e.key === "Enter") {
                        e.preventDefault(); // prevent form submission
                    }
                });
            }
            function initMap() {
                // ---------- PICKUP LOCATION ----------
                const input1 = document.getElementById("pac-input");
                preventFormSubmitOnEnter(input1);
                const autocomplete1 = new google.maps.places.Autocomplete(input1, {
                    fields: ["formatted_address", "name"],
                    strictBounds: false,
                });

                autocomplete1.addListener("place_changed", () => {
                    const place = autocomplete1.getPlace();
                    if (!place.geometry) {
                        console.warn("Selected place has no geometry. Possibly partial data:", place);
                        return;
                    }

                    document.getElementById("place-name").textContent = place.name || '';
                    document.getElementById("place-address").textContent = place.formatted_address || '';
                });

                // ---------- DESTINATION LOCATION ----------
                const input2 = document.getElementById("pac-input2");
                preventFormSubmitOnEnter(input2);
                const autocomplete2 = new google.maps.places.Autocomplete(input2, {
                    fields: ["formatted_address", "name"],
                    strictBounds: false,
                });

                autocomplete2.addListener("place_changed", () => {
                    const place = autocomplete2.getPlace();
                    if (!place.geometry) {
                        console.warn("Selected place has no geometry. Possibly partial data:", place);
                        return;
                    }

                    document.getElementById("place-name2").textContent = place.name || '';
                    document.getElementById("place-address2").textContent = place.formatted_address || '';
                });
            }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&libraries=places&callback=initMap" async defer></script>
@endsection

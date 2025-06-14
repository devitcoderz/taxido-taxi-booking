@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
@endsection

@section('style')

    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/swiper-bundle.min.css')}}">
    <style>
        #map { height: 70vh; width: 100%; }
        .controls { margin: 10px; }
        .controls input { margin: 5px 0; width: 100%; padding: 8px; font-size: 14px; }
    </style>

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="#offcanvasLeft" data-bs-toggle="offcanvas">
                    <i class="iconsax icon-btn" data-icon="text-align-left"> </i>
                </a>
                <h3>Track Ride</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <div class="controls">
        <input id="origin" type="text" placeholder="Pickup location" readonly>
        <div id="stops"></div>
        <input id="destination" type="text" placeholder="Final destination" readonly>
    </div>

    <div id="instruction-alert" class="alert alert-info" role="alert" style="display:none; position: fixed; top: 70px; width: 90%; max-width: 600px; left: 50%; transform: translateX(-50%); z-index: 1000;"></div>

    <div>
        ETA: <span id="eta">-</span> | Distance left: <span id="remaining-distance">-</span>
    </div>

    @if ($track_ride)
    <!-- track ride starts -->
    <section>
        <div class="custom-container" id="map">

        </div>
    </section>
    <!-- track ride end -->
    @else
        <div style="padding: 20px; text-align: center;">
            <h3>No Active Ride Found</h3>
            <p>You currently do not have any scheduled or active rides to track.</p>
        </div>
    @endif

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

    <!-- jQuery & Google Maps -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&libraries=places,geometry&callback=initMap" async defer></script>

    <script>
        let map, directionsService, directionsRenderer, positionMarker;
        let stopInputs = [], allLegs = [], allSteps = [], currentStep = 0;
        let trackingInterval;

        const pickupLocation = {!! json_encode($track_ride['pickup_location'] ?? '') !!};
        const destinationArray = {!! json_encode(json_decode($track_ride['destination_location'] ?? '[]')) !!};

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 7,
                center: { lat: 30.1575, lng: 71.5249 }
            });

            directionsService = new google.maps.DirectionsService();
            directionsRenderer = new google.maps.DirectionsRenderer({ map });

            $('#origin').val(pickupLocation);
            $('#destination').val(destinationArray[destinationArray.length - 1]);

            for (let i = 0; i < destinationArray.length - 1; i++) {
                const inputId = `stop-${i}`;
                $('#stops').append(`<input id="${inputId}" type="text" value="${destinationArray[i]}" placeholder="Enter stop location">`);
                stopInputs.push(inputId);
            }

            calculateRoute();
        }

        function calculateRoute() {
            const origin = $('#origin').val();
            const destination = $('#destination').val();
            const waypoints = stopInputs.map(id => ({
                location: $(`#${id}`).val(),
                stopover: true
            }));

            directionsService.route({
                origin,
                destination,
                waypoints,
                travelMode: google.maps.TravelMode.DRIVING,
                avoidTolls: false, // Change to true if you want to avoid toll roads
                provideRouteAlternatives: false
            }, (result, status) => {
                if (status === "OK") {
                    directionsRenderer.setDirections(result);
                    allLegs = result.routes[0].legs;
                    allSteps = allLegs.flatMap(leg => leg.steps);
                    currentStep = 0;

                    startTracking();
                } else {
                    alert("Could not calculate route: " + status);
                }
            });
        }

        function startTracking() {
            if (!navigator.geolocation) return alert("Geolocation not supported.");

            if (trackingInterval) clearInterval(trackingInterval);

            navigator.geolocation.getCurrentPosition((initialPos) => {
                const latLng = new google.maps.LatLng(initialPos.coords.latitude, initialPos.coords.longitude);
                positionMarker = new google.maps.Marker({
                    map,
                    position: latLng,
                    icon: {
                        path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                        scale: 5,
                        fillColor: "#4285F4",
                        fillOpacity: 1,
                        strokeWeight: 1
                    }
                });
                map.setCenter(latLng);
            });

            trackingInterval = setInterval(() => {
                navigator.geolocation.getCurrentPosition(position => {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;
                    const currentLatLng = new google.maps.LatLng(lat, lng);

                    positionMarker.setPosition(currentLatLng);
                    map.setCenter(currentLatLng);

                    checkStepProximity(currentLatLng);
                    updateRemainingDistance(currentLatLng);

                }, err => {
                    console.error("Tracking error:", err);
                }, {
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 5000
                });
            }, 10000); // Update every 10s
        }

        function checkStepProximity(userLatLng) {
            if (currentStep >= allSteps.length) return;

            const step = allSteps[currentStep];
            const stepEnd = step.end_location;
            const dist = google.maps.geometry.spherical.computeDistanceBetween(userLatLng, stepEnd);

            if (dist < 50) {
                showInstruction(step.instructions);
                speak(step.instructions);
                currentStep++;
            }
        }

        function updateRemainingDistance(userLatLng) {
            const destination = $('#destination').val();

            directionsService.route({
                origin: userLatLng,
                destination,
                travelMode: google.maps.TravelMode.DRIVING,
                avoidTolls: false
            }, (result, status) => {
                if (status === "OK") {
                    const leg = result.routes[0].legs[0];
                    $('#eta').text(leg.duration.text);
                    $('#remaining-distance').text(leg.distance.text);
                }
            });
        }

        function speak(text) {
            const clean = text.replace(/<[^>]+>/g, '');
            const utter = new SpeechSynthesisUtterance(clean);
            utter.lang = 'en-US';
            speechSynthesis.speak(utter);
        }

        function showInstruction(html) {
            $('#instruction-alert').html(html).fadeIn();

            setTimeout(() => {
                $('#instruction-alert').fadeOut();
            }, 8000);
        }
    </script>

    <!-- PWA: Manifest + Service Worker -->
    <link rel="manifest" href="manifest.json">
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/service-worker.js')
                .then(() => console.log("Service Worker registered"))
                .catch(err => console.error("Service Worker error:", err));
        }
    </script>


@endsection

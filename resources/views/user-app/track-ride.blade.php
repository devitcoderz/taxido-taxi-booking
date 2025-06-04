@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')

@endsection

@section('content')
    <!-- header starts -->
    @include('user-app.partials.header')
    <!-- header end -->

    <!-- my ride section starts -->
    <section>

        <div class="custom-container" id="map">

        </div>
    </section>
    <!-- my ride section end -->

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

        <script>
            let map, marker;

            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 14,
                    center: { lat: 30.1575, lng: 71.5249 }
                });

                marker = new google.maps.Marker({
                    map: map,
                    icon: 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                });

                pollDriverLocation();
            }

            function pollDriverLocation() {
                setInterval(() => {
                    var url = '{{ url('user/get-driver-location') }}'
                    fetch(url)
                        .then(res => res.json())
                        .then(data => {
                            const latLng = new google.maps.LatLng(data.lat, data.lng);
                            marker.setPosition(latLng);
                            map.panTo(latLng);
                        });
                }, 5000); // Poll every 5 seconds
            }

            window.initMap = initMap;
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&callback=initMap" async defer></script>

    @endsection

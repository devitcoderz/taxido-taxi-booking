<html>
<head>
    <title>Place Autocomplete</title>

    <style>

        /*
 * Always set the map height explicitly to define the size of the div element
 * that contains the map.
 */
        #map {
            height: 100%;
        }

        /*
         * Optional: Makes the sample page fill the window.
         */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            background-color: #fff;
            border: 0;
            border-radius: 2px;
            box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
            margin: 10px;
            padding: 0 0.5em;
            font: 400 18px Roboto, Arial, sans-serif;
            overflow: hidden;
            font-family: Roboto;
            padding: 0;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }

    </style>

</head>
<body>
<div class="pac-card" id="pac-card">
    <div>
        <div id="title">Autocomplete search</div>
        <div id="type-selector" class="pac-controls">
            <input
                type="radio"
                name="type"
                id="changetype-all"
                checked="checked"
            />
            <label for="changetype-all">All</label>

            <input type="radio" name="type" id="changetype-establishment" />
            <label for="changetype-establishment">establishment</label>

            <input type="radio" name="type" id="changetype-address" />
            <label for="changetype-address">address</label>

            <input type="radio" name="type" id="changetype-geocode" />
            <label for="changetype-geocode">geocode</label>

            <input type="radio" name="type" id="changetype-cities" />
            <label for="changetype-cities">(cities)</label>

            <input type="radio" name="type" id="changetype-regions" />
            <label for="changetype-regions">(regions)</label>
        </div>
        <br />
        <div id="strict-bounds-selector" class="pac-controls">
            <input type="checkbox" id="use-location-bias" value="" checked />
            <label for="use-location-bias">Bias to map viewport</label>

            <input type="checkbox" id="use-strict-bounds" value="" />
            <label for="use-strict-bounds">Strict bounds</label>
        </div>
    </div>
    <div id="pac-container">
        <input id="pac-input" type="text" placeholder="Enter a location" />
    </div>
</div>
<div id="map"></div>
<div id="infowindow-content">
    <span id="place-name" class="title"></span><br />
    <span id="place-address"></span>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 40.749933, lng: -73.98633 },
            zoom: 13,
            mapTypeControl: false,
        });

        const card = document.getElementById("pac-card");
        const input = document.getElementById("pac-input");
        const biasInputElement = document.getElementById("use-location-bias");
        const strictBoundsInputElement = document.getElementById("use-strict-bounds");

        const options = {
            fields: ["formatted_address", "geometry", "name"],
            strictBounds: false,
        };

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(card);

        const autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.bindTo("bounds", map);

        const infowindow = new google.maps.InfoWindow();
        const infowindowContent = document.getElementById("infowindow-content");
        infowindow.setContent(infowindowContent);

        const marker = new google.maps.Marker({
            map,
            anchorPoint: new google.maps.Point(0, -29),
        });

        autocomplete.addListener("place_changed", () => {
            infowindow.close();
            marker.setVisible(false);
            const place = autocomplete.getPlace();

            if (!place.geometry || !place.geometry.location) {
                alert("No details available for input: '" + place.name + "'");
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }

            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            infowindowContent.children["place-name"].textContent = place.name;
            infowindowContent.children["place-address"].textContent = place.formatted_address;
            infowindow.open(map, marker);
        });

        function setupClickListener(id, types) {
            const radioButton = document.getElementById(id);
            radioButton.addEventListener("click", () => {
                autocomplete.setTypes(types);
                input.value = "";
            });
        }

        setupClickListener("changetype-all", []);
        setupClickListener("changetype-address", ["address"]);
        setupClickListener("changetype-establishment", ["establishment"]);
        setupClickListener("changetype-geocode", ["geocode"]);
        setupClickListener("changetype-cities", ["(cities)"]);
        setupClickListener("changetype-regions", ["(regions)"]);

        biasInputElement.addEventListener("change", () => {
            if (biasInputElement.checked) {
                autocomplete.bindTo("bounds", map);
            } else {
                autocomplete.unbind("bounds");
                autocomplete.setBounds({ east: 180, west: -180, north: 90, south: -90 });
                strictBoundsInputElement.checked = false;
            }
            input.value = "";
        });

        strictBoundsInputElement.addEventListener("change", () => {
            autocomplete.setOptions({ strictBounds: strictBoundsInputElement.checked });
            if (strictBoundsInputElement.checked) {
                biasInputElement.checked = true;
                autocomplete.bindTo("bounds", map);
            }
            input.value = "";
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE&libraries=places&callback=initMap" async defer></script>

</body>
</html>


{{--    <!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>--}}
{{--        Simple Places Autocomplete--}}
{{--    </title>--}}
{{--    <script type="module" src="https://ajax.googleapis.com/ajax/libs/@googlemaps/extended-component-library/0.6.11/index.min.js">--}}
{{--    </script>--}}
{{--    <style>--}}
{{--        body {--}}
{{--            padding: 25px;--}}
{{--            background-color: #f0f1f3;--}}
{{--            font-family: "Arial", sans-serif;--}}
{{--        }--}}

{{--        #place-picker-box {--}}
{{--            display: flex;--}}
{{--            justify-content: center;--}}
{{--            align-items: center;--}}
{{--        }--}}

{{--        #place-picker-container {--}}
{{--            text-align: left;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<gmpx-api-loader key="AIzaSyBKqq-XxVccy3MdBiolKZOJ601LNqvFPaE" solution-channel="GMP_GE_placepicker_v2">--}}
{{--</gmpx-api-loader>--}}
{{--<div id="place-picker-box">--}}
{{--    <div id="place-picker-container">--}}
{{--        <gmpx-place-picker placeholder="Enter an address"></gmpx-place-picker>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}

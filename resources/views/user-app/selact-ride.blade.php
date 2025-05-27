@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .flatpickr-calendar{
            top: 220.667px !important;
            left: 0px !important;
            right: 0px !important;
        }
    </style>
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

                    <h3 class="fw-medium title-color">Out Station</h3>
                    <a href="{{url('user/chatting')}}">
                        <i class="iconsax icon-btn" data-icon="messages-2"> </i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- option section starts -->
    <section class="pt-0 section-b-space">
        <div class="px-1 pt-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form class="theme-form mt-0" method="post" action="{{ route('user.driver_fare_request') }}">
                    @csrf
                    <input type="hidden" name="pickup_location" value="{{ $request->pickup_location }}">
                    @foreach ($request->destination_location as $location)
                        <input type="hidden" name="destination_location[]" value="{{ $location }}">
                    @endforeach
                    <input type="hidden" name="distance" value="{{ $request->distance }}">
                    <div class="form-group mt-0">
                        <label class="form-label mb-2" for="departure_date">Date and time of Departure</label>
                        <input type="text" class="form-control white-background" name="departure_date" id="departure_date">
                    </div>
{{--                    <div class="form-group mt-3">--}}
{{--                        <label class="form-label mb-2" for="Inputpassenger">Distance of Route</label>--}}
{{--                        <input type="number" class="form-control white-background" id="Inputpassenger" name="distance"--}}
{{--                               placeholder="Enter Distance in Km">--}}
{{--                    </div>--}}
                    <div class="form-group mt-3">
                        <label class="form-label mb-2" for="type_of_package">Select Type of Package</label>
                        <select class="form-control white-background" id="type_of_package" name="type_of_package">
                            <option value="Standard_parcels">Standard parcels: - Small packages (less than 5 kg) - Cardboard boxes and cartons (medium size, 5–20 kg) - Large parcels (furniture, household appliances, etc.)</option>
                            <option value="Food_and_perishable_parcels">Food and perishable parcels* - Grocery shopping (supermarket deliveries) - Prepared meals (restaurant deliveries) - Fresh produce (meat, fish, vegetables) - Frozen products</option>
                            <option value="Sensitive_and_fragile_parcels">Sensitive and fragile parcels* - Glass items (dishes, glassware) - Electronics (phones, computers) - Works of art and decorative objects - Musical instruments</option>
                            <option value="Valuable_parcels">Valuable parcels* - Parcels with special tracking (jewelry, important documents) - Luxury deliveries (watches, high-end clothing) - Insured parcels</option>
                            <option value="Medical_and_pharmaceutical_parcels">Medical and pharmaceutical parcels* - Medicines and prescriptions - Medical equipment - Laboratory products</option>
                            <option value="Dangerous_parcels_or_regulated">Dangerous parcels or regulated* - Chemical products (with specific labeling) - Lithium batteries (electronic devices) - Flammable materials (transport restrictions)</option>
                            <option value="Large_and_bulky_parcels">Large and bulky parcels* - Furniture (sofas, tables, wardrobes) - Household appliances (refrigerators, washing machines) - Bicycles and sports equipment</option>
                            <option value="Live_animal_parcels">Live animal parcels* - Pets (dogs, cats, birds) – under conditions - Delivery of fish or reptiles (specialized)</option>
                            <option value="Express_and_urgent_parcels">Express and urgent parcels* - Urgent documents (contracts, legal files) - Spare parts for repairs - Last minute orders</option>
                            <option value="International_parcels">International parcels* - Postal shipments abroad - Customs and international freight</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label class="form-label mb-2" for="length_of_package">Enter Length of Package</label>
                        <input type="text" class="form-control white-background" id="length_of_package" name="length_of_package"
                               placeholder="Enter Package Length">
                    </div>
                    <div class="form-group mt-3">
                        <label class="form-label mb-2" for="width_of_package">Enter Width of Package</label>
                        <input type="text" class="form-control white-background" id="width_of_package" name="width_of_package"
                               placeholder="Enter Package Width">
                    </div>
{{--                    <div class="form-group mt-3">--}}
{{--                        <label class="form-label mb-2" for="volume_of_package">Enter Volume of Package (Meters)</label>--}}
{{--                        <input type="number" class="form-control white-background" id="volume_of_package" name="volume_of_package"--}}
{{--                               placeholder="Enter Package Volume">--}}
{{--                    </div>--}}
                    <div class="form-group mt-3">
                        <label class="form-label mb-2" for="weight_of_package">Enter Weight of Package</label>
                        <input type="text" class="form-control white-background" id="weight_of_package" name="weight_of_package"
                               placeholder="Enter Package Weight">
                    </div>
                    <div class="form-group mt-3">
                        <label class="form-label mb-2" for="quantity_of_package">Enter Quantity of Package</label>
                        <input type="number" class="form-control white-background" id="quantity_of_package" name="quantity_of_package"
                               placeholder="Enter Package Quantity">
                    </div>

                    <div class="row">
                        <div class="form-group mt-3 col-6 d-inline-block">
                            <label class="form-label mb-2" for="Inputofferrate">Enter your offer rate</label>
                            <input type="number" class="form-control white-background" id="Inputofferrate" name="fare" value="{{ $request->distance * 2 }}"
                                   placeholder="Enter offer rate">
                        </div>
                        <div class="form-group mt-3 col-6 d-inline-block">
                            <label class="form-label mb-2" for="currency_offerrate">Select your fare currency</label>
                            <select class="form-control white-background" id="currency_offerrate" name="fare_currency">
                                <option value="dollar">United State Dollar</option>
                                <option value="dirham">Dirham</option>
                                <option value="ryal">Ryal</option>
                                <option value="euro" selected>Euro</option>
                            </select>
                        </div>
                    </div>
{{--                    <div class="form-group mt-3">--}}
{{--                        <label class="form-label mb-2" for="travel_company">Enter Travel Company</label>--}}
{{--                        <input type="text" class="form-control white-background" id="travel_company" name="travel_company"--}}
{{--                               placeholder="Enter Travel Company">--}}
{{--                    </div>--}}
                    <div class="form-group mt-3">
                        <label class="form-label mb-2" for="comments">Comments</label>
                        <textarea class="form-control white-background" id="comments" name="comments"
                                  placeholder="Enter comments" rows="3"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label class="form-label mb-2">Receiver Details</label>
                        <br>
                        <label class="form-label mb-2" for="receiver_name">Name</label>
                        <input type="text" class="form-control white-background" id="receiver_name" name="receiver_name"
                               placeholder="Enter Receiver Name">
                    </div>
                    <div class="form-group mt-3">
                        <label class="form-label mb-2" for="receiver_email">Email</label>
                        <input type="email" class="form-control white-background" id="receiver_email" name="receiver_email"
                               placeholder="Enter Receiver Email">
                    </div>
                    <div class="form-group mt-3">
                        <label class="form-label mb-2" for="receiver_phone">Phone</label>
                        <input type="number" class="form-control white-background" id="receiver_phone" name="receiver_phone"
                               placeholder="Enter Receiver Phone">
                    </div>
                    <h5 class="p-0 mt-3 mb-2 fw-medium title-color">Payment Method</h5>
                    <div class="order-type">
                        <div class="flex-spacing gap-3 w-100">
{{--                            <div class="form-check form-check3">--}}
{{--                                <input class="form-check-input" type="radio" value="cash" name="payment_method" id="fixed45"--}}
{{--                                       checked />--}}
{{--                                <label class="form-check-label" for="fixed45">--}}
{{--                                    <span class="check-box"></span>--}}
{{--                                    <span class="name">Cash</span>--}}
{{--                                </label>--}}
{{--                            </div>--}}

                            <div class="form-check form-check3">
                                <input class="form-check-input" type="radio" name="payment_method" checked value="online" id="fixed469" />
                                <label class="form-check-label" for="fixed469">
                                    <span class="check-box"></span>
                                    <span class="name">Online-Payment</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn theme-btn w-100 mt-3 auth-btn">Book Ride</button>
                </form>
        </div>
    </section>
    <!-- option section end -->

@endsection

@section('script')

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(document).ready(function (){
            flatpickr("#arrival_date", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                minDate: "today"  // Optional: disables past dates
            });

            flatpickr("#departure_date", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                minDate: "today"  // Optional: disables past dates
            });
        })
    </script>
@endsection

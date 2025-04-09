<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="taxido">
    <meta name="keywords" content="taxido">
    <meta name="author" content="taxido">
    <link rel="manifest" href="manifest.json">
    <link rel="icon" href="../../assets/images/logo/favicon.png" type="image/x-icon">
    <title>taxido - Driver App </title>
    <link rel="apple-touch-icon" href="../../assets/images/logo/favicon.png">
    <meta name="title-color" content="#1F1F1F">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="taxido">
    <meta name="msapplication-TileImage" content="../../assets/images/logo/favicon.png">

    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Google font-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/GTWalsheimPro.css">

    <!-- iconsax css -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/iconsax.css">

    <!-- bootstrap css -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="../../assets/css/vendors/bootstrap.css">


    <!-- Theme css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="../../assets/css/style.css">
</head>

<body>
    <!-- header starts -->
    <header id="header" class="auth-header inner-page-header white-background pb-3">
        <div class="custom-container">
            <div class="header-panel">
                <a href="driver-document-verify.blade.php">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <img class="img-fluid logo" src="../../assets/images/logo/driver/driver-logo.png" alt="logo">
                <img class="img-fluid logo-dark" src="../../assets/images/logo/driver/driver-logo-dark.png" alt="logo">
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- header starts -->
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
                            src="../../assets/images/svg/bike-img2.svg" alt="bike">
                        Bike
                    </label>
                </li>
                <li>
                    <input type="radio" class="btn-check" name="options" id="btn-check-2">
                    <label class="btn vehicle-type-button" for="btn-check-2"> <img class="img-fluid vehicle-img"
                            src="../../assets/images/svg/car-img2.svg" alt="car">
                        Car
                    </label>
                </li>
                <li>
                    <input type="radio" class="btn-check" name="options" id="btn-check-3">
                    <label class="btn vehicle-type-button" for="btn-check-3"> <img class="img-fluid vehicle-img"
                            src="../../assets/images/svg/van-img2.svg" alt="van">
                        Van
                    </label>
                </li>
                <li>
                    <input type="radio" class="btn-check" name="options" id="btn-check-4">
                    <label class="btn vehicle-type-button" for="btn-check-4"> <img class="img-fluid vehicle-img"
                            src="../../assets/images/svg/bus-img2.svg" alt="bus">
                        Bus
                    </label>
                </li>
            </ul>

            <form class="auth-form">
                <div class="form-group mt-0">
                    <label class="form-label mb-2" for="Inputname">Vehicle Name</label>
                    <div class="position-relative">
                        <input type="text" class="form-control white-background" id="Inputname"
                            placeholder="Enter vehicle name">
                        <i class="iconsax icon" data-icon="car"></i>
                    </div>
                </div>
                <div class="form-group ">

                    <label class="form-label mb-2" for="Inputdate">Registration Date</label>
                    <div class="position-relative">
                        <input type="date" class="form-control white-background" id="Inputdate">
                        <i class="iconsax icon" data-icon="calendar-1"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label mb-2" for="InputVehicle">Select Vehicle Type</label>
                    <div class="position-relative">
                        <input type="text" class="form-control white-background" id="InputVehicle"
                            placeholder="Enter vehicle type">
                        <i class="iconsax icon" data-icon="car"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label mb-2" for="InputColor">Vehicle Color</label>
                    <div class="position-relative">
                        <input type="text" class="form-control white-background" id="InputColor"
                            placeholder="Enter vehicle color">
                        <i class="iconsax icon" data-icon="color-filter"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label mb-2" for="Inputseats">Maximum Seats</label>
                    <div class="position-relative">
                        <input type="number" class="form-control white-background" id="Inputseats"
                            placeholder="Enter maximum seats">
                        <i class="iconsax icon" data-icon="users"></i>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="rules-section pt-0 section-b-space">
        <div class="custom-container">
            <h3 class="fw-semibold title-color mb-3">Select Your Rule</h3>
            <div class="form-check mb-2">
                <label class="form-check-label" for="check1">
                    Max, 2 in the back
                </label>
                <input class="form-check-input" type="checkbox" value="" id="check1" checked>
            </div>
            <div class="form-check mb-2">
                <label class="form-check-label" for="check2">
                    Food is not allowed to be eaten in cars.
                </label>
                <input class="form-check-input" type="checkbox" value="" id="check2">
            </div>
            <div class="form-check mb-2">
                <label class="form-check-label" for="check3">
                    I apologize, but this is not a pet
                </label>
                <input class="form-check-input" type="checkbox" value="" id="check3">
            </div>
            <div class="form-check mb-2">
                <label class="form-check-label" for="check4">
                    Please, no smoking in the car
                </label>
                <input class="form-check-input" type="checkbox" value="" id="check4">
            </div>
            <div class="form-check mb-0">
                <label class="form-check-label" for="check5">
                    No alcohol closed/open
                </label>
                <input class="form-check-input" type="checkbox" value="" id="check5">
            </div>
        </div>
    </section>
    <div class="fixed-btn">
        <div class="custom-container">
            <a href="driver-bank-details.blade.php" class="btn theme-btn w-100 mt-0 auth-btn">Next</a>
        </div>
    </div>

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- iconsax js -->
    <script src="../../assets/js/iconsax.js"></script>

    <!-- bootstrap js -->
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

    <!-- sticky-header js -->
    <script src="../../assets/js/sticky-header.js"></script>

    <!-- template-setting js -->
    <script src="../../assets/js/template-setting.js"></script>

    <!-- script js -->
    <script src="../../assets/js/script.js"></script>
</body>

</html>
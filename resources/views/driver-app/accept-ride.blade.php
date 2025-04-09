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
    <header id="header" class="main-header inner-page-header position-absolute bg-transparent">
        <div class="custom-container">
            <div class="header-panel p-0">
                <a href="home.blade.php">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- Select ride section starts -->
    <div class="location-map position-relative w-100 h-100" id="map"></div>
    <div class="theme-content-bg ride-content-bg">
        <div class="my-ride-box">
            <div class="my-ride-head">
                <a href="accept-ride-confirmed.blade.php" class="my-ride-img">
                    <img class="img-fluid profile-img" src="../../assets/images/profile/p4.png" alt="p5">
                </a>

                <div class="my-ride-content flex-column">
                    <div class="flex-spacing">
                        <a href="#">
                            <h5 class="p-0 title-color fw-medium">Peter Thornton</h5>
                        </a>
                        <div class="flex-align-center">
                            <div class="flex-align-center gap-1 pe-2">
                                <img class="star" src="../../assets/images/svg/star.svg" alt="star">
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
                        <img class="icon img-fluid" src="../../assets/images/svg/location-fill.svg" alt="location">
                        <h6 class="fw-normal title-color">1 km</h6>
                    </div>
                    <h6 class="fw-normal title-color">15 May’25 at 10:15 AM</h6>
                </div>
                <ul class="ride-location-listing">
                    <li class="border-0 shadow-none">
                        <div class="location-box">
                            <img class="icon bg-transparent" src="../../assets/images/svg/location-fill.svg"
                                alt="location">
                            <h5 class="fw-light title-color px-0">17, Yonge St, Toronto, Canada</h5>
                        </div>
                    </li>

                    <li class="border-0 shadow-none">
                        <div class="location-box">
                            <img class="icon bg-transparent" src="../../assets/images/svg/gps.svg" alt="gps">
                            <h5 class="fw-light title-color px-0 border-0">20, Yonge St, Toronto, Canada
                            </h5>
                        </div>
                    </li>
                </ul>
            </div>

            <h5 class="mt-3 mb-2 px-0 fw-medium title-color">Offer Your Fare</h5>

            <div class="fare-box">
                <div class="icon sub"> -10 </div>
                <input type="number" disabled value="256" min="1" max="1000">
                <div class="icon add"> +10 </div>
            </div>

        </div>

        <a href="accept-ride-confirmed.blade.php" class="btn theme-btn w-100 mt-3">Accept Fare on $256</a>
    </div>

    <!-- map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>
    <script src="../../assets/js/custom-map.js"></script>

    <!-- iconsax js -->
    <script src="../../assets/js/iconsax.js"></script>

    <!-- bootstrap js -->
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

    <!-- iconsax js -->
    <script src="../../assets/js/quantity.js"></script>

    <!-- template-setting js -->
    <script src="../../assets/js/template-setting.js"></script>

    <!-- script js -->
    <script src="../../assets/js/script.js"></script>
</body>

</html>
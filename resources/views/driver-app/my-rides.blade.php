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
                    <a href="chatting.blade.php">
                        <i class="iconsax icon-btn" data-icon="messages-2"> </i>
                    </a>
                    <a href="notification.blade.php">
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
                    data-bs-target="#pending-tab">Pending Ride</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pill-complete-tab" data-bs-toggle="pill" data-bs-target="#complete-tab">
                    Complete Ride</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pill-cancel-tab" data-bs-toggle="pill" data-bs-target="#cancel-tab">Cancel
                    Ride</button>
            </li>
        </ul>

        <div class="custom-container">
            <div class="tab-content ride-content" id="TabContent">
                <div class="tab-pane fade active show" id="pending-tab">
                    <ul class="my-ride-list driver-ride-list">
                        <li class="white-background">
                            <div class="my-ride-box">
                                <div class="my-ride-head">
                                    <a href="pending-ride-details.blade.php" class="my-ride-img">
                                        <img class="img-fluid profile-img" src="../../assets/images/profile/p5.png"
                                            alt="p5">
                                    </a>

                                    <div class="my-ride-content flex-column">
                                        <div class="flex-spacing">
                                            <a href="pending-ride-details.blade.php">
                                                <h6 class="title-color fw-medium">Peter Thornton</h6>
                                            </a>
                                            <h5 class="fw-mediun success-color">$256</h5>
                                        </div>
                                        <div class="flex-align-center gap-3">
                                            <div class="flex-align-center gap-1">
                                                <img class="star" src="../../assets/images/svg/star.svg" alt="star">
                                                <h5 class="fw-normal title-color">4.8</h5>
                                                <span class="content-color fw-normal">(127)</span>
                                            </div>
                                            <div class="flex-align-center gap-1">
                                                <i class="iconsax icon" data-icon="route-1"> </i>
                                                <h6 class="fw-normal title-color">3 km</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-ride-details">
                                    <div class="ride-info">
                                        <h6 class="fw-normal title-color">15 May’25 at 10:15 AM</h6>
                                        <div class="flex-align-center gap-2">
                                            <a href="chatting.blade.php">
                                                <img class="img-fluid communication-icon"
                                                    src="../../assets/images/svg/messages-fill.svg" alt="messages">
                                            </a>
                                            <a href="tel:+4733378901">
                                                <img class="img-fluid communication-icon"
                                                    src="../../assets/images/svg/call-fill.svg" alt="call">
                                            </a>
                                        </div>
                                    </div>
                                    <ul class="ride-location-listing">
                                        <li class="border-0 shadow-none">
                                            <div class="location-box">
                                                <img class="icon" src="../../assets/images/svg/location-fill.svg"
                                                    alt="location">
                                                <h5 class="fw-light title-color">17, Yonge St, Toronto, Canada</h5>
                                            </div>
                                        </li>

                                        <li class="border-0 shadow-none">
                                            <div class="location-box">
                                                <img class="icon" src="../../assets/images/svg/gps.svg" alt="gps">
                                                <h5 class="fw-light title-color border-0">20, Yonge St, Toronto, Canada
                                                </h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <a href="ride-verification.blade.php" class="btn theme-btn w-100 mt-3">Pickup Customer</a>

                            </div>
                        </li>
                    </ul>
                </div>

                <div class="tab-pane fade" id="complete-tab">
                    <ul class="my-ride-list driver-ride-list">
                        <li class="white-background">
                            <div class="my-ride-box">
                                <div class="my-ride-head">
                                    <a href="complete-ride-details.blade.php" class="my-ride-img">
                                        <img class="img-fluid profile-img" src="../../assets/images/profile/p5.png"
                                            alt="p5">
                                    </a>

                                    <div class="my-ride-content flex-column">
                                        <div class="flex-spacing">
                                            <a href="complete-ride-details.blade.php">
                                                <h6 class="title-color fw-medium">Aathryn Murphy</h6>
                                            </a>
                                            <h5 class="fw-mediun success-color">$220</h5>
                                        </div>
                                        <div class="flex-align-center gap-3">
                                            <div class="flex-align-center gap-1">
                                                <img class="star" src="../../assets/images/svg/star.svg" alt="star">
                                                <h5 class="fw-normal title-color">4.6</h5>
                                                <span class="content-color fw-normal">(65)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-ride-details">
                                    <div class="ride-info">
                                        <h6 class="fw-normal title-color">4 May’25 at 9:10 AM</h6>
                                        <div class="flex-align-center gap-1">
                                            <i class="iconsax icon" data-icon="route-1"> </i>
                                            <h6 class="fw-normal title-color">2 km</h6>
                                        </div>
                                    </div>
                                    <ul class="ride-location-listing">
                                        <li class="border-0 shadow-none">
                                            <div class="location-box">
                                                <img class="icon" src="../../assets/images/svg/location-fill.svg"
                                                    alt="location">
                                                <h5 class="fw-light title-color">12, custber St, ottawa, Canada</h5>
                                            </div>
                                        </li>

                                        <li class="border-0 shadow-none">
                                            <div class="location-box">
                                                <img class="icon" src="../../assets/images/svg/gps.svg" alt="gps">
                                                <h5 class="fw-light title-color border-0">86, custber St, Toronto,
                                                    Canada
                                                </h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="white-background">
                            <div class="my-ride-box">
                                <div class="my-ride-head">
                                    <a href="complete-ride-details.blade.php" class="my-ride-img">
                                        <img class="img-fluid profile-img" src="../../assets/images/profile/p4.png"
                                            alt="p5">
                                    </a>

                                    <div class="my-ride-content flex-column">
                                        <div class="flex-spacing">
                                            <a href="complete-ride-details.blade.php">
                                                <h6 class="title-color fw-medium">Templeton Peck</h6>
                                            </a>
                                            <h5 class="fw-mediun success-color">$180</h5>
                                        </div>
                                        <div class="flex-align-center gap-3">
                                            <div class="flex-align-center gap-1">
                                                <img class="star" src="../../assets/images/svg/star.svg" alt="star">
                                                <h5 class="fw-normal title-color">4.2</h5>
                                                <span class="content-color fw-normal">(17)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-ride-details">
                                    <div class="ride-info">
                                        <h6 class="fw-normal title-color">18 May’25 at 4:40 PM</h6>
                                        <div class="flex-align-center gap-1">
                                            <i class="iconsax icon" data-icon="route-1"> </i>
                                            <h6 class="fw-normal title-color">1 km</h6>
                                        </div>
                                    </div>
                                    <ul class="ride-location-listing">
                                        <li class="border-0 shadow-none">
                                            <div class="location-box">
                                                <img class="icon" src="../../assets/images/svg/location-fill.svg"
                                                    alt="location">
                                                <h5 class="fw-light title-color">32, monstry cir, ottawa, Canada</h5>
                                            </div>
                                        </li>

                                        <li class="border-0 shadow-none">
                                            <div class="location-box">
                                                <img class="icon" src="../../assets/images/svg/gps.svg" alt="gps">
                                                <h5 class="fw-light title-color border-0">35, custber St, ottawa, Canada
                                                </h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="tab-pane fade" id="cancel-tab">
                    <ul class="my-ride-list driver-ride-list">
                        <li class="white-background">
                            <div class="my-ride-box">
                                <div class="my-ride-head">
                                    <a href="cancel-ride-details.blade.php" class="my-ride-img">
                                        <img class="img-fluid profile-img" src="../../assets/images/profile/p5.png"
                                            alt="p5">
                                    </a>

                                    <div class="my-ride-content flex-column">
                                        <div class="flex-spacing">
                                            <a href="cancel-ride-details.blade.php">
                                                <h6 class="title-color fw-medium">Peter Thornton</h6>
                                            </a>
                                            <h5 class="fw-mediun success-color">$256</h5>
                                        </div>
                                        <div class="flex-align-center gap-3">
                                            <div class="flex-align-center gap-1">
                                                <img class="star" src="../../assets/images/svg/star.svg" alt="star">
                                                <h5 class="fw-normal title-color">4.8</h5>
                                                <span class="content-color fw-normal">(127)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-ride-details">
                                    <div class="ride-info">
                                        <h6 class="fw-normal title-color">5 May’25 at 2:10 PM</h6>
                                        <div class="flex-align-center gap-1">
                                            <i class="iconsax icon" data-icon="route-1"> </i>
                                            <h6 class="fw-normal title-color">1 km</h6>
                                        </div>
                                    </div>
                                    <ul class="ride-location-listing">
                                        <li class="border-0 shadow-none">
                                            <div class="location-box">
                                                <img class="icon" src="../../assets/images/svg/location-fill.svg"
                                                    alt="location">
                                                <h5 class="fw-light title-color">20, suberin St, Toronto, Canada</h5>
                                            </div>
                                        </li>

                                        <li class="border-0 shadow-none">
                                            <div class="location-box">
                                                <img class="icon" src="../../assets/images/svg/gps.svg" alt="gps">
                                                <h5 class="fw-light title-color border-0">12, custber St, ottawa, Canada
                                                </h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
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
    <div class="navbar-menu">
        <ul>
            <li>
                <a href="home.blade.php">
                    <div class="icon">
                        <img class="unactive" src="../../assets/images/svg/home.svg" alt="home">
                        <img class="active" src="../../assets/images/svg/home-fill.svg" alt="home">
                    </div>
                    <span>Home</span>
                </a>
            </li>

            <li>
                <a href="active-ride.blade.php">
                    <div class="icon">
                        <img class="unactive" src="../../assets/images/svg/driving.svg" alt="driving">
                        <img class="active" src="../../assets/images/svg/driving-fill.svg" alt="driving">
                    </div>
                    <span>Active Ride</span>
                </a>
            </li>

            <li class="active">
                <a href="my-rides.blade.php">
                    <div class="icon">
                        <img class="unactive" src="../../assets/images/svg/car.svg" alt="car">
                        <img class="active" src="../../assets/images/svg/car-fill.svg" alt="car">
                    </div>
                    <span class="active">My Rides</span>
                </a>
            </li>

            <li>
                <a href="setting.blade.php">
                    <div class="icon">
                        <img class="unactive" src="../../assets/images/svg/setting.svg" alt="setting">
                        <img class="active" src="../../assets/images/svg/setting-fill.svg" alt="setting">
                    </div>
                    <span>Setting</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- bottom navbar end -->

    <!-- sidebar starts -->
    <div class="offcanvas sidebar-offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft">
        <div class="offcanvas-header sidebar-header">
            <div class="sidebar-logo">
                <img class="img-fluid logo" src="../../assets/images/logo/driver/driver-logo.png" alt="logo">
                <img class="img-fluid logo-dark" src="../../assets/images/logo/driver/driver-logo-dark.png" alt="logo">
            </div>
        </div>
        <div class="offcanvas-body">
            <a href="profile-setting.blade.php" class="profile-part flex-align-center gap-2">
                <img class="img-fluid profile-pic" src="../../assets/images/profile/p8.png" alt="p8">
                <div>
                    <h3>Jonathan Higgins</h3>
                    <span>Edit Account</span>
                </div>
            </a>
            <ul class="link-section switch-section">
                <li class="active">
                    <a href="home.blade.php" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="home-2"> </i>
                        <h3>Home</h3>
                    </a>
                </li>
                <li>
                    <a href="my-rides.blade.php" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="car"> </i>
                        <h3>My Ride</h3>
                    </a>
                </li>
                <li>
                    <a href="notification.blade.php" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="bell-2"> </i>
                        <h3>Notification</h3>
                    </a>
                </li>

                <li>
                    <a href="setting.blade.php" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="user-1"> </i>
                        <h3>Setting</h3>
                    </a>
                </li>
                <li>
                    <a href="page-listing.blade.php" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="book-closed"> </i>
                        <h3>Template Pages</h3>
                    </a>
                </li>

                <li>
                    <a href="../elements/elements-page.html" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="document-text-1"> </i>
                        <h3> Template Elements</h3>
                    </a>
                </li>


                <li>
                    <div class="pages">
                        <i class="iconsax sidebar-icon" data-icon="repeat"> </i>
                        <h3>RTL</h3>
                    </div>
                    <div class="switch-btn">
                        <input id="dir-switch" type="checkbox">
                    </div>
                </li>

                <li>
                    <div class="pages">
                        <i class="iconsax sidebar-icon" data-icon="brush-3"> </i>
                        <h3>Dark</h3>
                    </div>
                    <div class="switch-btn">
                        <input id="dark-switch" type="checkbox">
                    </div>
                </li>

            </ul>

            <div class="bottom-sidebar">
                <a href="login.blade.php" class="pages">
                    <i class="iconsax sidebar-icon" data-icon="logout-2"> </i>
                    <h3>Logout</h3>
                </a>
            </div>
        </div>
    </div>
    <!-- sidebar end -->

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
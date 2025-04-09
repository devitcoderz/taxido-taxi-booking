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
                <a href="#offcanvasLeft" data-bs-toggle="offcanvas">
                    <i class="iconsax icon-btn" data-icon="text-align-left"> </i>
                </a>
                <h3>Active Ride</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- active ride starts -->
    <section>
        <div class="custom-container">
            <ul class="my-ride-list driver-ride-list mt-0">
                <li>
                    <div class="my-ride-box">
                        <div class="my-ride-head">
                            <a href="accept-ride-confirmed.blade.php" class="my-ride-img">
                                <img class="img-fluid profile-img" src="../../assets/images/profile/p5.png" alt="p5">
                            </a>

                            <div class="my-ride-content flex-column">
                                <div class="flex-spacing">
                                    <a href="accept-ride-confirmed.blade.php">
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
                                <h6 class="fw-normal content-color">15 May’25 at 10:15 AM</h6>
                                <div class="flex-align-center gap-2">
                                    <a href="chatting.blade.php" class="comm-icon">
                                        <img class="img-fluid icon-btn" src="../../assets/images/svg/messages-fill.svg"
                                            alt="messages">
                                    </a>
                                    <a href="tel:+4733378901" class="comm-icon">
                                        <img class="img-fluid icon-btn" src="../../assets/images/svg/call-fill.svg"
                                            alt="call">
                                    </a>
                                </div>
                            </div>
                            <ul class="ride-location-listing mt-3">
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
    </section>
    <!-- active ride end -->

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

            <li class="active">
                <a href="active-ride.blade.php">
                    <div class="icon">
                        <img class="unactive" src="../../assets/images/svg/driving.svg" alt="driving">
                        <img class="active" src="../../assets/images/svg/driving-fill.svg" alt="driving">
                    </div>
                    <span class="active">Active Ride</span>
                </a>
            </li>

            <li>
                <a href="my-rides.blade.php">
                    <div class="icon">
                        <img class="unactive" src="../../assets/images/svg/car.svg" alt="car">
                        <img class="active" src="../../assets/images/svg/car-fill.svg" alt="car">
                    </div>
                    <span>My Rides</span>
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
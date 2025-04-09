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
                <h3>Setting</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- profile section starts -->
    <section class="setting-section">
        <div class="custom-container">
            <div class="profile-section white-background rounded-2 p-3">
                <div class="flex-align-center gap-2">
                    <div class="profile-image m-0">
                        <img class="img-fluid profile-pic" src="../../assets/images/profile/p8.png" alt="p8">
                    </div>
                    <div class="profile-content">
                        <h3 class="profile-name">Jonathan Higgins</h3>
                        <h6 class="fw-normal content-color mt-1">jonathan01@gmail.com</h6>
                    </div>
                </div>
                <div class="wallet-part">
                    <h6>My Wallet Balance</h6>
                    <h5>$1,568.23 </h5>

                </div>
            </div>
        </div>


        <div class="custom-container">
            <h4 class="fw-medium title-color text-capitalize mt-4 mb-2">General</h4>
            <div class="profile-list">
                <ul class="setting-listing">
                    <li class="w-100">
                        <a href="profile-setting.blade.php" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="user-1"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Profile settings</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        <a href="wallet.blade.php" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="location"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>My wallet </h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>
                    <li class="w-100">
                        <a href="offer.blade.php" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="ticket-1"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Offer list</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        <a href="app-setting.blade.php" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="password-check"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>App setting </h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>

            <h4 class="fw-medium title-color text-capitalize mt-4 mb-2">Registration details</h4>
            <div class="profile-list">
                <ul class="setting-listing">
                    <li class="w-100">
                        <a href="driver-registration-document.blade.php" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="document-upload"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Document registration</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        <a href="driver-vehicle-details.blade.php" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="car"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Vehicle registration</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>
                    <li class="w-100">
                        <a href="driver-bank-registration-details.blade.php" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="bank"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Bank details</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <a href="../user-app/index.blade.php" class="driver-banner-part">
                <div class="driver-img">
                    <img class="img-fluid driver-icon" src="../../assets/images/svg/user-vector-img.svg" alt="">
                </div>
                <div class="driver-content">
                    <h4 class="theme-color fw-medium">Become a user</h4>
                    <i class="iconsax icon" data-icon="chevron-right"> </i>
                </div>
            </a>

            <h4 class="fw-medium error-color text-capitalize mt-4 mb-2">Alert zone</h4>
            <div class="profile-list alert-list">
                <ul class="setting-listing">
                    <li class="w-100">
                        <a href="#delete" class="setting-box" data-bs-toggle="modal">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="user-2-remove"> </i>
                            </div>
                            <div class="setting-content">
                                <h5 class="error-color">Delete account</h5>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        <a href="#logout" class="setting-box" data-bs-toggle="modal">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="logout-2"> </i>
                            </div>
                            <div class="setting-content">
                                <h5 class="error-color">Logout</h5>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- profile section starts -->

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

            <li>
                <a href="my-rides.blade.php">
                    <div class="icon">
                        <img class="unactive" src="../../assets/images/svg/car.svg" alt="car">
                        <img class="active" src="../../assets/images/svg/car-fill.svg" alt="car">
                    </div>
                    <span>My Rides</span>
                </a>
            </li>

            <li class="active">
                <a href="setting.blade.php">
                    <div class="icon">
                        <img class="unactive" src="../../assets/images/svg/setting.svg" alt="setting">
                        <img class="active" src="../../assets/images/svg/setting-fill.svg" alt="setting">
                    </div>
                    <span class="active">Setting</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- bottom navbar end -->

    <!-- delete account modal starts -->
    <div class="modal delete-modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img class="img-fluid icon" src="../../assets/images/svg/alert.svg" alt="alert">
                    <h4>Delete Your Account</h4>
                    <p>You will lost your data By delete your account.</p>
                </div>
                <div class="modal-footer">
                    <a href="setting.blade.php" class="btn gray-btn w-50 m-0" data-bs-dismiss="modal">No, Keep it</a>
                    <a href="login.blade.php" class="btn theme-btn w-50 m-0">Yes, Delete</a>
                </div>
            </div>
        </div>
    </div>
    <!-- delete account modal end -->

    <!-- logout modal starts -->
    <div class="modal delete-modal fade" id="logout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img class="img-fluid icon" src="../../assets/images/svg/logout.svg" alt="alert">
                    <h4>Come Back Soon</h4>
                    <p>Are you sure You want to Logout?</p>
                </div>
                <div class="modal-footer">
                    <a href="setting.blade.php" class="btn gray-btn w-50 m-0" data-bs-dismiss="modal">Stay, logged in</a>
                    <a href="login.blade.php" class="btn theme-btn w-50 m-0">Yes, Logout </a>
                </div>
            </div>
        </div>
    </div>
    <!-- logout modal end -->

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
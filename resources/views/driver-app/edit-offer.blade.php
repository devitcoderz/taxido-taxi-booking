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
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="offer.blade.php">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <h3>Edit Offer</h3>
            </div>
        </div>
    </header>

    <!-- edit offer section starts -->
    <section class=" section-b-space">
        <div class="auth-content-bg">
            <div class="custom-container">
                <form class="theme-form mt-0 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mt-0">
                                <label class="form-label fw-medium">Vehicle type</label>
                                <input type="text" class="form-control white-background" value="Mini sedan"
                                    placeholder="Enter vehicle type">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mt-3">
                                <label class="form-label fw-medium">Discount</label>
                                <input type="text" class="form-control white-background" value="30%"
                                    placeholder="Enter vehicle type">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mt-3">
                                <label class="form-label fw-medium">Start date</label>
                                <input type="date" class="form-control white-background">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mt-3">
                                <label class="form-label fw-medium">End date</label>
                                <input type="date" class="form-control white-background">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mt-3">
                                <label class="form-label fw-medium">Available seats</label>
                                <select class="form-select offer-select">
                                    <option disabled>Available seats</option>
                                    <option value="1">1 Person</option>
                                    <option value="2">2 Person</option>
                                    <option value="3">3 Person</option>
                                    <option selected value="4">4 Person</option>
                                    <option value="5">6 Person</option>

                                </select>
                            </div>
                        </div>

                        <h5 class="fw-medium title-color mt-3 mb-2">Available area and up to kilometers</h5>
                        <div class="col-8 ">

                            <div class="form-group mt-0">
                                <input type="text" class="form-control white-background" value="Velocity"
                                    placeholder="Enter area">
                            </div>
                        </div>
                        <div class="col-4 ">
                            <div class="form-group mt-0">
                                <select class="form-select offer-select">
                                    <option disabled>Kilometer</option>
                                    <option selected value="1">10</option>
                                    <option value="2">20</option>
                                    <option value="3">30</option>
                                    <option value="4">40</option>
                                    <option value="5">50</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="active-offer">
                    <div class="offer">
                        <div class="flex-spacing">
                            <h6 class="fw-normal title-color">Active Status</h6>
                            <div class="switch-btn">
                                <input type="checkbox" checked>
                            </div>
                        </div>

                        <p class="mt-2 content-color fw-normal">You can deactivate and activate this offer at anytime.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed-btn">
            <div class="custom-container">
                <a href="offer.blade.php" class="btn theme-btn w-100">Edit offer</a>
            </div>
        </div>
    </section>
    <!-- edit offer section end -->

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
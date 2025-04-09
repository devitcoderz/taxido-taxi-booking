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
                <a href="setting.blade.php">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <h3>My Wallet</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- wallet section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <div class="balance-details">
                <div>
                    <h6>Total Balance</h6>
                    <h4 class="mt-2">$3,263.03</h4>
                </div>
                <a href="topup-wallet.blade.php" class="btn theme-btn balance-btn mt-0">Topup Wallet</a>
            </div>

            <ul class="nav nav-pills my-ride-tab w-100 border-0 mt-4" id="Tab" role="tablist">
                <li class="nav-item  w-50" role="presentation">
                    <button class="nav-link active " id="pill-trip-tab" data-bs-toggle="pill"
                        data-bs-target="#trip-tab">Trip History</button>
                </li>
                <li class="nav-item  w-50" role="presentation">
                    <button class="nav-link" id="pill-withdraw-tab" data-bs-toggle="pill"
                        data-bs-target="#withdraw-tab">Withdraw History</button>
                </li>
            </ul>

            <div class="tab-content" id="TabContent">
                <div class="tab-pane fade active show" id="trip-tab">
                    <ul class="earning-list">
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid profile-image" src="../../assets/images/profile/p1.png" alt="p1">

                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <a href="ride-details.blade.php">
                                            <h6 class="title-color fw-medium">John Smith</h6>
                                        </a>
                                        <h5 class="fw-semibold success-color"> $200</h5>
                                    </div>
                                    <div class="flex-spacing mt-1">
                                        <h6 class="fw-medium content-color">#1067</h6>
                                        <h6 class="fw-normal content-color">15 March, 2024</h6>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="earning-box">
                                <img class="img-fluid profile-image" src="../../assets/images/profile/p2.png" alt="p2">

                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <a href="ride-details.blade.php">
                                            <h6 class="title-color fw-medium">Nikos Brown</h6>
                                        </a>
                                        <h5 class="fw-semibold success-color"> $213</h5>
                                    </div>
                                    <div class="flex-spacing">
                                        <h6 class="fw-medium content-color">#1125</h6>
                                        <h6 class="title-color fw-medium"> 22 March, 2024</h6>

                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="earning-box">
                                <img class="img-fluid profile-image" src="../../assets/images/profile/p3.png" alt="p3">

                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <a href="ride-details.blade.php">
                                            <h6 class="title-color fw-medium">Harmonie kurale</h6>
                                        </a>
                                        <h5 class="fw-semibold success-color"> $130</h5>
                                    </div>
                                    <div class="flex-spacing">
                                        <h6 class="fw-medium content-color">#1236</h6>
                                        <h6 class="content-color fw-normal mt-1"> 3 April, 2024</h6>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="earning-box">
                                <img class="img-fluid profile-image" src="../../assets/images/profile/p4.png" alt="p4">

                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <a href="ride-details.blade.php">
                                            <h6 class="title-color fw-medium">Albert Patterson</h6>
                                        </a>
                                        <h5 class="fw-semibold success-color"> $134</h5>
                                    </div>
                                    <div class="flex-spacing">
                                        <h6 class="fw-medium content-color">#1358</h6>
                                        <h6 class="content-color fw-normal mt-1"> 10 April, 2024</h6>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid profile-image" src="../../assets/images/profile/p6.png" alt="p6">

                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <a href="ride-details.blade.php">
                                            <h6 class="title-color fw-medium">Nico Norman</h6>
                                        </a>
                                        <h5 class="fw-semibold success-color"> $100</h5>
                                    </div>
                                    <div class="flex-spacing">
                                        <h6 class="fw-medium content-color">#1436</h6>
                                        <h6 class="content-color fw-normal mt-1"> 15 April, 2024</h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid profile-image" src="../../assets/images/profile/p9.png" alt="p9">

                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <a href="ride-details.blade.php">
                                            <h6 class="title-color fw-medium">Lily Green</h6>
                                        </a>
                                        <h5 class="fw-semibold success-color"> $243</h5>
                                    </div>
                                    <div class="flex-spacing">
                                        <h6 class="fw-medium content-color">#1526</h6>
                                        <h6 class="content-color fw-normal mt-1">22 April, 2024</h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid profile-image" src="../../assets/images/profile/p11.png"
                                    alt="p11">

                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <a href="ride-details.blade.php">
                                            <h6 class="title-color fw-medium">Clayton Moore</h6>
                                        </a>
                                        <h5 class="fw-semibold success-color"> $150</h5>
                                    </div>
                                    <div class="flex-spacing">
                                        <h6 class="fw-medium content-color">#1642</h6>
                                        <h6 class="content-color fw-normal mt-1">24 April, 2024</h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid profile-image" src="../../assets/images/profile/p12.png"
                                    alt="p12">

                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <a href="ride-details.blade.php">
                                            <h6 class="title-color fw-medium">Demi Clark</h6>
                                        </a>
                                        <h5 class="fw-semibold success-color"> $178</h5>
                                    </div>
                                    <div class="flex-spacing">
                                        <h6 class="fw-medium content-color">#1751</h6>
                                        <h6 class="content-color fw-normal mt-1">4 May, 2024</h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid profile-image" src="../../assets/images/profile/p17.png"
                                    alt="p17">

                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <a href="ride-details.blade.php">
                                            <h6 class="title-color fw-medium">Laura Turner</h6>
                                        </a>
                                        <h5 class="fw-semibold success-color"> $236</h5>
                                    </div>
                                    <div class="flex-spacing">
                                        <h6 class="fw-medium content-color">#1967</h6>
                                        <h6 class="content-color fw-normal mt-1">12 May, 2024</h6>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="tab-pane fade" id="withdraw-tab">
                    <ul class="earning-list">
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="../../assets/images/svg/mastercard.svg" alt="p1">

                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="ride-details.blade.php">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">15 March, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $250</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="../../assets/images/svg/paypal.svg" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="ride-details.blade.php">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">22 March, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $268</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="../../assets/images/svg/google-pay.svg" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="ride-details.blade.php">
                                                <h6 class="fw-medium title-color ">#WTP148830</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">3 April, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $155</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="../../assets/images/svg/apple-pay.svg" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="ride-details.blade.php">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">8 April, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $130</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="../../assets/images/svg/mastercard.svg" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="ride-details.blade.php">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">12 April, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $190</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="../../assets/images/svg/visa.svg" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="ride-details.blade.php">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">16 April, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $225</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="../../assets/images/svg/google-pay.svg" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="ride-details.blade.php">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">21 April, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $275</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="../../assets/images/svg/paypal.svg" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="ride-details.blade.php">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">25 April, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $220</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="../../assets/images/svg/visa.svg" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="ride-details.blade.php">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">5 May, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $120</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="earning-box">
                                <img class="img-fluid icon" src="../../assets/images/svg/mastercard.svg" alt="p1">


                                <div class="earning-content">
                                    <div class="flex-spacing">
                                        <div>
                                            <a href="ride-details.blade.php">
                                                <h6 class="fw-medium title-color ">#ACR148851</h6>
                                            </a>
                                            <h6 class="content-color fw-normal mt-1">13 May, 2024</h6>
                                        </div>
                                        <h5 class="fw-semibold success-color"> $180</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="fixed-btn">
            <div class="custom-container">
                <a href="withdraw.blade.php" class="btn theme-btn w-100">withdraw</a>
            </div>
        </div>
    </section>
    <!-- wallet section starts -->

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
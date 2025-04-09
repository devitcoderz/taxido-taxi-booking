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
                <a href="wallet.blade.php">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <h3>Withdraw</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- top up section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <h4 class="fw-medium title-color mb-3">Bank Details</h4>

            <ul class="bank-details-list">
                <li class="w-100">
                    <h5 class="fw-medium title-color">Ac No.</h5>
                    <h5>1256 2635 8956</h5>
                </li>
                <li class="w-100">
                    <h5 class="fw-medium title-color">IFSC</h5>
                    <h5>DBSS0IN0000</h5>
                </li>
                <li class="w-100">
                    <h5 class="fw-medium title-color">Bank Name</h5>
                    <h5>Capital One</h5>
                </li>
                <li class="w-100">
                    <h5 class="fw-medium title-color">Name</h5>
                    <h5>Zain dorwart</h5>
                </li>
            </ul>

            <h4 class="fw-medium title-color amount-title w-100">Add Topup Balance</h4>

            <form class="theme-form">
                <div class="form-group mt-2">
                    <label class="form-label fw-normal mb-2 title-color" for="Inputamount">Enter Amount</label>
                    <div class="position-relative">
                        <input type="number" class="form-control title-color with-icon white-background"
                            id="Inputamount" placeholder="Enter amount">
                        <i class="iconsax dollar-icon" data-icon="dollar-circle"> </i>
                    </div>
                </div>
        </div>

        <div class="fixed-btn">
            <div class="custom-container">
                <a href="wallet.blade.php" class="btn theme-btn w-100 mt-0 auth-btn">Withdraw Amount</a>
            </div>
        </div>
    </section>
    <!-- top up section end -->

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
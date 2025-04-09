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
                <a href="vehicle-registration.blade.php">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <img class="img-fluid logo" src="../../assets/images/logo/driver/driver-logo.png" alt="logo">
                <img class="img-fluid logo-dark" src="../../assets/images/logo/driver/driver-logo-dark.png" alt="logo">
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- bank details section starts -->
    <section class="auth-content-bg">
        <div class="custom-container">
            <ul class="line-design">
                <li class="active"></li>
                <li class="active"></li>
                <li class="active"></li>
            </ul>

            <div class="auth-title">
                <h2>Bank Details</h2>
                <h6>Explore your life by joining with Ride.</h6>
            </div>

            <form class="auth-form">
                <div class="form-group mt-0">
                    <label class="form-label mb-2" for="Inputname">Bank Name</label>
                    <div class="position-relative">
                        <input type="text" class="form-control white-background" id="Inputname"
                            placeholder="Enter bank name">
                        <i class="iconsax icon" data-icon="bank"></i>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="form-label mb-2" for="Inputholder">Holder Name</label>
                    <div class="position-relative">
                        <input type="text" class="form-control white-background" id="Inputholder"
                            placeholder="Enter holder name">
                        <i class="iconsax icon" data-icon="user-1"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label mb-2" for="Inputnumner">Account No.</label>
                    <div class="position-relative">
                        <input type="number" class="form-control white-background" id="Inputnumner"
                            placeholder="Enter your account no">
                        <i class="iconsax icon" data-icon="wallet-2"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label mb-2" for="Inputbranch">Branch Name</label>
                    <div class="position-relative">
                        <input type="text" class="form-control white-background" id="Inputbranch"
                            placeholder="Enter branch name">
                        <i class="iconsax icon" data-icon="building-1"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label mb-2" for="Inputcode">IFSC code</label>
                    <div class="position-relative">
                        <input type="email" class="form-control white-background" id="Inputcode"
                            placeholder="Enter ifsc code">
                        <i class="iconsax icon" data-icon="code-2"></i>
                    </div>
                </div>
            </form>

            <div class="fixed-btn">
                <div class="custom-container">
                    <a href="login.blade.php" class="btn theme-btn w-100 mt-0 auth-btn">Next</a>
                </div>
            </div>
        </div>
    </section>
    <!-- bank details section end -->

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
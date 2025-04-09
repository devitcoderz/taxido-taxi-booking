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
                <h3>Bank Registration Details</h3>

            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- bank details section starts -->
    <section>
        <div class="auth-content-bg">
            <div class="custom-container">
                <form class="theme-form mt-0 pt-2">
                    <div class="form-group mt-0">
                        <label class="form-label mb-2" for="Inputname">Bank Name</label>
                        <input type="text" class="form-control white-background" id="Inputname" value="DBS Bank"
                            placeholder="Enter bank name">
                    </div>
                    <div class="form-group ">
                        <label class="form-label mb-2" for="Inputholder">Holder Name</label>
                        <input type="text" class="form-control white-background" id="Inputholder" value="Zain Dorwart"
                            placeholder="Enter holder name">
                    </div>
                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputnumner">Account No.</label>
                        <input type="number" class="form-control white-background" id="Inputnumner" value="125626358956"
                            placeholder="Enter your account no">
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputbranch">Branch Name</label>
                        <input type="text" class="form-control white-background" id="Inputbranch" value="Toronto"
                            placeholder="Enter branch name">
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputcode">IFSC Code</label>
                        <input type="email" class="form-control white-background" id="Inputcode" value="DBS0IN0831"
                            placeholder="Enter ifsc code">
                    </div>
                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputswift">Swift Code</label>
                        <input type="email" class="form-control white-background" id="Inputswift" value="DBS0IN0831"
                            placeholder="Enter swift code">
                    </div>
                </form>

                <div class="fixed-btn">
                    <div class="custom-container">
                        <a href="setting.blade.php" class="btn theme-btn w-100 mt-0 auth-btn">Update</a>
                    </div>
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
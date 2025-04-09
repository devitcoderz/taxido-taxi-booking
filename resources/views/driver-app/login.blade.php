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
    <link rel="icon" href="assets/images/logo/favicon.png" type="image/x-icon">
    <title>Taxido - Driver App </title>

    <link rel="apple-touch-icon" href="assets/images/logo/favicon.png">
    <meta name="title-color" content="#1F1F1F">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="taxido">
    <meta name="msapplication-TileImage" content="assets/images/logo/favicon.png">

    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Google font-->
    <link rel="stylesheet" type="text/css" href="assets/css/GTWalsheimPro.css">

    <!-- iconsax css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/iconsax.css">

    <!-- bootstrap css -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="assets/css/style.css">
    @laravelPWA
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register("{{ asset('sw.js') }}");
        }
    </script>
</head>

<body>
    <!-- header starts -->
    <header id="header" class="auth-header">
        <div class="custom-container">
            <div class="header-panel  pb-0">
                <img class="img-fluid mx-auto logo" src="assets/images/logo/driver/driver-logo.png" alt="logo">
                <img class="img-fluid mx-auto logo-dark" src="assets/images/logo/driver/driver-logo-dark.png"
                    alt="logo">
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- login page start -->
    <div class="auth-bg-image-box">
        <div class="auth-bg-image"></div>
        <div class="auth-content-bg auth-content-bg-bottom">
            <div class="custom-container white-background pb-2">
                <div class="auth-title mt-0">
                    <div class="loader-line"></div>
                    <h2>Let’s you in</h2>
                    <h6>Hey, You have been missed !</h6>
                </div>

                <form class="auth-form">
                    <div class="form-group mt-0">
                        <label class="form-label" for="validationDefault01">Mobile Number</label>
                        <div class="d-flex gap-2">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle mt-0" href="#" data-bs-toggle="dropdown">
                                    +1-212
                                    <i class="iconsax dropdown-icon" data-icon="chevron-down"> </i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="dropdown-item">+1-212</a></li>
                                    <li><a href="#" class="dropdown-item">+1-213</a></li>
                                    <li><a href="#" class="dropdown-item">+1-702</a></li>
                                    <li><a href="#" class="dropdown-item">+1-312</a></li>
                                    <li><a href="#" class="dropdown-item">+1-617</a></li>
                                </ul>
                            </div>
                            <div class="form-group position-relative mt-0 w-100">
                                <input type="number" class="form-control" id="validationDefault01"
                                    placeholder="Enter your number" required>
                                <i class="iconsax icon" data-icon="phone"></i>
                            </div>
                        </div>
                    </div>

                    <div class="division">
                        <span>OR</span>
                    </div>

                    <div class="flex-align-center gap-3">
                        <a href="https://www.google.co.in/" class="btn theme-btn google-btn w-50 flex-center gap-2">
                            <img class="img-fluid google" src="assets/images/svg/google.svg" alt="google" /> with
                            Google</a>

                        <a href="https://www.apple.com/" class="btn theme-btn google-btn w-50 flex-center gap-2">
                            <img class="img-fluid google" src="assets/images/svg/apple.svg" alt="apple" /> with
                            Apple</a>
                    </div>

                    <a href="otp.blade.php" class="btn theme-btn w-100 auth-btn">Get OTP</a>
                    <h6 class="content-color fw-normal my-3 text-center"> New User ?
                        <a href="{{url('/signup')}}" class="title-color fw-medium">Sign up</a>
                    </h6>
                </form>
            </div>
        </div>
    </div>
    <!-- login page end -->

    <!-- iconsax js -->
    <script src="assets/js/iconsax.js"></script>

    <!-- sticky-header js -->
    <script src="assets/js/sticky-header.js"></script>

    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- template-setting js -->
    <script src="assets/js/template-setting.js"></script>

    <!-- script js -->
    <script src="assets/js/script.js"></script>
</body>

</html>
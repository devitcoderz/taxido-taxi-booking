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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/GTWalsheimPro.css')}}">

    <!-- iconsax css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/iconsax.css')}}">

    <!-- bootstrap css -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="{{asset('assets/css/vendors/bootstrap.css')}}">

    <!-- Theme css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="{{asset('assets/css/style.css')}}">
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
            <div class="header-panel pb-0">
                <img class="img-fluid mx-auto logo" src="{{asset('assets/images/logo/driver/driver-logo.png')}}" alt="logo">
                <img class="img-fluid mx-auto logo-dark" src="{{asset('assets/images/logo/driver/driver-logo-dark.png')}}"
                    alt="logo">
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- signup page starts -->
    <div class="auth-bg-image-box">
        <div class="auth-bg-image"></div>
        <div class="auth-content-bg auth-content-bg-bottom">
            <div class="custom-container white-background pb-2">
                <div class="auth-title">
                    <div class="loader-line"></div>
                    <h2>Create your account</h2>
                    <h6>Explore your life by joining with Ride.</h6>
                </div>

                <form class="auth-form">
                    <div class="form-group mt-0">
                        <label class="form-label mb-2" for="Inputname">User Name</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" id="Inputname" placeholder="Enter your name">
                            <i class="iconsax icon" data-icon="user-2"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputnumner">Mobile Number</label>
                        <div class="position-relative">
                            <input type="number" class="form-control" id="Inputnumner" placeholder="Enter your number">
                            <i class="iconsax icon" data-icon="phone"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputemail">Email</label>
                        <div class="position-relative">
                            <input type="email" class="form-control" id="Inputemail" placeholder="Enter your email">
                            <i class="iconsax icon" data-icon="mail"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputid">Referral ID</label>
                        <div class="position-relative">
                            <input type="email" class="form-control" id="Inputid" placeholder="Enter referral id">
                            <i class="iconsax icon" data-icon="profile-card"></i>
                        </div>
                    </div>

                    <a href="driver-document-verify.blade.php" class="btn theme-btn w-100 auth-btn">Sign Up</a>
                    <h6 class="content-color fw-normal my-3 text-center"> Already have
                        an account ? <a href="{{url('/login') }}" class="title-color fw-medium">Sign in</a> </h6>
                </form>
            </div>
        </div>
    </div>
    <!-- signup page end -->

    <!-- iconsax js -->
    <script src="{{asset('assets/js/iconsax.js')}}"></script>

    <!-- sticky-header js -->
    <script src="{{asset('assets/js/sticky-header.js')}}"></script>

    <!-- bootstrap js -->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <!-- template-setting js -->
    <script src="{{asset('assets/js/template-setting.js')}}"></script>

    <!-- script js -->
    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>
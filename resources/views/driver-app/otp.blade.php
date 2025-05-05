@extends('driver-app.layout')
@section('title')
    <title>Taxido - Driver App </title>
@endsection

@section('style')

    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/swiper-bundle.min.css')}}">

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="auth-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('driver/login')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <img class="img-fluid logo" src="{{asset('assets/images/logo/driver/driver-logo.png')}}" alt="logo">
                <img class="img-fluid logo-dark" src="{{asset('assets/images/logo/driver/driver-logo-dark.png')}}" alt="logo">
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- otp page starts -->
    <div class="auth-bg-image-box">
        <div class="auth-bg-image"></div>
        <div class="auth-content-bg auth-content-bg-bottom">
            <div class="custom-container">
                <div class="auth-title pt-3">
                    <div class="loader-line"></div>
                    <h2>OTP verification</h2>
                    <h6>Enter OTP sent to +1-212-8684536</h6>
                </div>

                <h4 class="title-color fw-medium otp-name">OTP</h4>
                <form class="otp-form" action="{{route('driver.register')}}" method="post">
                    <input type="hidden" name="user_data" value='@json($requestData)'>
                    <input type="hidden" name="otp" id="full_otp">
                    @csrf
                    <div class="form-input dark-border-gradient">
                        <input type="number" class="form-control active" placeholder="0" id="five1"
                            onkeyup="onKeyUpEvent(1, event)" onfocus="onFocusEvent(1)">
                    </div>
                    <div class="form-input dark-border-gradient">
                        <input type="number" class="form-control" placeholder="0" id="five2"
                            onkeyup="onKeyUpEvent(2, event)" onfocus="onFocusEvent(2)">
                    </div>
                    <div class="form-input dark-border-gradient">
                        <input type="number" class="form-control" placeholder="0" id="five3"
                            onkeyup="onKeyUpEvent(3, event)" onfocus="onFocusEvent(3)">
                    </div>
                    <div class="form-input dark-border-gradient">
                        <input type="number" class="form-control" placeholder="0" id="five4"
                            onkeyup="onKeyUpEvent(4, event)" onfocus="onFocusEvent(4)">
                    </div>
                    <div class="form-input dark-border-gradient">
                        <input type="number" class="form-control" placeholder="0" id="five5"
                            onkeyup="onKeyUpEvent(5, event)" onfocus="onFocusEvent(5)">
                    </div>
                <button type="submit" class="btn theme-btn w-100 auth-btn">Verify</button>
                </form>
                <h6 class="title-color fw-semibold mt-3 text-center"> <span class="content-color fw-medium">Not Received
                        Yet ? </span> <a href="otp.blade.php" class="title-color fw-medium">Resend it</a> </h6>
            </div>
        </div>
    </div>
    <!-- otp page end -->

@endsection
@section('script')
    <!-- otp js -->
    <script src="{{asset('assets/js/otp.js')}}"></script>

    <script>
        document.querySelector('.otp-form').addEventListener('submit', function(e) {
            const otp = [
                document.getElementById('five1').value,
                document.getElementById('five2').value,
                document.getElementById('five3').value,
                document.getElementById('five4').value,
                document.getElementById('five5').value
            ].join('');

            document.getElementById('full_otp').value = otp;
        });
    </script>
@endsection

@extends('driver-app.layout')
@section('title')
<title>Taxido - Driver App </title>
@endsection

@section('style')


@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="auth-header">
        <div class="custom-container">
            <div class="header-panel  pb-0">
                <img class="img-fluid mx-auto logo" src="{{asset('assets/images/logo/driver/driver-logo.png')}}" alt="logo">
                <img class="img-fluid mx-auto logo-dark" src="{{asset('assets/images/logo/driver/driver-logo-dark.png')}}"
                    alt="logo">
            </div>
        </div>
    </header>
    <!-- header end -->
<img src="">
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

                <form class="auth-form" action="{{url('driver/otp')}}" method="post">
                    @csrf
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
                                    placeholder="Enter your number" required name="phone">
                                <i class="iconsax icon" data-icon="phone"></i>
                            </div>
                        </div>
                    </div>

                    <div class="division">
                        <span>OR</span>
                    </div>

                    <div class="flex-align-center gap-3">
                        <a href="https://www.google.co.in/" class="btn theme-btn google-btn w-50 flex-center gap-2">
                            <img class="img-fluid google" src="{{asset('assets/images/svg/google.svg')}}" alt="google" /> with
                            Google</a>

                        <a href="https://www.apple.com/" class="btn theme-btn google-btn w-50 flex-center gap-2">
                            <img class="img-fluid google" src="{{asset('assets/images/svg/apple.svg')}}" alt="apple" /> with
                            Apple</a>
                    </div>

                    <button type="submit" class="btn theme-btn w-100 auth-btn">Get OTP</button>
                    <h6 class="content-color fw-normal my-3 text-center"> New User ?
                        <a href="{{url('driver/signup')}}" class="title-color fw-medium">Sign up</a>
                    </h6>
                </form>
            </div>
        </div>
    </div>
    <!-- login page end -->
    @endsection
@section('script')

    @endsection

@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')

@endsection

@section('content')
    <!-- header starts -->
    <!-- header starts -->
    <header id="header" class="auth-header pb-0">
        <div class="custom-container">
            <div class="header-panel pb-0">
                <a href="{{url('user/login')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- forgot password page start -->
    <div class="auth-image">
        <img class="img-fluid auth-img" src="{{asset('assets/images/forgot-password.svg')}}" alt="forgot-password">
    </div>
    <div class="auth-bg-image-box auth-bg-image-box-inner">
        <div class="auth-content-bg auth-content-bg-bottom mt-0">
            <div class="custom-container">
                <div class="auth-title mt-0">
                    <div class="loader-line"></div>
                    <h2>Forgot Your Password?</h2>
                    <h6>Enter your email, and we’ll send reset instructions.</h6>
                </div>

                <form class="auth-form mt-0">
                    <div class="form-group">
                        <label class="form-label mb-2" for="Inputemail">Email</label>
                        <div class="position-relative">
                            <input type="email" class="form-control" id="Inputemail" placeholder="Enter email">
                            <i class="iconsax icon" data-icon="mail"></i>
                        </div>
                    </div>
                </form>

            </div>

            <div class="fixed-btn">
                <div class="custom-container">
                    <a href="{{url('user/verification')}}" class="btn theme-btn w-100">Send</a>
                </div>
            </div>
        </div>
    </div>
    <!-- forgot password page end -->

    @endsection

    @section('script')

@endsection
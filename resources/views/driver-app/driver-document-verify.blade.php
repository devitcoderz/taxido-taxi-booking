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
    <header id="header" class="auth-header inner-page-header white-background pb-3">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('driver/signup')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <img class="img-fluid logo" src="{{asset('assets/images/logo/driver/driver-logo.png')}}" alt="logo">
                <img class="img-fluid logo-dark" src="{{asset('assets/images/logo/driver/driver-logo-dark.png')}}" alt="logo">
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- document varify  page starts -->
    <section class="auth-content-bg">
        <div class="custom-container">
            <ul class="line-design">
                <li class="active"></li>
                <li></li>
                <li></li>
            </ul>

            <div class="auth-title">
                <h2>Document Verify</h2>
                <h6>Explore your life by joining with Ride.</h6>
            </div>

            <ul class="auth-form">
                <li class="form-group mt-0">
                    <h5 class="fw-medium title-color mb-2">Birth Certificate</h5>
                    <div id="output" class="upload-image">
                        <input id="file" class="form-control upload-file" type="file" id="formFileLg">
                        <i class="iconsax upload-icon" data-icon="logout-2"> </i>
                        <h5>Upload</h5>
                    </div>
                </li>
                <li class="form-group">
                    <h5 class="fw-medium title-color mb-2">Certificate of Registration</h5>
                    <div id="output" class="upload-image">
                        <input id="file" class="form-control upload-file" type="file" id="formFileLg">
                        <i class="iconsax upload-icon" data-icon="logout-2"> </i>
                        <h5>Upload</h5>
                    </div>
                </li>
                <li class="form-group">
                    <h5 class="fw-medium title-color mb-2">Driving License</h5>
                    <div id="output" class="upload-image">
                        <input id="file" class="form-control upload-file" type="file" id="formFileLg">
                        <i class="iconsax upload-icon" data-icon="logout-2"> </i>
                        <h5>Upload</h5>
                    </div>
                </li>
                <li class="form-group">
                    <h5 class="fw-medium title-color mb-2">National ID any ID Proof</h5>
                    <div id="output" class="upload-image">
                        <input id="file" class="form-control upload-file" type="file" id="formFileLg">
                        <i class="iconsax upload-icon" data-icon="logout-2"> </i>
                        <h5>Upload</h5>
                    </div>
                </li>
                <li class="form-group">
                    <h5 class="fw-medium title-color mb-2">Pan Card</h5>
                    <div id="output" class="upload-image">
                        <input id="file" class="form-control upload-file" type="file" id="formFileLg">
                        <i class="iconsax upload-icon" data-icon="logout-2"> </i>
                        <h5>Upload</h5>
                    </div>
                </li>
            </ul>
        </div>

        <div class="fixed-btn">
            <div class="custom-container">
                <a href="{{url('driver/vehicle-registration')}}" class="btn theme-btn w-100">Next</a>
            </div>
        </div>
    </section>

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->


@endsection
@section('script')

    <!-- image change js -->
    <script src="{{asset('assets/js/image-change.js')}}"></script>
@endsection
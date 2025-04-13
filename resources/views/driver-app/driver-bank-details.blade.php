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
                <a href="{{url('driver/vehicle-registration')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <img class="img-fluid logo" src="{{asset('assets/images/logo/driver/driver-logo.png')}}" alt="logo">
                <img class="img-fluid logo-dark" src="{{asset('assets/images/logo/driver/driver-logo-dark.png')}}" alt="logo">
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
                    <a href="{{url('driver/login')}}" class="btn theme-btn w-100 mt-0 auth-btn">Next</a>
                </div>
            </div>
        </div>
    </section>
    <!-- bank details section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

@endsection
@section('script')

@endsection
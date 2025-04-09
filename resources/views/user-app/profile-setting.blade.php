@extends('user-app.layout')

@section('title')
    <title>Taxido - User App </title>
@endsection

@section('style')

@endsection

@section('content')
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="{{url('user/setting')}}">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <h3>Profile setting</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- setting section starts -->
    <div class="setting-section profile-setting-section mt-0">
        <div class="custom-container">
            <div class="profile-section section-t-space">
                <div class="profile-image">
                    <img id="output" class="img-fluid profile-pic" src="{{asset('assets/images/profile/p8.png')}}" alt="p8">
                    <input id="file" type="file" onchange="loadFile(event)">
                    <i class="iconsax upload-icon" data-icon="edit-2"> </i>
                </div>
            </div>
            <form class="theme-form">
                <div class="form-group mt-0">
                    <label class="form-label mb-2" for="Inputname">User Name</label>
                    <input type="text" class="form-control" id="Inputname" placeholder="Enter your name">
                </div>

                <div class="form-group">
                    <label class="form-label mb-2" for="Inputnumner">Mobile Number</label>
                    <input type="number" class="form-control" id="Inputnumner" placeholder="Enter your number">
                </div>

                <div class="form-group">
                    <label class="form-label mb-2" for="Inputemail">Email</label>
                    <input type="email" class="form-control" id="Inputemail" placeholder="Enter your email">
                </div>
            </form>
        </div>
        <div class="fixed-btn">
            <div class="custom-container">
                <a href="{{url('user/setting')}}" class="btn theme-btn w-100 auth-btn">Update</a>
            </div>
        </div>
    </div>
    <!-- setting section starts -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    @section('script')

        <!-- image-change js -->
        <script src="{{asset('assets/js/image-change.js')}}"></script>

@endsection
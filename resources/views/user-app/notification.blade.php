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
                <div class="flex-align-center gap-2">
                    <a href="{{url('user/home')}}">
                        <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                    </a>
                    <h3>Notifications</h3>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- notification section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <ul class="notification-list">
                <li>
                    <div class="notification-box">
                        <div class="notification-icon">
                            <i class="iconsax icon" data-icon="clock"> </i>
                        </div>
                        <div>
                            <h5>Account Alert!</h5>
                            <p>This allow you to retrieve your account if you lose access.</p>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="notification-box">
                        <div class="notification-icon">
                            <i class="iconsax icon" data-icon="discount-circle"> </i>
                        </div>
                        <div>
                            <h5>Receive 20% discount for first ride</h5>
                            <p>You have booked plumber service today at 6:30pm.</p>
                        </div>

                    </div>
                </li>
                <li>
                    <div class="notification-box">
                        <div class="notification-icon">
                            <i class="iconsax icon" data-icon="driving"> </i>
                        </div>
                        <div>
                            <h5>New year shopping with rider!</h5>
                            <p>You have booked plumber service today at 6:30pm.</p>
                        </div>

                    </div>
                </li>
                <li>
                    <div class="notification-box">
                        <div class="notification-icon">
                            <i class="iconsax icon" data-icon="ticket-discount"></i>
                        </div>
                        <div>
                            <h5>You have received 1 coupon</h5>
                            <p>You have booked plumber service today at 6:30pm.</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- notification section end -->

@endsection

@section('script')


@endsection
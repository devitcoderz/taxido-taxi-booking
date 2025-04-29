<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="taxido">
    <meta name="keywords" content="taxido">
    <meta name="author" content="taxido">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="icon" href="{{asset('assets/images/logo/favicon.png')}}" type="image/x-icon">
    @yield('title')

    <link rel="apple-touch-icon" href="{{asset('assets/images/logo/favicon.png')}}">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @yield('style')

    {{--@laravelPWA--}}
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register("{{ asset('sw.js') }}");
        }
    </script>
</head>

<body>

@yield('content')


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@yield('script')

<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif

    @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.info("{{ Session::get('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.warning("{{ Session::get('warning') }}");
    @endif
</script>
</body>

</html>

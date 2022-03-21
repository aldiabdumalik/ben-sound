<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>{{ $comprof->name }}</title>
    <link rel="shortcut icon" href="{{ asset('files/logo/'.$comprof->logo) }}">

    <!-- css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/bootstrap.min.css') }}">

    <!-- icons - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/fontawesome-all.css') }}">

    <!-- slider & carousel - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/owl.theme.default.min.css') }}">

    <!-- animation - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/aos.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/splitting.css') }}">

    <!-- magnific popup - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/modules/jquery-toastr/jquery.toast.min.css') }}">

    <!-- custom - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/style.css') }}">
</head>
<body class="home_agency">

    <div class="body_wrap">
        <div id="thetop"></div>
        <div id="backtotop">
            <a href="#" id="scroll">
                <i class="fal fa-arrow-up"></i>
                <i class="fal fa-arrow-up"></i>
            </a>
        </div>

        @include('web_partials.header_desktop')
        @include('web_partials.mobile')

        @yield('content')

        @include('web_partials.footer')
    </div>

    <!-- jquery include -->
    <script src="{{ asset('web/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('web/js/popper.min.js') }}"></script>
    <script src="{{ asset('web/js/bootstrap.min.js') }}"></script>

    <!-- slider & carousel - jquery include -->
    <script src="{{ asset('web/js/owl.carousel.min.js') }}"></script>

    <!-- animation - jquery include -->
    <script src="{{ asset('web/js/aos.js') }}"></script>
    <script src="{{ asset('web/js/splitting.js') }}"></script>

    <!-- magnific popup - jquery include -->
    <script src="{{ asset('web/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('admin/modules/jquery-toastr/jquery.toast.min.js') }}"></script>

    <!-- isotope filter - jquery include -->
    <script src="{{ asset('web/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('web/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('web/js/imagesloaded.pkgd.min.js') }}"></script>

    <!-- mouse move & scroll parallax  - jquery include -->
    <script src="{{ asset('web/js/parallax.min.js') }}"></script>
    <script src="{{ asset('web/js/parallax-scroll.js') }}"></script>

    <!-- google map - jquery include -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhrdEzlfpnsnfq4MgU1e1CCsrvVx2d59s"></script>
    <script src="{{ asset('web/js/gmaps.js') }}"></script>

    <!-- mobile menu - jquery include -->
    <script src="{{ asset('web/js/mCustomScrollbar.js') }}"></script>

    <!-- custom - jquery include -->
    <script src="{{ asset('web/js/custom.js') }}"></script>
    @stack('page-js')
</body>
</html>
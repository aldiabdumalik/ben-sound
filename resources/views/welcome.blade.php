<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ben & Sound</title>
    <link rel="shortcut icon" href="{{ asset('web/images/logo/favourite_icon_1.png') }}">

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

        <main>
            @include('web_partials.banner')

            <section class="feature_section sec_ptb_120 deco_wrap clearfix">
                <div class="container">
                    @include('web_partials.about')
                </div>
            </section>
            
            <div class="container" data-aos="fade-up" data-aos-delay="300">
                <hr class="m-0">
            </div>
            
            @include('web_partials.client')

            @include('web_partials.contact')

        </main>

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
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield('title')</title>
    
    <link rel="stylesheet" href="{{ asset('admin/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/modules/fontawesome/css/all.min.css')}}">
    <!-- Page Specific JS File -->
    @stack('page-css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/modules/jquery-toastr/jquery.toast.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/components.css')}}">
</head>
<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('partials.topbar')
            @include('partials.sidebar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('title')</h1>
                        {{ Breadcrumbs::render() }}
                    </div>

                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>

            @include('partials.footer')
        </div>
    </div>
    <script src="{{ asset('admin/modules/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/modules/popper.js')}}"></script>
    <script src="{{ asset('admin/modules/tooltip.js')}}"></script>
    <script src="{{ asset('admin/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{ asset('admin/modules/moment.min.js')}}"></script>
    <script src="{{ asset('admin/js/stisla.js')}}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('admin/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('admin/modules/jquery-loading/jquery-loading.js')}}"></script>
    <script src="{{ asset('admin/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('admin/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('admin/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('admin/modules/jquery-toastr/jquery.toast.min.js') }}"></script>
    <!-- Page Specific JS File -->
    @stack('page-js')
    <!-- Template JS File -->
    <script src="{{ asset('admin/js/scripts.js')}}"></script>
    <script src="{{ asset('admin/js/custom.js')}}"></script>
    @stack('custom-js')
</body>
</html>
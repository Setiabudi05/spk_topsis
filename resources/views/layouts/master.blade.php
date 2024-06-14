<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- <link rel="stylesheet" href="{{ asset('assets/admin/scss/app.scss') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/scss/themes/dark/app-dark.scss') }}">
    <link rel="shortcut icon" href="{{ asset('assets/admin/static/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/admin/static/images/logo/favicon.png') }}" type="image/png"> --}}
    <link rel="shortcut icon" href="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/compiled/svg/favicon.svg" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/compiled/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/compiled/css/iconly.css">
    @stack('css')
</head>

<body>

    @include('sweetalert::alert')
    {{-- <script src="{{ asset('assets/admin/static/js/initTheme.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/static/js/initTheme.js"></script>

    <div id="app">
        <div id="sidebar">
            @include('layouts.sidebar')
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>
    {{-- <script src="{{ secure_asset('assets/admin/static/js/components/dark.js') }}"></script>
    <script src="{{ secure_asset('assets/admin/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ secure_asset('assets/admin/js/app.js') }}" type="module"></script>
    <script src="{{ secure_asset('assets/admin/compiled/js/app.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/static/js/components/dark.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/compiled/js/app.js"></script>

    <!-- Need: Apexcharts -->
    <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/static/js/pages/dashboard.js"></script>
    <script src="{{ asset('assets/plugin/sweetalerts/sweetalert2.min.js') }}"></script>
    @stack('js')
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - SPK TOPSIS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('public.layouts.css')
    @stack('css')
</head>

<body class="index-page">
    @include('public.layouts.navbar')
    <main class="main">
        @yield('content')
    </main>

    @include('public.layouts.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    @include('public.layouts.js')
    @stack('js')
</body>

</html>

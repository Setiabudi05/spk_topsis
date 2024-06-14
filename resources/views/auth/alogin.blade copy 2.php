<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="Login - Komisi Pemilihan Kahim">
    <meta name="keywords" content="Komisi Pemilihan Kahim, Login, ">
    <title>Login &mdash; Stisla</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('asset/logo-HME.png') }}">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/auth/css/components.css') }}">

    <style>
        @media (max-width: 768px) {
            .min-vh-100 {
                min-height: 75vh !important;
            }
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-2 m-2">
                        <h3 class="mt-3">Login</h3>
                        {{-- <img src="{{ asset('asset/logo-HME.png') }}" alt="logo" width="150" class="shadow-light mb-3 mt-2"> --}}
                        <h4 class="text-dark font-weight-normal">Selamat Datang <br><span class="font-weight-bold">Sistem Pendukung Pemilihan Guru</span></h4>
                        {{-- <p class="text-muted">Before you get started, you must login or register if you don't already have an account.</p> --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul style="margin: 0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif
                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control shadow" name="email" value="{{ old('email') }}" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Mohon isi nim anda!
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control shadow" name="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                    Mohon isi password anda!
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <a href="{{ route('password.request') }}" class="float-left mt-3">
                                    Forgot Password?
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                    Login
                                </button>
                            </div>
                            <div class="mt-5 text-center">
                                Don't have an account? <a href="{{ route('register') }}">Create new one</a>
                            </div>
                            <a href="{{ route('auth.redirect') }}" style="margin-top: 0px !important;background: #C84130;color: #ffffff;padding: 8px;border-radius:6px;"
                               class="items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white text-center uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-4">
                                <strong>Login with Google</strong>
                            </a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
                     data-background="{{ asset('assets/auth/img/unsplash/login-bg.jpg') }}">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h1 class="mb-2 display-4 font-weight-bold">
                                    @php
                                        $hour = now()->format('H');
                                        if ($hour >= '01' && $hour < '10') {
                                            echo 'Selamat Pagi';
                                        } elseif ($hour >= '10' && $hour < '15') {
                                            echo 'Selamat Siang';
                                        } elseif ($hour >= '15' && $hour < '19') {
                                            echo 'Selamat Sore';
                                        } elseif ($hour >= '19' || $hour < '01') {
                                            echo 'Selamat Malam';
                                        }
                                    @endphp
                                </h1>
                                <h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
                            </div>
                            Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank"
                               href="https://unsplash.com">Unsplash</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('assets/auth/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/auth/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/auth/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
    {{-- <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script> --}}

</body>

</html>

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{ route('home.index') }}" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('assets/public/img/logo.png') }}" alt="">
            <h1 class="sitename">SPK TOPSIS</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('home.index') }}" class="{{ request()->segment(1) === null ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('public.pendaftaran.index') }}" class="{{ request()->segment(2) === 'pendaftaran' ? 'active' : '' }}">Pendaftaran</a></li>
                @role(['Superadmin', 'Admin'])
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                @endrole
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="text-danger ms-3 btn btn-outline-danger" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="bi bi-power"></i>
                    <span>{{ __('Log Out') }}</span>
                </a>
            </form>
        @else
            <a class="btn-getstarted flex-md-shrink-0" href="{{ route('login') }}">Login</a>
        @endauth

    </div>
</header>

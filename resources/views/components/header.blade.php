<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-green fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-semibold brand-wrapper" href="/">
                <img src="{{ asset('images/logo-kemenag.png') }}" width="95" height="90" class="brand-logo">
                <div class="brand-text text-center">
                    MTsN 1 Padang <br> Lawas Utara
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fw-semibold">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('akademik*') ? 'active' : '' }}" href="/akademik">Akademik</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('berita*') ? 'active' : '' }}" href="/berita">Berita</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('ppdb*') ? 'active' : '' }}" href="/ppdb">PPDB</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('sarpas*') ? 'active' : '' }}" href="/sarpas">Sarpas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('rdm*') ? 'active' : '' }}" href="/rdm">RDM</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
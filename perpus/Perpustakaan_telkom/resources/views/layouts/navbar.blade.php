<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm">
    <div class="container">


        {{-- Toggle Mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            {{-- Menu --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}"
                       href="{{ route('books.index') }}">
                        Buku
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('transactions.*') ? 'active' : '' }}"
                       href="{{ route('transactions.index') }}">
                        Transaksi
                    </a>
                </li>

                @if (Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
                           href="{{ route('users.index') }}">
                            Kelola Anggota
                        </a>
                    </li>
                @endif
            </ul>

            {{-- User Info --}}
            <div class="d-flex align-items-center gap-3 text-white">

                <div class="text-end d-none d-lg-block">
                    <div class="fw-semibold">{{ Auth::user()->name }}</div>
                    <small class="text-light opacity-75">
                        {{ Auth::user()->role == 'admin'
                            ? 'Administrator'
                            : Auth::user()->major . ' - ' . Auth::user()->class }}
                    </small>
                </div>

                {{-- Logout --}}
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm px-3">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>
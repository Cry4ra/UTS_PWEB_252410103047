@props(['username', 'totalUc' => 0])

<nav class="navbar navbar-expand-lg navbar-dark nav-custom">
    <div class="container">
        <a class="navbar-brand brand-text" href="{{ route('dashboard', ['username' => $username]) }}">⚡ RV Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard', ['username' => $username]) }}">Top Up</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('pengelolaan', ['username' => $username]) }}">Pengelolaan</a></li>
                <li class="nav-item dropdown">
                    <a class="btn btn-sm btn-outline-warning dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        👤 {{ $username }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark p-3" style="min-width:230px">
                        <small class="text-secondary">Nama</small>
                        <div class="fw-bold mb-2">{{ $username }}</div>
                        <small class="text-secondary">Total UC</small>
                        <div class="fw-bold text-warning mb-3">{{ number_format($totalUc, 0, ',', '.') }} UC</div>
                        <a href="{{ route('profile', ['username' => $username]) }}" class="btn btn-gold btn-sm w-100 mb-2">Lihat Profil</a>
                        <a href="{{ route('login') }}" class="btn btn-outline-danger btn-sm w-100">Keluar</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
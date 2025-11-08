<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            Klinik App
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">

                {{-- Menu untuk Admin --}}
                @if (Auth::check() && Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}">Kelola User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.doctors.index') }}">Kelola Dokter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.specializations.index') }}">Kelola Spesialisasi</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Kelola Staff</a>
                    </li>
                @endif

                {{-- Menu untuk Doctor --}}
                @if (Auth::check() && Auth::user()->role === 'doctor')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('doctor.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Daftar Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jadwal Praktek</a>
                    </li>
                @endif

                {{-- Menu untuk Staff --}}
                @if (Auth::check() && Auth::user()->role === 'staff')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('staff.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pendaftaran Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Laporan</a>
                    </li>
                @endif

            </ul>

            {{-- Logout button --}}
            <ul class="navbar-nav">
                <li class="nav-item">
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

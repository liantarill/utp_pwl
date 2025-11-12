<nav class="bg-blue-main text-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        {{-- LEFT: Logo + App Name --}}
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 bg-blue-dark rounded-lg flex items-center justify-center shadow">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                    </path>
                </svg>
            </div>

            <span class="text-xl font-semibold tracking-wide">
                RS UNILA
            </span>
        </div>

        {{-- MOBILE BUTTON --}}
        <button onclick="document.getElementById('mobileMenu').classList.toggle('hidden')"
            class="lg:hidden focus:outline-none">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
            </svg>
        </button>

        {{-- NAV MENU (Desktop) --}}
        <ul class="hidden lg:flex items-center gap-6 font-medium">

            {{-- ADMIN --}}
            @if (Auth::check() && Auth::user()->role === 'admin')
                <li><a href="{{ route('admin.dashboard') }}" class="hover:text-blue-pale">Dashboard</a></li>
                <li><a href="{{ route('admin.users.index') }}" class="hover:text-blue-pale">Kelola User</a></li>
                <li><a href="{{ route('admin.doctors.index') }}" class="hover:text-blue-pale">Kelola Dokter</a></li>
                <li><a href="{{ route('admin.specializations.index') }}" class="hover:text-blue-pale">Kelola
                        Spesialisasi</a></li>
                <li><a href="{{ route('admin.staff.index') }}" class="hover:text-blue-pale">Kelola Staff</a></li>
            @endif

            {{-- DOCTOR --}}
            @if (Auth::check() && Auth::user()->role === 'doctor')
                <li><a href="{{ route('doctor.dashboard') }}" class="hover:text-blue-pale">Dashboard</a></li>
                <li><a href="{{ route('doctor.appointments.index') }}" class="hover:text-blue-pale">Daftar Pasien</a>
                </li>
                <li><a href="{{ route('doctor.schedules.index') }}" class="hover:text-blue-pale">Jadwal Praktek</a></li>
            @endif

            {{-- STAFF --}}
            @if (Auth::check() && Auth::user()->role === 'staff')
                <li><a href="{{ route('staff.dashboard') }}" class="hover:text-blue-pale">Dashboard</a></li>
                <li><a href="{{ route('staff.patients.index') }}" class="hover:text-blue-pale">Pasien</a>
                </li>
                <li><a href="{{ route('staff.appointments.index') }}" class="hover:text-blue-pale">Janji Temu</a></li>
            @endif

            {{-- LOGOUT --}}
            <li>
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-4 py-1.5 bg-red-600 rounded-lg hover:bg-red-700 transition shadow">
                        Logout
                    </button>
                </form>
            </li>
        </ul>

    </div>

    {{-- MOBILE MENU --}}
    <div id="mobileMenu" class="lg:hidden hidden bg-blue-dark/20 backdrop-blur px-6 pb-4">

        <ul class="flex flex-col gap-3 text-white font-medium">

            {{-- ADMIN --}}
            @if (Auth::check() && Auth::user()->role === 'admin')
                <li><a href="{{ route('admin.dashboard') }}" class="block py-2">Dashboard</a></li>
                <li><a href="{{ route('admin.users.index') }}" class="block py-2">Kelola User</a></li>
                <li><a href="{{ route('admin.doctors.index') }}" class="block py-2">Kelola Dokter</a></li>
                <li><a href="{{ route('admin.specializations.index') }}" class="block py-2">Kelola Spesialisasi</a>
                </li>
                <li><a href="{{ route('admin.staff.index') }}" class="block py-2">Kelola Staff</a></li>
            @endif

            {{-- DOCTOR --}}
            @if (Auth::check() && Auth::user()->role === 'doctor')
                <li><a href="{{ route('doctor.dashboard') }}" class="block py-2">Dashboard</a></li>
                <li><a href="#" class="block py-2">Daftar Pasien</a></li>
                <li><a href="#" class="block py-2">Jadwal Praktek</a></li>
            @endif

            {{-- STAFF --}}
            @if (Auth::check() && Auth::user()->role === 'staff')
                <li><a href="{{ route('staff.dashboard') }}" class="block py-2">Dashboard</a></li>
                <li><a href="#" class="block py-2">Pendaftaran Pasien</a></li>
                <li><a href="#" class="block py-2">Laporan</a></li>
            @endif

            {{-- LOGOUT --}}
            <li class="pt-2 border-t border-white/20">
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 w-full text-left bg-red-600 rounded-lg hover:bg-red-700 transition">
                        Logout
                    </button>
                </form>
            </li>

        </ul>

    </div>
</nav>

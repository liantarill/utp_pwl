@extends('layouts.app')

@section('content')

    <div class="px-6 py-8">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-blue-dark">
                Dashboard Admin
            </h1>
        </div>

        {{-- Card contoh menu --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <a href="{{ route('admin.doctors.index') }}"
                class="p-6 rounded-xl shadow-md border border-blue-light/20 bg-white hover:bg-blue-pale transition block">
                <h2 class="text-xl font-semibold text-blue-main">Kelola Dokter</h2>
                <p class="text-gray-600 text-sm mt-2">
                    Lihat, tambah, dan kelola data dokter.
                </p>
            </a>

            <a href="#"
                class="p-6 rounded-xl shadow-md border border-blue-light/20 bg-white hover:bg-blue-pale transition block">
                <h2 class="text-xl font-semibold text-blue-main">Kelola Pasien</h2>
                <p class="text-gray-600 text-sm mt-2">
                    Lihat dan kelola data pasien.
                </p>
            </a>

            <a href="#"
                class="p-6 rounded-xl shadow-md border border-blue-light/20 bg-white hover:bg-blue-pale transition block">
                <h2 class="text-xl font-semibold text-blue-main">Laporan</h2>
                <p class="text-gray-600 text-sm mt-2">
                    Monitoring data dan statistik.
                </p>
            </a>

        </div>

    </div>
@endsection

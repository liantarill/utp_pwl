@extends('layouts.app')

@section('title', 'Dashboard Staff')

@section('content')
<div class="min-h-screen bg-blue-pale py-10 px-6">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="flex items-center justify-between mb-10">
            <div>
                <h1 class="text-3xl font-bold text-blue-dark tracking-tight">Dashboard Staff</h1>
                <p class="text-gray-600 mt-1">Selamat datang kembali, <span class="font-semibold text-blue-main">{{ auth()->user()->name }}</span> 👋</p>
            </div>
            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl shadow-md transition">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </button>
            </form>
        </div>

        <!-- Dashboard Cards -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Manage Patients -->
            <a href="{{ route('staff.patients.index') }}"
                class="group bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition transform hover:-translate-y-1 border border-gray-100">
                <div class="flex items-center mb-5">
                    <div class="bg-blue-main/10 p-3 rounded-full mr-4">
                        <i class="fas fa-user-injured text-blue-main text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-dark group-hover:text-blue-main transition">Data Pasien</h3>
                </div>
                <p class="text-gray-600 mb-5">Kelola data pasien, tambahkan, ubah, dan lihat riwayat pasien dengan mudah.</p>
                <span class="text-blue-main font-medium group-hover:underline">Kelola Sekarang →</span>
            </a>

            <!-- Manage Appointments -->
            <a href="{{ route('staff.appointments.index') }}"
                class="group bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition transform hover:-translate-y-1 border border-gray-100">
                <div class="flex items-center mb-5">
                    <div class="bg-blue-main/10 p-3 rounded-full mr-4">
                        <i class="fas fa-calendar-check text-blue-main text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-dark group-hover:text-blue-main transition">Janji Temu</h3>
                </div>
                <p class="text-gray-600 mb-5">Atur jadwal janji temu pasien dan pantau status konsultasi dengan cepat.</p>
                <span class="text-blue-main font-medium group-hover:underline">Lihat Jadwal →</span>
            </a>

            <!-- Optional: Statistics / Summary -->
            <div class="bg-gradient-to-br from-blue-main to-blue-dark text-white p-8 rounded-2xl shadow-2xl flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-semibold mb-3">Statistik Singkat</h3>
                    <p class="text-blue-100 text-sm">Jumlah pasien dan janji temu bulan ini.</p>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div>
                        <p class="text-3xl font-bold">{{ $patientsCount ?? '—' }}</p>
                        <p class="text-blue-200 text-sm">Pasien</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">{{ $appointmentsCount ?? '—' }}</p>
                        <p class="text-blue-200 text-sm">Janji Temu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

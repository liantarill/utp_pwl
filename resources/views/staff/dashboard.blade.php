@extends('layouts.app')

@section('title', 'Staff Dashboard')

@section('content')
<div class="min-h-screen bg-blue-pale flex flex-col items-center justify-center py-10 px-4">
    <div class="bg-white shadow-lg rounded-3xl w-full max-w-3xl p-8 border border-blue-light">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-blue-dark mb-2">Dashboard Staff</h1>
            <p class="text-gray-600 text-base">
                Selamat datang kembali, <span class="font-semibold text-blue-main">{{ auth()->user()->name }}</span> 👋
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('staff.patients.index') }}"
                class="group block bg-blue-main hover:bg-blue-dark transition-all duration-300 rounded-2xl shadow-md p-6 text-white text-center">
                <div class="flex flex-col items-center">
                    <div class="bg-white/20 p-4 rounded-full mb-3 group-hover:bg-white/30 transition">
                        <i class="bi bi-people-fill text-3xl"></i>
                    </div>
                    <h2 class="text-xl font-semibold">Manajemen Pasien</h2>
                    <p class="text-sm text-blue-pale mt-1">Lihat dan kelola data pasien</p>
                </div>
            </a>

            <a href="{{ route('staff.appointments.index') }}"
                class="group block bg-blue-light hover:bg-blue-main transition-all duration-300 rounded-2xl shadow-md p-6 text-white text-center">
                <div class="flex flex-col items-center">
                    <div class="bg-white/20 p-4 rounded-full mb-3 group-hover:bg-white/30 transition">
                        <i class="bi bi-calendar-check text-3xl"></i>
                    </div>
                    <h2 class="text-xl font-semibold">Janji Temu</h2>
                    <p class="text-sm text-blue-pale mt-1">Kelola jadwal dan check-in pasien</p>
                </div>
            </a>
        </div>

        <div class="mt-10 text-center">
            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-full shadow transition-all duration-300">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

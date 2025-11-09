@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-blue-pale to-white px-6 py-10">

    <div class="mb-10 text-center">
        <h1 class="text-4xl font-bold text-blue-dark">Dashboard Admin</h1>
        <p class="text-gray-600 mt-2 text-lg">Kelola data dokter dengan mudah dan aman.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <a href="{{ route('admin.doctors.index') }}"
            class="group relative bg-white rounded-3xl shadow-xl p-8 flex flex-col items-start hover:shadow-2xl hover:-translate-y-2 transition-all border border-blue-light/30">
            
            <div class="bg-blue-main text-white p-4 rounded-full mb-4 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0112 20.5a12.083 12.083 0 01-6.16-9.922L12 14z" />
                </svg>
            </div>

            <h2 class="text-2xl font-semibold text-blue-dark group-hover:text-blue-main transition mb-2">Kelola Dokter</h2>

            <p class="text-gray-600">Lihat, tambah, dan kelola data dokter dengan cepat dan aman. Semua data tersimpan dengan baik di sistem.</p>

            <div class="absolute bottom-5 right-5 text-blue-main group-hover:text-blue-dark transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </a>

    </div>

</div>
@endsection
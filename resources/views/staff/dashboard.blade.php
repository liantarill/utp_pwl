@extends('layouts.admin')

@section('title', 'Dashboard Staff')
@section('page-title', 'Dashboard Staff')

@section('content')

<div class="flex justify-between items-center mb-8">

    <h1 class="text-3xl font-bold text-blue-dark">
        Dashboard Staff
    </h1>

    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <button
            type="submit"
            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition"
        >
            Logout
        </button>
    </form>

</div>

<!-- Tambahin konten dashboard di sini -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="p-6 bg-white rounded-xl shadow border-l-4 border-blue-main">
        <h3 class="text-blue-dark text-lg">Total Data</h3>
        <p class="text-3xl font-bold text-blue-main mt-1">0</p>
    </div>

    <div class="p-6 bg-white rounded-xl shadow border-l-4 border-blue-light">
        <h3 class="text-blue-dark text-lg">Aktivitas</h3>
        <p class="text-3xl font-bold text-blue-light mt-1">0</p>
    </div>

    <div class="p-6 bg-white rounded-xl shadow border-l-4 border-blue-accent">
        <h3 class="text-blue-dark text-lg">Status</h3>
        <p class="text-3xl font-bold text-blue-accent mt-1">Aktif</p>
    </div>

</div>

@endsection

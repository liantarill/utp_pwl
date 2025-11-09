@extends('layouts.app')

@section('title', 'Tambah Staff')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-md">
    {{-- Header --}}
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Staff</h2>

    {{-- Form --}}
    <form action="{{ route('admin.staff.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Nama --}}
        <div>
            <label class="block font-medium mb-2 text-gray-700">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="w-full border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                   placeholder="Masukkan nama staff" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label class="block font-medium mb-2 text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="w-full border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                   placeholder="Masukkan email staff" required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div>
            <label class="block font-medium mb-2 text-gray-700">Password</label>
            <input type="password" name="password"
                   class="w-full border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                   placeholder="Masukkan password" required>
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Buttons --}}
        <div class="flex flex-wrap gap-3 mt-6">
            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition shadow">
                Simpan
            </button>
            <a href="{{ route('admin.staff.index') }}"
               class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-400 transition shadow">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
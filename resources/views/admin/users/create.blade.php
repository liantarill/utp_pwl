@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<div class="min-h-screen px-6 py-10 bg-gray-100">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-lg">
        {{-- Header --}}
        <h2 class="text-3xl font-bold mb-6 text-blue-900">Tambah User</h2>

        {{-- Form --}}
        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Nama --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700">Nama</label>
                <input type="text" name="name" class="w-full border-gray-300 rounded-lg p-3 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
            </div>

            {{-- Email --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border-gray-300 rounded-lg p-3 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
            </div>

            {{-- Password --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700">Password</label>
                <input type="password" name="password" class="w-full border-gray-300 rounded-lg p-3 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
            </div>

            {{-- Role --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700">Role</label>
                <select name="role" class="w-full border-gray-300 rounded-lg p-3 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
                    <option value="" disabled selected>-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="doctor">Doctor</option>
                    <option value="staff">Staff</option>
                </select>
            </div>

            {{-- Phone --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700">Phone</label>
                <input type="text" name="phone" class="w-full border-gray-300 rounded-lg p-3 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            {{-- Address --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700">Alamat</label>
                <textarea name="address" class="w-full border-gray-300 rounded-lg p-3 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
            </div>

            {{-- Buttons --}}
            <div class="flex space-x-3 mt-6">
                <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg shadow hover:bg-green-600 transition">
                    Simpan
                </button>
                <a href="{{ route('admin.users.index') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg shadow hover:bg-gray-400 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
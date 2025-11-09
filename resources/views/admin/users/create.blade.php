@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Tambah User</h2>

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Nama --}}
        <div>
            <label class="block font-medium mb-1">Nama</label>
            <input type="text" name="name" class="w-full border-gray-300 rounded p-2" required>
        </div>

        {{-- Email --}}
        <div>
            <label class="block font-medium mb-1">Email</label>
            <input type="email" name="email" class="w-full border-gray-300 rounded p-2" required>
        </div>

        {{-- Password --}}
        <div>
            <label class="block font-medium mb-1">Password</label>
            <input type="password" name="password" class="w-full border-gray-300 rounded p-2" required>
        </div>

        {{-- Role --}}
        <div>
            <label class="block font-medium mb-1">Role</label>
            <select name="role" class="w-full border-gray-300 rounded p-2" required>
                <option value="admin">Admin</option>
                <option value="doctor">Doctor</option>
                <option value="staff">Staff</option>
            </select>
        </div>

        {{-- Phone --}}
        <div>
            <label class="block font-medium mb-1">Phone</label>
            <input type="text" name="phone" class="w-full border-gray-300 rounded p-2">
        </div>

        {{-- Address --}}
        <div>
            <label class="block font-medium mb-1">Alamat</label>
            <textarea name="address" class="w-full border-gray-300 rounded p-2"></textarea>
        </div>

        {{-- Buttons --}}
        <div class="flex space-x-2 mt-4">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-400">
                Simpan
            </button>
            <a href="{{ route('admin.users.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="min-h-screen px-6 py-10 bg-gray-100">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-lg">
        {{-- Header --}}
        <h2 class="text-3xl font-bold mb-6 text-blue-900">Edit User</h2>

        {{-- Form --}}
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700">Nama</label>
                <input type="text" name="name" value="{{ $user->name }}" 
                       class="w-full border-gray-300 rounded-lg p-3 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
            </div>

            {{-- Email --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" 
                       class="w-full border-gray-300 rounded-lg p-3 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
            </div>

            {{-- Role --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700">Role</label>
                <select name="role" class="w-full border-gray-300 rounded-lg p-3 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="doctor" {{ $user->role == 'doctor' ? 'selected' : '' }}>Doctor</option>
                    <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
                </select>
            </div>

            {{-- Phone --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700">Phone</label>
                <input type="text" name="phone" value="{{ $user->phone }}" 
                       class="w-full border-gray-300 rounded-lg p-3 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            {{-- Address --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700">Alamat</label>
                <textarea name="address" 
                          class="w-full border-gray-300 rounded-lg p-3 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">{{ $user->address }}</textarea>
            </div>

            {{-- Aktif --}}
            <div class="flex items-center space-x-3">
                <input type="checkbox" name="is_active" id="is_active" 
                       class="h-5 w-5 text-blue-500 border-gray-300 rounded" {{ $user->is_active ? 'checked' : '' }}>
                <label for="is_active" class="font-medium text-gray-700">Aktif</label>
            </div>

            {{-- Buttons --}}
            <div class="flex space-x-3 mt-6">
                <button type="submit" 
                        class="bg-blue-main text-white px-6 py-2 rounded-lg shadow hover:bg-blue-dark transition">
                    Perbarui
                </button>
                <a href="{{ route('admin.users.index') }}" 
                   class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg shadow hover:bg-gray-400 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
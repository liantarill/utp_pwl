@extends('layouts.app')

@section('title', 'Edit Staff')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md">
    {{-- Header --}}
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Staff</h2>

    {{-- Form --}}
    <form action="{{ route('admin.staff.update', $staff->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div>
            <label class="block font-medium mb-2 text-gray-700">Nama</label>
            <input type="text" name="name" value="{{ old('name', $staff->name) }}"
                   class="w-full border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                   placeholder="Masukkan nama staff" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label class="block font-medium mb-2 text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $staff->email) }}"
                   class="w-full border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                   placeholder="Masukkan email staff" required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Role --}}
        <div>
            <label class="block font-medium mb-2 text-gray-700">Role</label>
            <select name="role" class="w-full border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400" required>
                <option value="staff" {{ old('role', $staff->role) == 'staff' ? 'selected' : '' }}>Staff</option>
                <option value="admin" {{ old('role', $staff->role) == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        {{-- Aktif --}}
        <div class="flex items-center space-x-2">
            <input type="checkbox" name="is_active" id="is_active"
                   class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-2 focus:ring-blue-400"
                   {{ old('is_active', $staff->is_active) ? 'checked' : '' }}>
            <label for="is_active" class="font-medium text-gray-700">Aktif</label>
        </div>

        {{-- Buttons --}}
        <div class="flex flex-wrap gap-3 mt-6">
            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition shadow">
                Perbarui
            </button>
            <a href="{{ route('admin.staff.index') }}"
               class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-400 transition shadow">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
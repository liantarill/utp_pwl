@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Edit User</h2>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div>
            <label class="block font-medium mb-1">Nama</label>
            <input type="text" name="name" value="{{ $user->name }}"
                   class="w-full border-gray-300 rounded p-2" required>
        </div>

        {{-- Email --}}
        <div>
            <label class="block font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ $user->email }}"
                   class="w-full border-gray-300 rounded p-2" required>
        </div>

        {{-- Role --}}
        <div>
            <label class="block font-medium mb-1">Role</label>
            <select name="role" class="w-full border-gray-300 rounded p-2" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="doctor" {{ $user->role == 'doctor' ? 'selected' : '' }}>Doctor</option>
                <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
            </select>
        </div>

        {{-- Phone --}}
        <div>
            <label class="block font-medium mb-1">Phone</label>
            <input type="text" name="phone" value="{{ $user->phone }}"
                   class="w-full border-gray-300 rounded p-2">
        </div>

        {{-- Address --}}
        <div>
            <label class="block font-medium mb-1">Alamat</label>
            <textarea name="address" class="w-full border-gray-300 rounded p-2">{{ $user->address }}</textarea>
        </div>

        {{-- Aktif --}}
        <div class="flex items-center space-x-2">
            <input type="checkbox" name="is_active" id="is_active" class="h-4 w-4 text-blue-main border-gray-300 rounded" {{ $user->is_active ? 'checked' : '' }}>
            <label for="is_active" class="font-medium">Aktif</label>
        </div>

        {{-- Buttons --}}
        <div class="flex space-x-2 mt-4">
            <button type="submit" class="bg-blue-main text-white px-4 py-2 rounded hover:bg-blue-light">
                Perbarui
            </button>
            <a href="{{ route('admin.users.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection

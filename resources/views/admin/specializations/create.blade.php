@extends('layouts.app')

@section('title', 'Tambah Specialization')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Tambah Specialization</h2>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.specializations.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Name --}}
        <div>
            <label class="block font-medium mb-1">Name</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full border-gray-300 rounded p-2" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Description --}}
        <div>
            <label class="block font-medium mb-1">Description</label>
            <textarea name="description" class="w-full border-gray-300 rounded p-2">{{ old('description') }}</textarea>
        </div>

        {{-- Buttons --}}
        <div class="flex space-x-2 mt-4">
            <button type="submit" class="bg-blue-main text-white px-4 py-2 rounded hover:bg-blue-light">Simpan</button>
            <a href="{{ route('admin.specializations.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
@endsection
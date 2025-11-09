@extends('layouts.app')

@section('title', 'Tambah Dokter')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Tambah Dokter</h2>

    <form action="{{ route('admin.doctors.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- User --}}
        <div>
            <label class="block font-medium mb-1">User (akun dokter)</label>
            <select name="user_id" class="w-full border-gray-300 rounded p-2" required>
                <option value="">-- Pilih User --</option>
                @foreach ($users as $u)
                    <option value="{{ $u->id }}" {{ old('user_id') == $u->id ? 'selected' : '' }}>
                        {{ $u->name }} ({{ $u->email }})
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Spesialisasi --}}
        <div>
            <label class="block font-medium mb-1">Spesialisasi</label>
            <select name="specialization_id" class="w-full border-gray-300 rounded p-2" required>
                <option value="">-- Pilih --</option>
                @foreach ($specializations as $s)
                    <option value="{{ $s->id }}" {{ old('specialization_id') == $s->id ? 'selected' : '' }}>
                        {{ $s->name }}
                    </option>
                @endforeach
            </select>
            @error('specialization_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- License Number --}}
        <div>
            <label class="block font-medium mb-1">License Number</label>
            <input type="text" name="license_number" value="{{ old('license_number') }}"
                class="w-full border-gray-300 rounded p-2" required>
            @error('license_number')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- STR Number --}}
        <div>
            <label class="block font-medium mb-1">STR Number</label>
            <input type="text" name="str_number" value="{{ old('str_number') }}"
                class="w-full border-gray-300 rounded p-2" required>
            @error('str_number')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- STR Expiry Date --}}
        <div>
            <label class="block font-medium mb-1">STR Expiry Date</label>
            <input type="date" name="str_expiry_date" value="{{ old('str_expiry_date') }}"
                class="w-full border-gray-300 rounded p-2" required>
            @error('str_expiry_date')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Education --}}
        <div>
            <label class="block font-medium mb-1">Education</label>
            <textarea name="education" class="w-full border-gray-300 rounded p-2">{{ old('education') }}</textarea>
        </div>

        {{-- Experience Years --}}
        <div>
            <label class="block font-medium mb-1">Experience Years</label>
            <input type="number" name="experience_years" value="{{ old('experience_years', 0) }}"
                min="0" class="w-full border-gray-300 rounded p-2">
        </div>

        {{-- Consultation Fee --}}
        <div>
            <label class="block font-medium mb-1">Consultation Fee</label>
            <input type="number" step="0.01" name="consultation_fee"
                value="{{ old('consultation_fee', 0) }}" class="w-full border-gray-300 rounded p-2">
        </div>

        {{-- Bio --}}
        <div>
            <label class="block font-medium mb-1">Bio</label>
            <textarea name="bio" class="w-full border-gray-300 rounded p-2">{{ old('bio') }}</textarea>
        </div>

        {{-- Buttons --}}
        <div class="flex space-x-2 mt-4">
            <button type="submit" class="bg-blue-main text-white px-4 py-2 rounded hover:bg-blue-light">Simpan</button>
            <a href="{{ route('admin.doctors.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
@endsection

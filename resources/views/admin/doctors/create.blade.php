@extends('layouts.app')

@section('title', 'Tambah Dokter')

@section('content')
<div class="max-w-5xl mx-auto mt-8">

    <div class="bg-white shadow-lg rounded-lg p-8 border border-gray-200">
        <h2 class="text-3xl font-bold text-blue-900 mb-6">Tambah Dokter</h2>

        <form action="{{ route('admin.doctors.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Section: Akun --}}
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Akun Dokter</h3>
                <div>
                    <label class="block text-gray-600 font-medium mb-1">User (akun dokter)</label>
                    <select name="user_id" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-300" required>
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
            </div>

            {{-- Section: Spesialisasi & Lisensi --}}
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Spesialisasi & Lisensi</h3>

                <div class="mb-4">
                    <label class="block text-gray-600 font-medium mb-1">Spesialisasi</label>
                    <select name="specialization_id" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-300" required>
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

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-gray-600 font-medium mb-1">License Number</label>
                        <input type="text" name="license_number" value="{{ old('license_number') }}" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-300" required>
                        @error('license_number')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-600 font-medium mb-1">STR Number</label>
                        <input type="text" name="str_number" value="{{ old('str_number') }}" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-300" required>
                        @error('str_number')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-600 font-medium mb-1">STR Expiry Date</label>
                        <input type="date" name="str_expiry_date" value="{{ old('str_expiry_date') }}" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-300" required>
                        @error('str_expiry_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Section: Pendidikan & Pengalaman --}}
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Pendidikan & Pengalaman</h3>

                <div class="mb-4">
                    <label class="block text-gray-600 font-medium mb-1">Education</label>
                    <textarea name="education" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-300">{{ old('education') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-600 font-medium mb-1">Experience Years</label>
                    <input type="number" name="experience_years" value="{{ old('experience_years', 0) }}" min="0" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-300">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-600 font-medium mb-1">Consultation Fee</label>
                    <input type="number" step="0.01" name="consultation_fee" value="{{ old('consultation_fee', 0) }}" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-300">
                </div>
            </div>

            {{-- Section: Bio --}}
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Bio</h3>
                <textarea name="bio" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-300">{{ old('bio') }}</textarea>
            </div>

            {{-- Buttons --}}
            <div class="flex space-x-4 mt-6">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-500 transition shadow">
                    Simpan
                </button>
                <a href="{{ route('admin.doctors.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition shadow">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
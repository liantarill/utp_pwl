@extends('layouts.app')

@section('title', 'Tambah Pasien Baru')

@section('content')
<div class="min-h-screen bg-blue-pale py-10 px-6">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-blue-dark">Tambah Pasien Baru</h1>
                    <p class="text-gray-500 text-sm mt-1">Isi semua data pasien dengan lengkap</p>
                </div>
                <a href="{{ route('staff.patients.index') }}"
                   class="text-blue-main hover:text-blue-dark transition text-sm font-medium">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
            </div>

            {{-- Pesan Error --}}
            @if($errors->any())
            <div class="mb-5 p-4 bg-red-50 border-l-4 border-red-500 rounded">
                <ul class="list-disc pl-5 text-red-700 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Form Tambah Pasien --}}
            <form action="{{ route('staff.patients.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Nama Lengkap -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="w-full rounded-lg border-gray-300 focus:ring-blue-main focus:border-blue-main text-gray-800"
                        placeholder="Masukkan nama lengkap" required>
                </div>

                <!-- Nomor Identitas -->
                <div>
                    <label for="identity_number" class="block text-sm font-semibold text-gray-700 mb-1">
                        Nomor Identitas (NIK / MRN) <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="identity_number" id="identity_number" value="{{ old('identity_number') }}"
                        class="w-full rounded-lg border-gray-300 focus:ring-blue-main focus:border-blue-main text-gray-800"
                        placeholder="Masukkan nomor identitas" required>
                </div>

                <!-- Tanggal Lahir & Jenis Kelamin -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="date_of_birth" class="block text-sm font-semibold text-gray-700 mb-1">
                            Tanggal Lahir <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}"
                            class="w-full rounded-lg border-gray-300 focus:ring-blue-main focus:border-blue-main text-gray-800"
                            required>
                    </div>

                    <div>
    <label for="gender" class="block text-sm font-semibold text-gray-700 mb-1">
        Jenis Kelamin <span class="text-red-500">*</span>
    </label>
    <select name="gender" id="gender"
        class="w-full rounded-lg border-gray-300 focus:ring-blue-main focus:border-blue-main text-gray-800" required>
        <option value="">-- Pilih Jenis Kelamin --</option>
        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
    </select>
</div>

                </div>

                <!-- Email & Telepon -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">
                            Email
                        </label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="w-full rounded-lg border-gray-300 focus:ring-blue-main focus:border-blue-main text-gray-800"
                            placeholder="contoh@email.com">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-1">
                            No. Telepon
                        </label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                            class="w-full rounded-lg border-gray-300 focus:ring-blue-main focus:border-blue-main text-gray-800"
                            placeholder="08xxxxxxxxxx">
                    </div>
                </div>

                <!-- Alamat -->
                <div>
                    <label for="address" class="block text-sm font-semibold text-gray-700 mb-1">
                        Alamat
                    </label>
                    <textarea name="address" id="address" rows="3"
                        class="w-full rounded-lg border-gray-300 focus:ring-blue-main focus:border-blue-main text-gray-800"
                        placeholder="Alamat lengkap pasien">{{ old('address') }}</textarea>
                </div>

                <!-- Tombol -->
                <div class="flex justify-end mt-8">
                    <a href="{{ route('staff.patients.index') }}"
                       class="px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition mr-2">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-5 py-2.5 bg-blue-main text-white rounded-lg shadow hover:bg-blue-dark transition">
                        <i class="fas fa-save mr-2"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

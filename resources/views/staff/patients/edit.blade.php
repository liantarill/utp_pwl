@extends('layouts.app')

@section('title', 'Edit Data Pasien')

@section('content')
<div class="min-h-screen bg-blue-pale py-10 px-6">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl p-8">
        <h2 class="text-2xl font-bold text-blue-dark mb-6 flex items-center">
            <i class="fas fa-user-edit mr-3 text-blue-main"></i> Edit Data Pasien
        </h2>

        <form action="{{ route('staff.patients.update', $patient->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ $patient->name }}"
                    class="w-full border-gray-300 rounded-xl focus:ring-blue-main focus:border-blue-main transition">
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Email</label>
                    <input type="email" name="email" value="{{ $patient->email }}"
                        class="w-full border-gray-300 rounded-xl focus:ring-blue-main focus:border-blue-main transition">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">No. Telepon</label>
                    <input type="text" name="phone" value="{{ $patient->phone }}"
                        class="w-full border-gray-300 rounded-xl focus:ring-blue-main focus:border-blue-main transition">
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Alamat</label>
                <textarea name="address" rows="3"
                    class="w-full border-gray-300 rounded-xl focus:ring-blue-main focus:border-blue-main transition">{{ $patient->address }}</textarea>
            </div>

            <div class="flex justify-end mt-8">
                <a href="{{ route('staff.patients.show', $patient->id) }}"
                    class="px-5 py-2.5 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition mr-2">Batal</a>
                <button type="submit"
                    class="px-5 py-2.5 bg-blue-main text-white rounded-xl hover:bg-blue-dark shadow-lg transition">Perbarui</button>
            </div>
        </form>
    </div>
</div>
@endsection

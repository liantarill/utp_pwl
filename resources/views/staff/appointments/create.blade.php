@extends('layouts.app')

@section('title', 'Tambah Janji Temu')

@section('content')
<div class="min-h-screen bg-blue-pale py-10 px-6">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-blue-dark">Tambah Janji Temu Baru</h2>

        @if($errors->any())
            <div class="mb-4 p-3 rounded bg-red-100 text-red-700">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('staff.appointments.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-gray-700 font-medium mb-2">Pasien</label>
                <select name="patient_id" class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-main" required>
                    <option value="">-- Pilih Pasien --</option>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Dokter</label>
                <select name="doctor_id" class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-main" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Tanggal Janji</label>
                <input type="date" name="appointment_date" class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-main" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Waktu Janji</label>
                <input type="time" name="appointment_time" class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-main" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Keluhan</label>
                <textarea name="complaint" rows="3" class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-main"
                          placeholder="Masukkan keluhan pasien (opsional)"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Catatan</label>
                <textarea name="notes" rows="3" class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-main"
                          placeholder="Masukkan catatan tambahan (opsional)"></textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('staff.appointments.index') }}"
                   class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">Batal</a>
                <button type="submit"
                        class="px-5 py-2 bg-blue-main text-white rounded-lg hover:bg-blue-dark transition">
                    Simpan Janji Temu
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

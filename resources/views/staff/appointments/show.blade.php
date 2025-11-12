@extends('layouts.app')

@section('title', 'Detail Janji Temu')

@section('content')
    <div class="min-h-screen bg-blue-pale py-10 px-6">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-blue-dark">Detail Janji Temu</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-gray-700">
                <div>
                    <p class="font-semibold text-blue-main">Nomor Janji:</p>
                    <p>{{ $appointment->appointment_number }}</p>
                </div>

                <div>
                    <p class="font-semibold text-blue-main">Pasien:</p>
                    <p>{{ $appointment->patient->name ?? '-' }}</p>
                </div>

                <div>
                    <p class="font-semibold text-blue-main">Dokter:</p>
                    <p>{{ $appointment->doctor->user->name ?? '-' }}</p>
                </div>

                <div>
                    <p class="font-semibold text-blue-main">Tanggal:</p>
                    <p>{{ $appointment->appointment_date->format('d M Y') }}</p>
                </div>

                <div>
                    <p class="font-semibold text-blue-main">Waktu:</p>
                    <p>{{ $appointment->appointment_time }}</p>
                </div>

                <div>
                    <p class="font-semibold text-blue-main">Status:</p>
                    <p class="capitalize">{{ $appointment->status ?? 'Belum ditentukan' }}</p>
                </div>

                <div class="md:col-span-2">
                    <p class="font-semibold text-blue-main">Keluhan:</p>
                    <p>{{ $appointment->complaint ?? '-' }}</p>
                </div>

                <div class="md:col-span-2">
                    <p class="font-semibold text-blue-main">Catatan:</p>
                    <p>{{ $appointment->notes ?? '-' }}</p>
                </div>
            </div>

            <div class="flex justify-end mt-8 gap-3">
                <a href="{{ route('staff.appointments.index') }}"
                    class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">Kembali</a>
                <a href="{{ route('staff.appointments.edit', $appointment->id) }}"
                    class="px-5 py-2 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 transition">Edit</a>
            </div>
        </div>
    </div>
@endsection

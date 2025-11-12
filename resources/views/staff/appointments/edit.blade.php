@extends('layouts.app')

@section('title', 'Edit Janji Temu')

@section('content')
    <div class="min-h-screen bg-blue-pale py-10 px-6">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-blue-dark">Edit Janji Temu</h2>

            @if ($errors->any())
                <div class="mb-4 p-3 rounded bg-red-100 text-red-700">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('staff.appointments.update', $appointment->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Pasien</label>
                    <select name="patient_id" class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-main"
                        required>
                        <option value="">-- Pilih Pasien --</option>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}"
                                {{ old('patient_id', $appointment->patient_id) == $patient->id ? 'selected' : '' }}>
                                {{ $patient->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Dokter</label>

                    <select name="doctor_id" id="doctor_id"
                        class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-main" required>
                        <option value="">-- Pilih Dokter --</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}"
                                {{ old('doctor_id', $appointment->doctor_id) == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->user->name ?? 'Dokter #' . $doctor->id }}
                            </option>
                        @endforeach
                    </select>

                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Jadwal</label>

                    <select name="schedule_id" id="schedule_id"
                        class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-main" required>
                        <option value="">-- Pilih Jadwal --</option>
                        @foreach ($schedules as $schedule)
                            <option value="{{ $schedule->id }}" data-doctor-id="{{ $schedule->doctor_id }}"
                                {{ old('schedule_id', $appointment->schedule_id) == $schedule->id ? 'selected' : '' }}>
                                {{ trim(($schedule->day ?? '') . ' ' . ($schedule->start_time ?? '')) }}
                            </option>
                        @endforeach
                    </select>
                    @error('schedule_id')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Tanggal Janji</label>
                    <input type="date" name="appointment_date"
                        class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-main"
                        value="{{ old('appointment_date', $appointment->appointment_date) }}" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Waktu Janji</label>
                    <input type="time" name="appointment_time"
                        class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-main"
                        value="{{ old('appointment_time', $appointment->appointment_time) }}" required>
                    <p class="text-sm text-gray-500 mt-1">(Jika kamu memilih jadwal, waktu akan otomatis di-set berdasarkan
                        jadwal saat menyimpan.)</p>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Keluhan</label>
                    <textarea name="complaint" rows="3" class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-main"
                        placeholder="Masukkan keluhan pasien (opsional)">{{ old('complaint', $appointment->complaint) }}</textarea>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Catatan</label>
                    <textarea name="notes" rows="3" class="w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-main"
                        placeholder="Masukkan catatan tambahan (opsional)">{{ old('notes', $appointment->notes) }}</textarea>
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('staff.appointments.index') }}"
                        class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">Batal</a>
                    <button type="submit"
                        class="px-5 py-2 bg-blue-main text-white rounded-lg hover:bg-blue-dark transition">
                        Update Janji Temu
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Script: filter jadwal berdasarkan dokter terpilih (sama seperti create) --}}
    @push('scripts')
        <script>
            (function() {
                const doctorSelect = document.getElementById('doctor_id');
                const scheduleSelect = document.getElementById('schedule_id');

                function filterSchedules() {
                    const doctorId = doctorSelect.value;
                    Array.from(scheduleSelect.options).forEach(opt => {
                        if (!opt.value) return; // header option
                        const optDoctor = opt.dataset.doctorId;
                        if (!doctorId) {
                            opt.style.display = ''; // tampilkan semuanya jika belum pilih dokter
                        } else if (optDoctor === doctorId) {
                            opt.style.display = '';
                        } else {
                            opt.style.display = 'none';
                        }
                    });

                    // jika pilihan saat ini tidak cocok dengan dokter yang dipilih, reset value
                    const current = scheduleSelect.value;
                    if (current && scheduleSelect.querySelector(`option[value="${current}"]`)?.style.display === 'none') {
                        scheduleSelect.value = '';
                    }
                }

                // Inisialisasi & event listener
                doctorSelect.addEventListener('change', filterSchedules);
                window.addEventListener('load', filterSchedules);
            })();
        </script>
    @endpush
@endsection

@extends('layouts.app')

@section('title', 'Data Janji Temu')

@section('content')
<div class="min-h-screen bg-blue-pale py-10 px-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-blue-dark">Data Janji Temu</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola jadwal janji temu pasien dengan dokter</p>
            </div>

            <a href="{{ route('staff.appointments.create') }}"
               class="mt-3 md:mt-0 inline-flex items-center px-4 py-2 bg-blue-main text-white rounded-lg shadow hover:bg-blue-dark transition">
                <i class="fas fa-plus mr-2"></i> Tambah Janji Temu
            </a>
        </div>

        <!-- Pesan sukses -->
        @if (session('success'))
            <div class="mb-5 p-4 bg-green-50 border-l-4 border-green-500 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel -->
        <div class="bg-white shadow-lg rounded-2xl overflow-hidden border border-gray-100">
            <table class="min-w-full table-auto">
                <thead class="bg-blue-dark text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">No</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Nomor Janji</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Pasien</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Dokter</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Tanggal</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($appointments as $index => $appointment)
                        <tr class="border-b hover:bg-blue-pale transition">
                            <td class="px-6 py-3 text-sm text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-6 py-3 text-sm font-medium text-gray-800">{{ $appointment->appointment_number }}</td>
                            <td class="px-6 py-3 text-sm text-gray-700">{{ $appointment->patient->name ?? '-' }}</td>
                            <td class="px-6 py-3 text-sm text-gray-700">{{ $appointment->doctor->name ?? '-' }}</td>
                            <td class="px-6 py-3 text-sm text-gray-700">{{ $appointment->appointment_date->format('d M Y') }}</td>
                            <td class="px-6 py-3 text-sm text-gray-700 capitalize">{{ $appointment->status ?? '-' }}</td>
                            <td class="px-6 py-3 text-center flex justify-center gap-2">
                                <a href="{{ route('staff.appointments.show', $appointment->id) }}"
                                   class="inline-flex items-center px-3 py-1.5 bg-blue-light text-white text-sm rounded-lg hover:bg-blue-main transition">
                                    <i class="fas fa-eye mr-2"></i> Detail
                                </a>
                                <a href="{{ route('staff.appointments.edit', $appointment->id) }}"
                                   class="inline-flex items-center px-3 py-1.5 bg-yellow-400 text-white text-sm rounded-lg hover:bg-yellow-500 transition">
                                    <i class="fas fa-edit mr-2"></i> Edit
                                </a>
                                <form action="{{ route('staff.appointments.destroy', $appointment->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus janji temu ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center px-3 py-1.5 bg-red-500 text-white text-sm rounded-lg hover:bg-red-600 transition">
                                        <i class="fas fa-trash-alt mr-2"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-6 text-gray-500">Belum ada data janji temu.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

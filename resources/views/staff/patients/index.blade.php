@extends('layouts.app')

@section('title', 'Data Pasien')

@section('content')
<div class="min-h-screen bg-blue-pale py-10 px-6">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-blue-dark">Data Pasien</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola data pasien rumah sakit dengan mudah dan cepat</p>
            </div>

            <a href="{{ route('staff.patients.create') }}"
               class="mt-3 md:mt-0 inline-flex items-center px-4 py-2 bg-blue-main text-white rounded-lg shadow hover:bg-blue-dark transition">
                <i class="fas fa-plus mr-2"></i> Tambah Pasien
            </a>
        </div>

        <!-- Pesan Sukses -->
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
                        <th class="px-6 py-3 text-left text-sm font-semibold">Nama</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">NIK</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Tanggal Lahir</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Jenis Kelamin</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Telepon</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($patients as $index => $patient)
                        <tr class="border-b hover:bg-blue-pale transition">
                            <td class="px-6 py-3 text-sm text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-6 py-3 text-sm font-medium text-gray-800">{{ $patient->name }}</td>
                            <td class="px-6 py-3 text-sm text-gray-700">{{ $patient->identity_number }}</td>
                            <td class="px-6 py-3 text-sm text-gray-700">{{ \Carbon\Carbon::parse($patient->date_of_birth)->format('d M Y') }}</td>
                            <td class="px-6 py-3 text-sm text-gray-700 capitalize">{{ $patient->gender }}</td>
                            <td class="px-6 py-3 text-sm text-gray-700">{{ $patient->phone }}</td>
                            <td class="px-6 py-3 text-center flex justify-center gap-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('staff.patients.edit', $patient->id) }}"
                                   class="inline-flex items-center px-3 py-1.5 bg-yellow-400 text-white text-sm rounded-lg hover:bg-yellow-500 transition">
                                    <i class="fas fa-edit mr-2"></i> Edit
                                </a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('staff.patients.destroy', $patient->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data pasien ini?')" class="inline">
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
                            <td colspan="7" class="text-center py-6 text-gray-500">Belum ada data pasien.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

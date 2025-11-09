@extends('layouts.app')

@section('title', 'Daftar Dokter')

@section('content')
<div class="min-h-screen px-6 py-10 bg-gray-100">
    <div class="max-w-6xl mx-auto bg-white p-8 rounded-xl shadow-lg">
    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-blue-900">Daftar Dokter</h2>
        <a href="{{ route('admin.doctors.create') }}"
           class="bg-blue-main text-white px-5 py-2 rounded-lg shadow hover:bg-blue-dark transition">
            + Tambah Dokter
        </a>
    </div>

    {{-- Table Card --}}
    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-blue-light/20">
        <table class="min-w-full divide-y divide-blue-light/30">
            <thead class="bg-blue-pale">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-blue-dark">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-blue-dark">Spesialisasi</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-blue-dark">License</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-blue-dark">STR</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-blue-dark">Fee</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-blue-dark">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-blue-light/20 bg-white">
                @forelse ($doctors as $doctor)
                    <tr class="hover:bg-blue-pale transition">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $doctor->user->name ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $doctor->specialization->name ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $doctor->license_number }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $doctor->str_number }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $doctor->consultation_fee }}</td>
                        <td class="px-6 py-4 text-center space-x-1">
                            <a href="{{ route('admin.doctors.edit', $doctor->id) }}"
                               class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-300 text-sm">
                                Edit
                            </a>
                            <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Yakin hapus?')"
                                        class="px-3 py-1 text-sm rounded bg-red-600 text-white hover:bg-red-700 transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada dokter.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
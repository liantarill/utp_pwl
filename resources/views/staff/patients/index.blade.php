@extends('layouts.app')

@section('title', 'Data Pasien')

@section('content')
<div class="p-8 bg-blue-pale min-h-screen">
    <div class="max-w-6xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-blue-dark tracking-tight">Data Pasien</h1>
            <a href="{{ route('staff.patients.create') }}"
                class="flex items-center bg-blue-main hover:bg-blue-dark text-white px-5 py-2.5 rounded-xl shadow-lg transition">
                <i class="fas fa-user-plus mr-2"></i> Tambah Pasien
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <table class="w-full text-gray-700">
                <thead class="bg-blue-main text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">#</th>
                        <th class="py-3 px-4 text-left">Nama</th>
                        <th class="py-3 px-4 text-left">Email</th>
                        <th class="py-3 px-4 text-left">Telepon</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($patients as $patient)
                    <tr class="border-b hover:bg-blue-pale transition">
                        <td class="py-3 px-4">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4 font-semibold text-blue-dark">{{ $patient->name }}</td>
                        <td class="py-3 px-4">{{ $patient->email ?? '-' }}</td>
                        <td class="py-3 px-4">{{ $patient->phone ?? '-' }}</td>
                        <td class="py-3 px-4 text-center">
                            <div class="flex justify-center gap-3">
                                <a href="{{ route('staff.patients.show', $patient->id) }}"
                                    class="text-blue-main hover:text-blue-dark" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('staff.patients.edit', $patient->id) }}"
                                    class="text-green-600 hover:text-green-800" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('staff.patients.destroy', $patient->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus pasien ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-6">Belum ada data pasien.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

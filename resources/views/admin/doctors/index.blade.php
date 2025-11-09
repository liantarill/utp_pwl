@extends('layouts.app')

@section('content')

    <div class="px-6 py-6">

        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-bold text-blue-dark">Daftar Dokter</h3>

            <a href="{{ route('admin.doctors.create') }}"
               class="px-4 py-2 rounded-lg bg-blue-main text-white hover:bg-blue-dark transition">
                + Tambah Dokter
            </a>
        </div>

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
                    @foreach ($doctors as $doctor)
                        <tr class="hover:bg-blue-pale transition">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $doctor->user->name ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $doctor->specialization->name ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $doctor->license_number }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $doctor->str_number }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $doctor->consultation_fee }}</td>

                            <td class="px-6 py-4 text-center">

                                <a href="{{ route('admin.doctors.edit', $doctor->id) }}"
                                   class="px-3 py-1 text-sm rounded bg-blue-light text-white hover:bg-blue-main transition">
                                    Edit
                                </a>

                                <form action="{{ route('admin.doctors.destroy', $doctor->id) }}"
                                      method="POST"
                                      class="inline">
                                    @csrf @method('DELETE')
                                    <button
                                        onclick="return confirm('Yakin hapus?')"
                                        class="px-3 py-1 mt-1 text-sm rounded bg-red-600 text-white hover:bg-red-700 transition">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection

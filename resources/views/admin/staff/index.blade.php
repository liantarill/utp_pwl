@extends('layouts.app')

@section('title', 'Kelola Staff')

@section('content')
    <div class="min-h-screen px-6 py-10 bg-gray-100">

        <div class="max-w-6xl mx-auto bg-white p-8 rounded-xl shadow-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-blue-900">Kelola Staff</h2>
                <a href="{{ route('admin.staff.create') }}"
                    class="px-4 py-2 rounded-lg bg-blue-main text-white hover:bg-blue-dark transition shadow">
                    + Tambah Staff
                </a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded">
                    <thead class="bg-gray-100 text-left">
                        <tr>
                            <th class="px-4 py-2 border-b">Nama</th>
                            <th class="px-4 py-2 border-b">Email</th>
                            <th class="px-4 py-2 border-b">Role</th>
                            <th class="px-4 py-2 border-b">Status</th>
                            <th class="px-4 py-2 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($staffs as $staff)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border-b">{{ $staff->name }}</td>
                                <td class="px-4 py-2 border-b">{{ $staff->email }}</td>
                                <td class="px-4 py-2 border-b">{{ ucfirst($staff->role) }}</td>
                                <td class="px-4 py-2 border-b">{{ $staff->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                                <td class="px-4 py-2 border-b space-x-2">
                                    <a href="{{ route('admin.staff.edit', $staff->id) }}"
                                        class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-300 text-sm">Edit</a>

                                    <form action="{{ route('admin.staff.destroy', $staff->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-400 text-sm"
                                            onclick="return confirm('Hapus staff ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center border-b">Belum ada staff.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-4">
                {{ $staffs->links() }}
            </div>
        </div>
    </div>
@endsection

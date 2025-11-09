@extends('layouts.app')

@section('title', 'Manajemen User')

@section('content')
<div class="min-h-screen px-6 py-10 bg-gray-100">
    <div class="max-w-6xl mx-auto bg-white p-8 rounded-xl shadow-lg">
        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-blue-900">Manajemen User</h2>
            <a href="{{ route('admin.users.create') }}" 
               class="bg-blue-main text-white px-5 py-2 rounded-lg shadow hover:bg-blue-dark transition">
               + Tambah User
            </a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                <thead class="bg-blue-pale">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-blue-dark">Nama</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-blue-dark">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-blue-dark">Role</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-blue-dark">Status</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold text-blue-dark">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($users as $user)
                        <tr class="hover:bg-blue-pale transition">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ ucfirst($user->role) }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                            <td class="px-6 py-4 text-center flex justify-center space-x-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}" 
                                   class="bg-yellow-400 text-white px-3 py-1 rounded-lg text-sm hover:bg-yellow-300 transition shadow">
                                    Edit
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Yakin hapus user ini?')"
                                        class="bg-red-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-red-600 transition shadow">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Belum ada user.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
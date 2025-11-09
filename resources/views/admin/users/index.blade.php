@extends('layouts.app')

@section('title', 'Manajemen User')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Manajemen User</h2>
        <a href="{{ route('admin.users.create') }}" class="bg-blue-main text-white px-4 py-2 rounded hover:bg-blue-light">
            Tambah User
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-blue-pale">
                <tr>
                    <th class="px-4 py-2 text-left border-b">Nama</th>
                    <th class="px-4 py-2 text-left border-b">Email</th>
                    <th class="px-4 py-2 text-left border-b">Role</th>
                    <th class="px-4 py-2 text-left border-b">Status</th>
                    <th class="px-4 py-2 text-left border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                        <td class="px-4 py-2 border-b">{{ ucfirst($user->role) }}</td>
                        <td class="px-4 py-2 border-b">{{ $user->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                        <td class="px-4 py-2 border-b space-x-2">
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                               class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-300 text-sm">
                                Edit
                            </a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-400 text-sm"
                                    onclick="return confirm('Yakin hapus user ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Specializations')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Specializations</h2>
        <a href="{{ route('admin.specializations.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-400">
            Tambah Specialization
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
                    <th class="px-4 py-2 border-b">Name</th>
                    <th class="px-4 py-2 border-b">Description</th>
                    <th class="px-4 py-2 border-b">Deleted</th>
                    <th class="px-4 py-2 border-b">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($specializations as $s)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $s->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $s->description }}</td>
                        <td class="px-4 py-2 border-b">{{ $s->deleted_at ? $s->deleted_at->format('Y-m-d H:i') : '-' }}</td>
                        <td class="px-4 py-2 border-b space-x-1">
                            @if (!$s->deleted_at)
                                <a href="{{ route('admin.specializations.edit', $s->id) }}" class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-300 text-sm">Edit</a>

                                <form action="{{ route('admin.specializations.destroy', $s->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-400 text-sm"
                                        onclick="return confirm('Hapus specialization?')">Delete</button>
                                </form>
                            @else
                                <form action="{{ route('admin.specializations.restore', $s->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-400 text-sm">Restore</button>
                                </form>

                                <form action="{{ route('admin.specializations.force-delete', $s->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-500 text-sm"
                                        onclick="return confirm('Hapus permanen?')">Force Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-2 text-center border-b">No specializations found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
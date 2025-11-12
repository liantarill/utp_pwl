@extends('layouts.app')

@section('title', 'Kelola Specializations')

@section('content')
    <div class="min-h-screen px-6 py-10 bg-gray-100">

        <div class="max-w-6xl mx-auto bg-white p-8 rounded-xl shadow-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-blue-900">Kelola Specializations</h2>
                <a href="{{ route('admin.specializations.create') }}"
                    class="px-4 py-2 rounded-lg bg-blue-main text-white hover:bg-blue-dark transition shadow">
                    + Tambah Specialization
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
                            <th class="px-4 py-3 border-b">Name</th>
                            <th class="px-4 py-3 border-b">Description</th>
                            <th class="px-4 py-3 border-b">Deleted</th>
                            <th class="px-4 py-3 border-b">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($specializations as $s)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 border-b align-top">{{ $s->name }}</td>
                                <td class="px-4 py-3 border-b align-top">
                                    <div class="text-sm text-gray-700">
                                        {{ $s->description ?: '-' }}
                                    </div>
                                </td>
                                <td class="px-4 py-3 border-b align-top">
                                    <span class="text-sm text-gray-600">
                                        {{ $s->deleted_at ? $s->deleted_at->format('Y-m-d H:i') : '-' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 border-b align-top space-x-2">
                                    @if (!$s->deleted_at)
                                        <a href="{{ route('admin.specializations.edit', $s->id) }}"
                                            class="inline-block bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-300 text-sm transition">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.specializations.destroy', $s->id) }}" method="POST"
                                            class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="inline-block bg-red-500 text-white px-3 py-1 rounded hover:bg-red-400 text-sm transition"
                                                onclick="return confirm('Hapus specialization?')">
                                                Delete
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.specializations.restore', $s->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="inline-block bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-400 text-sm transition">
                                                Restore
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-6 text-center border-b text-gray-600">No specializations
                                    found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

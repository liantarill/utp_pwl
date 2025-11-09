{{-- resources/views/items/index.blade.php --}}
@extends('app')

@section('title', 'Daftar Item')

@section('content')
<div class="min-h-screen p-6" style="background: linear-gradient(180deg, #f0f5fa 0%, #ffffff 100%);">
    <div class="max-w-6xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold" style="color: #1e3a5f">Daftar Item</h1>
            <a href="{{ route('items.create') }}" 
               class="inline-block px-4 py-2 rounded-lg font-medium" 
               style="background:#2d5a8c; color:#fff">Tambah Item</a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#6b94b8]/10">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-[#1e3a5f]">#</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-[#1e3a5f]">Nama</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-[#1e3a5f]">Deskripsi</th>
                        <th class="px-6 py-3 text-right text-sm font-medium text-[#1e3a5f]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($items as $item)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $item->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($item->description, 60) }}</td>
                        <td class="px-6 py-4 text-sm text-right">
                            <a href="{{ route('items.show', $item) }}" 
                               class="inline-block mr-2 px-3 py-1 rounded-md text-sm" 
                               style="border:1px solid #2d5a8c; color:#2d5a8c">Lihat</a>
                            <a href="{{ route('items.edit', $item) }}" 
                               class="inline-block px-3 py-1 rounded-md text-sm" 
                               style="background:#4a7ba7; color:#fff">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                            Belum ada item. 
                            <a href="{{ route('items.create') }}" class="underline" style="color:#2d5a8c">
                                Buat sekarang
                            </a>.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $items->links() }}
        </div>
    </div>
</div>
@endsection

{{-- resources/views/items/create.blade.php --}}
@extends('app')

@section('title', 'Tambah Item Baru')

@section('content')
<div class="min-h-screen p-6" style="background: linear-gradient(180deg, #f0f5fa 0%, #ffffff 100%);">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4" style="color:#1e3a5f">Tambah Item Baru</h2>

            {{-- Pesan Error --}}
            @if($errors->any())
            <div class="mb-4 p-3 rounded" style="background:#fee2e2; color:#991b1b">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Form Tambah Item --}}
            <form action="{{ route('items.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    {{-- Input Nama --}}
                    <div>
                        <label class="block text-sm font-medium mb-1" style="color:#1e3a5f">Nama</label>
                        <input type="text" 
                               name="name" 
                               value="{{ old('name') }}" 
                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-[#2d5a8c]/40"
                               placeholder="Masukkan nama item">
                    </div>

                    {{-- Input Deskripsi --}}
                    <div>
                        <label class="block text-sm font-medium mb-1" style="color:#1e3a5f">Deskripsi</label>
                        <textarea name="description" 
                                  rows="4" 
                                  class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-[#2d5a8c]/40"
                                  placeholder="Tulis deskripsi singkat">{{ old('description') }}</textarea>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex items-center justify-end">
                        <a href="{{ route('items.index') }}" 
                           class="mr-2 px-4 py-2 rounded-md" 
                           style="border:1px solid #2d5a8c; color:#2d5a8c">Batal</a>

                        <button type="submit" 
                                class="px-4 py-2 rounded-md font-medium" 
                                style="background:#2d5a8c; color:#fff">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

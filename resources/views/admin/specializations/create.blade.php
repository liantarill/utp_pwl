@extends('layouts.app')

@section('content')
    @include('layouts.partials.header')
    <div class="container">
        <h3>Tambah Specialization</h3>

        <form action="{{ route('admin.specializations.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.specializations.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection

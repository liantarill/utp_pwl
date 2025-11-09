@extends('layouts.app')

@section('content')
    @include('layouts.partials.header')
    <div class="container">
        <h3>Edit Specialization</h3>

        <form action="{{ route('admin.specializations.update', $specialization->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $specialization->name) }}"
                    required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ old('description', $specialization->description) }}</textarea>
            </div>

            <button class="btn btn-primary">Perbarui</button>
            <a href="{{ route('admin.specializations.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection

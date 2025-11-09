@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Tambah Dokter</h3>

        <form action="{{ route('admin.doctors.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>User (akun dokter)</label>
                <select name="user_id" class="form-control" required>
                    <option value="">-- Pilih User --</option>
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}" {{ old('user_id') == $u->id ? 'selected' : '' }}>
                            {{ $u->name }} ({{ $u->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Spesialisasi</label>
                <select name="specialization_id" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    @foreach ($specializations as $s)
                        <option value="{{ $s->id }}" {{ old('specialization_id') == $s->id ? 'selected' : '' }}>
                            {{ $s->name }}
                        </option>
                    @endforeach
                </select>
                @error('specialization_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>License Number</label>
                <input type="text" name="license_number" class="form-control" value="{{ old('license_number') }}"
                    required>
                @error('license_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>STR Number</label>
                <input type="text" name="str_number" class="form-control" value="{{ old('str_number') }}" required>
                @error('str_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>STR Expiry Date</label>
                <input type="date" name="str_expiry_date" class="form-control" value="{{ old('str_expiry_date') }}"
                    required>
                @error('str_expiry_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Education</label>
                <textarea name="education" class="form-control">{{ old('education') }}</textarea>
            </div>

            <div class="mb-3">
                <label>Experience Years</label>
                <input type="number" name="experience_years" class="form-control" value="{{ old('experience_years', 0) }}"
                    min="0">
            </div>

            <div class="mb-3">
                <label>Consultation Fee</label>
                <input type="number" step="0.01" name="consultation_fee" class="form-control"
                    value="{{ old('consultation_fee', 0) }}">
            </div>

            <div class="mb-3">
                <label>Bio</label>
                <textarea name="bio" class="form-control">{{ old('bio') }}</textarea>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection

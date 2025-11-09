@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ isset($patient) ? 'Edit Patient' : 'Add Patient' }}</h1>

        <form method="POST"
            action="{{ isset($patient) ? route('staff.patients.update', $patient) : route('staff.patients.store') }}">
            @csrf
            @if (isset($patient))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $patient->name ?? '') }}"
                    required>
            </div>
            <div class="mb-3">
                <label>Identity Number (NIK)</label>
                <input type="text" name="identity_number" class="form-control"
                    value="{{ old('identity_number', $patient->identity_number ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label>Date of Birth</label>
                <input type="date" name="date_of_birth" class="form-control"
                    value="{{ old('date_of_birth', $patient->date_of_birth ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label>Gender</label>
                <select name="gender" class="form-control" required>
                    <option value="male" {{ isset($patient) && $patient->gender == 'male' ? 'selected' : '' }}>Male
                    </option>
                    <option value="female" {{ isset($patient) && $patient->gender == 'female' ? 'selected' : '' }}>Female
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $patient->phone ?? '') }}"
                    required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $patient->email ?? '') }}">
            </div>
            <div class="mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control" required>{{ old('address', $patient->address ?? '') }}</textarea>
            </div>

            <button class="btn btn-primary">{{ isset($patient) ? 'Update' : 'Save' }}</button>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    @include('layouts.partials.header')
    <div class="container">
        <h2>Edit User</h2>
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="doctor" {{ $user->role == 'doctor' ? 'selected' : '' }}>Doctor</option>
                    <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="address" class="form-control">{{ $user->address }}</textarea>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" name="is_active" class="form-check-input" {{ $user->is_active ? 'checked' : '' }}>
                <label class="form-check-label">Aktif</label>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
@endsection

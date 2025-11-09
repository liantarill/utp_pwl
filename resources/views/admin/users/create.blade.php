@extends('layouts.app')

@section('content')
    @include('layouts.partials.header')

    <div class="container">
        <h2>Tambah User</h2>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="doctor">Doctor</option>
                    <option value="staff">Staff</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="address" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    @include('layouts.partials.header')
    <div class="container">
        <h3>Daftar Dokter</h3>
        <a href="{{ route('admin.doctors.create') }}" class="btn btn-success mb-3">Tambah Dokter</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Spesialisasi</th>
                    <th>License</th>
                    <th>STR</th>
                    <th>Fee</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->user->name ?? '-' }}</td>
                        <td>{{ $doctor->specialization->name ?? '-' }}</td>
                        <td>{{ $doctor->license_number }}</td>
                        <td>{{ $doctor->str_number }}</td>
                        <td>{{ $doctor->consultation_fee }}</td>
                        <td>
                            <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST"
                                style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

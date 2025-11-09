@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Patients</h1>
        <a href="{{ route('staff.patients.create') }}" class="btn btn-success mb-2">Add Patient</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>MRN</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->medical_record_number }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>{{ $patient->email }}</td>
                        <td>
                            <a href="{{ route('staff.patients.show', $patient) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('staff.patients.edit', $patient) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('staff.patients.destroy', $patient) }}" method="POST"
                                style="display:inline-block">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete patient?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

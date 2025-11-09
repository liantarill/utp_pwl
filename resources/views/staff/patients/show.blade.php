@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Patient Detail</h1>
        <p><strong>MRN:</strong> {{ $patient->medical_record_number }}</p>
        <p><strong>Name:</strong> {{ $patient->name }}</p>
        <p><strong>NIK:</strong> {{ $patient->identity_number }}</p>
        <p><strong>Date of Birth:</strong> {{ $patient->date_of_birth }}</p>
        <p><strong>Gender:</strong> {{ $patient->gender }}</p>
        <p><strong>Phone:</strong> {{ $patient->phone }}</p>
        <p><strong>Email:</strong> {{ $patient->email }}</p>
        <p><strong>Address:</strong> {{ $patient->address }}</p>

        <a href="{{ route('staff.patients.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection

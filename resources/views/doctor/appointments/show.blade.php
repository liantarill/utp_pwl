@extends('layouts.app')

@section('content')
<h3>Appointment Detail</h3>

<p><strong>Patient:</strong> {{ $appointment->patient->name }}</p>
<p><strong>Complaint:</strong> {{ $appointment->complaint }}</p>

<form method="POST" action="{{ route('doctor.appointments.updateStatus', $appointment) }}">
    @csrf
    @method('PATCH')
    <select name="status" class="form-control">
        @foreach(['confirmed','in_progress','completed','cancelled','no_show'] as $status)
        <option>{{ $status }}</option>
        @endforeach
    </select>
    <button class="btn btn-primary mt-2">Update Status</button>
</form>
@endsection

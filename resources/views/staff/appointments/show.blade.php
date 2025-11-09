@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Appointment Detail</h1>

        <p><strong>AP#:</strong> {{ $appointment->appointment_number }}</p>
        <p><strong>Patient:</strong> {{ $appointment->patient->name ?? 'N/A' }}</p>
        <p><strong>Doctor:</strong> {{ $appointment->doctor->user->name ?? 'N/A' }}</p>
        <p><strong>Date:</strong> {{ $appointment->appointment_date }}</p>
        <p><strong>Time:</strong> {{ $appointment->appointment_time }}</p>
        <p><strong>Status:</strong> {{ ucfirst($appointment->status) }}</p>
        <p><strong>Queue Number:</strong> {{ $appointment->queue_number }}</p>
        <p><strong>Complaint:</strong> {{ $appointment->complaint }}</p>
        <p><strong>Notes:</strong> {{ $appointment->notes }}</p>
        <p><strong>Checked In At:</strong> {{ $appointment->checked_in_at }}</p>
        <p><strong>Completed At:</strong> {{ $appointment->completed_at }}</p>

        <a href="{{ route('staff.appointments.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection

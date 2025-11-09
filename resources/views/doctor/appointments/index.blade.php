@extends('layouts.app')

@section('content')
<h2>Today's Appointments</h2>

<table class="table mt-3">
    <thead>
        <tr><th>No</th><th>Patient</th><th>Time</th><th>Status</th><th></th></tr>
    </thead>
    <tbody>
        @foreach($appointments as $a)
        <tr>
            <td>{{ $a->queue_number }}</td>
            <td>{{ $a->patient->name }}</td>
            <td>{{ $a->appointment_time }}</td>
            <td>{{ $a->status }}</td>
            <td><a href="{{ route('doctor.appointments.show', $a) }}" class="btn btn-sm btn-info">Detail</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

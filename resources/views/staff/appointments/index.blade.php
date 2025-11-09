@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Appointments</h1>

        <a href="{{ route('staff.appointments.create') }}" class="btn btn-success mb-3">Add Appointment</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>AP#</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Queue</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->appointment_number }}</td>
                        <td>{{ $appointment->patient->name ?? 'N/A' }}</td>
                        <td>{{ $appointment->doctor->user->name ?? 'N/A' }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>{{ $appointment->appointment_time }}</td>
                        <td>{{ ucfirst($appointment->status) }}</td>
                        <td>{{ $appointment->queue_number }}</td>
                        <td>
                            <a href="{{ route('staff.appointments.show', $appointment) }}"
                                class="btn btn-info btn-sm">View</a>
                            {{-- <a href="{{ route('staff.appointments.edit', $appointment) }}"
                                class="btn btn-warning btn-sm">Edit</a> --}}
                            <form action="{{ route('staff.appointments.destroy', $appointment) }}" method="POST"
                                style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this appointment?')">Delete</button>
                            </form>
                            @if ($appointment->status == 'scheduled')
                                <form action="{{ route('staff.appointments.checkin', $appointment) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Check-in</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No appointments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<h2>My Schedules</h2>
<a href="{{ route('doctor.schedules.create') }}" class="btn btn-primary">Add Schedule</a>

<table class="table mt-3">
    <thead>
        <tr>
            <th>Day</th><th>Time</th><th>Quota</th><th>Status</th><th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($schedules as $schedule)
        <tr>
            <td>{{ ucfirst($schedule->day_of_week) }}</td>
            <td>{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
            <td>{{ $schedule->quota }}</td>
            <td>{{ $schedule->is_active ? 'Active' : 'Inactive' }}</td>
            <td><a href="{{ route('doctor.schedules.edit', $schedule) }}" class="btn btn-sm btn-warning">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection


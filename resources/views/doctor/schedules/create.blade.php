@extends('layouts.app')

@section('content')
<h2>Create Schedule</h2>

<form method="POST" action="{{ route('doctor.schedules.store') }}">
    @csrf

    <label>Day</label>
    <select name="day_of_week" class="form-control">
        @foreach(['monday','tuesday','wednesday','thursday','friday','saturday','sunday'] as $day)
        <option value="{{ $day }}">{{ ucfirst($day) }}</option>
        @endforeach
    </select>

    <label>Start Time</label>
    <input type="time" name="start_time" class="form-control" required>

    <label>End Time</label>
    <input type="time" name="end_time" class="form-control" required>

    <label>Quota</label>
    <input type="number" name="quota" class="form-control" value="10">

    <button class="btn btn-success mt-3">Save</button>
</form>
@endsection

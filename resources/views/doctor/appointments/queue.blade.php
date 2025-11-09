@extends('layouts.app')

@section('content')
<h2>Queue Management</h2>

@foreach($queue as $item)
<div class="card p-2 mb-2">
    <strong>#{{ $item->queue_number }} {{ $item->patient->name }}</strong>
    <form method="POST" action="{{ route('doctor.appointments.updateStatus', $item) }}">
        @csrf @method('PATCH')
        <input type="hidden" name="status" value="in_progress">
        <button class="btn btn-success btn-sm">Call Patient</button>
    </form>
</div>
@endforeach
@endsection

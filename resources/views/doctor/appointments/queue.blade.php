@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">

    <h2 class="text-3xl font-semibold text-blue-dark mb-6">Queue Management</h2>

    <div class="space-y-4">
        @foreach($queue as $item)
        <div class="flex justify-between items-center bg-white border border-blue-light rounded-xl p-4 shadow-sm hover:shadow transition">

            <div class="text-blue-dark">
                <strong class="text-xl">#{{ $item->queue_number }}</strong>
                <span class="ml-2 text-lg font-medium">{{ $item->patient->name }}</span>
            </div>

            <form method="POST" action="{{ route('doctor.appointments.updateStatus', $item) }}">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="in_progress">
                <button 
                    class="bg-blue-main hover:bg-blue-dark text-white px-4 py-2 rounded-lg text-sm shadow-sm transition">
                    Call Patient
                </button>
            </form>

        </div>
        @endforeach
    </div>

</div>
@endsection

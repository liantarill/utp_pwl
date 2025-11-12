@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto">

        <h3 class="text-3xl font-semibold text-blue-dark mb-6">Appointment Detail</h3>

        <div class="bg-white border border-blue-light rounded-xl p-6 shadow-sm mb-6">
            <p class="text-lg mb-3">
                <span class="font-semibold text-gray-700">Patient:</span>
                {{ $appointment->patient->name }}
            </p>

            <p class="text-lg">
                <span class="font-semibold text-gray-700">Complaint:</span>
                {{ $appointment->complaint }}
            </p>
        </div>

        <form method="POST" action="{{ route('doctor.appointments.updateStatus', $appointment) }}"
            class="bg-white border border-blue-light rounded-xl p-6 shadow-sm space-y-5">
            @csrf
            @method('PATCH')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Change Status</label>
                <select name="status"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-main focus:border-blue-main">
                    @foreach (['scheduled', 'in_progress', 'completed', 'cancelled'] as $status)
                        <option value="{{ $status }}" {{ $appointment->status === $status ? 'selected' : '' }}>
                            {{ ucfirst(str_replace('_', ' ', $status)) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button
                class="w-full bg-blue-main hover:bg-blue-dark text-white py-2.5 rounded-lg transition shadow-sm font-medium">
                Update Status
            </button>
        </form>

    </div>
@endsection

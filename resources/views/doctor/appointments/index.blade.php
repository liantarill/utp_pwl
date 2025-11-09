@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">

    <h2 class="text-3xl font-semibold text-blue-dark mb-6">Today's Appointments</h2>

    <div class="bg-white rounded-xl shadow border border-blue-light overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-blue-main text-white">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Patient</th>
                    <th class="px-6 py-3">Time</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $a)
                <tr class="border-b hover:bg-blue-pale transition">
                    <td class="px-6 py-3">{{ $a->queue_number }}</td>
                    <td class="px-6 py-3 font-medium">{{ $a->patient->name }}</td>
                    <td class="px-6 py-3">{{ $a->appointment_time }}</td>
                    <td class="px-6 py-3">
                        <span class="px-3 py-1 rounded-full text-sm
                            @if($a->status == 'waiting')
                                bg-yellow-100 text-yellow-700
                            @elseif($a->status == 'completed')
                                bg-green-100 text-green-700
                            @elseif($a->status == 'cancelled')
                                bg-red-100 text-red-700
                            @else
                                bg-gray-100 text-gray-700
                            @endif
                        ">
                            {{ ucfirst($a->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-3">
                        <a href="{{ route('doctor.appointments.show', $a) }}"
                           class="bg-blue-main hover:bg-blue-dark text-white px-4 py-1.5 rounded-md text-sm transition shadow-sm">
                            Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection

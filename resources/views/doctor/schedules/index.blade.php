@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-semibold text-blue-dark">My Schedules</h2>
            <a href="{{ route('doctor.schedules.create') }}"
                class="bg-blue-main hover:bg-blue-dark text-white px-5 py-2.5 rounded-lg transition shadow-sm">
                + Add Schedule
            </a>
        </div>

        <div class="bg-white rounded-xl shadow border border-blue-light overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-blue-main text-white">
                    <tr>
                        <th class="px-6 py-3">Day</th>
                        <th class="px-6 py-3">Time</th>
                        <th class="px-6 py-3">Quota</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                        <tr class="border-b hover:bg-blue-pale transition">
                            <td class="px-6 py-3 font-medium">{{ ucfirst($schedule->day) }}</td>
                            <td class="px-6 py-3">{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
                            <td class="px-6 py-3">{{ $schedule->quota }}</td>
                            <td class="px-6 py-3">
                                <span
                                    class="px-3 py-1 text-sm rounded-full 
                            {{ $schedule->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $schedule->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-3">
                                <a href="{{ route('doctor.schedules.edit', $schedule) }}"
                                    class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-1.5 rounded-md text-sm transition shadow-sm">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection

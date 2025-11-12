@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-xl p-8 border border-blue-light">

        <h2 class="text-2xl font-semibold text-blue-dark mb-6">Edit Schedule</h2>

        <form method="POST" action="{{ route('doctor.schedules.update', $schedule->id) }}" class="space-y-5">
            @csrf
            @method('PATCH')

            {{-- Tampilkan error --}}
            @if ($errors->any())
                <div class="bg-red-50 border border-red-300 text-red-600 p-3 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Day --}}
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">Day</label>
                <select name="day"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-main focus:border-blue-main">
                    @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                        <option value="{{ $day }}" {{ old('day', $schedule->day) === $day ? 'selected' : '' }}>
                            {{ ucfirst($day) }}
                        </option>
                    @endforeach
                </select>
            </div>


            {{-- Start Time --}}
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">Start Time</label>
                <input type="time" name="start_time"
                    value="{{ old('start_time', \Carbon\Carbon::parse($schedule->start_time)->format('H:i')) }}" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-main focus:border-blue-main">
            </div>

            {{-- End Time --}}
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">End Time</label>
                <input type="time" name="end_time"
                    value="{{ old('end_time', \Carbon\Carbon::parse($schedule->end_time)->format('H:i')) }}" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-main focus:border-blue-main">
            </div>

            {{-- Quota --}}
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">Quota</label>
                <input type="number" name="quota" min="1" value="{{ old('quota', $schedule->quota) }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-main focus:border-blue-main">
            </div>

            {{-- Active toggle --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1"
                    {{ old('is_active', $schedule->is_active) ? 'checked' : '' }}
                    class="form-checkbox h-4 w-4 text-blue-main">
                <label class="text-sm text-gray-700">Active</label>
            </div>

            {{-- Buttons --}}
            <div class="flex gap-3 pt-4">
                <a href="{{ route('doctor.schedules.index') }}"
                    class="flex-1 text-center bg-gray-200 hover:bg-gray-300 text-gray-700 py-2.5 rounded-lg transition">
                    Cancel
                </a>
                <button type="submit"
                    class="flex-1 bg-blue-main hover:bg-blue-dark text-white py-2.5 rounded-lg transition shadow-sm">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection

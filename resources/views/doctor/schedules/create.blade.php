@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-xl p-8 border border-blue-light">

        <h2 class="text-2xl font-semibold text-blue-dark mb-6">Create Schedule</h2>
        @if (session('error'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                <p class="text-green-700 font-medium text-sm">{{ session('error') }}</p>
            </div>
        @endif
        <form method="POST" action="{{ route('doctor.schedules.store') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">Day</label>
                <select name="day_of_week"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-main focus:border-blue-main">
                    @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                        <option value="{{ $day }}">{{ ucfirst($day) }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">Start Time</label>
                <input type="time" name="start_time" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-main focus:border-blue-main">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">End Time</label>
                <input type="time" name="end_time" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-main focus:border-blue-main">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">Quota</label>
                <input type="number" name="quota" value="10"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-main focus:border-blue-main">
            </div>

            <button class="w-full bg-blue-main hover:bg-blue-dark text-white py-2.5 rounded-lg transition shadow-sm">
                Save
            </button>
        </form>

    </div>
@endsection

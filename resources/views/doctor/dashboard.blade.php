@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto py-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-3xl font-bold text-blue-dark">Dashboard Doctor</h1>
                <p class="text-sm text-gray-600">Halo, {{ Auth::user()->name }} — ringkasan aktivitas dan appointment kamu.
                </p>
            </div>


        </div>

        <!-- Statistik kartu -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow p-4 border">
                <div class="text-sm text-gray-500">Total Appointments</div>
                <div class="mt-2 text-2xl font-semibold text-blue-dark">{{ $totalAppointments }}</div>
            </div>

            <div class="bg-white rounded-lg shadow p-4 border">
                <div class="text-sm text-gray-500">Today's Appointments</div>
                <div class="mt-2 text-2xl font-semibold text-blue-dark">{{ $todayAppointments }}</div>
            </div>

            <div class="bg-white rounded-lg shadow p-4 border">
                <div class="text-sm text-gray-500">Upcoming</div>
                <div class="mt-2 text-2xl font-semibold text-blue-dark">{{ $upcomingAppointments }}</div>
            </div>

            <div class="bg-white rounded-lg shadow p-4 border">
                <div class="text-sm text-gray-500">Completed / Cancelled</div>
                <div class="mt-2 text-xl font-semibold">
                    <span class="text-green-600">{{ $completed }}</span>
                    <span class="text-gray-400 mx-2">/</span>
                    <span class="text-red-600">{{ $cancelled }}</span>
                </div>
            </div>
        </div>

        <!-- Quick actions -->
        <div class="mb-8">
            <h3 class="text-lg font-medium mb-3">Quick Actions</h3>
            <div class="flex gap-3 flex-wrap">
                <a href="{{ route('doctor.appointments.index') }}"
                    class="bg-blue-main hover:bg-blue-dark text-white px-4 py-2 rounded-md shadow text-sm">
                    Lihat Semua Appointments
                </a>

                {{-- <a href="{{ route('doctor.appointments.create') ?? '#' }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md shadow text-sm">
                    Tambah Appointment
                </a> --}}

                <a href="{{ route('doctor.appointments.queue') ?? '#' }}"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md shadow text-sm">
                    Antrian Sekarang
                </a>
            </div>
        </div>

        <!-- Recent appointments table -->
        <div class="bg-white rounded-xl shadow border border-blue-light overflow-hidden">
            <div class="px-6 py-4 border-b">
                <h4 class="font-semibold">Recent Appointments</h4>
                <p class="text-sm text-gray-500">8 appointment terbaru.</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-blue-main text-white">
                        <tr>
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Date</th>
                            <th class="px-6 py-3">Patient</th>
                            <th class="px-6 py-3">Time</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentAppointments as $a)
                            <tr class="border-b hover:bg-blue-pale transition">
                                <td class="px-6 py-3">{{ $a->queue_number }}</td>
                                <td class="px-6 py-3">{{ \Carbon\Carbon::parse($a->appointment_date)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-3 font-medium">{{ optional($a->patient)->name ?? '-' }}</td>
                                <td class="px-6 py-3">{{ \Carbon\Carbon::parse($a->appointment_time)->format('H:i') }}</td>
                                <td class="px-6 py-3">
                                    @php
                                        $status = $a->status;
                                        $statusClasses = [
                                            'waiting' => 'bg-yellow-100 text-yellow-700',
                                            'completed' => 'bg-green-100 text-green-700',
                                            'cancelled' => 'bg-red-100 text-red-700',
                                        ];
                                    @endphp
                                    <span
                                        class="px-3 py-1 rounded-full text-sm {{ $statusClasses[$status] ?? 'bg-gray-100 text-gray-700' }}">
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-3">
                                    <a href="{{ route('doctor.appointments.show', $a) }}"
                                        class="bg-blue-main hover:bg-blue-dark text-white px-4 py-1.5 rounded-md text-sm transition shadow-sm">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-6 text-center text-gray-500">
                                    No appointments found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

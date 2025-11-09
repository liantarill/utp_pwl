@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">Dashboard Admin</h2>
        <span class="text-muted">Selamat datang kembali, <strong>{{ Auth::user()->name }}</strong></span>
    </div>

    {{-- Statistik Cards --}}
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 bg-white hover-shadow transition">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="text-secondary fw-semibold mb-1">Total Dokter</h5>
                        <h3 class="fw-bold text-dark mb-0">{{ $totalDoctors ?? 0 }}</h3>
                    </div>
                    <div class="bg-dark text-white rounded-circle p-3">
                        <i class="fas fa-user-md fa-lg"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 bg-white hover-shadow transition">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="text-secondary fw-semibold mb-1">Total Pasien</h5>
                        <h3 class="fw-bold text-dark mb-0">{{ $totalPatients ?? 0 }}</h3>
                    </div>
                    <div class="bg-dark text-white rounded-circle p-3">
                        <i class="fas fa-users fa-lg"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 bg-white hover-shadow transition">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="text-secondary fw-semibold mb-1">Total Appointment</h5>
                        <h3 class="fw-bold text-dark mb-0">{{ $totalAppointments ?? 0 }}</h3>
                    </div>
                    <div class="bg-dark text-white rounded-circle p-3">
                        <i class="fas fa-calendar-check fa-lg"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Grafik Statistik --}}
    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="card shadow border-0 rounded-4 bg-white">
                <div class="card-header bg-white border-0">
                    <h5 class="fw-bold text-dark mb-0">Grafik Appointment per Bulan</h5>
                </div>
                <div class="card-body">
                    <canvas id="appointmentsChart" height="120"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow border-0 rounded-4 bg-white h-100">
                <div class="card-header bg-white border-0">
                    <h5 class="fw-bold text-dark mb-0">Aktivitas Terbaru</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @forelse($recentAppointments ?? [] as $item)
                            <li class="list-group-item bg-transparent border-0 px-0 py-2">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong>{{ $item->patient->name ?? 'Pasien' }}</strong><br>
                                        <small class="text-muted">{{ $item->doctor->user->name ?? 'Dokter' }}</small>
                                    </div>
                                    <span class="badge bg-dark text-white">{{ ucfirst($item->status) }}</span>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item bg-transparent border-0 text-muted">Belum ada aktivitas.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('appointmentsChart').getContext('2d');
    const appointmentsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartLabels ?? ['Jan','Feb','Mar','Apr','May','Jun']) !!},
            datasets: [{
                label: 'Jumlah Appointment',
                data: {!! json_encode($chartData ?? [5, 7, 3, 10, 8, 6]) !!},
                borderColor: '#000',
                backgroundColor: 'rgba(0,0,0,0.05)',
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: { grid: { display: false } },
                y: { beginAtZero: true, ticks: { stepSize: 2 } }
            }
        }
    });
</script>

<style>
.hover-shadow:hover { box-shadow: 0 8px 20px rgba(0,0,0,0.15); }
.transition { transition: all 0.3s ease; }
</style>
@endsection

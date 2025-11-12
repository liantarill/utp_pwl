<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $doctor = $user->doctor;

        if (! $doctor) {
            return redirect()->route('home')->with('error', 'Doctor profile not found.');
        }

        // statistik
        $totalAppointments = Appointment::where('doctor_id', $doctor->id)->count();

        $today = Carbon::today()->toDateString();
        $todayAppointments = Appointment::where('doctor_id', $doctor->id)
            ->whereDate('appointment_date', $today)
            ->count();

        $upcomingAppointments = Appointment::where('doctor_id', $doctor->id)
            ->whereDate('appointment_date', '>=', $today)
            ->orderBy('appointment_date')
            ->count();

        $completed = Appointment::where('doctor_id', $doctor->id)
            ->where('status', 'completed')
            ->count();

        $cancelled = Appointment::where('doctor_id', $doctor->id)
            ->where('status', 'cancelled')
            ->count();

        // daftar appointment terbaru (limit 8)
        $recentAppointments = Appointment::where('doctor_id', $doctor->id)
            ->with('patient')
            ->orderBy('appointment_date', 'desc')
            ->orderBy('queue_number')
            ->limit(8)
            ->get();

        return view('doctor.dashboard', compact(
            'totalAppointments',
            'todayAppointments',
            'upcomingAppointments',
            'completed',
            'cancelled',
            'recentAppointments'
        ));
    }
}

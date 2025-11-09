<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('doctor_id', Auth::id())
            ->whereDate('appointment_date', today())
            ->orderBy('queue_number')
            ->get();

        return view('doctor.appointments.index', compact('appointments'));
    }

    public function show(Appointment $appointment)
    {
        return view('doctor.appointments.show', compact('appointment'));
    }

    public function queue()
    {
        $queue = Appointment::where('doctor_id', Auth::id())
            ->where('status', 'scheduled')
            ->orderBy('queue_number')
            ->get();

        return view('doctor.appointments.queue', compact('queue'));
    }

    public function updateStatus(Request $request, Appointment $appointment)
    {
        $appointment->update(['status' => $request->status]);

        return back()->with('success', 'Appointment status updated');
    }
}

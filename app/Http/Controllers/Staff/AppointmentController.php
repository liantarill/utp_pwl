<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('patient', 'doctor')->get();
        return view('staff.appointments.index', compact('appointments'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = \App\Models\Doctor::with('user', 'schedules')->get();
        return view('staff.appointments.create', compact('patients', 'doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'schedule_id' => 'required|exists:schedules,id',
            'appointment_date' => 'required|date',
        ]);

        $schedule = \App\Models\Schedule::findOrFail($request->schedule_id);

        Appointment::create([
            'appointment_number' => strtoupper(uniqid('AP')),
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'schedule_id' => $schedule->id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $schedule->start_time,
            'queue_number' => Appointment::where('schedule_id', $schedule->id)->count() + 1,
            'status' => 'scheduled',
            'complaint' => $request->complaint,
        ]);

        return redirect()->route('staff.appointments.index')->with('success', 'Appointment created.');
    }


    public function show(Appointment $appointment)
    {
        return view('staff.appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        $patients = Patient::all();
        return view('staff.appointments.edit', compact('appointment', 'patients'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
        ]);

        $appointment->update($request->only(
            'patient_id',
            'doctor_id',
            'appointment_date',
            'appointment_time',
            'queue_number',
            'status',
            'complaint',
            'notes'
        ));

        return redirect()->route('staff.appointments.index')->with('success', 'Appointment updated.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('staff.appointments.index')->with('success', 'Appointment deleted.');
    }

    // check-in patient
    public function checkin(Appointment $appointment)
    {
        $appointment->update([
            'checked_in_at' => now(),
            'status' => 'in_progress'
        ]);

        return redirect()->route('staff.appointments.index')->with('success', 'Patient checked in.');
    }
}

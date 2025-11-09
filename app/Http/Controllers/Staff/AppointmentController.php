<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Menampilkan daftar semua appointment.
     */
    public function index()
    {
        $appointments = Appointment::with(['patient', 'doctor', 'schedule'])
            ->orderBy('appointment_date', 'desc')
            ->get();

        return view('staff.appointments.index', compact('appointments'));
    }

    /**
     * Form tambah appointment baru.
     */
    public function create()
    {
        $patients = Patient::orderBy('name')->get();
        $doctors = Doctor::with('user', 'schedules')->orderBy('id')->get();
        $schedules = Schedule::orderBy('day')->get();

        return view('staff.appointments.create', compact('patients', 'doctors', 'schedules'));
    }

    /**
     * Simpan appointment baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'schedule_id' => 'required|exists:schedules,id',
            'appointment_date' => 'required|date',
            'complaint' => 'nullable|string|max:1000',
        ]);

        // Ambil jadwal dokter yang dipilih
        $schedule = Schedule::findOrFail($request->schedule_id);

        // Hitung nomor antrian untuk jadwal tersebut
        $queueNumber = Appointment::where('schedule_id', $schedule->id)
            ->whereDate('appointment_date', $request->appointment_date)
            ->count() + 1;

        // Buat appointment baru
        $appointment = Appointment::create([
            'appointment_number' => strtoupper(uniqid('AP')),
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'schedule_id' => $schedule->id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $schedule->start_time,
            'queue_number' => $queueNumber,
            'status' => 'scheduled',
            'complaint' => $request->complaint,
        ]);

        return redirect()->route('staff.appointments.index')
            ->with('success', 'Janji temu berhasil dibuat.');
    }

    /**
     * Menampilkan detail appointment.
     */
    public function show(Appointment $appointment)
    {
        $appointment->load(['patient', 'doctor', 'schedule']);

        return view('staff.appointments.show', compact('appointment'));
    }

    /**
     * Form edit appointment.
     */
    public function edit(Appointment $appointment)
    {
        $patients = Patient::orderBy('name')->get();
        $doctors = Doctor::orderBy('id')->get();
        $schedules = Schedule::orderBy('day')->get();

        return view('staff.appointments.edit', compact('appointment', 'patients', 'doctors', 'schedules'));
    }

    /**
     * Update appointment yang sudah ada.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'schedule_id' => 'nullable|exists:schedules,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'status' => 'required|string|in:scheduled,in_progress,completed,cancelled',
            'complaint' => 'nullable|string|max:1000',
            'notes' => 'nullable|string|max:1000',
        ]);

        $appointment->update([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'schedule_id' => $request->schedule_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => $request->status,
            'complaint' => $request->complaint,
            'notes' => $request->notes,
        ]);

        return redirect()->route('staff.appointments.index')
            ->with('success', 'Janji temu berhasil diperbarui.');
    }

    /**
     * Hapus appointment.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('staff.appointments.index')
            ->with('success', 'Janji temu berhasil dihapus.');
    }

    /**
     * Check-in pasien (ubah status menjadi in_progress).
     */
    public function checkin(Appointment $appointment)
    {
        $appointment->update([
            'checked_in_at' => now(),
            'status' => 'in_progress',
        ]);

        return redirect()->route('staff.appointments.index')
            ->with('success', 'Pasien berhasil check-in.');
    }

    /**
     * Tandai appointment selesai.
     */
    public function complete(Appointment $appointment)
    {
        $appointment->update([
            'completed_at' => now(),
            'status' => 'completed',
        ]);

        return redirect()->route('staff.appointments.index')
            ->with('success', 'Janji temu selesai.');
    }
}

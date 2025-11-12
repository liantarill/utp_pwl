<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    protected function getDoctorIdForAuthUser()
    {
        // Cari doctor record yang terkait dengan user saat ini
        $doctorId = Doctor::where('user_id', Auth::id())->value('id');
        return $doctorId;
    }

    public function index()
    {
        $doctorId = $this->getDoctorIdForAuthUser();
        if (!$doctorId) {
            return redirect()->route('doctor.dashboard') // sesuaikan route jika perlu
                ->with('warning', 'Profile dokter tidak ditemukan. Pastikan akun Anda sudah didaftarkan sebagai dokter.');
        }

        // ambil semua jadwal milik dokter ini
        $schedules = Schedule::where('doctor_id', $doctorId)->latest()->get();
        return view('doctor.schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('doctor.schedules.create');
    }

    public function store(Request $request)
    {
        $request->merge(['day' => $request->input('day') ?? $request->input('day_of_week')]);

        $request->validate([
            'day' => 'required|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'quota' => 'required|integer|min:1',
            'is_active' => 'sometimes|boolean',
        ]);

        $doctorId = \App\Models\Doctor::where('user_id', Auth::id())->value('id');
        if (!$doctorId) {
            return back()->withInput()->withErrors(['doctor' => 'Profile dokter tidak ditemukan.']);
        }

        $start = \Carbon\Carbon::createFromFormat('H:i', $request->start_time);
        $end = \Carbon\Carbon::createFromFormat('H:i', $request->end_time);
        $isOvernight = $end->lessThanOrEqualTo($start);



        $schedule = new \App\Models\Schedule();
        $schedule->id = (string) \Illuminate\Support\Str::uuid();
        $schedule->doctor_id = $doctorId;
        $schedule->day = $request->day;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->quota = $request->quota;
        $schedule->is_active = $request->has('is_active') ? (bool)$request->is_active : true;
        $schedule->save();

        return redirect()->route('doctor.schedules.index')->with('success', 'Schedule created');
    }


    public function edit(Schedule $schedule)
    {
        return view('doctor.schedules.edit', compact('schedule'));
    }

    public function update(Request $request, Schedule $schedule)
    {

        $request->validate([
            'day' => 'required|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'quota' => 'required|integer|min:1',
            'is_active' => 'sometimes|boolean',
        ]);

        $schedule->update([
            'day' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'quota' => $request->quota,
            'is_active' => $request->has('is_active') ? (bool) $request->is_active : $schedule->is_active,
        ]);

        return redirect()->route('doctor.schedules.index')->with('success', 'Schedule updated');
    }
}

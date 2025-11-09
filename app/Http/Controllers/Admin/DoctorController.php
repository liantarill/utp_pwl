<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::with('user', 'specialization')->get();
        return view('admin.doctors.index', compact('doctors'));
    }
    // show form create
    public function create()
    {
        $users = User::where('role', 'doctor')->get();
        $specializations = Specialization::all();
        return view('admin.doctors.create', compact('users', 'specializations'));
    }

    // store new doctor
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'specialization_id' => 'required|exists:specializations,id',
            'license_number' => 'required|unique:doctors,license_number',
            'str_number' => 'required|unique:doctors,str_number',
            'str_expiry_date' => 'required|date',
            'education' => 'nullable|string',
            'experience_years' => 'nullable|integer|min:0',
            'consultation_fee' => 'nullable|numeric|min:0',
            'bio' => 'nullable|string',
        ]);

        $validated['id'] = (string) Str::uuid();

        Doctor::create($validated);

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor berhasil ditambahkan.');
    }

    // show form edit
    public function edit(Doctor $doctor)
    {
        $users = User::where('role', 'doctor')->get();
        $specializations = Specialization::all();
        return view('admin.doctors.edit', compact('doctor', 'users', 'specializations'));
    }

    // update existing doctor
    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'specialization_id' => 'required|exists:specializations,id',
            'license_number' => 'required|unique:doctors,license_number,' . $doctor->id,
            'str_number' => 'required|unique:doctors,str_number,' . $doctor->id,
            'str_expiry_date' => 'required|date',
            'education' => 'nullable|string',
            'experience_years' => 'nullable|integer|min:0',
            'consultation_fee' => 'nullable|numeric|min:0',
            'bio' => 'nullable|string',
        ]);

        $doctor->update($validated);

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor berhasil diperbarui.');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('admin.doctors.index')->with('success', 'Doctor berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::orderBy('created_at', 'desc')->get();
        return view('staff.patients.index', compact('patients'));
    }

    public function create()
    {
        return view('staff.patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'identity_number' => 'required|string|unique:patients',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'required|string',
        ]);

        Patient::create($request->all());

        return redirect()->route('staff.patients.index')->with('success', 'Patient created.');
    }

    public function show(Patient $patient)
    {
        return view('staff.patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('staff.patients.create', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'identity_number' => 'required|string|unique:patients,identity_number,' . $patient->id,
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'required|string',
        ]);

        $patient->update($request->all());

        return redirect()->route('staff.patients.index')->with('success', 'Patient updated.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('staff.patients.index')->with('success', 'Patient deleted.');
    }
}

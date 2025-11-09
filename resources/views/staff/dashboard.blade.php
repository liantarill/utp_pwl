<h1>DASHBOARD STAFF</h1>

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Staff Dashboard</h1>
        <p>Welcome, {{ auth()->user()->name }}!</p>

        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('staff.patients.index') }}" class="btn btn-primary">Manage Patients</a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('staff.appointments.index') }}" class="btn btn-primary">Manage Appointments</a>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger">
            Logout
        </button>
    </form>
@endsection

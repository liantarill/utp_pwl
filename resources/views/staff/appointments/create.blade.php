@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>New Appointment</h1>

        <form action="{{ route('staff.appointments.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Patient</label>
                <select name="patient_id" class="form-control" required>
                    <option value="">-- Select Patient --</option>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }} ({{ $patient->medical_record_number }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Doctor</label>
                <select name="doctor_id" class="form-control" id="doctorSelect" required>
                    <option value="">-- Select Doctor --</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Schedule</label>
                <select name="schedule_id" class="form-control" id="scheduleSelect" required>
                    <option value="">-- Select Schedule --</option>
                    <!-- Options will be filled by JS based on selected doctor -->
                </select>
            </div>

            <div class="mb-3">
                <label>Date</label>
                <input type="date" name="appointment_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Complaint</label>
                <textarea name="complaint" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save Appointment</button>
            <a href="{{ route('staff.appointments.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>

    <script>
        const doctors = @json($doctors);

        document.getElementById('doctorSelect').addEventListener('change', function() {
            const doctorId = this.value;
            const scheduleSelect = document.getElementById('scheduleSelect');
            scheduleSelect.innerHTML = '<option value="">-- Select Schedule --</option>';

            if (!doctorId) return;

            const doctor = doctors.find(d => d.id == doctorId);
            if (doctor && doctor.schedules.length) {
                doctor.schedules.forEach(s => {
                    const option = document.createElement('option');
                    option.value = s.id;
                    option.text = `${s.day_of_week} (${s.start_time} - ${s.end_time})`;
                    scheduleSelect.appendChild(option);
                });
            }
        });
    </script>
@endsection

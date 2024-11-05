@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="jumbotron text-center" style="background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px;">
            <h2>Assigned Medications</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Patient Surname</th>
                    <th>Medication Name</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($assignedMedications as $assignment)
                    <tr>
                        <td>{{ $assignment->patient_name }}</td>
                        <td>{{ $assignment->patient_surname }}</td>
                        <td>{{ $assignment->medication_name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No medications assigned.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

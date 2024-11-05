@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="jumbotron text-center" style="background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px;">
            <h2>Select Medication for {{ $patient->name }}</h2>
            <form action="{{ route('patients.assignMedication', $patient->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="medication">Select Medication:</label>
                    <select name="medication" id="medication" class="form-control" required>
                        <option value="">-- Select Medication --</option>
                        @foreach ($medications as $medication)
                            <option value="{{ $medication->id }}">{{ $medication->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Assign Medication</button>
            </form>
        </div>
    </div>
@endsection

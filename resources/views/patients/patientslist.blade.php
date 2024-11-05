@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="jumbotron text-center" style="background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px;">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Date of Birth</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
                <tbody>
                @foreach ($list_patients as $patient)
                    <tr>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->surname }}</td>
                        <td>{{ $patient->age }}</td>
                        <td>{{ $patient->address }}</td>
                        <td>{{ $patient->birthdate }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>{{ $patient->gender }}</td>
                        <td>
                            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('patients.medication', $patient->id) }}" class="btn btn-secondary">Select Medication</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

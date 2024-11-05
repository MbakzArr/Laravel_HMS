@extends('layout.layout')

@section('content')
    <div class="container mt-5">
        <h1>Medications List</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif

    <!-- Add Medication Button -->
        <div class="mb-3">
            <a href="{{ route('medication.create') }}" class="btn btn-success">Add Medication</a>
        </div>

        <!-- Medication Table -->
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($medications as $medication)
                <tr>
                    <td>{{ $medication->id }}</td>
                    <td>{{ $medication->name }}</td>
                    <td>{{ $medication->description }}</td>
                    <td>{{ $medication->created_at->format('Y-m-d') }}</td>
                    <td>
                        <!-- Add Edit and Delete buttons if needed -->
                        <a href="#" class="btn btn-primary">Edit</a>
                        <form action="{{ route('medication.destroy', $medication->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

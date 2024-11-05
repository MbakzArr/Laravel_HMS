@extends('layout.layout')

@section('content')
    <div class="container mt-5">
        <h1>Edit Medication</h1>

        <form action="{{ route('medication.update', $medication->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Medication Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $medication->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $medication->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update Medication</button>
            <a href="{{ route('medications.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

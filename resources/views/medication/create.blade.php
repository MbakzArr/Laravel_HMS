<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Medication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Add Medication</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
@endif

<!-- Form to add medication -->
    <form action="{{ route('medication.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Medication Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Medication</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

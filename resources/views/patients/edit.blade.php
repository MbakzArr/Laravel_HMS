<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f7;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            margin-top: 10px;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .success-message {
            text-align: center;
            color: green;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .delete-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h1>Edit Patient Details</h1>

@if (session('success'))
    <p class="success-message">{{ session('success') }}</p>
@endif

<form action="{{ route('patients.update', $patient->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" value="{{ $patient->name }}" required>
    </div>

    <div class="form-group">
        <label for="surname">Surname:</label>
        <input type="text" name="surname" class="form-control" value="{{ $patient->surname }}" required>
    </div>

    <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" name="age" class="form-control" value="{{ $patient->age }}" required min="0">
    </div>

    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" name="address" class="form-control" value="{{ $patient->address }}" required>
    </div>

    <div class="form-group">
        <label for="birthdate">Birthdate:</label>
        <input type="date" name="birthdate" class="form-control" value="{{ $patient->birthdate }}" required>
    </div>

    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" name="phone" class="form-control" value="{{ $patient->phone }}" required>
    </div>

    <div class="form-group">
        <label for="gender">Gender:</label>
        <select name="gender" class="form-control" required>
            <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>Female</option>
            <option value="other" {{ $patient->gender == 'other' ? 'selected' : '' }}>Other</option>
        </select>
    </div>

    <button type="submit">Update Patient</button>
</form>

<!-- Delete Button Form -->
<form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="delete-btn">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete Patient</button>
</form>

</body>
</html>

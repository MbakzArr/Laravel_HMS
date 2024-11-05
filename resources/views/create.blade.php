@extends('layout.layout')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f7;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px; /* Ensures space between form and footer */
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select,
        textarea {
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
        select:focus,
        textarea:focus {
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

        .success-message {
            text-align: center;
            color: green;
            margin-bottom: 20px;
        }

        /* Ensure footer stays below content */
        footer {
            margin-top: auto;
        }
    </style>

    <h1>Patient Registration Form</h1>

    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="surname">Surname:</label>
        <input type="text" name="surname" required>

        <label for="age">Age:</label>
        <input type="number" name="age" required min="0">

        <label for="address">Address:</label>
        <input type="text" name="address" required>

        <label for="birthdate">Birthdate:</label>
        <input type="date" name="birthdate" required>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>

        <button type="submit">Register Patient</button>
    </form>
@endsection

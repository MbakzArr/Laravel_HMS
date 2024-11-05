@extends('layout.layout2')

@section('content')
    <div class="container" style="background-image: url('{{ asset('images/img01.jpg') }}'); background-size: cover; background-position: center; height: 100vh; display: flex; justify-content: center; align-items: center;">
        <div class="jumbotron text-center" style="background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px;">
            <h1>Welcome to the Mamelodi Hospital Management System</h1>
            <p>Your health is our priority</p>
            <a href="{{ route('create') }}" class="btn btn-primary" style="margin-top: 20px;">Register Patient</a>

        </div>
    </div>
@endsection

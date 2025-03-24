@extends('layouts.app')
@section('Title') register
@endsection
@section('content')
<div class="container">
    <h2>Register</h2>
    <form action="{{ route('do_register') }}" method="post">
        @csrf
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach

        <div class="form-group mb-2">
            <label>Name:</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="form-group mb-2">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" name="age" id="age" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>Password:</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="form-group mb-2">
            <label>Confirm Password:</label>
            <input type="password" class="form-control" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection

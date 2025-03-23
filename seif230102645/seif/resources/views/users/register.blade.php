@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Register</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('do_register') }}" method="post">
        @csrf
        <div class="form-group mb-2">
            <label>Name:</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group mb-2">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" required>
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

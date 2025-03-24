@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Login</h2>
    <form action="{{ route('do_login') }}" method="post">
        @csrf
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach

        <div class="form-group mb-2">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="form-group mb-2">
            <label>Password:</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection

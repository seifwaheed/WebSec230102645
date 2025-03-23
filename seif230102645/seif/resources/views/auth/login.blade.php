@extends('layouts.main')

@section('title', 'Login')

@section('content')
    <h1>Login Page</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
@endsection

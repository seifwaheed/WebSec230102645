@extends('layouts.app')
@section('content')
    <h1>{{ isset($user) ? 'Edit User' : 'Create User' }}</h1>
    <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
        @csrf
        @if(isset($user))
            @method('PUT')
        @endif
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ isset($user) ? $user->name : '' }}" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ isset($user) ? $user->email : '' }}" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update' : 'Create' }}</button>
    </form>
@endsection
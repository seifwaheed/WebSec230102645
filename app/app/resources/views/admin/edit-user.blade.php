@extends('layouts.app')
@section('Title') edit users

@endsection
@section('content')
<div class="container">
    <h2>Edit User: {{ $user->name }}</h2>
    
    <form action="{{ route('admin.users.update-password', $user) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Password</button>
    </form>
</div>
@endsection

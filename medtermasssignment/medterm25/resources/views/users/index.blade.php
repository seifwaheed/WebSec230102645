@extends('layouts.app')
@section('Title') Management

@endsection
@section('content')
<div class="container">
    <h2 class="mb-4">User Management</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('users.updateRole', $user->id) }}" method="POST">
                        @csrf
                        <select name="role" class="form-select" onchange="this.form.submit()">
                            <option value="Customer" {{ $user->role == 'Customer' ? 'selected' : '' }}>Customer</option>
                            <option value="Employee" {{ $user->role == 'Employee' ? 'selected' : '' }}>Employee</option>
                            <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </form>
                </td>
                <td>
                    <form action="{{ route('users.updateRole', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

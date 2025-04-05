@extends('layouts.master')
@section('title', 'User Profile')
@section('content')
<div class="row">
    <div class="m-4 col-sm-6">
        <table class="table table-striped">
            <tr>
                <th>Name</th><td>{{$user->name}}</td>
            </tr>
            <tr>
                <th>Email</th><td>{{$user->email}}</td>
            </tr>
            @if($user->hasRole('Customer'))
            <tr>
                <th>Account Credit</th>
                <td>${{ number_format($user->credit, 2) }}</td>
            </tr>
            @endif
            <tr>
                <th>Roles</th>
                <td>
                    @foreach($user->roles as $role)
                        <span class="badge bg-primary">{{$role->name}}</span>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Permissions</th>
                <td>
                    @foreach($permissions as $permission)
                        <span class="badge bg-success">{{$permission->display_name}}</span>
                    @endforeach
                </td>
            </tr>
        </table>
        @if($user->hasRole('Customer'))
        <div class="card mt-4">
            <div class="card-header">Purchase History</div>
            <div class="card-body">
                @forelse($user->purchases as $purchase)
                <div class="mb-3">
                    <h5>{{ $purchase->product->name }}</h5>
                    <p>Quantity: {{ $purchase->quantity }}</p>
                    <p>Total: ${{ number_format($purchase->total_price, 2) }}</p>
                    <small class="text-muted">{{ $purchase->created_at->format('M d, Y H:i') }}</small>
                </div>
                @empty
                <p>No purchases yet</p>
                @endforelse
            </div>
        </div>
        @endif

        <div class="row mt-4">
        <div class="row">
            <div class="col col-6">
            </div>
            @if(auth()->user()->hasPermissionTo('admin_users')||auth()->id()==$user->id)
            <div class="col col-4">
                <a class="btn btn-primary" href='{{route('edit_password', $user->id)}}'>Change Password</a>
            </div>
            @else
            <div class="col col-4">
            </div>
            @endif
            @if(auth()->user()->hasPermissionTo('edit_users')||auth()->id()==$user->id)
            <div class="col col-2">
                <a href="{{route('users_edit', $user->id)}}" class="btn btn-success form-control">Edit</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

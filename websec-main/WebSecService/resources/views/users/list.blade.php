@extends('layouts.master')
@section('title', 'Users')
@section('content')
<div class="row mt-2">
    <div class="col col-10">
        <h1>Users</h1>
    </div>
</div>
<form>
    <div class="row">
        <div class="col col-sm-2">
            <input name="keywords" type="text"  class="form-control" placeholder="Search Keywords" value="{{ request()->keywords }}" />
        </div>
        <div class="col col-sm-1">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col col-sm-1">
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    </div>
</form>

<div class="card mt-2">
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Roles</th>
          <th scope="col">Credit</th> <!-- Added Credit column -->
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td scope="col">{{$user->id}}</td>
          <td scope="col">{{$user->name}}</td>
          <td scope="col">{{$user->email}}</td>
          <td scope="col">
            @foreach($user->roles as $role)
              <span class="badge bg-primary">{{$role->name}}</span>
            @endforeach
          </td>
          <td scope="col"> <!-- Added Credit column data -->
            @if($user->hasRole('Customer'))
              ${{ number_format($user->credit, 2) }}
            @endif
          </td>
          <td scope="col">
            @can('manage_customer_credit') <!-- Added credit management form -->
            <form class="d-inline" method="POST" action="{{ route('users.add-credit', $user->id) }}">
              @csrf
              <div class="input-group input-group-sm">
                <input type="number" step="0.01" name="amount" class="form-control" style="width: 100px" 
                       placeholder="Add credit" required>
                <button type="submit" class="btn btn-sm btn-success">+</button>
              </div>
            </form>
            @endcan
            @can('edit_users')
            <a class="btn btn-primary" href='{{route('users_edit', [$user->id])}}'>Edit</a>
            @endcan
            @can('admin_users')
            <a class="btn btn-primary" href='{{route('edit_password', [$user->id])}}'>Change Password</a>
            @endcan
            @can('delete_users')
            <a class="btn btn-danger" href='{{route('users_delete', [$user->id])}}'>Delete</a>
            @endcan
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

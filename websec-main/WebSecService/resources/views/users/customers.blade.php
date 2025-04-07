@extends('layouts.master')
@section('title', 'Customers')
@section('content')
<div class="container">
    <h1>Customers</h1>

    <div class="card mt-4">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Credit</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>${{ number_format($customer->credit, 2) }}</td>
                        <td>
                            @can('manage_customer_credit')
                            <form class="d-inline" method="POST" action="{{ route('users.add-credit', $customer->id) }}">
                                @csrf
                                <div class="input-group input-group-sm">
                                    <input type="number" step="0.01" name="amount" 
                                           class="form-control" placeholder="Amount" required>
                                    <button type="submit" class="btn btn-sm btn-success">Add</button>
                                </div>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
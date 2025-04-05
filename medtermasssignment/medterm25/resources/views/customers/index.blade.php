@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Customers List</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Credit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>${{ $customer->credit }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

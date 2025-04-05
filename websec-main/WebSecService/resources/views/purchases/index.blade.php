@extends('layouts.master')
@section('title', 'My Purchases')
@section('content')
<div class="container">
    <h1>My Purchases</h1>
    
    <div class="card mt-4">
        <div class="card-body">
            <div class="alert alert-info">
                Current Credit: ${{ number_format(auth()->user()->credit, 2) }}
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchases as $purchase)
                    <tr>
                        <td>{{ $purchase->product->name }}</td>
                        <td>${{ number_format($purchase->product->price, 2) }}</td>
                        <td>{{ $purchase->quantity }}</td>
                        <td>${{ number_format($purchase->total_price, 2) }}</td>
                        <td>{{ $purchase->created_at->format('M d, Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
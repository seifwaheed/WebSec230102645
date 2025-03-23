@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="mt-3">Supermarket Bill</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('mini_test.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="item_name" class="form-control" placeholder="Item Name" required>
            </div>
            <div class="col-md-3">
                <input type="number" name="quantity" class="form-control" placeholder="Quantity" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="price" class="form-control" placeholder="Price" required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Add Item</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach($bills as $bill)
                @php $total = $bill->quantity * $bill->price; $grandTotal += $total; @endphp
                <tr>
                    <td>{{ $bill->item_name }}</td>
                    <td>{{ $bill->quantity }}</td>
                    <td>${{ number_format($bill->price, 2) }}</td>
                    <td>${{ number_format($total, 2) }}</td>
                    <td>
                        <form action="{{ route('mini_test.delete', $bill->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3"><strong>Grand Total</strong></td>
                <td colspan="2"><strong>${{ number_format($grandTotal, 2) }}</strong></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

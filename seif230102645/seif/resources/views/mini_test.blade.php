@extends('layouts.main')

@section('title', 'Mini Test')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Supermarket Bill</h1>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add Item Form -->
    <div class="card p-4 mb-4 shadow">
        <form action="{{ route('mini_test.store') }}" method="POST">
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
    </div>

    <!-- Bill Table -->
    <div class="card p-4 shadow">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp
                @foreach($bills as $item)
                    @php $total = $item->quantity * $item->price; $grandTotal += $total; @endphp
                    <tr>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>${{ number_format($total, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="table-success">
                    <th colspan="3" class="text-right">Grand Total</th>
                    <th>${{ number_format($grandTotal, 2) }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection

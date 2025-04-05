@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Products</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    @if(Auth::user()->role === 'Customer')
                        <form action="{{ route('products.buy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm"
                                @if($product->stock <= 0 || Auth::user()->credit < $product->price) disabled @endif>
                                Buy
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

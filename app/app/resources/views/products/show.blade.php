@extends('layouts.app')

@section('Title', 'Product Details')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Product Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Price: ${{ $product->price }}</p>
                        <p class="card-text">Quantity: {{ $product->quantity }}</p>
                        <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products</a>
                        @if(Auth::user()->credit >= $product->price)
                            <form action="{{ route('products.purchase', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success">Purchase</button>
                            </form>
                        @else
                            <p class="text-danger">Insufficient credit to purchase this product.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
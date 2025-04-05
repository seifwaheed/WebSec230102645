@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Purchased Products</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach(auth()->user()->purchases as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>${{ $product->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

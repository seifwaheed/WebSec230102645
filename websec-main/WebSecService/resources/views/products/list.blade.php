@extends('layouts.master')
@section('title', 'Products')
@section('content')

<div class="container py-4">
    <!-- Alerts -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Products</h1>
        @can('add_products')
        <a href="{{route('products_edit')}}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Add Product
        </a>
        @endcan
    </div>

    <!-- Filter Card -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-0">Filter Products</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input name="keywords" type="text" class="form-control" placeholder="Search keywords" value="{{ request()->keywords }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input name="min_price" type="number" class="form-control" placeholder="Min price" value="{{ request()->min_price }}">
                    </div>
                    <div class="col-md-2">
                        <input name="max_price" type="number" class="form-control" placeholder="Max price" value="{{ request()->max_price }}">
                    </div>
                    <div class="col-md-2">
                        <select name="order_by" class="form-select">
                            <option value="" {{ request()->order_by==""?"selected":"" }} disabled>Order by</option>
                            <option value="name" {{ request()->order_by=="name"?"selected":"" }}>Name</option>
                            <option value="price" {{ request()->order_by=="price"?"selected":"" }}>Price</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="order_direction" class="form-select">
                            <option value="" {{ request()->order_direction==""?"selected":"" }} disabled>Direction</option>
                            <option value="ASC" {{ request()->order_direction=="ASC"?"selected":"" }}>Ascending</option>
                            <option value="DESC" {{ request()->order_direction=="DESC"?"selected":"" }}>Descending</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="reset" class="btn btn-outline-secondary me-2">
                        <i class="bi bi-x-circle me-1"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-funnel me-1"></i> Apply Filters
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="row row-cols-1 g-4">
        @foreach($products as $product)
        <div class="col">
            <div class="card h-100 shadow-sm hover-shadow">
                <div class="row g-0">
                    <div class="col-md-4">
                        <div class="product-image-container h-100">
                            <img src="{{asset("images/$product->photo")}}" class="img-fluid h-100 w-100 object-fit-cover" alt="{{$product->name}}">
                            @if($product->stock < 1)
                            <div class="out-of-stock-badge">
                                Out of Stock
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h3 class="card-title">{{$product->name}}</h3>
                                <span class="badge bg-primary rounded-pill fs-5">${{ number_format($product->price, 2) }}</span>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Model:</strong> {{$product->model}}</p>
                                    <p class="mb-1"><strong>Code:</strong> {{$product->code}}</p>
                                    <p class="mb-1">
                                        <strong>Stock:</strong> 
                                        <span class="{{ $product->stock < 5 ? 'text-danger' : 'text-success' }}">
                                            {{ $product->stock }} {{ $product->stock == 1 ? 'unit' : 'units' }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted">{{$product->description}}</p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-auto">
                                @can('edit_products')
                                <a href="{{route('products_edit', $product->id)}}" class="btn btn-outline-primary">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                @endcan
                                
                                @can('delete_products')
                                <a href="{{route('products_delete', $product->id)}}" class="btn btn-outline-danger">
                                    <i class="bi bi-trash me-1"></i> Delete
                                </a>
                                @endcan
                                
                                @can('purchase_products')
                                <form action="{{ route('purchases.store') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="input-group">
                                        <input type="number" 
                                               name="quantity" 
                                               class="form-control" 
                                               value="1"
                                               min="1" 
                                               max="{{ $product->stock }}"
                                               {{ $product->stock < 1 ? 'disabled' : '' }}>
                                        <button type="submit" 
                                                class="btn btn-success"
                                                {{ $product->stock < 1 ? 'disabled' : '' }}>
                                            <i class="bi bi-cart-plus me-1"></i> Buy
                                        </button>
                                    </div>
                                </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .hover-shadow:hover {
        transition: box-shadow 0.3s ease;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    
    .product-image-container {
        position: relative;
        min-height: 250px;
    }
    
    .object-fit-cover {
        object-fit: cover;
    }
    
    .out-of-stock-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: rgba(220, 53, 69, 0.9);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        font-weight: bold;
    }
</style>
@endsection
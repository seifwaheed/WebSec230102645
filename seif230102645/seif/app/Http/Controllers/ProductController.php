<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Ensure the Controller class is imported

class ProductController extends Controller
{
    // Add the constructor with middleware
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    // Method to display the list of products
    public function index()
    {
        return view('products');
    }

    // Method to show a single product (if needed)
    public function show($id)
    {
        // Assuming you have a Product model
        // $product = Product::findOrFail($id);
        // return view('product.show', compact('product'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log; // Import the Log facade

class ProductController extends Controller
{
    // Display the list of products with filtering, sorting, and pagination
    public function list(Request $request)
    {
        // Validate request parameters
        $request->validate([
            'keywords' => 'nullable|string|max:255',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0',
            'order_by' => 'nullable|string|in:name,price', // Allow only specific columns for ordering
            'order_direction' => 'nullable|string|in:asc,desc', // Allow only 'asc' or 'desc'
        ]);

        try {
            // Build the query
            $query = Product::query();

            // Apply filters based on request parameters
            $query->when($request->keywords, fn($q) => $q->where("name", "like", "%{$request->keywords}%"));
            $query->when($request->min_price, fn($q) => $q->where("price", ">=", $request->min_price));
            $query->when($request->max_price, fn($q) => $q->where("price", "<=", $request->max_price));
            $query->when($request->order_by, fn($q) => $q->orderBy($request->order_by, $request->order_direction ?? "ASC"));

            // Paginate the results (e.g., 10 products per page)
            $products = $query->paginate(10);

            // Pass the products to the view
            return view("products.list", compact('products'));
        } catch (\Exception $e) {
            // Handle any errors (e.g., log the error and show a user-friendly message)
            Log::error('Error fetching products: ' . $e->getMessage());
            return redirect()->route('products_list')->with('error', 'An error occurred while fetching products.');
        }
    }

    // Display the form for adding a new product
    public function add()
    {
        return view('products.form');
    }

    // Display the form for editing an existing product
    public function edit(Product $product = null)
    {
        return view('products.form', compact('product'));
    }

    // Save or update a product
    public function save(Request $request, Product $product = null)
    {
        // Validate the request data
        $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'photo' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {
            // If $product is null, create a new Product instance
            $product = $product ?? new Product();

            // Fill the product with request data
            $product->fill($request->all());

            // Save the product to the database
            $product->save();

            // Redirect to the product list page with a success message
            return redirect()->route('products_list')->with('success', 'Product saved successfully!');
        } catch (\Exception $e) {
            // Handle any errors (e.g., log the error and show a user-friendly message)
            Log::error('Error saving product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving the product.');
        }
    }
}
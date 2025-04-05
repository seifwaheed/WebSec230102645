<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // List all products
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Show form to add a new product
    public function create()
    {
        return view('products.create');
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }

    // Show form to edit product
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update product
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    // Delete product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    public function buy(Product $product)
{
    $user = auth()->user();

    if ($product->stock <= 0) {
        return back()->with('error', 'Product is out of stock!');
    }

    if ($user->credit < $product->price) {
        return back()->with('error', 'Insufficient credit!');
    }

    // Deduct credit & reduce stock
    $user->credit -= $product->price;
    $user->save();

    $product->stock -= 1;
    $product->save();

    // Record purchase
    $user->purchases()->attach($product->id);

    return back()->with('success', 'Product purchased successfully!');
}


}

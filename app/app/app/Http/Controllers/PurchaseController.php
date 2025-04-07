<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function purchase(Product $product)
    {
        $user = Auth::user();

        if ($user->credit < $product->price) {
            return redirect()->route('products.show', $product->id)->with('error', 'Insufficient credit to purchase this product.');
        }

        if ($product->quantity <= 0) {
            return redirect()->route('products.show', $product->id)->with('error', 'Product is out of stock.');
        }

        $user->credit -= $product->price;
        $user->save();

        $product->quantity -= 1;
        $product->save();

        // Logic to handle the purchase (e.g., create an order record) goes here

        return redirect()->route('products.index')->with('success', 'Product purchased successfully.');
    }

    public function listPurchases()
    {
        $user = Auth::user();
        $purchases = $user->purchases; // Assuming you have a relationship set up

        return view('purchases.index', compact('purchases'));
    }
}

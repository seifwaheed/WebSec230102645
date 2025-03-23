<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;

class MiniTestController extends Controller
{
    public function index()
    {
        $bills = Bill::all(); // Fetch all bill items
        return view('mini_test', compact('bills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        Bill::create([
            'item_name' => $request->item_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return redirect()->route('mini_test')->with('success', 'Item added successfully!');
    }
}

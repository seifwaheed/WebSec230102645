<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;

class MiniTestController extends Controller
{
    // Display all bills
    public function index()
    {
        $bills = Bill::all();
        return view('mini_test', ['bills' => $bills]);
    }

    // Store a new bill
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0.01'
        ]);

        Bill::create([
            'item_name' => $request->item_name,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);

        return redirect()->route('mini_test')->with('success', 'Item added successfully!');
    }

    // Delete a bill
    public function destroy($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->delete();
        return redirect()->route('mini_test')->with('success', 'Item deleted successfully!');
    }
    protected function redirectTo($request)
{
    if (!$request->expectsJson()) {
        return route('login'); // Change this to your login route
    }
}

}


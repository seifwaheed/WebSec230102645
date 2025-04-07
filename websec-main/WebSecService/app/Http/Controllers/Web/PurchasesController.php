<?php
namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use DB;

class PurchasesController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->user()->hasPermissionTo('view_purchases')) {
            abort(403);
        }

        $purchases = auth()->user()->purchases()->with('product')->latest()->get();
        return view('purchases.index', compact('purchases'));
    }

    public function store(Request $request)
    {
        if (!auth()->user()->hasPermissionTo('purchase_products')) {
            abort(403);
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        $user = auth()->user();

        try {
            DB::beginTransaction();

            // Check stock
            if ($product->stock < $request->quantity) {
                throw new \Exception("Not enough stock. Available: {$product->stock}");
            }

            // Calculate total price
            $totalPrice = $product->price * $request->quantity;

            // Check credit
            if ($user->credit < $totalPrice) {
                throw new \Exception("Insufficient credit. Needed: {$totalPrice}, Available: {$user->credit}");
            }

            // Create purchase record
            Purchase::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'total_price' => $totalPrice
            ]);

            // Update stock and credit
            $product->decrement('stock', $request->quantity);

            $user->decrement('credit',$totalPrice);

            // Refresh model data
            $product->refresh();
            $user->refresh();

            DB::commit();

            return redirect()->back()
                ->with('success', "Purchased {$request->quantity} x {$product->name} for $".number_format($totalPrice, 2));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }
}
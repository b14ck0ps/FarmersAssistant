<?php

namespace App\Http\Controllers\Farmers;

use App\Http\Controllers\Controller;
use App\Models\OrderItems;
use App\Models\Orders;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('farmers.checkout.index');
    }
    public function store(Request $request)
    {
        $items = session()->get('cart');
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Orders::create([
            'farmer_id' => session()->get('user_id'),
            'total' => $total
        ]);

        foreach ($items as $item) {
            OrderItems::create([
                'quantity' => $item['quantity'],
                'product_id' => $item['id'],
                'order_id' => $order->id
            ]);
        }
        session()->forget(['cart', 'total_quantity']);
        return redirect()->route('farmers.dashboard')->with('success', 'Order placed successfully');
    }
}

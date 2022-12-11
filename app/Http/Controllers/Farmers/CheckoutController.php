<?php

namespace App\Http\Controllers\Farmers;

use App\Models\User;
use App\Models\Orders;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use App\Mail\OrderMailService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        session()->has('user_id') ?: session(['user_id' => User::find(Auth::id())->farmers->first()->id]);
        $order = Orders::create([
            'farmer_id' => session()->get('user_id'),
            'total' => $total
        ]);

        foreach ($items as $item) {
            OrderItems::create([
                'quantity' => $item['quantity'],
                'product_id' => $item['id'],
                'orders_id' => $order->id
            ]);
        }
        session()->forget(['cart', 'total_quantity']);
        cookie()->queue(cookie()->forget('cart'));
        cookie()->queue(cookie()->forget('total_quantity'));

        // mail trap service
        Mail::to(auth()->user()->email)->send(new OrderMailService($order));

        return redirect()->route('farmers.dashboard')->with('success', 'Order placed successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Subscriptions;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $total_quantity = session()->get('total_quantity');
            $cart = session()->get('cart');
            if ($cart) {
                $cart = serialize($cart);
                cookie()->queue(cookie()->forever('cart', $cart));
            } else {
                session()->put('cart', unserialize(Cookie::get('cart')), true);
            }
            if ($total_quantity) {
                cookie()->queue(cookie()->forever('total_quantity', session()->get('total_quantity')));
            } else {
                session()->put('total_quantity', Cookie::get('total_quantity'));
            }
            return $next($request);
        });
    }
    public function index()
    {
        $products =  Product::all();
        return view('welcome', compact('products'));
    }
    //add cart
    public function addCart($id)
    {
        $total_quantity = session()->get('total_quantity');
        if (!$total_quantity) {
            session()->put('total_quantity', 1);
        }
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "id" => $product->id,
                    "title" => $product->title,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->image,
                    "total_price" => $product->price
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            $cart[$id]['total_price'] = $cart[$id]['quantity'] * $cart[$id]['price'];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $product->id,
            "title" => $product->title,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->image,
            "total_price" => $product->price
        ];
        session()->put('cart', $cart);
        session()->put('total_quantity', $total_quantity + 1);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    //cart
    public function cart()
    {
        $cart = session()->get('cart');
        $total_net_price = 0;
        if (session()->has('cart') &&  is_array(session()->get('cart'))) {
            foreach (session()->get('cart') as $item) {
                $total_net_price += $item['total_price'];
            }
        }
        // check subsctiption status
        $subscription = Subscriptions::where('farmer_id', session('user_id'))->first();
        if (isset($subscription) && $subscription->status == 1) {
            $plan = Plan::find($subscription->plan_id);
            $total_net_price_disc = $total_net_price - ($total_net_price * $plan->orderDiscount / 10);
            return view('dashboards.cart', compact('cart', 'total_net_price', 'plan', 'total_net_price_disc'));
        }
        return view('dashboards.cart', compact('cart', 'total_net_price'));
    }
    //remove cart
    public function deleteCart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            $total_quantity = session()->get('total_quantity');
            session()->put('total_quantity', $total_quantity - 1);
            if (count($cart) == 0) {
                cookie()->queue(cookie()->forget('cart'));
                cookie()->queue(cookie()->forget('total_quantity'));
            }
        }
        return redirect()->back()->with('success', 'Product removed successfully');
    }
    //search product
    public function searchProducts(Request $request)
    {
        $search = $request->search;
        $products = Product::where('title', 'like', '%' . $search . '%')->get();
        return redirect()->route('home')->with('products', $products);
    }
}

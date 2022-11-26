<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    /**
     * allproducts
     *
     * @return "all products from the database"
     */
    public function allproducts()
    {
        $products =  Product::all();
        return response()->json($products);
    }
    public function searchProducts(Request $request)
    {
        $search = $request->search;
        $products = Product::where('title', 'like', '%' . $search . '%')->get();
        return response()->json($products);
    }

    // TODO: do i add cart system here? or in the frontend? gota think about it...
    // ! also ARG VS MEX game is on :D
}

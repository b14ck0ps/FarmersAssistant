<?php

namespace App\Http\Controllers\Api\Auth;

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
}

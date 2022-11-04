<?php

namespace App\Http\Controllers\Auth\Admins;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Users\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Echo_;

class productsCreateController extends Controller
{
    public function productcreate(Request $request)
    {

            return view("productshow");
    }
    public function productsubmit(Request $request)
    {
        $usetable = new Product();
        $usetable->title = $request->title;
        $usetable->admin_id = session('user_id');
        $usetable->description = $request->description;
        $usetable->quantity = $request->quantity;
        $usetable->price = $request->price;
        $usetable->save();

         echo ".......Product create successfully......";
    }
}

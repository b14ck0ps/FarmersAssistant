<?php

namespace App\Http\Controllers\Auth\Admins;

use App\Models\User;
use App\Models\Product;
use App\Models\Users\Admins;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class productsCreateController extends Controller
{
    public function productcreate(Request $request)
    {

        return view("productshow");
    }
    public function productsubmit(Request $request)
    {
        session()->has('user_id') ?: session(['user_id' => User::find(Auth::id())->admins->first()->id]);
        $usetable = new Product();
        $usetable->title = $request->title;
        $usetable->admin_id = session('user_id');
        $usetable->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $filename = $name;
            $image->move('uploads/product', $filename);
            $usetable->image = $filename;
        }

        $usetable->quantity = $request->quantity;
        $usetable->price = $request->price;
        $usetable->save();
        return redirect('allproduct');
    }
    public function getall()
    {
        $usetable = Product::all()->toArray();
        return view('seeproduct', compact('usetable'));
    }

    public function updateproduct(Request $request)
    {
        $usetable = Product::where('id', $request->id)->get();
        // echo $usetable;
        return view('updateproductshow')->with('usetable', $usetable);
    }

    public function goproductupdate(Request $request)
    {
        $use_table = Product::where('id', $request->id)->first();
        $use_table->title = $request->title;
        $use_table->description = $request->description;
        $use_table->quantity = $request->quantity;
        $use_table->price = $request->price;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $filename = $name;
            $image->move('uploads/product', $filename);
            $use_table->image = $filename;
        }

        $use_table->save();
        return redirect('allproduct');
    }

    public function productdelete(Request $request)
    {
        $use_table = Product::where('id', $request->id)->first();
        $use_table->delete();
        return redirect('allproduct');
    }
}

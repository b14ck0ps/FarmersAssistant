<?php

namespace App\Http\Controllers\Auth\Admins;

use App\Models\Plan;
use App\Models\User;
use App\Models\Users\Admins;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class planCreateCotroller extends Controller
{
    public function plancreate(Request $request)
    {

        return view("auth.Admins.planshow");
    }
    public function plansubmit(Request $request)
    {
        session()->has('user_id') ?: session(['user_id' => User::find(Auth::id())->admins->first()->id]);
        $usetable = new Plan();
        $usetable->planName = $request->planName;
        $usetable->admin_id = session('user_id');
        $usetable->description = $request->description;
        $usetable->price = $request->price;
        $usetable->orderDiscount = $request->orderDiscount;
        $usetable->save();
        return redirect('allplan');
    }
    public function getall()
    {
        $usetable = Plan::all()->toArray();
        return view('seeplan', compact('usetable'));
    }

    public function updateplan(Request $request)
    {
        $usetable = Plan::where('id', $request->id)->get();
        // echo $usetable;
        return view('updateplanshow')->with('usetable', $usetable);
    }
    public function goplanupdate(Request $request)
    {
        $use_table = Plan::where('id', $request->id)->first();
        $use_table->planName = $request->planName;
        $use_table->description = $request->description;
        $use_table->price = $request->price;
        $use_table->orderDiscount = $request->orderDiscount;
        $use_table->save();
        return redirect('allplan');
    }

    public function plandelete(Request $request)
    {
        $use_table = Plan::where('id', $request->id)->first();
        $use_table->delete();
        return redirect('allplan');
    }
}

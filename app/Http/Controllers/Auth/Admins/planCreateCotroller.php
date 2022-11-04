<?php

namespace App\Http\Controllers\Auth\Admins;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Users\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Echo_;

class planCreateCotroller extends Controller
{
    public function plancreate(Request $request)
    {

            return view("auth.Admins.planshow");
    }
    public function plansubmit(Request $request)
    {
        $usetable = new Plan();
        $usetable->planName = $request->planName;
        $usetable->admin_id = $request->admin_id;
        $usetable->description = $request->description;
        $usetable->price = $request->price;
        $usetable->orderDiscount = $request->orderDiscount;
        $usetable->save();

         echo "fsdgsdgs";
    }
}

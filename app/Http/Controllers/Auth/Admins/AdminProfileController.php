<?php

namespace App\Http\Controllers\Auth\Admins;
use App\Http\Controllers\Controller;
use App\Models\Users\Admins;
use App\Models\User;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function adminprofile(Request $request)
    {
        $use_table=User::where('id',$request->id)->first();
        return view('adminupdateprofile')->with('user',$use_table);

    }
    function goupdate(Request $request){
        $use_table=User::where('id',$request->id)->first();
        // dd($request->id);
        $use_table->firstName = $request->firstName;
        $use_table->lastName = $request->lastName;
        $use_table->username = $request->username;
        $use_table->email = $request->email;
        $use_table->password = $request->password;
        $use_table->dob = $request->dob;
        $use_table->gender = $request->gender;
        $use_table->city = $request->city;
        $use_table->postalCode = $request->postalCode;
        $use_table->address = $request->address;
        $use_table->phone = $request->phone;
        $use_table->save();
        $request->session()->put('user', $use_table);
        //echo "sdfsxc";
         return view("dashboards.admin");
        }
}

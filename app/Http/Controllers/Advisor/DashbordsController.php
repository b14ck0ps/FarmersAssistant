<?php

namespace App\Http\Controllers\Advisor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashbordsController extends Controller
{
    public function Dashbord()
    {
          return view('dashboards.advisor');


    }
    public function UpdateDashbord(Request $request)
    {


        {
            $use_table=User::where('id',$request->id)->first();
            // dd($request->id);
            $use_table->firstName = $request->fname;
            $use_table->lastName = $request->lname;
            $use_table->username = $request->username;
            $use_table->email = $request->email;
            $use_table->password = $request->password;
            $use_table->dob = $request->dob;
            $use_table->gender = $request->gender;
            $use_table->city = $request->city;
            $use_table->postalcode = $request->postalcode;
            $use_table->address = $request->address;
            $use_table->phone = $request->phone;
            $use_table->save();
            $request->session()->put('user', $use_table);
            //echo "sdfsxc";
             return redirect('//show');
            }

    }


   public function qualificationShow(){

    return view('auth.Advisors.qualification_show');

   }





}

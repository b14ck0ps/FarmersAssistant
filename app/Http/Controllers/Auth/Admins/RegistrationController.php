<?php

namespace App\Http\Controllers\Auth\Admins;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Users\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.Admins.register');
    }

    public function register(Request $request)
    {
        // dd($request->all());
        // Validate the form data

        $this->validate($request, [
            'firstName' => 'required|regex:/^[A-Za-z,]+$/|max:10',
            'lastName' => 'required|regex:/^[A-Za-z,]+$/|max:10',
            'username' => 'required|regex:/^[a-zA-Z0-9]+$/|unique:users,username|max:20',
            'postalCode'=>'required|regex:/^[0-9]{4,4}$/',
            'city'=>'required|regex:/^[A-Za-z,]+$/|max:20',
            'gender'=>'required|string',
            'dob'=>'required|date_format:Y-m-d',
            'address'=>'required|regex:/^[a-zA-Z0-9,]+$/|max:30',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'phone'=>'required|regex:/(01)[0-9]{9}/',
            'password'=>'required|string|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,8}$/'

        ],

        [

            'firstName' => 'Your First name is not correct, first name lenght10(Hints:Abcadef)',
            'lastName' => 'Your Last name is not correct, last name lenght10(Hints:Abcadef)',
            'username' => 'Your User name is not correct, user name lenght20(Hints:Abcadef/Abcdef12)',
            'postalCode'=>'Insert Correct zip code with four digits:Hints(1167)',
            'city'=>'City format is not correct, city lenght20(Hints:Pabna/Dhaka/Khulna)',
            'gender'=>'Choose your gender',
            'dob'=>'Wrong dob please insert correct dob',
            'address'=>'Your address is wrong,adreess lenght maximum 30(Hints:Dhaka,Banglabazar14)',
            'email' => 'Your email is not correct,please use this format(abc@gmail.com)',
            'phone'=>'Phone number format(01789012678)',
            'password'=>'Insert strong type psssword and total digit 8(1 uppercase,1 lower case,1 special characeter must insert(Hints:Abc123$$))'
        ],

    );
    if (isset($error)) {
        $output = $request->address;
        return $output;
    }
    else{

        // Create and save the farmer
        $admin = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'username' => $request->username,
            'phone' => $request->phone,
            'city' => $request->city,
            'postalCode' => $request->postalCode,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        //create a instance of the admin
        Admins::create([
            'user_id' => $admin->id,
        ]);

        $admin = User::find($admin->id);
        // Log the admin in
        Auth::login($admin);

        // Redirect to the admin dashboard
        //get all admins info
        return redirect()->intended(route('admins.dashboard'));
    }
    }
}

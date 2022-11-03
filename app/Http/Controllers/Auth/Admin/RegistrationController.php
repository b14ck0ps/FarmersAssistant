<?php

namespace App\Http\Controllers\Auth\Farmers;

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
        return view('auth.singup');
    }

    public function register(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'fname' => 'required|max:30|alpha',
            'lname' => 'required|max:30|alpha',
            'city' => 'required|max:30|string',
            'postCode' => 'required|numeric|digits:4',
            'gender' => 'required',
            'dob' => 'required|date',
            'address' => 'required|max:100',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|max:255|string|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create and save the farmer
        $admin = User::create([
            'firstName' => $request->fname,
            'lastName' => $request->lname,
            'username' => $request->username,
            'phone' => $request->phone,
            'city' => $request->city,
            'postalCode' => $request->postCode,
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

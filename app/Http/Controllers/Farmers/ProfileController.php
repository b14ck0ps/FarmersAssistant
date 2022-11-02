<?php

namespace App\Http\Controllers\Farmers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function showProfile()
    {
        return view('dashboards.farmers');
    }

    public function showProfileEdit()
    {
        return view('dashboards.editProfile');
    }
    //profile update
    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required|max:30|alpha',
            'lname' => 'required|max:30|alpha',
            'city' => 'required|max:30|string',
            'postCode' => 'required|numeric|digits:4',
            'gender' => 'required',
            'dob' => 'required|date',
            'address' => 'required|max:100',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::user()->id,
            'username' => 'required|max:255|string|unique:users,username,' . Auth::user()->id,
        ]);
        // Validate the form data
        if (is_null($request->password_old)) {
            $request->password = Auth::user()->password;
        } else {
            if (Hash::check($request->password_old, Auth::user()->password)) {
                $this->validate($request, [
                    'password' => 'required|min:6|confirmed',
                ]);
            } else {
                return back()->withErrors([
                    'invalid_password' => 'Old password is incorrect',
                ]);
            }
        }
        // Create and save the farmer
        User::find(Auth::user()->id)->update([
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

        $request->session()->regenerate();
        return redirect()->route('farmers.dashboard')->with('success', 'Profile updated successfully');
    }
}

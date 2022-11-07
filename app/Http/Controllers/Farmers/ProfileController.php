<?php

namespace App\Http\Controllers\Farmers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mails;
use App\Models\Orders;
use App\Models\Users\Advisors;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{

    public function showProfile()
    {
        $mails = Mails::where('farmer_id', session('user_id'))->get();
        $mails->map(function ($mail) {
            $mail->advisor_name = User::find(Advisors::find($mail->advisor_id)->first()->user_id)->getFullName();
            return $mail;
        });
        $orders = Orders::where('farmer_id', session('user_id'))->get();
        return view('dashboards.farmers', compact('mails', 'orders'));
    }

    public function showProfileEdit()
    {
        return view('dashboards.editProfile');
    }
    //profile update
    public function updateProfile(Request $request)
    {
        $this->validate(
            $request,
            [
                'fname' => 'required|max:30|alpha',
                'lname' => 'required|max:30|alpha',
                'city' => 'required|max:30|string',
                'postCode' => 'required|numeric|digits:4',
                'gender' => 'required',
                'dob' => 'required|date',
                'address' => 'required|max:100',
                'email' => 'required|email|max:255|unique:users,email,' . Auth::user()->id,
                'username' => 'required|max:255|string|unique:users,username,' . Auth::user()->id,
            ],
            [
                'fname.required' => 'First name is required',
                'fname.max' => 'First name must be less than 30 characters',
                'fname.alpha' => 'First name must be only letters',
                'lname.required' => 'Last name is required',
                'lname.max' => 'Last name must be less than 30 characters',
                'lname.alpha' => 'Last name must be only letters',
                'city.required' => 'City is required',
                'city.max' => 'City must be less than 30 characters',
                'city.string' => 'City must be a string',
                'postCode.required' => 'Post code is required',
                'postCode.numeric' => 'Post code must be a number',
                'postCode.digits' => 'Post code must be 4 digits'
            ]

        );
        // Validate the form data
        if (is_null($request->password_old)) {
            $request->password = Auth::user()->password;
        } else {
            if (Hash::check($request->password_old, Auth::user()->password)) {
                $this->validate($request, [
                    'password' => [
                        'required',
                        'string',
                        Password::min(8)
                            ->mixedCase()
                            ->numbers()
                            ->symbols(),
                        'confirmed'
                    ],
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

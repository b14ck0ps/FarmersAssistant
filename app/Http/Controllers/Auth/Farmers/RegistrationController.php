<?php

namespace App\Http\Controllers\Auth\Farmers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Users\Farmers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.singup');
    }

    public function register(Request $request)
    {
        // Validate the form data
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
                'email' => 'required|email|max:255|unique:users',
                'username' => 'required|max:255|alpha_dash|unique:users',
                'phone' => 'required|numeric|digits:11|unique:users',
                'password' => [
                    'required',
                    'string',
                    Password::min(8)
                        ->mixedCase()
                        ->numbers()
                        ->symbols(),
                    'confirmed'
                ],
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
                'postCode.digits' => 'Post code must be 4 digits',
                'phone.required' => 'Phone number is required',
                'phone.numeric' => 'Phone number must be a number',
                'phone.digits' => 'Phone number must be 11 digits',
                'phone.unique' => 'Phone number already exists',
                'email.required' => 'Email is required',
                'email.email' => 'Email must be a valid email',
                'email.max' => 'Email must be less than 255 characters',
                'email.unique' => 'Email already exists',
            ]
        );
        $photo = "default_avater.png";
        // profile image
        if (isset($request->photo)) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $image = $request->file('photo');
            $photo = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/avater/');
            $image->move($destinationPath, $photo);
        }
        // Create and save the farmer
        $farmer = User::create([
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
            'photo' => $photo,
        ]);
        //create a instance of the farmer
        Farmers::create([
            'user_id' => $farmer->id,
        ]);
        $farmer = User::find($farmer->id);
        // Log the farmer in
        Auth::login($farmer);
        session(['user_type' => Auth::user()->getUserType()]);
        session(['user_id' => User::find(Auth::id())->farmers->first()->id]);
        // Redirect to the farmer dashboard
        //get all farmers info
        return redirect()->intended(route('farmers.dashboard'));
    }
}

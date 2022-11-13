<?php

namespace App\Http\Controllers\Farmers;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use App\Models\Mails;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Subscriptions;
use App\Models\Users\Advisors;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{

    public function showProfile()
    {
        session()->has('subs') ?: session(['subs' => User::find(Auth::id())->farmers->first()->subscription]);
        session()->has('user_id') ?: session(['user_id' => User::find(Auth::id())->farmers->first()->id]);
        $mails = Mails::where('farmer_id', session('user_id'))->get();
        $mails->map(function ($mail) {
            $mail->advisor_name = User::find(Advisors::find($mail->advisor_id)->first()->user_id)->getFullName();
            return $mail;
        });
        $orders = Orders::where('farmer_id', session('user_id'))->get();
        $subscription = Subscriptions::where('farmer_id', session('user_id'))->first();
        if (isset($subscription)) {
            $sub_end = Carbon::now()->diffInDays(Carbon::parse($subscription->end_date));
            $plan = Plan::find($subscription->plan_id);
            return view('dashboards.farmers', compact('mails', 'orders', 'plan', 'subscription', 'sub_end'));
        }
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
                'username' => 'required|max:255|alpha_dash|unique:users,username,' . Auth::user()->id,
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
        if (!is_null($request->password_old)) {
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
                User::find(Auth::user()->id)->update(['password' => Hash::make($request->password)]);
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
        ]);

        if (isset($request->photo)) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $oldPhoto = User::find(Auth::user()->id)->photo;
            $image = $request->file('photo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/avater/');
            $image->move($destinationPath, $name);
            User::find(Auth::user()->id)->update([
                'photo' => $name,
            ]);

            // delete old image
            if ($oldPhoto != 'default_avater.png') {
                $file = public_path() . "/uploads/avater/" . $oldPhoto;
                if (file_exists($file)) {
                    @unlink($file);
                }
            }
        }

        $request->session()->regenerate();
        return redirect()->route('farmers.dashboard')->with('success', 'Profile updated successfully');
    }
}

<?php

namespace App\Http\Controllers\Api\Farmers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Mails;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Subscriptions;
use App\Models\Users\Advisors;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * farmersProfileData
     *
     * @return "farmers profile data via api"
     */
    public function farmersProfileData(Request $request)
    {
        //make a hased token for the user
        $user = auth()->user();
        $farmers = $user->farmers->first();
        $mails = Mails::where('farmer_id', $farmers->id)->get();
        $mails->map(function ($mail) {
            $mail->advisor_name = User::find(Advisors::find($mail->advisor_id)->first()->user_id)->getFullName();
            return $mail;
        });
        $subscription = Subscriptions::where('farmer_id', $farmers->id)->first();
        $orders = Orders::where('farmer_id', $farmers->id)->get();
        if (isset($subscription)) {
            $sub_end = Carbon::now()->diffInDays(Carbon::parse($subscription->end_date));
            $plan = Plan::find($subscription->plan_id);
        }
        return response()->json([
            'user' => $user,
            'farmers' => $farmers,
            'subs' => $subscription,
            'sub_end' => $sub_end ?? null,
            'plan' => $plan ?? null,
            'orders' => $orders,
            'mails' => $mails,
        ], 200);
    }
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $this->validate(
            $request,
            [
                'firstName' => 'required|max:30|alpha',
                'lastName' => 'required|max:30|alpha',
                'city' => 'required|max:30|string',
                'postCode' => 'required|numeric|digits:4',
                'gender' => 'required',
                'dob' => 'required|date',
                'address' => 'required|max:100',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'phone' => 'required|numeric|digits:11|unique:users,phone,' . $user->id,
                'username' => 'required|max:255|alpha_dash|unique:users,username,' . $user->id,
            ],
            [
                'firstName.required' => 'First name is required',
                'firstName.max' => 'First name must be less than 30 characters',
                'firstName.alpha' => 'First name must be only letters',
                'lastName.required' => 'Last name is required',
                'lastName.max' => 'Last name must be less than 30 characters',
                'lastName.alpha' => 'Last name must be only letters',
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
        // Validate the form data
        if (!is_null($request->password_old)) {
            if (Hash::check($request->password_old, $user->password)) {
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
                User::find($user->id)->update(['password' => Hash::make($request->password)]);
            } else {
                return back()->withErrors([
                    'invalid_password' => 'Old password is incorrect',
                ]);
            }
        }
        // Create and save the farmer
        User::find($user->id)->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
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

            $oldPhoto = User::find($user->id)->photo;
            $image = $request->file('photo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/avater/');
            $image->move($destinationPath, $name);
            User::find($user->id)->update([
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
        return response()->json([
            'message' => 'Profile updated successfully',
        ], 200);
    }
}

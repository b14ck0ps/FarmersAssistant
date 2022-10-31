<?php

namespace App\Http\Controllers\Auth\Farmers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Users\Farmers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

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
            'name' => 'required|max:255|string',
            'email' => 'required|email|max:255|unique:users',
            //'username' => 'required|max:255|string|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create and save the farmer
        $farmer = User::create([
            'name' => $request->name,
            //'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        //create a instance of the farmer
        Farmers::create([
            'user_id' => $farmer->id,
        ]);

        $farmer = User::find($farmer->id);
        // Log the farmer in
        Auth::login($farmer);

        // Redirect to the farmer dashboard
        //get all farmers info
        return redirect()->intended(route('farmers.dashboard'));
    }
}

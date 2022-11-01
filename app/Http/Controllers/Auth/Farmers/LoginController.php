<?php

namespace App\Http\Controllers\Auth\Farmers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users\Farmers;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.signin');
    }
    // farmer login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        } else {
            if (Farmers::where('user_id', Auth::user()->id)->first()) {
                $request->session()->regenerate();
                return redirect()->intended(route('farmers.dashboard'));
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }
}

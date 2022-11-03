<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.signin');
    }
    // global login
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
            if (Auth::user()->getUserType() == 'FARMER') {
                $request->session()->regenerate();
                return redirect()->intended(route('farmers.dashboard'));
            } else if (Auth::user()->getUserType() == 'ADVISOR') {
                dd("advisor dashboard");
                //$request->session()->regenerate();
                //return redirect()->intended(route('advisors.dashboard'));
            } else {
                dd("admin dashboard");
                //$request->session()->regenerate();
                //return redirect()->intended(route('admins.dashboard'));
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }
}
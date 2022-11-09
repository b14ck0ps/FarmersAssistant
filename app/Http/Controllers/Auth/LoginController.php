<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


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
        if (!Auth::attempt($credentials, $request->remember)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        } else {
            session(['user_type' => Auth::user()->getUserType()]);
            if (Auth::user()->getUserType() == 'FARMER') {
                $request->session()->regenerate();
                session(['user_id' => User::find(Auth::id())->farmers->first()->id]);
                session(['subs' => User::find(Auth::id())->farmers->first()->subscription]);
                return redirect()->intended(route('farmers.dashboard'));
            } else if (Auth::user()->getUserType() == 'ADVISOR') {
                session(['user_id' => User::find(Auth::id())->advisors->first()->id]);
                dd("advisor dashboard");
                //$request->session()->regenerate();
                //return redirect()->intended(route('advisors.dashboard'));
            } else {
                session(['user_id' => User::find(Auth::id())->admins->first()->id]);
                $request->session()->regenerate();
                return redirect()->intended(route('admins.dashboard'));
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }
}

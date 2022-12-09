<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials, $request->remember)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        } else {
            session(['user_type' => Auth::user()->getUserType()]);
            if (Auth::user()->getUserType() == 'FARMER') {
                session(['user_id' => User::find(Auth::id())->farmers->first()->id]);
                session(['subs' => User::find(Auth::id())->farmers->first()->subscription]);
                //crete a sanctum token for the user
                $token = Auth::user()->createToken('authToken')->plainTextToken;
                auth()->login(Auth::user());
                return response()->json([
                    'user' => Auth::user(),
                    'token' => $token,
                    'message' => 'success',
                    'user_type' => 'FARMER',
                    'user_id' => User::find(Auth::id())->farmers->first()->id,
                    'subs' => User::find(Auth::id())->farmers->first()->subscription,
                ], 200);
            } else if (Auth::user()->getUserType() == 'ADVISOR') {
                session(['user_id' => User::find(Auth::id())->advisor->first()->id]);
                return response()->json([
                    'message' => 'success',
                    'user_type' => 'ADVISOR',
                    'user_id' => User::find(Auth::id())->advisor->first()->id,
                ], 200);
            } else {
                session(['user_id' => User::find(Auth::id())->admins->first()->id]);
                return response()->json([
                    'message' => 'success',
                    'user_type' => 'ADMIN',
                    'user_id' => User::find(Auth::id())->admins->first()->id,
                ], 200);
            }
        }
    }
}

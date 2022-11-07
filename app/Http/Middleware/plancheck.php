<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class plancheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('user_type') == 'FARMER')
        {
            return redirect()->route('farmers.dashboard');

        } elseif (session('user_type') == 'ADMIN') {

            return $next($request);
        } else {
            return redirect()->route('advisor.dashboard');
        }

        return $next($request);
    }
}


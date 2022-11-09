<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class subscriber
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
        if (session('subs') == 1) {
            return $next($request);
        }
        return redirect()->route('subscription.buy')->with('info', 'You need to subscribe to a plan to access this page');
    }
}

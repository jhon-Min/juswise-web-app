<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role != 0 && Auth::user()->role != 1) {
            return redirect()->route('home')->with('toast', ['icon' => 'error', 'title' => "Access Denied."]);
        }
        return $next($request);
    }
}

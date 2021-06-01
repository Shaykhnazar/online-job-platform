<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "employeer" && Auth::guard($guard)->check()) {
                return redirect()->route('employ.dash');
            }
        elseif ($guard == "user" && Auth::guard($guard)->check()) {
                return redirect()->route('home');
            }
        elseif ($guard == "admin" && Auth::guard($guard)->check()) {
                return redirect()->route('admin.dash');
            }
        elseif (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}

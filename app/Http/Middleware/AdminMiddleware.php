<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::guard('admin')->check()){
            return $next($request);
        }
        else{
            return redirect()->route('admin.login.show');
        }

    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ( Auth::check() && Auth::user()->isRole('manager') )
        {
            return $next($request);
        }
        //return $next($request);
        return redirect('logout');
    }
}

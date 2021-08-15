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
        // if (Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }
        if(Auth::guard($guard)->check() && Auth::user()->role == 1 ){
            // return $next($request) ;
            return redirect()->route('admin.dashboard');
        }
        elseif(Auth::guard($guard)->check() && Auth::user()->role == 2){
            return redirect()->route('user.dashboard');
        }

        return $next($request);
    }
}

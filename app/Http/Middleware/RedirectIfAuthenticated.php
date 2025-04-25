<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {

//        if (Auth::guard('user')->check()){
//            return redirect('/user/home');
//        }
//        elseif (Auth::guard('driver')->check()){
//            return redirect('/driver/home');
//        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkAdmin
{

    public function handle($request, Closure $next)
    {
        if(Auth::user()){
            return $next($request);
        }else{
            // redirect('/login');
            return redirect()->route('login');
        }
    }
}

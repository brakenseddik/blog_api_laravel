<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsHospital
{
    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->is_admin == 0) {
            return $next($request);
        }
        return redirect('login');
    }
}

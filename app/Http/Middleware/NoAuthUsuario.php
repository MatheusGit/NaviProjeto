<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class NoAuthUsuario
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
        if (Auth::guard('logins')->check()) {
           return redirect()->route('inicio');     
        }
        return $next($request);          
    }
}

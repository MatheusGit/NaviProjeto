<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use View;   

class AuthUsuario
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
            $usuario = Auth::guard('logins')->user();
            if($usuario == null){
                View::share('info','nulo');
            }else{
               $info = $usuario->login;
               View::share('info',$info);     
            }

            return $next($request);           
        }
        return redirect()->route('login');        
    }
}

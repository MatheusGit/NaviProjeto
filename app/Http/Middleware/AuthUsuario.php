<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Pessoal;
use App\login;
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
            $name = Auth::guard('logins')->user()->name;
            $email = Auth::guard('logins')->user()->email;
            View::share('user',$usuario);
            View::share('name',$name);
            View::share('email',$email);
            View::share('generos_select',['Masculino','Feminino','Outro']);
            View::share('complementos_select',['Sim','Nao']);
            if($usuario == null){
                View::share('info','nulo');
            }else{
               $info = Pessoal::where('login_id',Auth::guard('logins')->user()->id)->get()->first();
               View::share('info',$info);     
            }

            return $next($request);           
        }
        return redirect()->route('login');        
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Pessoal;
use View;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {   
        /*
            $usuario = Auth::guard('logins')->user();
            if($usuario == null){
                View::share('info','nulo');
            }else{
                $info = $usuario->login;
                View::share('info',$info);
            }
         */   
            
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

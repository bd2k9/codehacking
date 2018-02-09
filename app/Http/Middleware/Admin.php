<?php

namespace App\Http\Middleware;

use Closure;
use User;
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

    public function handle($request, Closure $next)
    {
        //Aqui estamos a detectar o utilizador e, confirmando se é administrador, avança
        //Caso contrário, volta à página inicial
        if(Auth::check()){

            if(Auth::user()->isAdmin()){
            
                return $next($request);
                
            } else {
                return redirect('/');
            }
            
        }

        
    }
}

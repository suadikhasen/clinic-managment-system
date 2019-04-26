<?php

namespace App\Http\Middleware\Phermacy;
use Illuminate\Support\Facades\Auth;
use Closure;

class Authentication
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
        if(Auth::guard('Phermacy')->check()){
        return $next($request);
         }

        return redirect('/')->with('DeniedMessage','You Are Not Authorized To Access This Page');

    }
}

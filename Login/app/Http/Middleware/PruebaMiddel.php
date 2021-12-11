<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PruebaMiddel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //si el usuario logueado tiene este email, le permite seguir con la petición
        if (auth()->user()->email == 'victoria.penyas@gmail.com') {
            echo "Usuario autorizado";
            return $next($request);
        }

        return redirect('no-autorizado');
        
    }
}

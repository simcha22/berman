<?php

namespace App\Http\Middleware;

use Closure;

class ValidateAdmin
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
        if(session('role') !==85){
            return redirect('shop');
        }
        return $next($request);
    }
}

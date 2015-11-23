<?php

namespace App\Http\Middleware;

use Closure;

class adminLevelOne
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
        if($request->entity == 'adminn'){
        return $next($request);
        }
    }
}

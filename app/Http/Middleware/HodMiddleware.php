<?php

namespace App\Http\Middleware;

use Closure;

class HodMiddleware
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
        if(\Auth::user()->role = 2 && \Auth::user()->state == 1 )
        return $next($request);
        else
        {
            return redirect()->route('logout');
        }
    }
}

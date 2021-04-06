<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ThirdMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        echo '<br> Middleware số 3';
        return $next($request);
    }
}

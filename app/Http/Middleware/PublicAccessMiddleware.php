<?php

namespace App\Http\Middleware;

use Session;
use Closure;

class PublicAccessMiddleware
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
        if(Session::has('username')){
            return $next($request);
        }
        return redirect()->route('index');
    }
}

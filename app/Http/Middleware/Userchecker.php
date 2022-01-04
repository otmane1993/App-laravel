<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Userchecker
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
        // return $next($request);
        if(!Auth::check($request))
        {
            return route('login');
        }
        if(Auth::user()->role_id===1)
        {
            return route('admin.home');
        }
        if(Auth::user()->role_id===2)
        {
            return route('client.home');
        }
        if(Auth::user()->role_id===3)
        {
            return $next($request);
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class adminchecker
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
        // return $next($request);// c'est la ou il y a la redirection
        if(!Auth::check($request))
        {
            return route('login');
        }
        if(Auth::user()->role_id===1)
        {
            return $next($request);
        }
        if(Auth::user()->role_id===2)
        {
            return route('client.home');
        }
        if(Auth::user()->role_id===3)
        {
            $request->session()->flash('status','you can not');
            return route('user.home');
        }
    }
}

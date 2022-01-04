<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Clientchecker
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
            return route('login.home');
        }
        if(Auth::user()->role_id===1)
        {
            return route('admin.home');
        }
        if(Auth::user()->role_id===2)
        {
            return $next($request);
        }
        if(Auth::user()->role_id===3)
        {
            $request->session()->flash('status','you can not');
            return route('user.home');
        }
    }
}

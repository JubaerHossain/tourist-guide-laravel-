<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CustomerMiddleware
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
        if(Auth::user()){
            if(in_array('customer', explode(',', Auth::user()->user_role->role->slug))){
                return $next($request);
            }
        }
        return redirect('/');
    }
}

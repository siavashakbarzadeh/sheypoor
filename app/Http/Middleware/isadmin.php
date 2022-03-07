<?php

namespace App\Http\Middleware;

use Closure;

class isadmin
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
        if(\Auth::check())
        {
            if(!\Auth::user()->check_role())
            {
                return redirect('/');
            }else
            {
                return $next($request);
            }
        }else
        {
            return redirect('/');
        }

    }
}

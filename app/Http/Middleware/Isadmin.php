<?php

namespace App\Http\Middleware;

use Closure;

class Isadmin
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
       if($request->session()->has('user_permission') && $request->session()->get('user_permission') ==1)
            return $next($request);
        else
            return redirect('set_admin/logout2');
    }
}

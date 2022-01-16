<?php

namespace App\Http\Middleware;

use Closure;
use session;

class Islogin
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
            return redirect('set_admin/login')->with('Vui lòng đăng nhập để sử dụng hệ thống');
    }
}

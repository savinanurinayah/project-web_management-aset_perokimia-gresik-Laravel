<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekLogin
{
    public function handle(Request $request, Closure $next)
    {
        if($request->path() != 'login') {
            if(!session('logged_in')) {
                return redirect('login');
            }

            return $next($request);
        } else {
            if(session('logged_in')) {
                return redirect('/');
            }
            return $next($request);
        }
    }
}

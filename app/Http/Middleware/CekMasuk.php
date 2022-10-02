<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekMasuk
{
    public function handle(Request $request, Closure $next)
    {
        if(session('userdata')['status'] != 'ADMIN') {
            return redirect('/');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureNotManager
{

        public function handle($request, Closure $next)
{
    if (auth()->check() && auth()->user()->role === 'manager') {
        abort(403, 'Anda tidak diizinkan mengakses area ini.');
    }
   
        return $next($request);
    }
}

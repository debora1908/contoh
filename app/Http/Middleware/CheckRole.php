<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $role) {
    if ($request->user()->role !== $role) {
        return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses.');
    }
    return $next($request);
}}

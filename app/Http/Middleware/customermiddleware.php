<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class customermiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(\Illuminate\Support\Facades\Auth::check()&&Auth::user()->role === 'customer'){
            return $next($request);
        }
        abort(404, 'Akses ini hanya untuk customer');
    }
}

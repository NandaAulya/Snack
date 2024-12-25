<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
// use App\Http\Middleware\admin;

class kernel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
        
    //     return $next($request);
    // }

    protected $routeMiddleware = [
        // Middleware lainnya...
        'admin' => \App\Http\Middleware\admin::class,
    ];
    
}

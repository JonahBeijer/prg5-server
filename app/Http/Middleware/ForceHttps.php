<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
public function handle($request, Closure $next)
{
    if (!$request->secure() && env('APP_ENV') !== 'local') {
        \Log::info('Redirecting to HTTPS: '.$request->getRequestUri()); // Voeg deze regel toe
        return redirect()->secure($request->getRequestUri());
    }

    return $next($request);
}

}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddContentLength
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
        $response = $next($request);
        // dd( $response->content() );
        $response->header('Content-Length',strlen($response->content()));
        return $response;
    }
}

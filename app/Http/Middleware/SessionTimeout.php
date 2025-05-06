<?php

namespace App\Http\Middleware;

use Closure;

class SessionTimeout
{
    public function handle($request, Closure $next)
    {

        return $next($request);
    }
}


<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLocation
{
    public function handle(Request $request, Closure $next)
    {
        echo "Location <br>";
        return $next($request);
    }
}

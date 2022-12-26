<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPrice
{
    public function handle(Request $request, Closure $next)
    {
        // echo "Mamat";
        if($request->price > 100){
            return redirect('home');
        }

        return $next($request);
    }
}

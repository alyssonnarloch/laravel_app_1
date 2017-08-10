<?php

namespace App\Http\Middleware;

use Closure;

class FormatUsPrice
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
        $request->price = str_replace(',', '.', str_replace('.', '', $request->price));
        return $next($request);
    }
}

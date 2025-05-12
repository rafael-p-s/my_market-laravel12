<?php

namespace Modules\Cliente\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCliente
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}

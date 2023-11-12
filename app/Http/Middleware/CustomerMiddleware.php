<?php

namespace App\Http\Middleware;

use Closure;

class CustomerMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->isCustomer()) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}

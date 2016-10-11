<?php

namespace App\Http\Middleware;

use Closure;

class CheckType
{
    public function handle($request, Closure $next, $type)
    {
        if (is_null($request->user())) {
            return redirect('/');
        }

        if (!$request->user()->hasType($type)) {
            return redirect('inicio');
        }

        return $next($request);
    }
}

<?php

namespace Manggala\UniversalPanel\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UniversalPanelMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!config('universal-panel.enabled', true)) {
            abort(404, 'Universal Panel is disabled.');
        }

        return $next($request);
    }
}

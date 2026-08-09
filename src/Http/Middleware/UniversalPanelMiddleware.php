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

        $user = $request->user();
        $currentPath = trim($request->getPathInfo(), '/');

        // Dynamic Role-based auto redirect for Superadmin
        if ($user && isset($user->role) && strtolower($user->role) === 'superadmin' && $currentPath === 'admin') {
            return redirect('/superadmin');
        }

        return $next($request);
    }
}

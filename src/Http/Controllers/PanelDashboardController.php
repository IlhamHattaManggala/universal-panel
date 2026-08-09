<?php

namespace Manggala\UniversalPanel\Http\Controllers;

use Illuminate\Routing\Controller;

class PanelDashboardController extends Controller
{
    public function index()
    {
        $stack = config('universal-panel.stack', 'react');

        if ($stack === 'react' && class_exists(\Inertia\Inertia::class)) {
            return \Inertia\Inertia::render('Dashboard');
        }

        /** @phpstan-ignore argument.type */
        return view('universal-panel::dashboard');
    }
}

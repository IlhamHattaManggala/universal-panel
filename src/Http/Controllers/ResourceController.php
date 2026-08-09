<?php

namespace Manggala\UniversalPanel\Http\Controllers;

use Illuminate\Routing\Controller;
use Manggala\UniversalPanel\Facades\Panel;

class ResourceController extends Controller
{
    public function index(string $slug)
    {
        $resources = Panel::getResources();
        $resourceClass = $resources[$slug] ?? null;

        if (!$resourceClass) {
            abort(404, "Resource [{$slug}] not found.");
        }

        $stack = config('universal-panel.stack', 'react');

        if ($stack === 'react' && class_exists(\Inertia\Inertia::class)) {
            return \Inertia\Inertia::render('ResourceIndex', [
                'resource_slug' => $slug,
                'resource_label' => $resourceClass::getLabel(),
                'columns' => $resourceClass::table(),
            ]);
        }

        /** @phpstan-ignore argument.type */
        return view('universal-panel::layout', [
            'resource_slug' => $slug,
            'resource_label' => $resourceClass::getLabel(),
            'columns' => $resourceClass::table(),
        ]);
    }
}

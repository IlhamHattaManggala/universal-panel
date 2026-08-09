<?php

namespace Manggala\UniversalPanel\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Manggala\UniversalPanel\Facades\Panel;

class PanelApiController extends Controller
{
    public function resources(): JsonResponse
    {
        $resources = Panel::getResources();
        $items = [];

        foreach ($resources as $slug => $resourceClass) {
            $items[] = [
                'slug' => $slug,
                'label' => $resourceClass::getLabel(),
                'icon' => $resourceClass::getNavigationIcon(),
                'group' => $resourceClass::getNavigationGroup(),
            ];
        }

        return response()->json([
            'status' => 'success',
            'data' => $items,
        ]);
    }

    public function resourceItems(string $slug): JsonResponse
    {
        $resources = Panel::getResources();
        $resourceClass = $resources[$slug] ?? null;

        if (!$resourceClass) {
            return response()->json([
                'status' => 'error',
                'message' => "Resource [{$slug}] not found.",
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => [
                'slug' => $slug,
                'label' => $resourceClass::getLabel(),
                'columns' => $resourceClass::table(),
            ],
        ]);
    }
}

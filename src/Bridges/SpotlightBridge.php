<?php

namespace Manggala\UniversalPanel\Bridges;

use Manggala\UniversalPanel\Facades\Panel;

class SpotlightBridge
{
    public static function registerAutoDiscoveredCommands(): array
    {
        $commands = [
            [
                'id' => 'panel-dashboard',
                'name' => 'Open Universal Panel Dashboard',
                'description' => 'Navigate to admin dashboard overview',
                'icon' => 'LayoutDashboard',
                'url' => '/admin',
            ],
        ];

        foreach (Panel::getResources() as $slug => $resourceClass) {
            $commands[] = [
                'id' => 'panel-resource-' . $slug,
                'name' => 'Manage ' . $resourceClass::getLabel(),
                'description' => 'View ' . $resourceClass::getLabel() . ' resource list',
                'icon' => $resourceClass::getNavigationIcon(),
                'url' => '/admin/resources/' . $slug,
            ];
        }

        return $commands;
    }
}

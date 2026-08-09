<?php

namespace Manggala\UniversalPanel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void registerResource(string $resourceClass)
 * @method static array getResources()
 * @method static string getStack()
 *
 * @see \Manggala\UniversalPanel\PanelManager
 */
class Panel extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'universal-panel';
    }
}

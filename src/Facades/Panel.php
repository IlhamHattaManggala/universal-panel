<?php

namespace Manggala\UniversalPanel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Manggala\UniversalPanel\Panel make(string $id = 'admin')
 * @method static void registerResource(string $resourceClass)
 * @method static array getResources()
 * @method static array getPanels()
 * @method static \Manggala\UniversalPanel\Panel getPanel(?string $id = null)
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

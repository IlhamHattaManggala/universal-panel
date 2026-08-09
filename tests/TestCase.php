<?php

namespace Manggala\UniversalPanel\Tests;

use Manggala\UniversalPanel\UniversalPanelServiceProvider;
use Manggala\UniversalPanel\Facades\Panel;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            UniversalPanelServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'Panel' => Panel::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('universal-panel.enabled', true);
        $app['config']->set('universal-panel.stack', 'react');
    }
}

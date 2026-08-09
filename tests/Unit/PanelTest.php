<?php

use Manggala\UniversalPanel\Panel;
use Manggala\UniversalPanel\Resources\Resource;

class DummyTestUserResource extends Resource
{
    protected static ?string $navigationIcon = 'Users';
    protected static ?string $navigationGroup = 'Admin';
}

test('it configures panel properties fluently', function () {
    $panel = new Panel();
    $panel->id('custom-panel')
          ->path('custom-admin')
          ->stack('blade')
          ->resources([DummyTestUserResource::class]);

    expect($panel->getId())->toBe('custom-panel');
    expect($panel->getPath())->toBe('custom-admin');
    expect($panel->getStack())->toBe('blade');
    expect($panel->getResources())->toHaveKey('dummy-test-users');
});

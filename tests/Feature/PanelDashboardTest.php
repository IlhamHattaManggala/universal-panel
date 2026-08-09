<?php

use Manggala\UniversalPanel\Tests\TestCase;

uses(TestCase::class);

test('panel dashboard route renders 200 OK', function () {
    config(['universal-panel.middleware' => ['web']]);

    $response = $this->get('/admin');
    $response->assertStatus(200);
});

test('api endpoint returns registered resources JSON', function () {
    $response = $this->getJson('/api/universal-panel/resources');
    $response->assertStatus(200);
    $response->assertJsonStructure(['status', 'data']);
});

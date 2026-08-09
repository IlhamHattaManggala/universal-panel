<?php

use Illuminate\Support\Facades\Route;
use Manggala\UniversalPanel\Http\Controllers\Api\PanelApiController;

Route::group([
    'prefix' => 'api/universal-panel',
    'middleware' => ['api'],
], function () {
    Route::get('/resources', [PanelApiController::class, 'resources']);
    Route::get('/resources/{slug}', [PanelApiController::class, 'resourceItems']);
});

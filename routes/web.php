<?php

use Illuminate\Support\Facades\Route;
use Manggala\UniversalPanel\Http\Controllers\PanelDashboardController;
use Manggala\UniversalPanel\Http\Controllers\ResourceController;
use Manggala\UniversalPanel\Http\Controllers\PageController;

Route::group([
    'prefix' => config('universal-panel.prefix', 'admin'),
    'middleware' => config('universal-panel.middleware', ['web']),
], function () {
    Route::get('/', [PanelDashboardController::class, 'index'])->name('universal-panel.dashboard');
    Route::get('/analytics', [PageController::class, 'analytics'])->name('universal-panel.analytics');
    
    // Posts & Content Routes
    Route::get('/posts', [PageController::class, 'posts'])->name('universal-panel.posts');
    Route::get('/posts/create', [PageController::class, 'createPost'])->name('universal-panel.posts.create');
    Route::get('/posts/categories', [PageController::class, 'categories'])->name('universal-panel.posts.categories');
    Route::get('/posts/tags', [PageController::class, 'tags'])->name('universal-panel.posts.tags');
    Route::get('/pages', [PageController::class, 'pages'])->name('universal-panel.pages');
    Route::get('/media', [PageController::class, 'media'])->name('universal-panel.media');
    Route::get('/comments', [PageController::class, 'comments'])->name('universal-panel.comments');

    // Users & Roles
    Route::get('/users', [PageController::class, 'users'])->name('universal-panel.users');
    Route::get('/users/create', [PageController::class, 'createUser'])->name('universal-panel.users.create');
    Route::get('/roles', [PageController::class, 'roles'])->name('universal-panel.roles');
    Route::get('/permissions', [\Manggala\UniversalPanel\Http\Controllers\PermissionController::class, 'index'])->name('universal-panel.permissions');
    Route::post('/permissions', [\Manggala\UniversalPanel\Http\Controllers\PermissionController::class, 'update'])->name('universal-panel.permissions.update');
    Route::get('/profile', [PageController::class, 'profile'])->name('universal-panel.profile');

    // System & Security
    Route::get('/appearance', [PageController::class, 'appearance'])->name('universal-panel.appearance');
    Route::get('/plugins', [PageController::class, 'plugins'])->name('universal-panel.plugins');
    Route::get('/security', [PageController::class, 'security'])->name('universal-panel.security');
    Route::get('/security/logs', [PageController::class, 'security'])->name('universal-panel.security.logs');
    Route::get('/security/blacklist', [PageController::class, 'security'])->name('universal-panel.security.blacklist');
    Route::get('/tools', [PageController::class, 'tools'])->name('universal-panel.tools');
    Route::get('/settings', [PageController::class, 'settings'])->name('universal-panel.settings');

    // Dynamic Generic Resource
    Route::get('/resources/{slug}', [ResourceController::class, 'index'])->name('universal-panel.resources.index');
});

<?php

use Illuminate\Support\Facades\Route;
use Manggala\UniversalPanel\Http\Controllers\PanelDashboardController;
use Manggala\UniversalPanel\Http\Controllers\ResourceController;
use Manggala\UniversalPanel\Http\Controllers\PageController;

$panelPaths = ['admin', 'superadmin'];
$customPrefix = config('universal-panel.prefix', 'admin');
if (!in_array($customPrefix, $panelPaths)) {
    $panelPaths[] = $customPrefix;
}

foreach ($panelPaths as $pathPrefix) {
    Route::group([
        'prefix' => $pathPrefix,
        'middleware' => config('universal-panel.middleware', ['web']),
    ], function () use ($pathPrefix) {
        // Authentication Routes
        Route::get('/login', [\Manggala\UniversalPanel\Http\Controllers\AuthController::class, 'showLoginForm'])->name("universal-panel.{$pathPrefix}.login");
        Route::post('/login', [\Manggala\UniversalPanel\Http\Controllers\AuthController::class, 'login']);
        Route::get('/register', [\Manggala\UniversalPanel\Http\Controllers\AuthController::class, 'showRegisterForm'])->name("universal-panel.{$pathPrefix}.register");
        Route::post('/register', [\Manggala\UniversalPanel\Http\Controllers\AuthController::class, 'register']);
        Route::get('/forgot-password', [\Manggala\UniversalPanel\Http\Controllers\AuthController::class, 'showForgotPasswordForm'])->name("universal-panel.{$pathPrefix}.forgot-password");
        Route::post('/forgot-password', [\Manggala\UniversalPanel\Http\Controllers\AuthController::class, 'sendResetLink']);
        Route::get('/reset-password/{token}', [\Manggala\UniversalPanel\Http\Controllers\AuthController::class, 'showResetPasswordForm'])->name("universal-panel.{$pathPrefix}.reset-password");
        Route::post('/reset-password', [\Manggala\UniversalPanel\Http\Controllers\AuthController::class, 'resetPassword']);
        Route::post('/logout', [\Manggala\UniversalPanel\Http\Controllers\AuthController::class, 'logout'])->name("universal-panel.{$pathPrefix}.logout");

        Route::get('/', [PanelDashboardController::class, 'index'])->name("universal-panel.{$pathPrefix}.dashboard");
        Route::get('/analytics', [PageController::class, 'analytics'])->name("universal-panel.{$pathPrefix}.analytics");
        
        // Posts & Content Routes
        Route::get('/posts', [PageController::class, 'posts'])->name("universal-panel.{$pathPrefix}.posts");
        Route::get('/posts/create', [PageController::class, 'createPost'])->name("universal-panel.{$pathPrefix}.posts.create");
        Route::get('/posts/categories', [PageController::class, 'categories'])->name("universal-panel.{$pathPrefix}.posts.categories");
        Route::get('/posts/tags', [PageController::class, 'tags'])->name("universal-panel.{$pathPrefix}.posts.tags");
        Route::get('/pages', [PageController::class, 'pages'])->name("universal-panel.{$pathPrefix}.pages");
        Route::get('/media', [PageController::class, 'media'])->name("universal-panel.{$pathPrefix}.media");
        Route::get('/comments', [PageController::class, 'comments'])->name("universal-panel.{$pathPrefix}.comments");

        // Users & Roles
        Route::get('/users', [PageController::class, 'users'])->name("universal-panel.{$pathPrefix}.users");
        Route::get('/users/create', [PageController::class, 'createUser'])->name("universal-panel.{$pathPrefix}.users.create");
        Route::get('/roles', [PageController::class, 'roles'])->name("universal-panel.{$pathPrefix}.roles");
        Route::get('/permissions', [\Manggala\UniversalPanel\Http\Controllers\PermissionController::class, 'index'])->name("universal-panel.{$pathPrefix}.permissions");
        Route::post('/permissions', [\Manggala\UniversalPanel\Http\Controllers\PermissionController::class, 'update'])->name("universal-panel.{$pathPrefix}.permissions.update");
        Route::get('/profile', [PageController::class, 'profile'])->name("universal-panel.{$pathPrefix}.profile");

        // System & Security
        Route::get('/appearance', [PageController::class, 'appearance'])->name("universal-panel.{$pathPrefix}.appearance");
        Route::get('/plugins', [PageController::class, 'plugins'])->name("universal-panel.{$pathPrefix}.plugins");
        Route::get('/security', [PageController::class, 'security'])->name("universal-panel.{$pathPrefix}.security");
        Route::get('/security/logs', [PageController::class, 'security'])->name("universal-panel.{$pathPrefix}.security.logs");
        Route::get('/security/blacklist', [PageController::class, 'security'])->name("universal-panel.{$pathPrefix}.security.blacklist");
        Route::get('/tools', [PageController::class, 'tools'])->name("universal-panel.{$pathPrefix}.tools");
        Route::get('/settings', [PageController::class, 'settings'])->name("universal-panel.{$pathPrefix}.settings");

        // Dynamic Generic Resource
        Route::get('/resources/{slug}', [ResourceController::class, 'index'])->name("universal-panel.{$pathPrefix}.resources.index");
    });
}

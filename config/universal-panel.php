<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Status Keaktifan Panel Admin
    |--------------------------------------------------------------------------
    */
    'enabled' => env('UNIVERSAL_PANEL_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Default Frontend Stack Adapter
    |--------------------------------------------------------------------------
    | Stack yang digunakan untuk merender panel admin:
    | Pilihan: 'blade', 'livewire', 'react', 'vue', 'api'
    */
    'stack' => env('PANEL_STACK', 'blade'),

    /*
    |--------------------------------------------------------------------------
    | Routing Prefix & Middleware
    |--------------------------------------------------------------------------
    */
    'prefix' => env('PANEL_PREFIX', 'admin'),
    'middleware' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Dimensi WordPress-Inspired Compact Sidebar
    |--------------------------------------------------------------------------
    | Lebar sidebar yang dirancang super ringkas agar area konten utama luas.
    */
    'sidebar' => [
        'width' => '160px',
        'collapsed_width' => '36px',
        'topbar_height' => '44px',
        'theme' => 'dark-slate',
    ],
];

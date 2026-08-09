# `manggala/universal-panel` (`universal-panel`)

[![Latest Stable Version](https://img.shields.io/packagist/v/manggala/universal-panel.svg?style=flat-square)](https://packagist.org/packages/manggala/universal-panel)
[![Total Downloads](https://img.shields.io/packagist/dt/manggala/universal-panel.svg?style=flat-square)](https://packagist.org/packages/manggala/universal-panel)
[![License](https://img.shields.io/packagist/l/manggala/universal-panel.svg?style=flat-square)](LICENSE)
[![PHP Version](https://img.shields.io/badge/PHP-%5E8.2%20%7C%7C%20%5E8.3%20%7C%7C%20%5E8.4-777BB4?style=flat-square&logo=php)](https://php.net)
[![Laravel Version](https://img.shields.io/badge/Laravel-%5E10.0%20%7C%7C%20%5E11.0%20%7C%7C%20%5E12.0%20%7C%7C%20%5E13.0-FF2D20?style=flat-square&logo=laravel)](https://laravel.com)

**`manggala/universal-panel`** (Package Name: `universal-panel`) is a modern **Universal Multi-Stack Admin Panel & Resource Builder Framework** for Laravel applications.

It combines an elegant **WordPress-Inspired Ergonomic Sidebar** (ultra-efficient **160px slim width** / **52px collapsed icon mode** with `.no-scrollbar` hidden scrollbar styling), **Multi-Panel Registration & Dynamic Role Routing** (`/superadmin`, `/admin`), **Permission Management Matrix GUI**, **Full Authentication Suite**, **100% Dynamic Spotlight Quick Search (`Cmd+K` / `Ctrl+K`)**, and rich **Interactive Widgets & Data Tables** natively supporting all frontend stack adapters (**Blade Views, Livewire v2/v3, Inertia React, Inertia Vue v2/v3, and REST API**).

---

## Key Features

1. **27 Artisan CLI Commands Suite**: Comprehensive generator command suite for creating Resources (`--generate` for auto Model & Migration), Roles (`make:role`), Permission Panel (`make:permission-panel`), Forms, Custom Fields, Actions, Filters, Columns, Policies, Themes, Exporters, Importers, Clusters, Plugins, Tenants, Notifications, Wizard Steps, Settings Pages, and Background Commands.
2. **Multi-Panel Builder & Dynamic Role Routing**: Register multiple panel instances fluently (`Panel::make('superadmin')->path('superadmin')->role('Superadmin')`) with automatic role-based redirect to `/superadmin` vs `/admin`.
3. **Full Authentication Suite**: Plug-and-play authentication views for Sign In (`/admin/login`), Register Admin (`/admin/register`), Forgot Password (`/admin/forgot-password`), Reset Password (`/admin/reset-password`), and Sign Out (`/admin/logout`).
4. **Permission Management Matrix GUI (`/admin/permissions`)**: Visual role-based access control matrix with checkboxes for module permissions (*Posts, Pages, Media, Users, Security, Settings*).
5. **100% Dynamic Spotlight Quick Search (`Cmd+K` / `Ctrl+K`)**: Instant search modal automatically discovering registered CRUD resources and system pages with clean SVG icons (Zero Third-Party Dependency).
6. **WordPress-Inspired Ergonomic Sidebar (160px / 52px Collapsed)**:
   - Compact 160px slim width & 52px collapsed icon mode without icon clipping.
   - Distinct uppercase group section headers (`MAIN`, `CONTENT`, `USER MANAGEMENT`, `SYSTEM`).
   - Interactive Accordion Submenus with smooth chevron arrow indicators.
   - Visually hidden scrollbar (`.no-scrollbar`) providing a minimal design while preserving 100% mouse wheel / trackpad scrollability.
7. **Automated System Diagnostics (`universal-panel:doctor`)**: One-command diagnostic engine checking PHP 8.4+, PDO, Mbstring, and Vite asset compilation health.
8. **Universal Multi-Stack Support**: Single PHP Resource declaration rendered seamlessly across **Blade, Livewire, Inertia React, Inertia Vue, or REST API JSON**. Default stack set to `'blade'` for plug-and-play zero-setup operation out of the box.

---

## Framework & Compatibility Matrix

| Parameter | Specifications |
|---|---|
| **Package Name** | `manggala/universal-panel` (Folder: `universal-panel`) |
| **PHP Version** | `^8.2 || ^8.3 || ^8.4` |
| **Laravel Framework (4 Major Versions)** | `^10.0 || ^11.0 || ^12.0 || ^13.0` |
| **Frontend Stack Support** | Blade Views, Livewire (v2/v3), Inertia React, Inertia Vue, REST API |
| **Sidebar Layout Dimensions** | 160px (Expanded Slim) / 52px (Collapsed Icon Mode) |
| **Scrollbar Styling** | `.no-scrollbar` (Visually Hidden Scrollbar) |
| **Artisan Commands Suite** | 27 Dedicated Generator & Management Commands |
| **Multi-Panel Support** | Fluent API (`Panel::make('superadmin')->path('superadmin')`) |
| **Quick Search** | `Cmd+K` / `Ctrl+K` Spotlight Modal with Dynamic Resource Discovery |
| **Testing Engine** | Pest PHP (`pestphp/pest`) |

---

## Installation & Setup

### 1. Install via Composer:
```bash
composer require manggala/universal-panel
```

### 2. Run Installation Command:
```bash
php artisan universal-panel:install
```

### 3. Run Environment Diagnostics Check:
```bash
php artisan universal-panel:doctor
```

---

## Complete 27 Artisan CLI Commands Suite (`php artisan`)

### 1. Setup, Maintenance & Diagnostics:
```bash
# Publish configurations and Blade views automatically
php artisan universal-panel:install

# Run environment health check (PHP, PDO, Mbstring, Vite build)
php artisan universal-panel:doctor

# Create a new Super Admin user interactively
php artisan make:panel-user

# Optimize and cache panel metadata for production
php artisan universal-panel:optimize

# Clear cached panel routes and metadata
php artisan universal-panel:clear-cache
```

### 2. Component Generator Commands:
```bash
# Create a new Resource CRUD class (e.g. ProductResource)
php artisan make:panel-resource Product

# Create Resource CRUD + Auto Eloquent Model & Migration
php artisan make:panel-resource Product --generate

# Create one or multiple roles (single or space/comma separated)
php artisan make:role Superadmin, Manager, Editor

# Enable and publish Permission Management Panel GUI
php artisan make:permission-panel

# Create a standalone Form Schema class (e.g. UserProfileForm)
php artisan make:panel-form UserProfile

# Create a Custom Input Field Component (e.g. ColorPickerField)
php artisan make:panel-field ColorPicker

# Create a Custom Admin Page class (e.g. AnalyticsPage)
php artisan make:panel-page Analytics

# Create a Dedicated Settings Page class (e.g. PaymentGatewaySetting)
php artisan make:panel-setting PaymentGateway
```

### 3. Interactive Feature Generators:
```bash
# Create a Custom Table/Header Action (e.g. ExportPdfAction)
php artisan make:panel-action ExportPdf

# Create a Custom Table Filter (e.g. DateRangeFilter)
php artisan make:panel-filter DateRange

# Create a Custom Table Column Component (e.g. ProgressBarColumn)
php artisan make:panel-column ProgressBar

# Create a Topbar Notification class (e.g. SystemAlertNotification)
php artisan make:panel-notification SystemAlert

# Create a Multi-Step Form Wizard Step (e.g. AccountSetupStep)
php artisan make:panel-step AccountSetup

# Create a Relation Manager Table class (e.g. PostCommentsRelationManager)
php artisan make:panel-relation-manager PostComments
```

### 4. Data & Task Generators:
```bash
# Create a Bulk Data Exporter class (e.g. TransactionExporter)
php artisan make:panel-exporter Transaction

# Create a Bulk Data Importer class (e.g. ProductImporter)
php artisan make:panel-importer Product

# Create a Panel Background Command (e.g. CleanTempFilesCommand)
php artisan make:panel-command CleanTempFiles
```

### 5. Architecture & Extension Generators:
```bash
# Create an Authorization Policy class (e.g. PostPolicy)
php artisan make:panel-policy Post

# Create a Custom Theme CSS file (e.g. CorporateBrandTheme)
php artisan make:panel-theme CorporateBrand

# Create a Resource Cluster grouping (e.g. ECommerceCluster)
php artisan make:panel-cluster ECommerce

# Create an Add-on Plugin class (e.g. AuditLogsPlugin)
php artisan make:panel-plugin AuditLogs

# Create a Multi-Tenancy Configuration (e.g. TeamTenant)
php artisan make:panel-tenant Team

# Create a Dashboard Widget (e.g. SalesOverviewWidget --chart)
php artisan make:panel-widget SalesOverview --chart
```

---

## Multi-Panel Registration Example

Register multiple panel instances in `app/Providers/AppServiceProvider.php`:

```php
use Manggala\UniversalPanel\Facades\Panel;

// Register Superadmin Panel at /superadmin
Panel::make('superadmin')
    ->path('superadmin')
    ->role('Superadmin')
    ->title('Superadmin Panel');

// Register Standard Admin Panel at /admin
Panel::make('admin')
    ->path('admin')
    ->role('Admin');
```

---

## Resource CRUD Declaration Example

Create a Resource class in `app/UniversalPanel/Resources/UserResource.php`:

```php
namespace App\UniversalPanel\Resources;

use Manggala\UniversalPanel\Resources\Resource;
use App\Models\User;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'User';
    protected static ?string $navigationGroup = 'USER MANAGEMENT';

    public static function table(): array
    {
        return [
            'name' => 'Name',
            'email' => 'Email Address',
            'role' => 'Role',
            'created_at' => 'Registered Date',
        ];
    }
}
```

---

## Configuration (`config/universal-panel.php`)

```php
return [
    /*
    |--------------------------------------------------------------------------
    | Default Frontend Stack Adapter
    |--------------------------------------------------------------------------
    | Options: 'blade', 'livewire', 'react', 'vue', 'api'
    */
    'stack' => env('PANEL_STACK', 'blade'),

    /*
    |--------------------------------------------------------------------------
    | Panel Routing Prefix
    |--------------------------------------------------------------------------
    */
    'prefix' => env('PANEL_PREFIX', 'admin'),

    /*
    |--------------------------------------------------------------------------
    | Sidebar Dimensions
    |--------------------------------------------------------------------------
    */
    'sidebar' => [
        'width' => '160px',
        'collapsed_width' => '52px',
        'theme' => 'dark-slate',
    ],
];
```

---

## Testing

Run automated tests using Pest PHP:

```bash
vendor/bin/pest
```

---

## License

The `manggala/universal-panel` package is open-sourced software licensed under the [MIT license](LICENSE). Copyright (c) 2026 Ilham Hatta Manggala.

# `manggala/universal-panel` (`universal-panel`)

[![Latest Stable Version](https://img.shields.io/packagist/v/manggala/universal-panel.svg?style=flat-square)](https://packagist.org/packages/manggala/universal-panel)
[![Total Downloads](https://img.shields.io/packagist/dt/manggala/universal-panel.svg?style=flat-square)](https://packagist.org/packages/manggala/universal-panel)
[![License](https://img.shields.io/packagist/l/manggala/universal-panel.svg?style=flat-square)](LICENSE)
[![PHP Version](https://img.shields.io/badge/PHP-%5E8.2%20%7C%7C%20%5E8.3%20%7C%7C%20%5E8.4-777BB4?style=flat-square&logo=php)](https://php.net)
[![Laravel Version](https://img.shields.io/badge/Laravel-%5E10.0%20%7C%7C%20%5E11.0%20%7C%7C%20%5E12.0%20%7C%7C%20%5E13.0-FF2D20?style=flat-square&logo=laravel)](https://laravel.com)

**`manggala/universal-panel`** (Package Name: `universal-panel`) adalah **Universal Multi-Stack Admin Panel & Resource Builder Framework** modern untuk aplikasi Laravel.

Package ini menggabungkan keanggunan **WordPress-Inspired Ergonomic Sidebar** (lebar super efisien **160px** / **52px collapsed mode** dengan `.no-scrollbar` hidden scrollbar) dan kekayaan komponen **Rich Interactive Widgets & Data Tables** yang mendukung secara native seluruh variasi stack frontend (**Blade, Livewire v2/v3, Inertia React, Inertia Vue v2/v3, dan REST API**).

---

## 🌟 Fitur Utama `manggala/universal-panel`

1. **25 Artisan CLI Commands Suite**: Generator terlengkap di kelasnya untuk membuat Resource, Form, Custom Field, Custom Action, Filter, Column, Policy, Theme, Exporter, Importer, Cluster, Plugin, Tenant, Notification, Wizard Step, Settings Page, dan Background Command.
2. **Diagnostik Sistem Otomatis (`universal-panel:doctor`)**: Memeriksa otomatis kesehatan lingkungan PHP 8.4+, PDO, Mbstring, dan kompilasi aset Vite.
3. **WordPress-Inspired Ergonomic Sidebar (160px / 52px Collapsed)**:
   - Lebar 160px yang ringkas & 52px mode terlipat (*collapsed*) tanpa ada ikon yang terpotong.
   - Pengelompokan menu dengan label tegas (`MAIN`, `CONTENT`, `USER MANAGEMENT`, `SYSTEM`).
   - Accordion Submenu interaktif dengan panah chevron halus.
   - `.no-scrollbar` (Bilah scrollbar tersembunyi secara visual tanpa mengurangi fungsi scroll).
4. **Light ☀️ & Dark 🌙 Mode Sync**: Dukungan 100% mode terang/gelap otomatis dengan penyimpanan status di `localStorage`.
5. **Rich Interactive Dashboard & Data Tables**: 4 Kartu Stat Widget interaktif, status pills (*Active*, *Pending*, *Blocked*), filter data, search `Cmd+K`, export CSV/Excel, row actions (👁️ View, ✏️ Edit, 🗑️ Delete), dan pagination.
6. **16 Dedicated Content Pages**: Setiap menu di sidebar (`/admin/analytics`, `/admin/posts`, `/admin/media`, `/admin/users`, `/admin/security`, `/admin/settings`, dll.) memiliki halaman konten khusus yang 100% berfungsi.
7. **Universal Multi-Stack Support**: Satu deklarasi Resource PHP dapat dirender di **Blade Views, Livewire, Inertia React, Inertia Vue, atau REST API**.

---

## 📋 Matriks Kompatibilitas Framework & Stack

| Parameter | Dukungan Versi & Framework |
|---|---|
| **Package Name** | `manggala/universal-panel` (Folder: `universal-panel`) |
| **PHP Version** | `^8.2 || ^8.3 || ^8.4` |
| **Laravel Framework (4 Major Versions)** | `^10.0 || ^11.0 || ^12.0 || ^13.0` |
| **Frontend Stack Support** | Blade Views, Livewire (v2/v3), Inertia React, Inertia Vue, REST API |
| **Sidebar Layout Dimensions** | 160px (Expanded Slim) / 52px (Collapsed Icon Mode) |
| **Scrollbar Style** | `.no-scrollbar` (Visually Hidden Scrollbar) |
| **Artisan Commands Suite** | 25 Dedicated Generator & Management Commands |
| **Testing Engine** | Pest PHP (`pestphp/pest`) |

---

## 📦 Instalasi & Setup

### 1. Pasang via Composer:
```bash
composer require manggala/universal-panel
```

### 2. Jalankan Perintah Instalasi:
```bash
php artisan universal-panel:install
```

### 3. Periksa Kesehatan Lingkungan (System Diagnostics):
```bash
php artisan universal-panel:doctor
```

---

## 🛠️ Suite Lengkap 25 Perintah Artisan CLI (`php artisan`)

### 🩺 1. Perintah Setup, Maintenance & Diagnostik:
```bash
# Mempublikasikan konfigurasi & views Blade otomatis
php artisan universal-panel:install

# Diagnostik kesehatan lingkungan PHP, PDO, & Vite assets
php artisan universal-panel:doctor

# Membuat pengguna Super Admin baru di database
php artisan make:panel-user

# Mengoptimalkan & menyimpan cache metadata resource untuk produksi
php artisan universal-panel:optimize

# Membersihkan cache metadata panel & ikon
php artisan universal-panel:clear-cache
```

### 📦 2. Perintah Generator Component (Resource, Form, Field, Page, Settings):
```bash
# Membuat Resource CRUD baru (contoh: ProductResource)
php artisan make:panel-resource Product

# Membuat Class Form Schema terpisah (contoh: UserProfileForm)
php artisan make:panel-form UserProfile

# Membuat Custom Input Field Component (contoh: ColorPickerField)
php artisan make:panel-field ColorPicker

# Membuat Halaman Admin Kustom (contoh: AnalyticsPage)
php artisan make:panel-page Analytics

# Membuat Halaman Pengaturan Khusus (contoh: PaymentGatewaySetting)
php artisan make:panel-setting PaymentGateway
```

### ⚡ 3. Perintah Generator Fitur Interaktif (Action, Filter, Column, Step, Notification):
```bash
# Membuat Custom Table/Header Action (contoh: ExportPdfAction)
php artisan make:panel-action ExportPdf

# Membuat Custom Table Filter (contoh: DateRangeFilter)
php artisan make:panel-filter DateRange

# Membuat Custom Table Column Component (contoh: ProgressBarColumn)
php artisan make:panel-column ProgressBar

# Membuat Class Notification Lonceng Topbar (contoh: SystemAlertNotification)
php artisan make:panel-notification SystemAlert

# Membuat Multi-Step Form Wizard Step (contoh: AccountSetupStep)
php artisan make:panel-step AccountSetup

# Membuat Relation Manager Table (contoh: PostCommentsRelationManager)
php artisan make:panel-relation-manager PostComments
```

### 📊 4. Perintah Generator Data & Import/Export:
```bash
# Membuat Class Bulk Data Exporter Excel/CSV (contoh: TransactionExporter)
php artisan make:panel-exporter Transaction

# Membuat Class Bulk Data Importer (contoh: ProductImporter)
php artisan make:panel-importer Product

# Membuat Class Background Command Panel (contoh: CleanTempFilesCommand)
php artisan make:panel-command CleanTempFiles
```

### 🛡️ 5. Perintah Generator Arsitektur & Ekstensi:
```bash
# Membuat Class Authorization Policy (contoh: PostPolicy)
php artisan make:panel-policy Post

# Membuat File CSS Tema Kustom (contoh: CorporateBrandTheme)
php artisan make:panel-theme CorporateBrand

# Membuat Grouping Cluster Resource (contoh: ECommerceCluster)
php artisan make:panel-cluster ECommerce

# Membuat Class Add-on Plugin (contoh: AuditLogsPlugin)
php artisan make:panel-plugin AuditLogs

# Membuat Konfigurasi Multi-Tenancy (contoh: TeamTenant)
php artisan make:panel-tenant Team

# Membuat Widget Dashboard Stat/Chart (contoh: SalesOverviewWidget --chart)
php artisan make:panel-widget SalesOverview --chart
```

---

## 📐 Tata Letak Ergonomis Sidebar & Navigation

- **Lebar Presisi (160px / 52px Collapsed)**: Menyelamatkan 85-90% area kerja layar utama.
- **Section Group Labels**: Pengelompokan menu dengan teks kategori (`MAIN`, `CONTENT`, `USER MANAGEMENT`, `SYSTEM`).
- **Accordion Submenus**: Fitur expand/collapse untuk menu bertingkat (*Posts, Pages, Users, Sentinel WAF, Settings*).
- **Visually Hidden Scrollbar (`.no-scrollbar`)**: Bilah scrollbar tersembunyi secara visual tanpa ada tombol/garis scrollbar yang menggangu, namun dapat di-scroll dengan mulus menggunakan mouse wheel/trackpad.
- **Tinggi Tetap (`calc(100vh - 2.75rem)`)**: Membuka banyak submenu sekaligus **tidak akan pernah** mengubah tinggi sidebar.

---

## 🚀 Deklarasi Resource CRUD

Buat kelas Resource baru di `app/UniversalPanel/Resources/UserResource.php`:

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

## 🖥️ Konfigurasi Package (`config/universal-panel.php`)

```php
return [
    /*
    |--------------------------------------------------------------------------
    | Default Frontend Stack Adapter
    |--------------------------------------------------------------------------
    | Pilihan: 'blade', 'livewire', 'react', 'vue', 'api'
    */
    'stack' => env('PANEL_STACK', 'react'),

    /*
    |--------------------------------------------------------------------------
    | Panel Routing Prefix
    |--------------------------------------------------------------------------
    */
    'prefix' => 'admin',

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

## 🧪 Pengujian (Testing)

Jalankan pengujian otomatis menggunakan Pest PHP:

```bash
vendor/bin/pest
```

---

## 📄 Lisensi

Package `manggala/universal-panel` dirilis di bawah [Lisensi MIT](LICENSE). Copyright (c) 2026 Ilham Hatta Manggala.

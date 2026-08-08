# `manggala/universal-panel` (`universal-panel`)

[![Latest Stable Version](https://img.shields.io/packagist/v/manggala/universal-panel.svg?style=flat-square)](https://packagist.org/packages/manggala/universal-panel)
[![Total Downloads](https://img.shields.io/packagist/dt/manggala/universal-panel.svg?style=flat-square)](https://packagist.org/packages/manggala/universal-panel)
[![License](https://img.shields.io/packagist/l/manggala/universal-panel.svg?style=flat-square)](LICENSE)
[![PHP Version](https://img.shields.io/badge/PHP-%5E8.2%20%7C%7C%20%5E8.3%20%7C%7C%20%5E8.4-777BB4?style=flat-square&logo=php)](https://php.net)
[![Laravel Version](https://img.shields.io/badge/Laravel-%5E10.0%20%7C%7C%20%5E11.0%20%7C%7C%20%5E12.0%20%7C%7C%20%5E13.0-FF2D20?style=flat-square&logo=laravel)](https://laravel.com)

**`manggala/universal-panel`** (Package Name: `universal-panel`) adalah Universal Multi-Stack Admin Panel & Resource Builder Framework untuk aplikasi Laravel.

Package ini memungkinkan Anda membuat Admin Panel canggih dengan tata letak **WordPress-Inspired Ergonomic Sidebar** (lebar super efisien **160px - 180px slim width** / **36px collapsed icon mode**) yang secara native mendukung seluruh variasi stack frontend (**Blade, Livewire v2/v3, Inertia React, Inertia Vue v2/v3, dan REST API**).

---

## 🌟 Mengapa Menggunakan `manggala/universal-panel`?

1. **Universal Multi-Stack Support**: Satu deklarasi Resource PHP dapat dirender secara native di **Blade, Livewire, Inertia React, Inertia Vue, atau REST API**.
2. **WordPress-Inspired Ergonomic Sidebar**: Lebar sidebar yang sangat ringkas (**160px - 180px**), memberikan 85-90% porsi layar murni untuk area kerja konten utama tanpa terasa sesak.
3. **Auto Resource CRUD Generator**: Membuat halaman List, Create, Edit, View, dan Delete otomatis dari deklarasi Resource PHP sederhana.
4. **Manggala Suite Native Integration**: Terhubung secara native dengan `@manggala/laravel-datatable`, `@manggala/laravel-dashboard-builder`, `@manggala/laravel-spotlight`, `@manggala/laravel-settings`, `@manggala/sentinel`, dan `@manggala/laravel-status-page`.
5. **Dukungan 4 Versi Major Laravel**: 100% kompatibel dengan Laravel **^10.0 || ^11.0 || ^12.0 || ^13.0** dan PHP **^8.2 || ^8.3 || ^8.4**.

---

## 📋 Matriks Kompatibilitas Framework & Stack

| Parameter | Dukungan Versi & Framework |
|---|---|
| **Package Name** | `manggala/universal-panel` (Folder: `universal-panel`) |
| **PHP Version** | `^8.2 || ^8.3 || ^8.4` |
| **Laravel Framework (4 Major Versions)** | `^10.0 || ^11.0 || ^12.0 || ^13.0` |
| **Frontend Stack Support** | Blade Views, Livewire (v2/v3), Inertia React, Inertia Vue, REST API |
| **Sidebar Layout Width** | 160px - 180px (Expanded Slim) / 36px (Collapsed Icon Mode) |
| **Testing Engine** | Pest PHP (`pestphp/pest`) |
| **Static Analysis** | PHPStan Level 5+ (`larastan/larastan`) |

---

## 📦 Instalasi

Pasang package menggunakan Composer:

```bash
composer require manggala/universal-panel
```

Jalankan perintah instalasi otomatis untuk mempublikasikan file konfigurasi dan Service Provider:

```bash
php artisan panel:install
```

---

## 📐 Tata Letak WordPress-Inspired Sidebar (160px Width)

Sidebar `manggala/universal-panel` dirancang khusus dengan ergonomi khas WordPress:

- **Lebar Ringkas (160px - 180px)**: Tidak menyita ruang horizontal layar monitor.
- **Active Menu Highlight**: Indikator menu aktif berwarna biru tegas (`bg-sky-600` / `#2271b1`) dengan panah penunjuk.
- **Submenu Flyout & Accordion**: Menu bertingkat yang rapi (misal: *Posts -> All Posts, Add New, Categories, Tags*).
- **Mode Collapse (36px)**: Tombol *Collapse menu* di bagian bawah untuk melipat sidebar menjadi mode ikon saja.

---

## 🚀 Mendefinisikan Resource CRUD

Buat kelas Resource baru di `app/Panel/Resources/UserResource.php`:

```php
namespace App\Panel\Resources;

use Manggala\UniversalPanel\Resources\Resource;
use App\Models\User;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'User';
    protected static ?string $navigationGroup = 'User Management';

    public static function table(): array
    {
        return [
            'name' => 'Name',
            'email' => 'Email Address',
            'created_at' => 'Created At',
        ];
    }
}
```

---

## 🖥️ Mengatur Stack Frontend (`config/universal-panel.php`)

Anda dapat memilih stack frontend yang akan digunakan untuk rendering panel:

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
        'collapsed_width' => '36px',
        'theme' => 'dark-slate',
    ],
];
```

---

## 🛠️ Perintah Artisan (Artisan Commands)

### 1. Memasang Package
```bash
php artisan panel:install
```

### 2. Membuat Resource Baru
```bash
php artisan make:panel-resource PostResource
```

### 3. Menampilkan Ringkasan Panel
```bash
php artisan panel:info
```

---

## 📖 Penggunaan Facade `Panel`

Anda dapat berinteraksi secara programatis menggunakan Facade `Panel`:

```php
use Manggala\UniversalPanel\Facades\Panel;

// Mendapatkan daftar resource terdaftar
$resources = Panel::getResources();

// Memeriksa stack aktif
$stack = Panel::getStack();
```

---

## 🔗 Integrasi Manggala Suite

`manggala/universal-panel` terintegrasi secara native dengan seluruh package Manggala Suite:

- ⚡ **`manggala/laravel-spotlight`**: Ketik `Cmd+K` untuk langsung mencari resource dan menavigasi menu admin.
- 📋 **`manggala/laravel-datatable`**: Menggunakan komponen data table reaktif untuk halaman indeks resource.
- 🧱 **`manggala/laravel-dashboard-builder`**: Menyediakan canvas widget di halaman Dashboard utama.
- 🛡️ **`manggala/sentinel`**: Memproteksi seluruh route `/admin/*` dari serangan SQLi, XSS, dan Brute Force.
- ⚙️ **`manggala/laravel-settings`**: Mengendalikan pengaturan admin panel secara terpusat.
- 📊 **`manggala/laravel-status-page`**: Menampilkan indikator kesehatan sistem pada header panel.

---

## 🧪 Pengujian (Testing)

Jalankan pengujian otomatis menggunakan Pest PHP:

```bash
vendor/bin/pest
```

Jalankan analisis statis menggunakan PHPStan:

```bash
vendor/bin/phpstan analyse src --memory-limit=512M
```

---

## 🤝 Kontribusi

Silakan baca [CONTRIBUTING.md](CONTRIBUTING.md) untuk panduan berkontribusi pada proyek ini.

---

## 🔒 Kebijakan Keamanan

Jika Anda menemukan kerentanan keamanan pada package ini, mohon laporkan melalui email ke `ilhamhattamanggala123@gmail.com` sesuai dengan petunjuk pada [SECURITY.md](SECURITY.md).

---

## 📄 Lisensi

Package `manggala/universal-panel` dirilis di bawah [Lisensi MIT](LICENSE). Copyright (c) 2026 Ilham Hatta Manggala.

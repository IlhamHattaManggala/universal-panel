# Changelog - `manggala/universal-panel` (`universal-panel`)

All notable changes to `manggala/universal-panel` (`universal-panel`) will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [v1.0.0] - 2026-08-09

### Added
- 🛠️ **27 Artisan CLI Generator & Management Commands**:
  - Setup & Maintenance: `universal-panel:install`, `universal-panel:doctor`, `make:panel-user`, `universal-panel:optimize`, `universal-panel:clear-cache`.
  - Component Generators: `make:panel-resource` (`--generate` for auto Model & Migration), `make:role` (single or multi-role), `make:permission-panel`, `make:panel-form`, `make:panel-field`, `make:panel-page`, `make:panel-setting`.
  - Interactive Features: `make:panel-action`, `make:panel-filter`, `make:panel-column`, `make:panel-notification`, `make:panel-step`, `make:panel-relation-manager`.
  - Data & Tasks: `make:panel-exporter`, `make:panel-importer`, `make:panel-command`.
  - Architecture & Extension: `make:panel-policy`, `make:panel-theme`, `make:panel-cluster`, `make:panel-plugin`, `make:panel-tenant`, `make:panel-widget`.
- 🏢 **Multi-Panel Builder & Dynamic Role Routing**:
  - Register multiple panel instances fluently (`Panel::make('superadmin')->path('superadmin')->role('Superadmin')`).
  - Auto-redirect Superadmin users to `/superadmin` and Admin users to `/admin`.
- 🔑 **Full Authentication Suite**:
  - Dedicated views & controllers for **Sign In** (`/admin/login`), **Register Admin** (`/admin/register`), **Forgot Password** (`/admin/forgot-password`), **Reset Password** (`/admin/reset-password`), and **Sign Out** (`/admin/logout`).
- 🛡️ **Permission Management Matrix GUI (`/admin/permissions`)**:
  - Visual role-based access control matrix with checkboxes for module permissions (*Posts, Pages, Media, Users, Security, Settings*).
- ⌨️ **100% Dynamic Spotlight Quick Search (`Cmd+K` / `Ctrl+K`)**:
  - Instant Raycast-style search modal auto-discovering registered CRUD resources and system pages with clean SVG icons (Zero Third-Party Dependency).
- 🩺 **System Diagnostics Command (`universal-panel:doctor`)**: Automated diagnostic checks for PHP 8.4+, PDO, Mbstring, and Vite asset compilation.
- 📐 **WordPress-Inspired Ergonomic Sidebar (160px / 52px Collapsed)**:
  - 160px slim width & 52px collapsed icon mode with zero icon clipping.
  - Section Group Labels (`MAIN`, `CONTENT`, `USER MANAGEMENT`, `SYSTEM`).
  - Interactive Accordion Submenus with smooth chevron toggles.
  - `.no-scrollbar` Visually hidden scrollbar for a clean, minimal aesthetic while preserving 100% mouse wheel / trackpad scrolling.
  - Fixed sidebar height (`calc(100vh - 2.75rem)`).
- ☀️ **Light Mode & 🌙 Dark Mode Sync**: Instant color scheme toggling with `localStorage` state persistence.
- 📊 **Interactive Dashboard & Data Tables**: 4 Stat Cards, status pills (*Active*, *Pending*, *Blocked*), filters, search `Cmd+K`, export CSV/Excel, row actions (👁️ View, ✏️ Edit, 🗑️ Delete), and pagination.
- 📄 **16 Dedicated Content Pages**: Sub-routes `/admin/analytics`, `/admin/posts`, `/admin/media`, `/admin/users`, `/admin/security`, `/admin/settings`, `/admin/profile`, etc.
- 🚀 **Universal Multi-Stack Support**: Native renderer adapters for **Blade Views, Livewire v2/v3, Inertia React, Inertia Vue v2/v3, and REST API**. Default stack set to `'blade'`.
- 🚀 **Multi-Version Framework Support**: Native support for PHP `^8.2 || ^8.3 || ^8.4` and Laravel `^10.0 || ^11.0 || ^12.0 || ^13.0`.

---

## Technical Specifications Breakdown

### 1. Panel Manager & Resource Builder
- **`Manggala\UniversalPanel\Panel`**: Core panel configuration & builder instance.
- **`Manggala\UniversalPanel\PanelManager`**: Multi-panel registry & multi-stack response renderer dispatcher.
- **`Manggala\UniversalPanel\Resources\Resource`**: Base class for defining resources.

### 2. Multi-Stack Renderer Adapters
- **Blade Adapter**: Renders responsive Tailwind Blade views out of the box with zero setup.
- **Livewire Adapter**: Renders reactive Livewire v2/v3 components.
- **Inertia React Adapter**: Renders TypeScript React page components.
- **Inertia Vue Adapter**: Renders Vue 3 Single File Components.
- **REST API Adapter**: Renders JSON responses for headless applications.

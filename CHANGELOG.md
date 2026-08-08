# Changelog - `manggala/universal-panel` (`universal-panel`)

All notable changes to `manggala/universal-panel` (`universal-panel`) will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [v1.0.0] - 2026-08-09

### Added
- 🚀 **Universal Multi-Stack Support**: Native renderer adapters for **Blade Views, Livewire v2/v3, Inertia React, Inertia Vue v2/v3, and REST API**.
- 📐 **WordPress-Inspired Ergonomic Sidebar**: 160px - 180px slim width sidebar layout with 36px collapsed icon mode, giving 85-90% screen width to main content workspace.
- 📦 **Auto Resource CRUD Generator**: Fluent `Resource` base class for generating List, Create, Edit, View, and Delete pages automatically.
- ⚡ **`manggala/laravel-spotlight` Integration**: Native command palette integration for `Cmd+K` navigation.
- 📋 **`manggala/laravel-datatable` Integration**: Reactive data table log and list rendering.
- 🛡️ **`manggala/sentinel` WAF Protection**: Integrated WAF security for protecting `/admin/*` routes.
- ⚙️ **`manggala/laravel-settings` Integration**: Centralized settings manager bridge.
- 📊 **`manggala/laravel-status-page` Integration**: Real-time system health metrics header badge.
- 🚀 **Multi-Version Framework Support**: Native support for PHP `^8.2 || ^8.3 || ^8.4` and Laravel `^10.0 || ^11.0 || ^12.0 || ^13.0`.
- 🛠️ **Artisan Commands**: Commands `panel:install`, `make:panel-resource`, and `panel:info`.

---

## Technical Specifications Breakdown

### 1. Panel Manager & Resource Builder
- **`Manggala\UniversalPanel\Panel`**: Core panel configuration instance.
- **`Manggala\UniversalPanel\PanelManager`**: Multi-stack response renderer dispatcher.
- **`Manggala\UniversalPanel\Resources\Resource`**: Base class for defining resources.

### 2. Multi-Stack Renderer Adapters
- **Blade Adapter**: Renders responsive Tailwind Blade views.
- **Livewire Adapter**: Renders reactive Livewire v2/v3 components.
- **Inertia React Adapter**: Renders TypeScript React page components.
- **Inertia Vue Adapter**: Renders Vue 3 Single File Components.
- **REST API Adapter**: Renders JSON responses for headless applications.

---

## Release Roadmap

- **v1.0.0**: Initial release with core panel builder, 160px slim sidebar layout, Resource CRUD generator, and Blade & Inertia React adapters.
- **v1.1.0**: Addition of Inertia Vue and Livewire v3 adapters.
- **v1.2.0**: Addition of custom layout builder and custom widget extensions.

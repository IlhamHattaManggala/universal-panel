# Contributing to `manggala/universal-panel` (`universal-panel`)

Thank you for considering contributing to **`manggala/universal-panel`**! As part of the Manggala Suite ecosystem, we welcome contributions from developers of all skill levels to improve the performance, UI ergonomics, and accessibility of this package.

---

## 1. Code of Conduct

By participating in this project, you agree to abide by our [Code of Conduct](CODE_OF_CONDUCT.md). Please report any unacceptable behavior to `ilhamhattamanggala123@gmail.com`.

---

## 2. Development & Workflow Setup

### 2.1. Fork & Clone Repository
1. Fork the repository on GitHub: `https://github.com/IlhamHattaManggala/universal-panel`.
2. Clone your forked repository locally:
   ```bash
   git clone https://github.com/YOUR_USERNAME/universal-panel.git
   cd universal-panel
   ```

### 2.2. Install Dependencies
Install PHP dependencies via Composer:
```bash
composer install
```

Install Node.js dependencies for the UI components:
```bash
npm install
```

---

## 3. Coding Standards & Guidelines

All contributions must follow the established standards of the Manggala Suite:

### 3.1. PHP Standards & Formatting
- All PHP code must comply with PSR-12 coding standards.
- Run **Laravel Pint** before submitting a Pull Request to format all PHP files:
  ```bash
  vendor/bin/pint
  ```

### 3.2. Strict Typing & PHPStan Level 5+
- Use `declare(strict_types=1);` in all PHP files.
- Provide explicit parameter type hints, return type hints, and PHPDoc annotations.
- All code in `src/` must pass **PHPStan Level 5+** analysis without any errors:
  ```bash
  vendor/bin/phpstan analyse src --memory-limit=512M
  ```

### 3.3. Framework Version Compatibility
- `composer.json` must preserve support for **PHP `^8.2 || ^8.3 || ^8.4`** and the **4 latest major versions of Laravel (`^10.0 || ^11.0 || ^12.0 || ^13.0`)**.

---

## 4. Testing Requirements

We enforce test-driven development (TDD). Every new feature, bug fix, or renderer adapter must include automated unit or feature tests written in **Pest PHP**.

### 4.1. Running Pest Tests
Run the entire Pest test suite:
```bash
vendor/bin/pest
```

---

## 5. Pull Request (PR) Submission Checklist

Before submitting a Pull Request, please ensure the following:

- [ ] All unit and feature tests pass (`vendor/bin/pest`).
- [ ] Code complies with PHPStan Level 5+ (`vendor/bin/phpstan analyse src`).
- [ ] Code is formatted cleanly (`vendor/bin/pint`).
- [ ] TypeScript check passes without errors (`npx tsc --noEmit`).
- [ ] Documentation has been updated to reflect any new features or API changes.
- [ ] Git commit messages follow the Conventional Commits format (e.g., `feat(panel): add 160px sidebar layout`).

---

## 6. Security Vulnerabilities

If you discover a security vulnerability, please do NOT create a public issue. Refer to our [SECURITY.md](SECURITY.md) policy and email `ilhamhattamanggala123@gmail.com` directly.

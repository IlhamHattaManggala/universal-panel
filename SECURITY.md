# Security Policy - `manggala/universal-panel` (`universal-panel`)

Security is a foundational pillar of **`manggala/universal-panel`**. As an admin panel and resource builder framework for Laravel applications, we take security reports extremely seriously.

---

## 1. Supported Versions

We provide security updates and patches for the following supported versions of `manggala/universal-panel`:

| Package Version | Supported Status | Recommended Action |
|---|---|---|
| **v1.x** | 🟢 Supported | Current Active Release |
| **< 1.0** | 🔴 End of Life | Upgrade to v1.0.0+ |

---

## 2. Reporting a Vulnerability

If you discover a security vulnerability, flaw, or authorization bypass mechanism within `manggala/universal-panel`, please follow our responsible disclosure process:

### 2.1. Responsible Disclosure Process
- **Do NOT open a public GitHub issue** for security vulnerabilities.
- Send an email immediately to the project maintainer:
  **Email**: `ilhamhattamanggala123@gmail.com`
- Include the following details in your report:
  1. Description of the vulnerability or authorization bypass mechanism.
  2. Proof of Concept (PoC) code or steps to reproduce the issue.
  3. Affected component (e.g., `ResourceController`, `UniversalPanelMiddleware`).
  4. Suggested fix or remediation if available.

### 2.2. Response Timeline
- **Acknowledgement**: Within 24 hours of receiving your report.
- **Triage & Assessment**: Within 48 hours to confirm the flaw and determine severity.
- **Patch & Release**: An emergency hotfix patch (e.g., `v1.0.1`) will be issued within 72 hours of confirmation.

---

## 3. Threat Model & Security Scope

`manggala/universal-panel` manages administrative routes and resources.

### In Scope for Vulnerability Reports:
- **Authorization Bypass**: Methods that allow non-admin users to access `/admin` or execute CRUD actions on restricted Resources.
- **CSRF / XSS in Panel UI**: Cross-Site Request Forgery or Cross-Site Scripting flaws in the panel layout or resource tables.
- **SQL Injection in Resource Queries**: Query injection flaws in resource filters or search parameters.

### Out of Scope:
- Attacks requiring root / SSH access to the underlying web server hosting the application.
- Social engineering or phishing attacks against application administrators.

---

## 4. Best Practices for Developers Deploying `manggala/universal-panel`

1. **Protect Panel Middleware**: Ensure `config('universal-panel.middleware')` includes strict authentication (`auth`).
2. **Integrate Sentinel WAF**: Enable `@manggala/sentinel` on all admin routes.
3. **Use Environment Variables**: Never hardcode sensitive credentials in source code.

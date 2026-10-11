# 🚀 Talisha Software — Enterprise Web Platform & CMS

<p align="center">
  <img src="public/img/logo_official_dark.png" alt="Talisha Software Logo" width="320" style="max-width: 100%;">
</p>

<p align="center">
  <strong>Agentic AI Solutions · Sovereign Enterprise Software · Web3 & IoT Engineering</strong>
</p>

<p align="center">
  <a href="https://talisha-software.vercel.app"><img src="https://img.shields.io/badge/Production-Live-success?style=flat-square&logo=vercel" alt="Vercel Production"></a>
  <a href="https://laravel.com"><img src="https://img.shields.io/badge/Framework-Laravel%2013-red?style=flat-square&logo=laravel" alt="Laravel"></a>
  <a href="https://php.net"><img src="https://img.shields.io/badge/PHP-8.4-blue?style=flat-square&logo=php" alt="PHP"></a>
  <a href="tests"><img src="https://img.shields.io/badge/Tests-15%20Passed%20%7C%20109%20Assertions-brightgreen?style=flat-square" alt="Tests"></a>
  <a href="LICENSE"><img src="https://img.shields.io/badge/License-Proprietary-orange?style=flat-square" alt="License"></a>
</p>

---

## 🌟 Overview

This repository contains the complete web application and administrative CMS for **Talisha Software Private Limited**, an elite engineering studio operating across India (Durgapur, Kolkata, Bengaluru, Pune, Gujarat). 

The platform features a high-impact, custom **Obsidian Precision Dark UI** design system completely free of generic AI-template aesthetics, accompanied by an administrative content management system (CMS) with full CRUD support for leads, articles, team rosters, partners, careers, testimonials, and global configuration.

- **Live URL:** [https://talisha-software.vercel.app](https://talisha-software.vercel.app)
- **Official Domain:** [https://talishasoftware.tech](https://talishasoftware.tech)
- **Documentation:** See [`documentation.md`](documentation.md) for the complete architectural specification.

---

## 💎 Core Highlights

- **Bespoke Design System:** Solid `#11131a` obsidian surfaces, physical depth borders (`#1e2230`), and human-crafted typography (`Plus Jakarta Sans` & `Outfit`).
- **No Glassmorphism:** Zero blurry frosted-glass cards or semi-transparent backgrounds.
- **Architectural Mobile Menu:** Custom 2×2 rounded box grid toggle with signature orange active pip (`#ff7a1a`).
- **Official Employee ID Card System:** High-definition physical ID cards with dynamic photo frames and cleaned background dot-matrix waveforms.
- **Complete Admin CMS:**
  - 📥 **Leads CRM:** Track consultation requests and contact inquiries.
  - 📰 **Articles & Insights:** Full publishing system with SEO slugs and categorization.
  - 👥 **Team Management:** Ordered ID roster with preserved seeded portraits.
  - 🤝 **Partners Showcase:** Dynamic partner logo management.
  - 💼 **Careers Portal:** Open position listings and applicant management.
  - ⚙️ **System Settings:** Centralized configuration for branding, contact info, and socials.
- **Automated Test Coverage:** 15 feature tests with 109 assertions covering all public lead capture and administrative operations.

---

## 🛠️ Tech Stack

| Component | Technology |
|---|---|
| **Backend Framework** | Laravel 12/13 (PHP 8.4) |
| **Frontend Templates** | Laravel Blade with semantic HTML5 |
| **Styling & Design System** | Pure Vanilla CSS (Tokens, Responsive Grid, Obsidian System) |
| **Database** | SQLite (Production serverless) / MySQL 8.0 support |
| **Hosting & CI/CD** | Vercel Serverless PHP (`vercel-php@0.7.4`) |
| **Automated Testing** | PHPUnit / Pest Feature Tests |

---

## 🚀 Quick Start (Local Development)

### Prerequisites
- PHP 8.2 or higher (PHP 8.4 recommended)
- Composer 2.x
- Git

### Installation Steps

1. **Clone the repository:**
   ```bash
   git clone https://github.com/Mrinmoypatratint/talisha-software.git
   cd talisha-software
   ```

2. **Install Composer dependencies:**
   ```bash
   composer install
   ```

3. **Configure Environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Initialize Database & Seed Data:**
   ```bash
   php artisan migrate --seed
   ```

5. **Start Development Server:**
   ```bash
   php artisan serve --port=8000
   ```
   Open your browser at `http://127.0.0.1:8000`.

---

## 🧪 Running Tests

The test suite validates all public inquiry capture endpoints and administrative CRUD operations:

```bash
php artisan test
```

Expected output:
```
PASS  Tests\Feature\AdminCrudTest
✓ guest cannot access admin routes
✓ authenticated admin can view dashboard
✓ public user can submit contact lead
✓ admin can view leads and update status
✓ admin can delete lead
✓ admin can create and publish article
✓ admin can update article
✓ admin can delete article
✓ admin can create team member
✓ admin can update team member without losing photo
✓ admin can delete team member
✓ admin can create partner
✓ admin can update partner
✓ admin can create and update career
✓ admin can update settings

Tests:    15 passed (109 assertions)
Duration: ~1.4s
```

---

## 📦 Deployment to Vercel

The application is optimized for Vercel Serverless deployments using the configuration in `vercel.json`.

To deploy changes directly:
```bash
npx vercel --prod --yes
```

---

## 👥 Official Team Hierarchy

1. **Abir Ghosh** — *Founder & CEO*
2. **Pijush Pal** — *Co-Founder & CTO*
3. **Mrinmoy Patra** — *Lead Software Architect*
4. **Shreya Sarkar** — *UI/UX & Brand Director*
5. **Mantaar Singh** — *Senior AI Researcher*
6. **Krishiv Dutta** — *Full-Stack Engineer*

---

## 📄 License & Rights

Copyright © 2024–2026 **Talisha Software Private Limited**. All rights reserved.
Proprietary software; unauthorized reproduction or distribution is strictly prohibited.

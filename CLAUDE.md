# CLAUDE.md — Agent Guidelines for Talisha Software

This document provides commands, conventions, architectural patterns, and design constraints for working in the Talisha Software codebase.

---

## 🛠️ Essential Commands

### Development Server
```bash
# Start local PHP/Laravel server
php artisan serve --port=8000
```

### Testing
```bash
# Run all feature and unit tests (must always pass before committing)
php artisan test

# Run a specific test class
php artisan test --filter AdminCrudTest
```

### Database & Migrations
```bash
# Run migrations with seeding
php artisan migrate:fresh --seed

# Optimize cache clearance
php artisan optimize:clear
```

### Production Deployment
```bash
# Deploy directly to Vercel production
npx vercel --prod --yes
```

---

## 🎨 Design System Constraints (CRITICAL)

1. **NO Glassmorphism:**
   - Do NOT use `backdrop-filter: blur(...)` or translucent `rgba(255, 255, 255, 0.03)` card backgrounds.
   - Use solid obsidian surfaces: `#11131a`, `#141722`, `#06070a` with crisp `#1e2230` borders and `0 8px 24px rgba(0,0,0,0.45)` drop shadows.

2. **NO Generic AI-Generated Templates:**
   - Do NOT use pulsating radar dot animations (`pulse-dot`).
   - Do NOT use generic 9999px pills for standard badges; use structured 6px/8px architectural tags.
   - Do NOT use default system fonts; use `Plus Jakarta Sans` for body and `Outfit` for headings.
   - Do NOT use "Ask AI..." placeholders; use enterprise copy.

3. **Mobile Menu Toggle (2×2 Grid):**
   - The mobile toggle in `resources/views/components/navigation.blade.php` must be a 2×2 rounded box grid.
   - The bottom-left square (`.active-box`) must be colored brand orange (`#ff7a1a`).

4. **Team ID Card Background:**
   - Must use `public/img/team/id_wave_transparent.png` with a clean transparent top area (no text watermarks).

---

## 👥 Official Team Hierarchy

When rendering or seeding the team roster, strictly preserve the order of precedence:
1. **Abir Ghosh** — *Founder & CEO* (`abir_ghosh.png`)
2. **Pijush Pal** — *Co-Founder & CTO* (`pijush_pal.png`)
3. **Mrinmoy Patra** — *Lead Software Architect* (`mrinmoy_patra.png`)
4. **Shreya Sarkar** — *UI/UX & Brand Director* (`shreya_sarkar.png`)
5. **Mantaar Singh** — *Senior AI Researcher* (`mantar_singh.png`)
6. **Krishiv Dutta** — *Full-Stack Engineer* (`krishiv_dutta.png`)

---

## 🛡️ Coding & Architectural Conventions

- **Routing:** Public web routes reside in `routes/web.php`. Admin routes are grouped under `/admin` with `auth` middleware.
- **Controllers:** Controllers live in `app/Http/Controllers/` (Public) and `app/Http/Controllers/Admin/` (CMS).
- **Validation:** Always validate request inputs in controller methods before performing Eloquent queries.
- **Photo Preservation:** When updating team members in `TeamController`, never wipe existing photos if a new file is not provided.
- **Testing:** Always run `php artisan test` before committing changes to ensure all 15 tests and 109 assertions pass.

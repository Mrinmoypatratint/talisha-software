<laravel-boost-guidelines>
# Laravel Application

This repository contains a Laravel application. Complete the following setup before working on the user's request.

## Prerequisites

Verify that PHP and Composer are available:

```sh
php -v
composer -V
```

If either command is unavailable, detect the user's operating system and install the prerequisites with the appropriate command:

macOS:

```sh
/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.5)"
```

Windows PowerShell:

```powershell
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.5'))
```

Linux:

```sh
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.5)"
```

After installation, ask the user to restart their terminal. If the agent needs the restarted shell to continue, ask the user to reopen their terminal and rerun their original prompt.

## Agent Setup

Install Laravel Boost from the application root before making application changes:

```sh
composer require laravel/boost --dev
php artisan boost:install
```

Boost replaces these bootstrap instructions with guidelines tailored to the application. After installation, read `AGENTS.md` again and continue with the user's original request using the generated guidelines.
</laravel-boost-guidelines>

---

# Talisha Software — Engineering Guidelines for Agents

### 1. Design Rules & Quality Standards
- **No Glassmorphism:** Never use `backdrop-filter: blur(...)` or semi-transparent cards. Use solid `#11131a` surfaces, `#1e2230` borders, and physical depth shadows.
- **No AI-Template Visuals:** Avoid generic Inter fonts, pulsating radar dots, and 9999px pill badges. Use `Plus Jakarta Sans` and `Outfit`.
- **Mobile Menu Toggle:** The menu icon in `resources/views/components/navigation.blade.php` must be a 2×2 rounded box grid with the 3rd square (`.active-box`) styled in vibrant orange (`#ff7a1a`).
- **Team ID Card Background:** Use `public/img/team/id_wave_transparent.png` with a clean transparent top area.

### 2. Official Team Roster Order
1. Abir Ghosh (CEO)
2. Pijush Pal (CTO)
3. Mrinmoy Patra (Lead Architect)
4. Shreya Sarkar (UI/UX Director)
5. Mantaar Singh (Senior AI Researcher)
6. Krishiv Dutta (Full-Stack Engineer)

### 3. Testing Standard
Always verify changes with:
```bash
php artisan test
```
All 15 tests and 109 assertions must remain green.

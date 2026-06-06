# Real del Mar — Landing Page

## Overview
Landing page for the **Real del Mar** project in Rosarito, Baja California, Mexico. Client: Ricardo (same client as Bolt Media). Separate project from Bolt, but built on the same stack.

## Stack
- **Backend**: Laravel 13 (PHP 8.3+), Blade templates
- **CSS**: TailwindCSS v4 (via `@tailwindcss/vite`), `@tailwindcss/forms`
- **JS**: Alpine.js v3 (+ `@alpinejs/collapse`), Three.js for 3D/visual flair
- **Build**: Vite 8 + `laravel-vite-plugin`

## Project Structure
- Repo root is the Laravel app: `~/Documents/ricardo/real-del-mar/app`
- GitHub: `martoast/real-del-mar-app` (private)
- Sibling project for reference: Bolt Media at `~/Documents/ricardo/bolt/app` (same stack & conventions)

## Setup
```bash
composer install
npm install
cp .env.example .env && php artisan key:generate   # already done locally
composer run dev    # serves app + queue + vite together
```

## Conventions
- Alpine is bootstrapped in `resources/js/app.js` (`Alpine.plugin(collapse)`, `window.Alpine`, `Alpine.start()`)
- Tailwind v4 CSS-first config lives in `resources/css/app.css` (`@theme`, `@plugin`, `@source`)
- Three.js scenes go in their own modules under `resources/js/` and get imported from `app.js` (see bolt's `hero-bg.js` for the pattern)

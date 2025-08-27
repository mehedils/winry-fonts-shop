# Bongolekhon Web

A Laravel + Filament powered Bangla font marketplace prototype. It includes a modern frontend (Blade + Tailwind) and an admin panel (Filament) to manage fonts and contributors (designers/developers). Frontend supports live type testing and Bangla glyph previews.

## Tech Stack
- Laravel 10, PHP 8.2
- Filament Admin (v3)
- Blade, Tailwind via Vite

## Features
- Public pages: Home, Fonts listing, Font details with Type Tester and Glyph Preview
- Database-backed fonts with uploads:
  - Download package (ZIP)
  - Preview font file (TTF/OTF) used in type tester and cards
- Contributors with roles (designer/developer) and social links
- Filament admin resources for Fonts and Contributors

## Getting Started
1) Install dependencies
```bash
composer install
npm install
```

2) Env and key
```bash
cp .env.example .env
php artisan key:generate
```

3) Database & storage
```bash
php artisan migrate
php artisan storage:link
```

4) Build assets (dev)
```bash
npm run dev
# or production
npm run build
```

5) Run app
```bash
php artisan serve
```
Visit http://127.0.0.1:8000

## Admin (Filament)
Create an admin user and log in at /admin
```bash
php artisan make:filament-user
# follow prompts (name, email, password)
```

### Managing Fonts
- Admin → Fonts → Create
- Fill "Font Info"
- Upload files under "Font Files":
  - Download Package (ZIP) – what users download
  - Font File (TTF/OTF) – used by frontend for previews and type tester
- Select Designers and Developers (must be created first under Contributors)

### Managing Contributors
- Admin → Contributors → Create
- Set name, (optional) photo and social links
- Toggle roles: Designer and/or Developer

## Frontend
- Home: highlights featured fonts
- Fonts: filtering, sorting, pagination
- Font Details:
  - Type Tester (size, weight, bold, italic, alignment)
  - Glyph Preview (basic letters, marks, complex conjuncts)

Notes
- Font cards and detail pages auto-load the uploaded TTF/OTF via @font-face from storage.
- If previews don’t render, verify the font’s TTF/OTF exists (storage), and storage link is active.

## License
This project is licensed for Non-Commercial use only. You may use, modify, and share it for personal or educational purposes, but any commercial use is prohibited. See the LICENSE file for full terms.
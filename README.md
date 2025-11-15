
# FTC—Parking App

![PHP CI](https://github.com/Yabets-art/FTC--parking-app/actions/workflows/ci-php.yml/badge.svg)
![Flutter CI](https://github.com/Yabets-art/FTC--parking-app/actions/workflows/ci-flutter.yml/badge.svg)

A full-stack parking management application consisting of a Laravel backend (API + admin panel) and a Flutter mobile/web frontend. This repository contains both backend and frontend code and is structured to make development, testing, and CI straightforward.

## Table of contents
- **Project:** Short project description and goals
- **Tech Stack:** Backend and frontend technologies
- **Repository Structure:** High-level folder layout and purpose
- **Getting Started:** Local setup for backend and frontend
- **Testing & CI:** How tests run locally and in GitHub Actions
- **Deployment:** Notes and recommendations for production
- **Contributing:** How to contribute
- **License & Contact:** Licensing and author information

## Project

FTC—Parking App is a system to manage parking spaces, reservations, and administrative approvals. The backend provides REST endpoints and an admin UI; the frontend is a Flutter application for users to register, reserve, and manage cars.

Primary goals:
- Provide a secure admin panel to manage car spaces, reservations and approvals.
- Offer a responsive Flutter client for users to register vehicles and make reservations.
- Provide CI pipelines for backend tests and frontend analysis/tests.

## Tech Stack
- Backend: PHP 8.x, Laravel framework, Composer-managed dependencies
- Frontend: Flutter (Dart) — mobile & web
- CI: GitHub Actions (PHP / Flutter workflows)
- Database: MySQL / MariaDB (migrations provided)

## Repository structure

- `ParkingBack/parking-app/` — Laravel application (backend + admin UI)
  - `app/` — controllers, models, providers
  - `routes/` — Laravel routes (web, api, console)
  - `database/` — migrations, seeders
  - `public/` — web entrypoint
  - `tests/` — PHPUnit tests
- `ParkingFront/parking_app/` — Flutter client (mobile + web)
  - `lib/` — Dart source files (screens, services)
  - `assets/` — images & media
  - `test/` — Flutter widget/unit tests
- Root files
  - `README.md` — this file
  - `LICENSE` — project license
  - `.gitattributes`, `.gitignore` — repo settings

## Getting started (local development)

Prerequisites (examples):
- PHP 8.1+, Composer
- Node.js + npm (for frontend build tooling if required by Laravel mix/vite)
- MySQL or MariaDB
- Flutter SDK for frontend

Backend (Laravel) quick start:

1. Change into backend folder:
	- `cd "ParkingBack/parking-app"`
2. Copy environment example and update credentials:
	- `cp .env.example .env`
3. Install PHP dependencies:
	- `composer install`
4. Generate app key and run migrations:
	- `php artisan key:generate`
	- `php artisan migrate --seed`
5. Serve locally:
	- `php artisan serve`

Frontend (Flutter) quick start:

1. Change into Flutter app folder:
	- `cd "ParkingFront/parking_app"`
2. Get packages:
	- `flutter pub get`
3. Run on emulator or web:
	- `flutter run` (choose device)

Notes:
- Keep sensitive values (API keys, DB passwords) out of the repo—use `.env`.
- If the backend runs on a separate origin, update `auth_service` or environment values in the Flutter app to point to the API base URL.

## Testing & CI

Backend:
- PHPUnit tests live in `ParkingBack/parking-app/tests/`.
- To run locally: `cd ParkingBack/parking-app && ./vendor/bin/phpunit`.

Frontend:
- Use `flutter test` and `flutter analyze` inside `ParkingFront/parking_app`.

CI (GitHub Actions):
- This repo includes workflows to run backend unit tests and frontend checks on push and PRs. See `.github/workflows/` for definitions.

## Deployment

- Backend: typical Laravel deployment flows (Forge, Vapor, Docker, or VPS + nginx). Ensure environment variables and storage links (`php artisan storage:link`) are handled.
- Frontend: Flutter web can be built with `flutter build web` and deployed to static hosting (Netlify, Firebase Hosting) or packaged as mobile apps for stores.

## Contributing

Thank you for contributing. Please follow these guidelines:
- Fork the repository and create feature branches.
- Run tests locally before opening a PR.
- Keep commits small and focused, use clear messages (e.g., `feat:`, `fix:`, `chore:`).

If you'd like, I can add a `CONTRIBUTING.md` and GitHub templates for PRs and issues.

## License

This project is available under the MIT License. See `LICENSE` for details.

## Contact

Author: Yabets-art

For questions or support, open an issue or contact the repository owner.

---

Last updated: 2025-11-15

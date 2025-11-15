# Contributing to FTC—Parking App

Thanks for your interest in contributing! We welcome bug reports, feature requests, and pull requests. Please follow these guidelines to make it easy to review and merge your changes.

1. Fork the repo and create a feature branch from `main`.
2. Keep changes small and focused — one logical change per PR.
3. Write meaningful commit messages (use `feat:`, `fix:`, `chore:` prefixes).
4. Run tests locally before opening a PR:
   - Backend: `cd ParkingBack/parking-app && composer install && ./vendor/bin/phpunit`
   - Frontend: `cd ParkingFront/parking_app && flutter pub get && flutter test`
5. Open a Pull Request describing the change and linking any relevant issues.

If your change affects public API or database migrations, include a short migration plan in the PR description.

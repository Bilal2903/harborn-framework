<p align="center">
  <a href="https://roots.io/bedrock/">
    <img alt="Bedrock" src="https://cdn.roots.io/app/uploads/logo-bedrock.svg" height="100">
  </a>
</p>

<p align="center">
  <a href="https://packagist.org/packages/roots/bedrock">
    <img alt="Packagist Installs" src="https://img.shields.io/packagist/dt/roots/bedrock?label=projects%20created&colorB=2b3072&colorA=525ddc&style=flat-square">
  </a>

  <a href="https://packagist.org/packages/roots/wordpress">
    <img alt="roots/wordpress Packagist Downloads" src="https://img.shields.io/packagist/dt/roots/wordpress?label=roots%2Fwordpress%20downloads&logo=roots&logoColor=white&colorB=2b3072&colorA=525ddc&style=flat-square">
  </a>

  <img src="https://img.shields.io/badge/dynamic/json.svg?url=https://raw.githubusercontent.com/roots/bedrock/master/composer.json&label=wordpress&logo=roots&logoColor=white&query=$.require[%22roots/wordpress%22]&colorB=2b3072&colorA=525ddc&style=flat-square">

  <a href="https://github.com/roots/bedrock/actions/workflows/ci.yml">
    <img alt="Build Status" src="https://img.shields.io/github/actions/workflow/status/roots/bedrock/ci.yml?branch=master&logo=github&label=CI&style=flat-square">
  </a>

  <a href="https://twitter.com/rootswp">
    <img alt="Follow Roots" src="https://img.shields.io/badge/follow%20@rootswp-1da1f2?logo=twitter&logoColor=ffffff&message=&style=flat-square">
  </a>
</p>

<p align="center">WordPress boilerplate with Composer, easier configuration, and an improved folder structure</p>

<p align="center">
  <a href="https://roots.io/bedrock/">Website</a> &nbsp;&nbsp; <a href="https://roots.io/bedrock/docs/installation/">Documentation</a> &nbsp;&nbsp; <a href="https://github.com/roots/bedrock/releases">Releases</a> &nbsp;&nbsp; <a href="https://discourse.roots.io/">Community</a>
</p>

# Harborn Framework – Sage Starter Framework for Developers

A modern, Docker-based starter kit for WordPress development. Includes automated database import/export, Composer and pnpm support, and a smooth onboarding process for teams.

---

## Quick Start

1. **Clone the repository**
   ```sh
   git clone <your-repo-url>
   cd harborn-framework
   ```
2. **Start Docker (Colima, macOS)**
   > If you use Docker Desktop, you can skip this step. If you do not use Docker Desktop, starting Colima is essential because it provides the Linux environment required for Docker containers on macOS.
   ```sh
   colima start
   ```
3. **Install PHP & JS dependencies**
   In the project root:
   ```sh
   composer install
   ```
   In the theme directory:
   ```sh
   cd web/app/themes/harborn
   composer install
   pnpm install
   cd ../../../..
   ```
4. **Build and start the containers**
   ```sh
   docker-compose up --build
   ```
5. **Import the database**
   Using the default `db.sql`:
   ```sh
   docker-compose exec php-fpm sh ./entrypoint.sh import
   ```
   Or with a custom file:
   ```sh
   docker-compose exec php-fpm sh ./entrypoint.sh import yourfile.sql
   ```
6. **Open the site**
   - WordPress: http://harborn-framework.local.harborn.com
   - phpMyAdmin: http://harborn-framework-phpmyadmin.local.harborn.com

---

## Project Structure
- `docker-compose.yml` — All services (nginx, php-fpm, db, phpmyadmin, proxy)
- `Dockerfile` — PHP-FPM container with WP-CLI and MySQL client
- `entrypoint.sh` — Database import/export script
- `db.sql` — Default database dump
- `wp-cli.yml` — WP-CLI configuration
- `web/` — WordPress core and custom code

---

## Testing

We use [Codeception](https://codeception.com/) for automated testing.

### Acceptance & Unit Tests
- Run all tests:
  ```sh
  vendor/bin/codecept run
  ```
- Only acceptance tests:
  ```sh
  vendor/bin/codecept run acceptance
  ```
- Only unit tests:
  ```sh
  vendor/bin/codecept run unit
  ```
Test results and coverage reports are saved in `tests/_output/`.

### WebDriver for Acceptance Tests
For acceptance tests, you need a local WebDriver (such as ChromeDriver):
```sh
brew install chromedriver
chromedriver --port=9515
```

---

## Linting (Theme)

### PHP Linting
- [Laravel Pint](https://laravel.com/docs/10.x/pint) (for PHP in the theme)
- PHP_CodeSniffer (PHPCS) (for PHP in the project root)

Lint with PHPCS (in the project root):
```sh
composer run phpcs
```

### JavaScript/TypeScript Linting (ESLint)
We use ESLint for JavaScript/TypeScript in the theme directory:
```sh
pnpm run lint
```

> **Tip:** Always run both `composer run phpcs` (PHP) and `pnpm run lint` (JS/TS) locally before committing.

---

## CI/CD

On every commit and pull request, GitHub Actions will automatically run PHP_CodeSniffer and ESLint checks. If any issues are found, the CI will fail and you will see the results in the GitHub UI.

---

## Troubleshooting & Security
- SSL errors during import/export? The entrypoint script manages CA trust for local development.
- `mysqldump` errors? Rebuild the container after Dockerfile changes.
- **Production:** Always use SSL and trusted certificates. Adjust the entrypoint script for production use.

---

For more details, see comments in the files or contact the maintainer.

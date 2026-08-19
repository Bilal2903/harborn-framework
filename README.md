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

## Overview
A modern Docker-based starter framework for WordPress development. Includes automated database import/export, Composer and pnpm support, and a smooth onboarding process for teams.

---

## Quick Start Guide

### 0. Clone the Repository
```sh
git clone <your-repo-url>
cd harborn-framework
```

### 1. Start Docker with Colima (macOS)
```sh
colima start
```

### 2. Install PHP & JS Dependencies
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

### 3. Build and Start the Containers
```sh
docker-compose up --build
```

### 4. Import the Database
If you have a `db.sql` file (or one shared by a teammate):
```sh
docker-compose exec php-fpm sh ./entrypoint.sh import
```
Or for a custom file:
```sh
docker-compose exec php-fpm sh ./entrypoint.sh import yourfile.sql
```

### 5. Access the Site
- WordPress: http://<project-name>.local.harborn.com
- phpMyAdmin: http://<project-name>-phpmyadmin.local.harborn.com:8081

---

## Project Structure
- `docker-compose.yml` — All services (nginx, php-fpm, db, phpmyadmin, proxy)
- `Dockerfile` — PHP-FPM container with WP-CLI and MySQL client
- `entrypoint.sh` — Database import/export script
- `db.sql` — Default database dump
- `wp-cli.yml` — WP-CLI configuration
- `web/` — WordPress core and custom code

## Onboarding New Developers
1. Clone the repo
2. Start Colima
3. Install Composer and pnpm dependencies
4. Start containers
5. Import the database
6. Start developing!

## Troubleshooting
- SSL errors during import/export? The entrypoint script now automatically handles CA trust.
- `mysqldump` errors? Rebuild the container after Dockerfile changes.
- For production: always use SSL and trusted certificates.

## Security Notes
- The entrypoint script manages CA trust for local development only. Do not use this setup in production without adjustments.

---

## Testing with Codeception

We use [Codeception](https://codeception.com/) for automated testing.

### Acceptance & Unit Tests
Run all tests:
```sh
vendor/bin/codecept run
```
Run only acceptance tests:
```sh
vendor/bin/codecept run acceptance
```
Run only unit tests:
```sh
vendor/bin/codecept run unit
```
Test results and coverage reports are saved in the `tests/_output/` directory.

---

## Linting (Theme)

### PHP Linting
- [Laravel Pint](https://laravel.com/docs/10.x/pint)
- PHP_CodeSniffer (PHPCS)

Lint with Pint (in the theme directory):
```sh
cd web/app/themes/harborn
pnpm run pint
```

Lint with PHPCS (in project root):
```sh
composer run phpcs
```

### JavaScript/TypeScript Linting (ESLint)
In the theme directory:
```sh
pnpm run lint
```

> **Tip:** Run both `composer run phpcs` (PHP) and `pnpm run lint` (JS/TS) locally before committing.

### Continuous Integration (CI)
On every commit and pull request, GitHub Actions will automatically run both PHP_CodeSniffer and ESLint checks. If any issues are found, the CI will fail and you will see the results in the GitHub UI.

---
For more details, see comments in each file or contact the project maintainer.


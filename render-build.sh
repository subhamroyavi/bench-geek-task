#!/usr/bin/env bash
# Exit on error
set -o errexit

# Install PHP dependencies
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# Generate app key if not set
if [ -z "$APP_KEY" ]; then
  php artisan key:generate
fi

# Clear and cache config
php artisan config:cache

# Clear and cache routes
php artisan route:cache

# Clear and cache views
php artisan view:cache

# Install node dependencies if you're using frontend assets
# npm ci

# Build assets if you're using them
# npm run production

# Sync database changes if needed
# php artisan migrate --force
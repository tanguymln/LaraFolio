#!/bin/sh
set -e

echo "🔧 Running Laravel setup..."

echo "📦 Installing PHP dependencies with Composer..."
composer install --no-interaction --prefer-dist --optimize-autoloader

echo "🔐 Fixing permissions for Laravel..."
mkdir -p storage/logs bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

echo "🔧 Setting up laravel environment..."
php artisan optimize:clear
if ! grep -q '^APP_KEY=base64:' .env; then
  echo "Generating APP_KEY..."
  php artisan key:generate --force
else
  echo "APP_KEY already set, skipping key generation."
fi
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
[ ! -L public/storage ] && php artisan storage:link

echo "📦 Installing Node modules..."
npm install

echo "🏗️ Building frontend assets..."
npm run build

echo "🚀 Starting PHP-FPM..."
exec php-fpm

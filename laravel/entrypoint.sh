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
php artisan migrate --force
php artisan key:generate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
php artisan optimize:clear

echo "📦 Installing Node modules..."
npm install

echo "🏗️ Building frontend assets..."
npm run build

echo "🚀 Starting PHP-FPM..."
exec php-fpm

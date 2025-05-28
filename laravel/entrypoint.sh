#!/bin/sh
set -e

echo "🔧 Running Laravel setup..."

if [ ! -d vendor ]; then
  echo "📦 Installing PHP dependencies with Composer..."
  composer install --no-interaction --prefer-dist --optimize-autoloader
fi

php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
php artisan optimize:clear

if [ ! -d node_modules ]; then
  echo "📦 Installing Node modules..."
  npm install
fi

echo "🏗️ Building frontend assets..."
npm run build

echo "🚀 Starting PHP-FPM..."
exec php-fpm

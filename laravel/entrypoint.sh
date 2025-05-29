#!/bin/bash
set -e

echo "🔧 Starting Laravel container setup..."

# Installer dépendances PHP si vendor manquant
if [ ! -d vendor ]; then
    echo "📦 Installing PHP dependencies..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
else
    echo "✅ PHP dependencies already installed."
fi

# Installer dépendances Node si node_modules manquant
if [ ! -d node_modules ]; then
    echo "📦 Installing Node dependencies..."
    npm install
else
    echo "✅ Node dependencies already installed."
fi

# Builder front si dossier public/build manquant (à adapter selon ton build)
if [ ! -d public/build ]; then
    echo "🏗 Building frontend assets..."
    npm run build
else
    echo "✅ Frontend already built."
fi

# Fixer permissions (optionnel selon user)
chown -R www-data:www-data storage bootstrap/cache

# Clé APP_KEY
if ! grep -q '^APP_KEY=base64:' .env; then
    echo "🔐 Generating APP_KEY..."
    php artisan key:generate --force
else
    echo "✅ APP_KEY already set."
fi

# Lancer migrations
echo "🚀 Running migrations..."
php artisan migrate --force

# Optimiser cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Créer lien storage si absent
[ ! -L public/storage ] && php artisan storage:link

# Lancer PHP-FPM
echo "🚀 Starting PHP-FPM..."
exec php-fpm

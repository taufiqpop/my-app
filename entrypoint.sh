#!/bin/sh
set -e

echo "Menunggu database tersedia..."
until mysql -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" -e "SELECT 1"; do
    echo "Database belum siap - menunggu..."
    sleep 5
done

echo "Database siap! Jalankan perintah setup..."
if [ ! -d "vendor" ]; then
    composer install
fi

if [ ! -f ".env" ] || ! grep -q "^APP_KEY=" .env; then
    php artisan key:generate
fi

php artisan migrate --force

exec apache2-foreground

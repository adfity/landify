#!/bin/bash
set -e

cd /var/www/html

# Install dependency PHP jika vendor belum ada
if [ ! -d "vendor" ]; then
    echo ">> Menjalankan composer install..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi

# Copy .env jika belum ada
if [ ! -f ".env" ]; then
    echo ">> Membuat file .env dari .env.example..."
    cp .env.example .env
fi

# Generate APP_KEY jika masih kosong
if ! grep -q "^APP_KEY=base64" .env; then
    echo ">> Generate APP_KEY..."
    php artisan key:generate --ansi
fi

# Tunggu MySQL siap sebelum lanjut
echo ">> Menunggu database siap (host=${DB_HOST}, user=${DB_USERNAME}, db=${DB_DATABASE})..."
ATTEMPT=0
until mysql -h"${DB_HOST}" -u"${DB_USERNAME}" -p"${DB_PASSWORD}" -e '\q' 2>/tmp/mysql_wait_error; do
    ATTEMPT=$((ATTEMPT+1))
    echo ">> Percobaan ke-${ATTEMPT}, database belum siap / gagal login. Detail:"
    cat /tmp/mysql_wait_error
    if [ "$ATTEMPT" -ge 15 ]; then
        echo ">> GAGAL: sudah 15 kali percobaan, hentikan. Cek kredensial DB_USERNAME/DB_PASSWORD/DB_DATABASE di .env dan environment service app."
        exit 1
    fi
    sleep 2
done
echo ">> Database siap."

# Set permission storage & cache
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Jalankan migrasi (aman dipanggil berulang kali)
php artisan migrate --force || true

# Buat symlink storage jika belum ada
php artisan storage:link || true

exec php-fpm

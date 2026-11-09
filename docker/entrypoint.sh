#!/bin/bash
set -e

# 1. Atur Port dinamis untuk Render (Render memakai $PORT, default 80 / 10000)
PORT_HTTP="${PORT:-80}"
echo "[Render Docker] Mengatur Apache ke port: $PORT_HTTP..."
sed -i "s/Listen 80/Listen $PORT_HTTP/g" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost \*:$PORT_HTTP>/g" /etc/apache2/sites-available/000-default.conf

# 2. Pastikan struktur direktori storage dan cache tersedia
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/cache/data
mkdir -p /var/www/html/storage/app/public
mkdir -p /var/www/html/bootstrap/cache

# 3. Buat symlink storage publik jika belum ada
echo "[Render Docker] Menjalankan php artisan storage:link..."
php artisan storage:link --force || true

# 4. Dukungan SQLite otomatis jika memakai koneksi sqlite di Render
if [ "${DB_CONNECTION}" = "sqlite" ] || [ -z "${DB_HOST}" ]; then
    echo "[Render Docker] Menyiapkan database SQLite..."
    touch /var/www/html/database/database.sqlite
    chown -R www-data:www-data /var/www/html/database
    chmod -R 775 /var/www/html/database
fi

# 5. Atur permission folder storage dan bootstrap/cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 6. Jalankan migrasi dan seeder database otomatis
echo "[Render Docker] Menjalankan database migration & seeder..."
php artisan migrate --force --seed || true

# 7. Bersihkan & optimasi cache Laravel untuk production
echo "[Render Docker] Mengoptimalkan cache aplikasi..."
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

echo "[Render Docker] Aplikasi siap! Menjalankan Apache di port $PORT_HTTP..."
exec apache2-foreground


# ==========================================
# Dockerfile untuk Laravel 10 di Render
# ==========================================
FROM php:8.2-apache

# 1. Install dependensi sistem Linux
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo \
        pdo_mysql \
        pdo_sqlite \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
        opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 2. Pasang Composer resmi
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 3. Konfigurasi Apache untuk Laravel (public/ folder & rewrite engine)
RUN a2enmod rewrite
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

# 4. Set direktori kerja
WORKDIR /var/www/html

# 5. Salin composer dependencies terlebih dahulu untuk caching layer
COPY composer.json composer.lock ./

# Install dependensi PHP tanpa dev packages
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist --no-interaction

# 6. Salin seluruh source code project
COPY . .

# 7. Generate autoload teroptimasi
RUN composer dump-autoload --optimize --no-dev

# 8. Konfigurasi Entrypoint script
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# 9. Atur kepemilikan folder storage dan bootstrap cache
RUN mkdir -p storage/framework/views storage/framework/sessions storage/framework/cache bootstrap/cache \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 10. Expose port (Render akan menyesuaikan secara dinamis via $PORT)
EXPOSE 80

# Jalankan entrypoint script
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]


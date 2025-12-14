FROM php:8.3-cli

# 1. Install dependencies sistem & Node.js versi TERBARU (v20)
# Kita pakai curl ke nodesource agar dapat versi 20, bukan versi jadul bawaan apt
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libpng-dev \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install zip pdo pdo_mysql

# 2. Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# 3. Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# 4. Install JS dependencies & Build Assets (Vite)
RUN npm install && npm run build

# 5. Fix Permission Storage
RUN chmod -R 775 storage bootstrap/cache

# 6. Command Start (FIXED)
# Menggunakan "sh -c" agar variable $PORT terbaca dengan sempurna
# Sekaligus menjalankan migrasi database otomatis
CMD sh -c "php artisan migrate --force && php artisan storage:link && php artisan serve --host=0.0.0.0 --port=${PORT}"
FROM php:8.3-cli

# Install system deps + Node 20
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libpng-dev \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install zip pdo pdo_mysql

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# PHP deps
RUN composer install --no-dev --optimize-autoloader

# Build Vite assets (INI YANG PENTING)
RUN npm install && npm run build && ls -lah public/build

# Permission
RUN chmod -R 775 storage bootstrap/cache

# Railway pakai PORT 8080
EXPOSE 8080

# START SERVER (JANGAN artisan serve)
CMD php -S 0.0.0.0:8080 -t public

FROM php:8.3-cli

# Install system dependencies + Node
RUN apt-get update && apt-get install -y \
    git unzip curl nodejs npm libzip-dev libpng-dev \
    && docker-php-ext-install zip pdo pdo_mysql

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Install PHP deps
RUN composer install --no-dev --optimize-autoloader

# Install JS deps & build Vite
RUN npm install && npm run build

# Permission
RUN chmod -R 775 storage bootstrap/cache

# Expose Railway port
EXPOSE 8080

# Run PHP built-in server (PRODUCTION SAFE)
CMD sh -c "php -S 0.0.0.0:$PORT -t public"
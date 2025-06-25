FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev sqlite3 libsqlite3-dev

# Enable PHP extensions
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy Laravel files into the container
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Fix folder permissions
RUN chmod -R 775 storage bootstrap/cache

# Copy .env.example to .env so key:generate can run
RUN cp .env.example .env

# Generate Laravel app key
RUN php artisan key:generate

# Clear and cache Laravel configuration
RUN php artisan config:clear && php artisan config:cache


# Expose port 8000 to the web
EXPOSE 8000

# Start Laravel on port 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

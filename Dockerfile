# Base Image: PHP 8.2 with FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# Install Dependencies (common ones, adjust as needed)
#RUN apt-get update && apt-get install -y \
#    libzip-dev zip unzip \
#    libpng-dev \
#    libjpeg62-turbo-dev \
#    libfreetype6-dev \
#    && docker-php-ext-configure gd --with-freetype --with-jpeg \
#    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql zip

# Set Working Directory (for your PHP code)
WORKDIR /var/www/html
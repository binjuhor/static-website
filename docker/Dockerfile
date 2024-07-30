# Add lockfile and package.json
FROM node:20-alpine AS installer
RUN apk add --no-cache libc6-compat
RUN apk update

WORKDIR /app

COPY .gitignore .gitignore
COPY package*.json yarn.lock ./
RUN yarn install

COPY . .
RUN yarn build

# PHP-stage
FROM php:8.2-fpm AS php-stage

# General settings
WORKDIR /var/www/html

ENV LC_ALL=en_US.UTF-8
RUN apt update && \
    apt -y install libicu-dev libonig-dev locales && \
    localedef -f UTF-8 -i en_US en_US.UTF-8 && \
    docker-php-ext-install intl

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath

# X-debug extension
RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

# GD library
#RUN apt -y install libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
#    docker-php-ext-configure gd --with-freetype --with-jpeg && \
#    docker-php-ext-install -j$(nproc) gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Configure PHP.ini
COPY ./docker/php.ini /usr/local/etc/php/php.ini

# Ensure that you also copy the rest of your application files
COPY . .

# Copy the built assets from the Node.js stage
COPY --from=installer /app/resources/assets /var/www/html/resources/assets

# Set appropriate permissions if needed
# RUN chown -R www-data:www-data /var/www/html

# Install PHP dependencies using Composer
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# Final cleaning
RUN apt clean && \
    rm -rf /var/lib/apt/lists/*

# Expose port 9000 and start php-fpm server
EXPOSE 9000

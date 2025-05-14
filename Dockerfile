# FROM node:20 as front-end

# ENV COREPACK_DEFAULT_TO_LATEST=0
# RUN corepack enable pnpm

# WORKDIR /var/www/html
# COPY . .
# RUN if [ -f package.json ]; then \
#     pnpm install && \
#     pnpm run build; fi

FROM php:8.2-fpm-alpine AS php

RUN apk update && apk upgrade && apk add --no-cache \
    git \
    unzip \
    curl \
    libzip-dev \
    zlib-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    icu-dev \
    oniguruma-dev \
    libxml2-dev \
    ca-certificates

RUN docker-php-ext-configure gd --with-freetype --with-jpeg

# Install PHP extensions
RUN docker-php-ext-install -j$(nproc) \
    mbstring \
    intl \
    exif \
    gd \
    xml \
    bcmath

# Install mysqli extension
RUN docker-php-ext-install pdo pdo_mysql zip

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Playwright
RUN npm i -g playwright && playwright install

# Add global Composer bin to PATH
ENV PATH="${PATH}:/root/.composer/vendor/bin"

# Enable Imagick
RUN pecl install imagick && docker-php-ext-enable imagick

# Permissions
RUN chown -R www-data:www-data /var/www/html

# Clean up APT cache (niet nodig voor Alpine, gebruik apk del)
RUN apk del --purge $(apk info --installed | grep "*-dev$") && rm -rf /var/cache/apk/*

WORKDIR /var/www/html
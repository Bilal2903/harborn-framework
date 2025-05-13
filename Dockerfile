# FROM node:20 as front-end

# ENV COREPACK_DEFAULT_TO_LATEST=0
# RUN corepack enable pnpm

# WORKDIR /var/www/html
# COPY . .
# RUN if [ -f package.json ]; then \
#     pnpm install && \
#     pnpm run build; fi

# # Base Image
# FROM php:8.3-fpm

# # Install system dependencies
# RUN apt-get update && apt-get upgrade -y && apt-get install -y \
#     nginx \
#     git \
#     unzip \
#     curl \
#     libzip-dev \
#     libpng-dev \
#     libjpeg-dev \
#     libonig-dev \
#     libxml2-dev \
#     libcurl4-openssl-dev \
#     libicu-dev \
#     libmagickwand-dev \
#     libpq-dev \
#     libfreetype6-dev \
#     ca-certificates \
#     wget \
#     gnupg \
#     software-properties-common \
#     build-essential \
#     libtool \
#     zlib1g-dev \
#     imagemagick \
#     && apt-get clean && rm -rf /var/lib/apt/lists/*

# # Clean up unnecessary files
# RUN rm -rf /path/to/.libs

# # Install PHP extensions
# RUN docker-php-ext-install -j$(nproc) \
#     curl \
#     zip \
#     mbstring \
#     intl \
#     exif \
#     gd \
#     fileinfo \
#     xml \
#     bcmath

# # Enable Imagick
# RUN pecl install imagick && docker-php-ext-enable imagick

# # Install mysqli extension
# RUN docker-php-ext-install mysqli pdo pdo_mysql

# # Install Composer globally
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# # # Install Playwright
# # RUN npm i -g playwright && playwright install

# # Add global Composer bin to PATH
# ENV PATH="${PATH}:/root/.composer/vendor/bin"

# # Create and set working directory
# WORKDIR /var/www/html

# # Permissions
# RUN chown -R www-data:www-data /var/www/html

# # Copy Nginx config (replace with your actual config files if needed)
# COPY bedrock.conf /etc/nginx/conf.d/default.conf

# # Expose ports
# EXPOSE 80

# # Start PHP and Nginx
# CMD ["nginx", "-g", "daemon off;"]

FROM php:8.2-fpm-alpine AS php

RUN apk add --no-cache --update \
    libzip-dev \
    zip

RUN docker-php-ext-install pdo pdo_mysql zip

WORKDIR /var/www/html

# You can add more PHP extensions or configurations here if needed
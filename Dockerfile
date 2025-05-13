FROM node:20 as front-end

ENV COREPACK_DEFAULT_TO_LATEST=0
RUN corepack enable pnpm

WORKDIR /var/www/html
COPY . .
RUN if [ -f package.json ]; then \
    pnpm install && \
    pnpm run build; fi

# Base Image
FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get upgrade -y && apt-get install -y \
    nginx \
    git \
    unzip \
    curl \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    libicu-dev \
    libmagickwand-dev \
    libpq-dev \
    libfreetype6-dev \
    ca-certificates \
    wget \
    gnupg \
    software-properties-common \
    build-essential \
    libtool \
    zlib1g-dev \
    imagemagick \
    default-mysql-client \
    libavif-dev \
    libwebp-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Clean up unnecessary files
RUN rm -rf /path/to/.libs

RUN set -ex; \
    docker-php-ext-configure gd \
        --with-avif \
        --with-freetype \
        --with-jpeg \
        --with-webp \
    ; \
    docker-php-ext-install -j "$(nproc)" \
        bcmath \
        exif \
        gd \
        intl \
        mysqli \
        zip \
    ; \

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy built frontend assets
# COPY --from=front-end /var/www/html/your-build-output /var/www/html/public/

# Create and set working directory
WORKDIR /var/www/html

# Permissions
RUN chown -R www-data:www-data /var/www/html

# Copy Nginx config (replace with your actual config files if needed)
COPY bedrock.conf /etc/nginx/conf.d/default.conf

# Expose ports
EXPOSE 80

# Start PHP and Nginx
CMD ["nginx", "-g", "daemon off;"]
ARG TRAEFIK_VERSION=v2.7
FROM traefik:${TRAEFIK_VERSION} AS traefik

RUN apk add --update libintl && apk add --virtual build_deps gettext
COPY docker-resources/traefik/traefik.yaml.template /etc/traefik/traefik.yaml.template

CMD /bin/sh -c "envsubst < /etc/traefik/traefik.yaml.template > /etc/traefik/traefik.yaml && /usr/local/bin/traefik"

FROM php:8.3-fpm-alpine AS php

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
    ca-certificates \
    mysql-client

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
RUN docker-php-ext-install pdo pdo_mysql mysqli zip

# Copy the composer executable from the official composer image
COPY --from=composer:2.6.6 /usr/bin/composer /usr/bin/composer

# Make the composer executable available in the PATH
ENV PATH="/usr/bin:$PATH"

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add global Composer bin to PATH
ENV PATH="${PATH}:/root/.composer/vendor/bin"

# Install WP-CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
RUN chmod +x wp-cli.phar
RUN mv wp-cli.phar /usr/local/bin/wp

# Verify WP-CLI installation (optional, but good for debugging)
RUN wp --info

# Set PHP upload and post max sizes
COPY docker-resources/upload_max_filesize.ini $PHP_INI_DIR/conf.d/
COPY docker-resources/post_max_size.ini $PHP_INI_DIR/conf.d/

# Permissions
RUN chown -R www-data:www-data /var/www/html

# Clean up APT cache (niet nodig voor Alpine, gebruik apk del)
RUN apk del --purge $(apk info --installed | grep "*-dev$") && rm -rf /var/cache/apk/*

WORKDIR /var/www/html

# Copy your composer.json and composer.lock files
# Copy these before the rest of your application code to leverage Docker's build cache
COPY composer.json composer.lock ./

# Run composer install to install dependencies
# --no-dev: Skips installing require-dev dependencies (good for production)
# --optimize-autoloader: Optimizes the autoloader for faster loading
# --no-scripts: Prevents execution of scripts defined in composer.json during install
RUN composer install --no-dev --optimize-autoloader --no-scripts

EXPOSE 8080

# Start the PHP-FPM server.  This is the correct CMD for this Dockerfile.
ENTRYPOINT ["php-fpm", "-F"]
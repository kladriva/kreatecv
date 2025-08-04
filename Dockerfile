# docker/Dockerfile
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libicu-dev \
    locales \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install intl pdo_mysql mysqli \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www

# Copy application with correct permissions
COPY --chown=www-data:www-data . /var/www

# Copy init permission script
COPY init-perms.sh /usr/local/bin/init-perms.sh
RUN chmod +x /usr/local/bin/init-perms.sh

# Change current user
USER www-data

# Expose port 9000 and run php-fpm with permission fix
EXPOSE 9000
CMD ["/bin/sh", "-c", "/usr/local/bin/init-perms.sh && php-fpm"]

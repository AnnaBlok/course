FROM php:7-apache

# Install Composer
RUN apt-get update && \
    apt-get install -y zip unzip nano vim && \
    curl -sS https://getcomposer.org/installer | php -- \
            --version=2.1.6 \
            --filename=composer \
            --install-dir=/usr/local/bin \
           && composer clear-cache

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions \
    pdo_pgsql \
    gd

# Enable mod_rewrite
RUN a2enmod rewrite

# Copy virtual host configuration
COPY ./web/course.conf /etc/apache2/sites-available/

# Enable the virtual host
RUN a2ensite course.conf

# Copy PHP files
COPY ./../ /var/www/course

# Set permissions
RUN chown -R www-data:www-data /var/www/course

# Set working directory
WORKDIR /var/www/course

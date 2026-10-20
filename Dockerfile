FROM php:8.2-apache

# Enable Apache mod_rewrite for clean URLs if needed
RUN a2enmod rewrite

# Copy all project files to Apache web root
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Adjust Apache configuration to listen on Render's dynamic $PORT environment variable or 80
RUN sed -i 's/80/${PORT:-80}/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# Set file permissions for web server
RUN chown -R www-data:www-data /var/www/html

# Default port
EXPOSE 80

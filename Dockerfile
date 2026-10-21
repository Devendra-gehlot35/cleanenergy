FROM php:8.2-apache

# Enable mod_rewrite for Apache
RUN a2enmod rewrite

# Copy all project files to Apache web root
COPY . /var/www/html/

# Set working directory and permissions
WORKDIR /var/www/html
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80

# Dynamically bind to Render's $PORT at container runtime and start Apache
CMD ["sh", "-c", "sed -i \"s/Listen 80/Listen ${PORT:-80}/\" /etc/apache2/ports.conf && sed -i \"s/:80>/:${PORT:-80}>/\" /etc/apache2/sites-available/000-default.conf && exec apache2-foreground"]

FROM php:8.2-apache

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html

# Configure Apache to use backend/index.php as entry point
RUN echo '<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
    DirectoryIndex index.php index.html\n\
    <IfModule mod_rewrite.c>\n\
        RewriteEngine On\n\
        RewriteBase /\n\
        RewriteCond %{REQUEST_FILENAME} !-f\n\
        RewriteCond %{REQUEST_FILENAME} !-d\n\
        RewriteRule ^backend/(.*)$ /backend/index.php [L]\n\
    </IfModule>\n\
</Directory>' > /etc/apache2/conf-available/php-app.conf && \
a2enconf php-app

# Expose port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]

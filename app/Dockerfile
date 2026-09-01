FROM php:8.0.9-apache

# Install Git and clean up
RUN apt-get update \
    && apt-get install -y --no-install-recommends git \
    && rm -rf /var/lib/apt/lists/*

# Create a user
RUN useradd -s /bin/bash -m vscode

# Set Apache ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

COPY .  /var/www/html/

# Start Apache in foreground
CMD ["apache2-foreground"]

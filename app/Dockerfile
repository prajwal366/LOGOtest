FROM php:8.0.9-apache AS builder

# Install git and cleanup
RUN apt-get update \
 && apt-get install -y --no-install-recommends git \
 && rm -rf /var/lib/apt/lists/*

# Add a user
RUN useradd -s /bin/bash -m vscode

# Set Apache ServerName to suppress AH00558 notice
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Start Apache in foreground
CMD ["apache2-foreground"]

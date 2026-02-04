FROM php:8.0.9-apache AS builder

RUN apt-get update \
 && apt-get install -y --no-install-recommends \
    git \
 && rm -rf /var/lib/apt/lists/*

RUN useradd -s /bin/bash -m vscode

CMD ["apache2-foreground"]

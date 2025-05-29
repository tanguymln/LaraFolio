FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
        postgresql-dev \
        nodejs \
        npm \
    && docker-php-ext-install pdo pdo_pgsql gd zip mbstring

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN node -v && npm -v

COPY . /app

RUN chmod +x /app/entrypoint.sh

RUN chmod -R 775 .

WORKDIR /app

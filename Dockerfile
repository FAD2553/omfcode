# syntax=docker/dockerfile:1

FROM composer:2.9 AS vendor
WORKDIR /var/www/html
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader --ignore-platform-reqs

FROM node:20 AS assets
WORKDIR /var/www/html
COPY package.json package-lock.json ./
RUN npm install
COPY resources resources vite.config.js tailwind.config.js postcss.config.js ./
RUN npm run build

FROM php:8.3-cli
RUN apt-get update \
    && apt-get install -y --no-install-recommends git unzip libzip-dev libicu-dev libonig-dev zlib1g-dev libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite intl zip \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html
COPY --from=vendor /var/www/html/vendor ./vendor
COPY --from=assets /var/www/html/public/build ./public/build
COPY . .

RUN cp .env.example .env \
    && php artisan key:generate \
    && mkdir -p storage/framework/{cache,sessions,views} \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8000
CMD ["sh", "-lc", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000"]

# syntax=docker/dockerfile:1

FROM php:8.3-cli

RUN apt-get update \
    && apt-get install -y --no-install-recommends git unzip libzip-dev libicu-dev libonig-dev zlib1g-dev libpq-dev libsqlite3-dev curl ca-certificates gnupg \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo pdo_pgsql pdo_sqlite intl zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2.9 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.json composer.lock ./
RUN cp .env.example .env \
    && sed -i 's/^APP_ENV=.*/APP_ENV=production/' .env \
    && sed -i 's/^APP_DEBUG=.*/APP_DEBUG=false/' .env \
    && sed -i 's/^APP_URL=.*/APP_URL=http:\/\/localhost/' .env \
    && printf '\nDB_CONNECTION=sqlite\nDB_DATABASE=/var/www/html/database/database.sqlite\n' >> .env \
    && composer install --no-interaction --prefer-dist --optimize-autoloader

COPY package.json package-lock.json ./
RUN npm install

COPY . .

RUN npm run build \
    && php artisan key:generate \
    && php artisan optimize:clear \
    && mkdir -p storage/framework/{cache,sessions,views} \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8000

CMD ["sh", "-lc", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000"]

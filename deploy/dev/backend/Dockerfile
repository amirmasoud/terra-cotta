ARG FPM_VERSION
FROM php:${FPM_VERSION}

RUN rm -f /etc/apk/repositories &&\
    echo "http://dl-cdn.alpinelinux.org/alpine/v3.11/main" >> /etc/apk/repositories && \
    echo "http://dl-cdn.alpinelinux.org/alpine/v3.11/community" >> /etc/apk/repositories && \
    apk update && apk add libpq && \
    set -ex && \apk add --no-cache --virtual .build-deps zlib-dev libjpeg-turbo-dev libpng-dev libxml2-dev bzip2-dev postgresql-libs postgresql-dev gcc musl-dev make autoconf && \
    apk add --update --no-cache jpegoptim pngquant optipng supervisor nano icu-dev freetype-dev libzip-dev && \
    docker-php-ext-configure opcache --enable-opcache && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
    docker-php-ext-install opcache pdo pgsql pdo_pgsql sockets json intl gd xml zip bz2 pcntl bcmath && \
    pecl install redis-5.1.1 &&  rm -rf /tmp/pear && docker-php-ext-enable redis && \
    echo '*  *  *  *  * /usr/local/bin/php  /var/www/backend/artisan schedule:run >> /dev/null 2>&1' > /etc/crontabs/root && mkdir /etc/supervisor.d && \
    apk del postgresql-dev && \
    apk del -f .build-deps

WORKDIR /var/www/backend

COPY . /var/www/backend

RUN chown -R www-data:www-data \
    /var/www/backend/storage \
    /var/www/backend/bootstrap/cache && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install --no-dev --no-scripts --no-interaction --ignore-platform-reqs

ARG BACKEND_PORT
EXPOSE ${BACKEND_PORT}
CMD ["php-fpm"]

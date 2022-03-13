FROM php:8-fpm-alpine3.13

ENV \
    COMPOSER_ALLOW_SUPERUSER="1" \
    COMPOSER_HOME="/tmp/composer"

ENV PHPIZE_DEPS \
    build-base \
    autoconf \
    libc-dev \
    pcre-dev \
    openssl \
    pkgconf \
    cmake \
    make \
    file \
    re2c \
    g++ \
    gcc

ENV PERMANENT_DEPS \
    gnu-libiconv \
    postgresql-dev \
    oniguruma-dev \
    gettext-dev \
    icu-dev \
    libintl \
    nginx \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libzip-dev \
    libxml2-dev \
    supervisor

RUN set -e \
    && apk add --quiet --no-cache ${PERMANENT_DEPS} \
    && apk add --quiet --no-cache --virtual .build-deps ${PHPIZE_DEPS} \
    && docker-php-ext-configure opcache --enable-opcache > /dev/null \
    && docker-php-ext-configure bcmath --enable-bcmath > /dev/null \
    && docker-php-ext-configure pcntl --enable-pcntl > /dev/null \
    && docker-php-ext-configure intl --enable-intl > /dev/null \
    && docker-php-ext-configure xml  \
    && docker-php-ext-configure zip  \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install -j$(nproc) \
        exif \
        zip \
        xml \
        pdo_pgsql \
        sockets \
        gettext \
        opcache \
        bcmath \
        gd \
        pcntl \
        intl \
        > /dev/null \
    && apk del .build-deps \
    && rm -rf /var/cache/apk/* \
    && mkdir /app /home/user ${COMPOSER_HOME} /run/nginx /var/log/supervisor \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./docker/entrypoint.sh /etc/entrypoint.sh
COPY ./docker/nginx/conf.d/ /etc/nginx/conf.d/
COPY ./docker/php/fpm.conf /usr/local/etc/php-fpm.d/zz-docker.conf
COPY ./docker/php/local.ini /usr/local/etc/php/conf.d/zz-local.ini
COPY ./docker/supervisor/supervisord.conf /etc/supervisor/supervisord.conf
COPY ./docker/supervisor/conf.d/ /etc/supervisor/conf.d/
COPY --chown=www-data:www-data . /app

ENV DB_CONNECTION pgsql

WORKDIR /app

RUN set -e \
    && composer install --no-dev --no-interaction --no-ansi --prefer-dist --no-scripts \
    && chmod +x /etc/entrypoint.sh

EXPOSE 5000
ENTRYPOINT ["/etc/entrypoint.sh"]

FROM php:7.3.6-fpm-alpine3.8

MAINTAINER Alessandro Lai <alessandro.lai85@gmail.com>

RUN apk --no-cache add \
        openssh-client \
        openssl-dev \
        libzip-dev \
 ## PHP-EXT
    && apk add --no-cache --virtual .ext-build-deps \
        autoconf \
        g++ \
        make \
        pcre-dev \
    && pecl install -o \
        mongodb-1.5.3 \
    && docker-php-ext-enable \
        mongodb \
    && docker-php-ext-install -j5 \
        mbstring \
        opcache \
        pcntl \
        pdo_mysql \
        zip \
    && apk del .ext-build-deps \
    && pecl clear-cache \
    && docker-php-source delete

WORKDIR /var/www/phpstan

 ## Utente non-root (no sudo)
RUN adduser -D -u 1000 phpstan -G www-data -h /home/phpstan \
    && chown -R phpstan /var/www/phpstan \
 ## Composer
    && curl -sS https://getcomposer.org/installer | php -- \
        --install-dir=/usr/local/bin \
        --filename=composer

RUN apk --no-cache add \
        netcat-openbsd

USER phpstan    
RUN composer global require hirak/prestissimo --no-progress \
    && composer clear-cache

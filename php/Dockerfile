FROM php:7.3-fpm

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql
RUN pecl install redis && docker-php-ext-enable redis
COPY ./conf/php.ini $PHP_INI_DIR/
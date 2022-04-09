FROM php:8.1-fpm

RUN apt-get update \
&& pecl install xdebug \
&& docker-php-ext-enable xdebug \
&& apt-get install -y libpq-dev \
&& docker-php-ext-install pdo pdo_pgsql pgsql

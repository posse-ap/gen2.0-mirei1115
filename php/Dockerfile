FROM php:8.1-fpm
RUN pecl install xdebug \ && docker-php-ext-enable xdebug

COPY ./php.ini /usr/local/etc/php/php.ini
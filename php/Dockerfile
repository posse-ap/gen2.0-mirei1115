FROM php:7.4.0-fpm
# FROM nginx:latest

RUN apt-get update \
    && docker-php-ext-install pdo_mysql

ADD ./php.ini /usr/local/etc/php/php.ini
# ADD ./conf/default.conf /etc/nginx/conf.d/default.conf
# ADD ./src /usr/share/nginx/html

# RUN echo "start nginx"
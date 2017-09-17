FROM php:7.1-fpm

ARG host_uid
ENV SYMFONY_ENV=dev

RUN apt-get update; \
	apt-get install -y vim git zip curl sudo ;\
	usermod -u $host_uid www-data; \
	chown -R www-data /var/www

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install bcmath

USER www-data	

WORKDIR /var/www/testapp
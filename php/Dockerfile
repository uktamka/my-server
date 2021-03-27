FROM php:8-fpm

ARG DOCKER_PHP_ENABLE_XDEBUG='on'
ARG TZ='UTC'

RUN echo "${TZ}" && apt-get install -y tzdata && \
    cp /usr/share/zoneinfo/$TZ /etc/localtime && \
    echo $TZ > /etc/timezone 

RUN apt-get update && apt-get install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip 
    
RUN if [ "${DOCKER_PHP_ENABLE_XDEBUG}" = "on" ] ; then  pecl install xdebug && docker-php-ext-enable xdebug ;  fi

RUN rm -rf /var/cache/apt/* && docker-php-source delete

WORKDIR /var/www/project

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony 
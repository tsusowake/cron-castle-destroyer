FROM php:8.1-cli

WORKDIR /usr/src/app
COPY . /usr/src/app

COPY --from=composer:2.5.5 /usr/bin/composer /usr/bin/composer

RUN apt update && \
  apt -y install curl git libicu-dev libonig-dev libzip-dev unzip locales lsb-release wget autoconf && \
  apt clean && \
  locale-gen en_US.UTF-8 && \
  localedef -f UTF-8 -i en_US en_US.UTF-8 && \
  composer config -g process-timeout 3600 && \
  composer config -g repos.packagist composer https://packagist.jp

RUN docker-php-ext-install intl pdo_mysql mysqli zip bcmath

RUN composer dumpautoload

ENTRYPOINT ["php", "./src/Job/Main.php"]
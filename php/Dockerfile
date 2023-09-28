FROM php:8.1-fpm

RUN apt-get update

RUN echo "\e[1;33mInstall useful tools\e[0m"
RUN apt-get -y install apt-utils nano wget dialog vim

RUN echo "\e[1;33mInstall important libraries\e[0m"
RUN apt-get -y install --fix-missing \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libeigen3-dev \
    zip \
    git \
    unzip \
    cmake \
    build-essential \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install gd \
 && docker-php-ext-install pdo pdo_mysql

RUN echo "\e[1;33mCloning the PHP extension\e[0m"
RUN git clone https://github.com/TOA-Anakin/php_linearalgebra.git ./php_linearalgebra

RUN echo "\e[1;33mBuilding the PHP extension\e[0m"
RUN cd ./php_linearalgebra && \
    phpize && \
    ./configure && \
    make && \
    make install

RUN echo "extension=linearalgebra.so" > /usr/local/etc/php/conf.d/php_linearalgebra.ini
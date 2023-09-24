FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
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

RUN git clone https://github.com/TOA-Anakin/php_linearalgebra.git /php_linearalgebra

RUN cd /php_linearalgebra && \
    phpize && \
    ./configure && \
    make && \
    make install

RUN echo "extension=linearalgebra.so" > /usr/local/etc/php/conf.d/php_linearalgebra.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

COPY . /var/www

RUN composer install

EXPOSE 9000
CMD ["php-fpm"]
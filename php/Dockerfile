FROM php:8.1-fpm
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd 

RUN docker-php-ext-install pdo_mysql pdo mysqli

RUN \
  curl 'https://pecl.php.net/get/redis-5.3.7.tgz' -o /tmp/redis-3.1.5.tgz  \
  && cd /tmp \
  && pecl install redis-5.3.7.tgz\
  && rm -rf redis-5.3.7.tgz \
  && docker-php-ext-enable redis

# Install Supervisor
RUN apt-get install -yq supervisor

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

## Install other package
RUN apt-get install -yq mc vim htop
RUN apt-get install -y default-mysql-client


FROM php:7.4.0-apache
FROM httpd:2.4

RUN apt-get update && apt-get install -y \
    build-essential \
    mariadb-client \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl
    
RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-configure mysqli --with-mysqli=mysqlnd \
    && docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer​ | php -- \
     --install-dir=/usr/local/bin --filename=composer

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN service apache2 restart

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .


FROM php:7.4.0-apache

RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-configure mysqli --with-mysqli=mysqlnd \
    && docker-php-ext-install pdo_mysql

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN service apache2 restart

COPY . .


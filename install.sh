#!/bin/bash
sleep 12

sudo apt install -y -q php8.0-{cli,mysql,gd,common,curl}

sudo apt install -y -q unzip

sudo useradd -m composer

sudo curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

composer install
php artisan optimize:clear
php artisan key:generate
php artisan clear-compiled
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan package:discover
php artisan migrate
php artisan db:seed
php artisan serve

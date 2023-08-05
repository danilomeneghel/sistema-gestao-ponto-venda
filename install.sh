#!/bin/bash
sleep 12
composer update
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

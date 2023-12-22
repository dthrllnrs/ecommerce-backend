#-----------------------------------------------------------
# Basic Commands
#-----------------------------------------------------------

up:
	docker-compose up -d

down:
	docker-compose down

build:
	docker-compose build --no-cache

#-----------------------------------------------------------
# Initial installation
#-----------------------------------------------------------

init: build up laravel-env laravel-composer-install laravel-key laravel-migrate

#-----------------------------------------------------------
# Laravel Commands
#-----------------------------------------------------------

php-fpm:
	docker-compose exec php-fpm bash

laravel-env:
	docker-compose exec php-fpm cp .env.example .env

laravel-composer-install:
	docker-compose exec php-fpm composer install

laravel-key:
	docker-compose exec php-fpm php artisan key:generate

laravel-symlink:
	docker-compose exec php-fpm php artisan storage:link

laravel-migrate:
	docker-compose exec php-fpm php artisan migrate:refresh --seed
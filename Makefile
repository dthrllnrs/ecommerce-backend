#-----------------------------------------------------------
# Basic Commands
#-----------------------------------------------------------

up:
	docker-compose up -d

down:
	docker-compose down

build-dev:
	docker-compose -f docker-compose.local.yml up --build -d

build:
	docker-compose up --build -d

#-----------------------------------------------------------
# Initial installation
#-----------------------------------------------------------

init: build laravel-env laravel-composer-install laravel-key laravel-migrate

init-dev: build-dev laravel-env-dev laravel-composer-install-dev laravel-key laravel-migrate

#-----------------------------------------------------------
# Laravel Commands
#-----------------------------------------------------------

php-fpm:
	docker-compose exec php-fpm bash

laravel-env-dev:
	docker-compose exec php-fpm cp .env.example .env

laravel-env:
	docker-compose exec php-fpm cp .env.production .env

laravel-composer-install-dev:
	docker-compose exec php-fpm composer install

laravel-composer-install:
	docker-compose exec php-fpm composer install --no-dev --optimize-autoloader

laravel-key:
	docker-compose exec php-fpm php artisan key:generate

laravel-symlink:
	docker-compose exec php-fpm php artisan storage:link

laravel-migrate:
	docker-compose exec php-fpm php artisan migrate:refresh --seed
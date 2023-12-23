
# Laravel + Docker Ecommerce API

API for [VueJS Ecommerce App](http://purchasepro.dthrllnrs.com/)


## Tech Stack

**Client:** VueJS, Docker, Nginx. Bootstrap5

**Server:** Laravel, MySql


## Run Locally

Install using npm

```bash
  make init-dev
```
  or
```bash
  docker-compose -f docker-compose.local.yml up --build -d
```
```bash
  docker-compose exec php-fpm composer install
```
```bash
  docker-compose exec php-fpm php artisan key:generate
```
```bash
  docker-compose exec php-fpm php artisan migrate --seed
```
```
Add `127.0.0.1 api.ecommerce.work` to your host file    
```
## Endpoints

| URL                                 | Description                               |
| ----------------------------------  | ----------------------------------------  |
| GET `/api/products`                 | Fetch all products                        |
| GET `/api/products/{id}`            | Fetch product by id                       |
| POST `/api/orders/create`           | Create orders                             |


## Demo

[Demo](http://purchasepro.dthrllnrs.com/)


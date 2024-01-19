
## About

A simple browser game created to experiment with advanced programming techniques in Laravel.

## Installation

Create and fill .env file.

cp .env.example .env

Create MySQL database and configure connection in .env.

composer install
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve

Go to http://localhost:8000

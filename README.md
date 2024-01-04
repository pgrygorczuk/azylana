
## About

My first Laravel app.

## Installation

Create and .env file.

cp .env.example .env

Create MySQL database and configure connection in .env.

composer install
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve

Go to http://localhost:8000

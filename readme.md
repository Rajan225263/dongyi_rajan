## Local Server Setup 
if you want to run this project in local server in windows, I assume that you have installed xampp with minimum PHP version 7.4.
PHP Configuration from Laravel Documentation : [https://laravel.com/docs/6.x/installation]
Installation composer :[https://getcomposer.org/doc/00-intro.md]

## About Project 
This is a laravel application for Accounting System. Intervew Puspase.

## Project Setup
Clone the repository to /var/www/html for Ubuntu or xampp/htdocs/ for Windows (xampp)
Navigate to the project directory
Run "composer install"
Run "cp .env.example .env"
Run "php artisan key:generate"

## Set some values in .env
APP_URL=https://example.com
DB_ .....= (Database connection related values)

## After that run those following command
php artisan migrate
php artisan db:seed
Browse Project Base URL, Example: http://localhost/dongyi_rajan/ 


# Steps to install
- Run command `composer install`
- Run command `cp .env.example .env`
- Add database credentials to .env`
- Run command `php artisan key:generate`
- Run command `php artisan migrate --seed`

# Admin 
- Go to `http://127.0.0.1:800/admin`
- use username : `admin@admin.com`
- password : `password`

#API
- Download postman collection from : `https://documenter.getpostman.com/view/3208343/UV5ZAbqi`
- Register a new account from register API
- Run courses API to get all courses and categories

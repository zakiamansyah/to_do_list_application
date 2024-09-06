## How to use Project to do list

In this case I assume you have the following requirements:

- [Chrome](https://www.google.com/intl/id/chrome/) Or [Firefox](https://www.mozilla.org/id/firefox/new/)
- [Apache](https://httpd.apache.org/) Or [Nginx](http://nginx.org/en/download.html)
- [PHP](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/download/)


``` bash
https://github.com/zakiamansyah/to_do_list_application
cd to_do_list_application
composer install
composer update
cp .env.example .env
php artisan key:generate
php artisan jwt:secret
php artisan migrate
php artisan serve
```

> **Happy Coding**. 😆

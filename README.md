<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## О самом задании

Я выполнял задание на позицию Laravel Developer.

[Само задание](https://wiki.makeroi.ru/s/7f55144f-aa3e-492c-9321-e44f25cd3931).
___
## Как запустить

Я использовал Laravel 10 версии и Laravel Sail

Установите зависиомсти
```
composer install
```
Запуск проекта
```
./vendor/bin/sail up
```
После того как устновятся все образы и приложение запуститься, откройте [Ссылку](http://localhost:5555/).

Если что вот документация [Laravel Sail](https://laravel.com/docs/10.x/sail).
___
## Как настроить
Откройте файл ApiClientAction.php в нем находятся все ID, токены и пароли (или можете в файл .env).
___
## Как сделать сразу 50 сделок
Перейдите на [Ссылку](http://localhost:5555/leads/seed) и сразу будет сделано 50 сделок.

Если хотите что-то поменять в создаваемых сделках, можете редактировать файл [/storage/leads.json](https://github.com/stNeweR/test-app/blob/main/storage/leads.json).

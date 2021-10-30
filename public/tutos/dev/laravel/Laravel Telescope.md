# Laravel : Laravel Telescope

## Description

C'est un assistant de débuggage pour le framework Laravel. Il permet de superviser les requetes, les mails, les notifications, les taches programmées, etc.

![Teslescope](https://res.cloudinary.com/dtfbvvkyp/image/upload/v1539110860/Screen_Shot_2018-10-09_at_1.47.23_PM.png)

## Installation

```bash
composer require laravel/telescope --dev
php artisan telescope:install
php artisan migrate
```

## Mise à jour

```bash
php artisan telescope:publish
```

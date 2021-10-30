# Laravel : RESTfull API avec Laravel

## Description



## Installation

1. Créer un projet Laravel

```bash
composer create-project --prefert-dist laravel/laravel
```

## API

### Header

Les headers permettent à angular d'accéder aux ressources de laravel, vu qu'ils ne sont pas dans le même domaine.  
Il faut l'ajouter au début du fichier **/public/index.php**  
Cette méthode n'est toute fois pas compatibles avec les test unitaires, il faut utiliser les middlewares à la place.

```php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
```

[Source](https://www.sshakil.com/blog/article/7/Enabling-CORS-for-Laravel-requested-by-Angular)

### Création de l'API

Création du controlleur

```bash
php artisan make:controller TestController --api
```

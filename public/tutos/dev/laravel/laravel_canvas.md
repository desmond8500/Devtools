# Laravel : Canvas

## Description

Permet de gérer facilement  un blog avec Laravel.
[Video](https://www.youtube.com/watch?v=Ghd75k-jQog&list=PLEhEHUEU3x5pcQJHE8WBLqlHt2o3q5O-f&index=17)  
[Répo git](https://github.com/cnvs/canvas#installation)

## Installation

```sh
composer require cnvs/canvas
php artisan canvas:install
php artisan storage:link
```

## Utilisation

Pour lancer l'interface il faut utiliser le lien [/canvas](http://localhost:8000/canvas).
Se connecter avec les identifiants email@example.com/password

## Interface

```sh
php artisan canvas:ui
npm install
npm run dev
```

## Création d'un utilisateur par défaut

```sh
php artisan canvas:install
```

## Création d'un utilisateur

```php
\Canvas\Models\User::create([
    'id' => $user->id,
    'name' => $user->nom,
    'email' => $user->email,
    'username' => $user->prenom,
    'password' => $user->password,
    'role' => '3',
    'locale' => 'fr',
]);
```

1 = user, 2 = editeur, 3 = admin

## Utilisation des modèles

```php
$posts = \Canvas\Models\Post::published()->orderByDesc('published_at')->take(3)->get();
```

```php
$tags = \Canvas\Models\Tag::orderBy('name')->get();
```

```php
$topics = \Canvas\Models\Topic::orderBy('name')->get();
```

## Source

* [language](https://github.com/austintoddj/canvas#installation)
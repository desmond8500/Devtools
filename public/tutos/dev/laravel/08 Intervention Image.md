# Laravel : Intervention Image

## Description

Ici nous avons regroupé un ensemble de librairie utiles pour gérer des images dan un projet Laravel


## Installation 

```bash
composer require intervention/image
```
Ajouter dans le fichier `config/app.php` 

```php
Intervention\Image\ImageServiceProvider::class
```

Ainsi que l'alias

```php
'Image' => Intervention\Image\Facades\Image::class
```
puis publiez

```bash
 php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravelRecent"

```
[Source](http://image.intervention.io/getting_started/installation)

## Utilisation

# Parsedown

## Installation

Installez le plugin

```bash
composer require parsedown/laravel
```

Puis ajoutez le provider dans le fichier de configuration :

```php
return [
    // Other configurations above...

    'providers' => [
        // Other providers above...
        Parsedown\Providers\ParsedownServiceProvider::class,
        // Other providers below...
    ],

    // Other configurations below...
];
```

faire ensuite les publications

```php
php artisan vendor:publish --provider="Parsedown\Providers\ParsedownServiceProvider"
```

## Utilisation

```php
@parsedown('Hello _Parsedown_!')
```

## Source

* [Github](https://github.com/parsedown/laravel)

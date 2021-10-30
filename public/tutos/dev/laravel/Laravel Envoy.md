# Laravel : Laravel Envoy

## Prérequis

* composer
* php (extension curl)

## Installation

```php
composer global require laravel/envoy
```

## Code de base

Connexion à un serveur web via ssh

```html
@servers(['web' => ['user@192.168.1.1']])

@task('foo', ['on' => 'web'])
    ls -la
@endtask
```

Connexion à un serveur local

```html
@servers(['localhost' => '127.0.0.1'])

@task('foo', ['on' => 'web'])
    ls -la
@endtask
```


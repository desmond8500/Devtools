# Laravel Spatie Tags

Permet d'ajouter des tags à des modèles eloquent.

## Installation

Pour la version 7 de laravel

```sh
composer require spatie/laravel-tags
php artisan vendor:publish --provider="Spatie\Tags\TagsServiceProvider" --tag="migrations"
php artisan migrate
```

## Utilisation

### utilisation basique

Il faut déjà lier les tags au modèle

```php
use HasTags;
```

Ajouter des tags

```php
//adding a single tag
$model->attachTag('tag 1');

//adding multiple tags
$model->attachTags(['tag 2', 'tag 3']);
```

Supprimer des tags 

```php
//using a string
$yourModel->detachTag('tag 1');

//using an array
$yourModel->detachTags(['tag 2', 'tag 3']);
```

Synchroniser des tags

```php
$yourModel->syncTags(['tag 2', 'tag 3']);
```

### Création de Tags

```php
//create a tag
$tag = Tag::create(['name' => 'my tag']);

//update a tag
$tag->name = 'another tag';
$tag->save();

//delete a tag
$tag->delete();
```

### Récupration de Tags

```php
//returns models that have one or more of the given tags that are not saved with a type
YourModel::withAnyTags(['tag 1', 'tag 2'])->get();

//returns models that have one or more of the given tags that are typed `myType`
YourModel::withAnyTags(['tag 1', 'tag 2'], 'myType')->get();
```

## Sources 

* [Github](https://github.com/spatie/laravel-tags)
* [Documentation](https://spatie.be/docs/laravel-tags/v2/introduction)
* [A voir](https://laravel-news.com/how-to-add-tagging-to-your-laravel-app)
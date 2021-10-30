# Laravel : Pagination

## Description

Lorsque l'on doit afficher une quantité importante de données sur une page web, cela affecte le temps de chargement. La pagination c'est la séparation de ces dites données en plusieurs pages afin en performance et d'afficher juste une quantité de données utile.

## Utilisation

Coté controlleur 

```php
public function images(){
    $images = Medias_Image::paginate(3);

    return view('index',compact('images'));
}
```

Coté vue

```html
<div class="card-columns">
    @foreach ($images as $image)
        <div class="card">
            <img src="{ { asset($image->titre) }}" class="card-img-top" alt="{ { asset($image->titre) }}">
        </div>
    @endforeach
</div>
{ { $images->links() }}
```

Pour personnaliser la pagination il faut modifier le fichier `resources/views/vendor/pagination/bootstra4.blade.php`

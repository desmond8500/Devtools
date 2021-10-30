# Laravel : Base de donnée avec Eloquent

## Description

## Softdeletes

Dans le modèle :

```php
use Softdeletes;
```

Dans la migration

```php
$table->softDeletes();
```

## Requete like

```php
public function search(Request $request){
    $articles = Stock_article::where('designation', 'like', "%{$request->article}%")
                        ->orWhere('email', 'LIKE', "%{$searchTerm}%") 
                        ->paginate(10);

    return view('index',compact('articles'));
}
```

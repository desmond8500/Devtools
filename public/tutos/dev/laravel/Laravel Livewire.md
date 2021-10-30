# Laravel : Livewire

## Decription

C'est une librairie laravel qui permetde faire du code javacript avec du code php.  
[Vidéo](https://www.youtube.com/watch?v=fhKcI3HAP98&list=PLEhEHUEU3x5pcQJHE8WBLqlHt2o3q5O-f&index=7)

## Ajouter la pagination
```php
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

```

## Ajouter une image

```php
use WithFileUploads;
public $photo;

public function update(){
    if($this->photo){
            Storage::disk('public')->deleteDirectory($dir);
            $name = $this->photo->getClientOriginalName();
            $this->photo->storeAS("public/$dir", $name);
        }
}
```

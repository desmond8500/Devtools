# Laravel : Storage and Files

## Description

Les objets **Storage** et **File** permettent de gérer facilement le traitement et le stockage de fichiers avec laravel. 

```php
// Require
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

// Function
$cover = $request->file('image');
$image = $cover->getClientOriginalName();
$dir = "chemin/$image";
Storage::disk('public')->put($dir,  File::get($cover));
```

Pour récupérer le nom du fichier il faut utiliser la fonction suivante : 

```php
$cover->getClientOriginalName();
```

Pour récupérer le nom qui a été généré :

```php
$cover->getFilename();
```

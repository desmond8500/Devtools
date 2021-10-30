# Laravel : Stocker des images

## Fichier de config

Ouvrir le fichier **config/filesystems.php** et modifier la partie public:  

```
'public' => [
          'driver' => 'local',
          'root' => public_path() . '/uploads',
          'url' => env('APP_URL').'/public',
          'visibility' => 'public',
      ],
```

## Controller

```php
public function store(Request $request)    {
    $cover = $request->file('image');
    $extension = $cover->getClientOriginalExtension();
    Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

  }
```

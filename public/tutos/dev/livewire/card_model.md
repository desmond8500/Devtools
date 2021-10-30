# Modèle de carte

Créer le composant livewire.

```sh
php artisan make:livewire card_name
```

Personnaliser le composant 

```php
use WithPagination;
protected $paginationTheme = 'bootstrap';
public $search;
public $name, $description, $instance_id=0;

public function store()
{
    Model::create([
        'name' => $this->name,
        'description' => $this->description,
    ]);
    
    $this->reset('name', 'description');
}
public function edit($id)
{
    $this->instance_id = $id;
    $instance = Model::find($id);
    $this->name = $instance->name;
    $this->description = $instance->description;
}
public function update()
{
    $instance = Model::find($this->instance_id);
    $instance->name = $this->name;
    $instance->description = $this->description;

    $instance->save();
    
    $this->reset('instance_id');
}
public function delete(){
    $instance = Model::find($this->instance_id);
    $instance->delete();
}

```

Créer le modèle avec sa migration.

```sh
php artisan make:model CardModel -m
```

Personnaliser le modèle

```php
use Softdeletes;

protected $fillable = ['name', 'description'];

```

Personnaliser la migration

```php
$table->string('name');
$table->text('description');
$table->softdeletes();
```


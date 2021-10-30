# Laravel : Les migrations

## Description

## Ajouter une colonne à une table qui existe

Dans le terminal :

```bash
php artisan make:migration add_tel_to_users
```

puis ajouter le champs dans le fichier qui a été créé 

```php
 public function up()
{
    Schema::table('projet_journals', function (Blueprint $table) {
        $table->string('folder')->nullable();
    });
}
```
lancer la migration


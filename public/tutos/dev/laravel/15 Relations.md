# Laravel : Relations 

## Description

Nous allons illustrer l'usage des relations des bases de données avec eloquent.  
Nous allons utiliser les tables suivantes: 

User : prenom, nom
Tel: numero

## Relation One to one 

Un utilisateur a un numéro de téléphone.

### Modèle user 

```php
public function comments()
{
    return $this->hasOne('App\Models\Tel');
}
```
### Modèle tel

```php
public function comments()
{
    return $this->belongsTo('App\Models\User', 'id);
}
```

### Utilisation

```php
$tel = User::find(1)->tel;
```



## Relation One to many 

Un utilisateur peux avoir plusieurs numéros de téléphones.

### Modèle user 

```php
public function comments()
{
    return $this->hasOne('App\Models\Tel');
}
```
### Modèle tel

```php
public function comments()
{
    return $this->belongsTo('App\Models\User', 'id);
}
```

### Utilisation

```php
$tel = User::find(1)->tel;
```

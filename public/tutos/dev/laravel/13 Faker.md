# Laravel : Faker

## Description

Permet de générer des données génériques pour remplir une base de donnée.

## Installation

```bash
composer require fzaninotto/faker
```

## Utilisation dans un controlleur

```php
namespace App\Http\Controllers;

use Faker\Factory as Faker;
use App\Models\Client;

class SeedController extends Controller
{
    public function clients() {

        $faker = Faker::create('fr_FR');

        $seed = new Client();

        $seed->compte_id    = 0;
        $seed->nom          = $faker->company;
        $seed->description  = $faker->text;
        $seed->adresse      = $faker->address;
        $seed->save();

        return redirect()->back();
    }
}
```

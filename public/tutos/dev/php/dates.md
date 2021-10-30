# PHP: Dates

## Déterminer le nombre de jours entre deux dates

```php
$date = date('Y-m-d H:i:s'); // Date du jour
$date1 = strtotime($dateTimestamp1); // Date de debut 
$date2 = strtotime($date); // Convertion de la date en timestamp

$nbJoursTimestamp = $date2 - $date1; // difference
$nbJours = $nbJoursTimestamp / 86400; // conversion en jours
```

## Récupérer la différence de jours entre une date et la date actuelle

```php
public function getDays($date){
    $today = date('Y-m-d H:i:s');
    $date1 = strtotime($date);
    $date2 = strtotime($today);

    return abs(($date2 - $date1) / 86400);
}
```

```php
$now   = time();
$date2 = strtotime('2012-08-14 16:01:05');
$diff  = abs($date1 - $date2);
```

## Calculer la différence de jours entre deux dates

```php
public function dateDiff($start,$end){
    $date1 = strtotime($start);
    $date2 = strtotime($end);

    $nbJoursTimestamp = ($date2 - $date1) / 86400;

    return $nbJours;
}
```

[Source](https://openclassrooms.com/forum/sujet/nombre-de-jours-entre-2-dates-31730)
[Source](http://www.finalclap.com/faq/110-php-calcul-difference-deux-date)

# Laravel : Parsedown

## Description

Parsedown permet de parser du Markdown.

## Installation

Pour que cela marche il faut modifier le parsing des balises de code.  
Par défaut la classe utilisée est `class= "language-html"`. Il faut enlever la partie `language` dans le fichier `Parsedown.php` d'Erusev qui est dans `vendor/parsedown/Parsedown.php`.

```php
$class = 'language-'.$language;
```

par

```php
$class = $language;
```

## Sources

* [Source](https://parsedown.org/)

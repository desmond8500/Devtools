# PHPWORD

## Description

Package laravel qui permet de générer des documents word.

## Installation

```sh
composer require phpoffice/phpword
```

## Utilisation avec livewire

### Générer un fichier

IL suffit de créer une methode comme celle qui suit :

```php
 public function getdoc()
{
    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    $section = $phpWord->addSection();
    $text = $section->addText("hello");
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save('Appdividend.docx');
    return response()->download(public_path('Appdividend.docx'));
}
```

### Remplir un fichier

## Source

* [Laravel word](https://appdividend.com/2018/04/23/how-to-create-word-document-file-in-laravel/)
* [Github](https://github.com/PHPOffice/PHPWord)
* [Documentation](https://phpword.readthedocs.io/en/latest/)
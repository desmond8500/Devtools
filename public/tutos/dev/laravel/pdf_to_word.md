# Laravel : Générateur de fichiers PDF

## Description

Nous avons parfois besoin de générer des fichiers PDFs pour des devis, des factures etc. 

## Installation

1. Installer la librairie

    ```shell
    composer require barryvdh/laravel-dompdf
    ```

1. Configurer la librairie dans le fichier `/config/app.php`

    ```php
    'providers' => [
        ....
        Barryvdh\DomPDF\ServiceProvider::class,
    ],

    'aliases' => [
        ....
        'PDF' => Barryvdh\DomPDF\Facade::class,
    ]
    ```

1. Créer une route vers un controlleur
1. Créer un controlleur pour gérer la conversion

    ```php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use PDF;

    class HomeController extends Controller{

        public function generatePDF()    {
            $data = ['title' => 'Welcome to HDTuto.com'];
            $pdf = PDF::loadView('myPDF', $data);
            return $pdf->download('test.pdf');
        }
    }
    ```

    - La variable `$data` est utilisée pour envoyer des données vers la vue.  
    - `myPDF` est la vue blade qui sera convertie en PDF.  
    - `test.php` est le fichier qui sera généré

1. Créer une vue blade qui sera affichée

## Personnalisation des vues

### Css

```css
@page{
    margin-top: 50px;
}
```

## Source

- [Tuto](https://www.itsolutionstuff.com/post/laravel-57-generate-pdf-from-html-exampleexample.html)
- [barryvdh](https://github.com/barryvdh/laravel-dompdf)
- [Our code World](https://ourcodeworld.com/articles/read/687/how-to-configure-a-header-and-footer-in-dompdf)
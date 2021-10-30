# Material dashbord Template

## Description

![Material Dashboard](https://s3.amazonaws.com/creativetim_bucket/products/53/original/opt_md_angular_thumbnail.jpg?1551358074) est un super theme admin pour angular.  
La documentation est disponible [ici](https://demos.creative-tim.com/material-dashboard-angular2/#/documentation/tutorial).

## Etapes / Steps

1. Télécharger la version angular de [Material Design](https://www.creative-tim.com/product/material-dashboard-angular2)

1. Mettre à jour le projet

  ```bash
  npm install
  ```
1. Lancer le projet

  ```bash
  ng serve
  ```

1. Créer une page

  ```bash
  ng g c maPage
  ```
  Il faudra ensuite :
  * Ajouter le composant dans le fichier admin.layout.module.ts
  * Ajouter la route dans  le fichier admin.layout.routing.ts
  * Supprimer le composant dans la déclaration du fichier app.route.ts
  * Ajouter le template suivant :

  ```html
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <!-- My content =========================================== -->




        <!-- My content =========================================== -->
      </div>
    </div>
  </div>
  ```
1.  Modifier le menu
Le menu peut être modifié à travers le composant sidebar

## Source

* [Télécharger Material Dashboard](https://www.creative-tim.com/product/material-dashboard-angular2)

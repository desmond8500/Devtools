# Ionic 5

## Installation

1. Installer ionic de manière globale

  ```bash
    npm install -g @ionic/cli
  ```

1. Créer une application

  ```bash
    ionic start
    npm install -g @ionic/cli native-run cordova-res
  ```

1. Lancer le projet
  
  ```bash
    cd nom_projet
    ionic serve
  ```

1. Ajouter capacitor au projet

  ```sh
  ionic build
  ionic cap add android
  ```

  Après chaque `build` il faut lancer cette commande :

  ```sh
  ionic cap copy
  ```

  Après chaque ajout de code ou de plugin il faut lancer cette commande :
  ```sh
  ionic cap sync
  ```

## Lancer le projet sur android Studio

```sh
ionic cap open android
```

## Déploiement

1. Déploiement WEB

    ```bash
    ionic build --prod
    ```

    Le projet est exporté dans un dossier __www__.  
    Il suffit juste d'envoyer le contenu de ce dossier vers un serveur. 

1. [Générer un bundle](deploy)
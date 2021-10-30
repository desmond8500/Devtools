# Laravel : Déployer un projet laravel

## Préréquis

### Editeur de texte

Il faudra utiliser un bon éditeur de texte tel que **Atom** ou **Visua Studio Code**.  
Cela va faciliter l'utilisation de git.

### Versionning

1. Créer un compte sur [GitHub.com](https://github.com/).  
  Lors de la création il faut créer un compte avec un mail et un mot de passe.
  Si vous vous connectez avec votre compte google vous risquez d'avoir des problèmes pour utiliser **GitKraken**.
1. Installer **Git** sur votre machine au besoin.
1. Installer **GitKraken**, il vous permettra de gérer plus facilement vos répos.

### Création d'un répo sur git

1. Lancez **GitKraken**
1. Vous faites `File > Init Repo`
1. Une fenêtre s'affiche
1. Vous selectionnez **GitHub.com** puis vous remplissez les champs.
  Si vous utilisez GitKraken pour la première fois on vous demandemra de vous connecter à votre compte **GitHub**.

### Projet laravel

Si vous avez déja un projet laravel copiez le contenu du dossier dans le dossier git que vous venez de créer. Sinon Créez en un.

```bash
composer create-project --prefert-dist laravel/laravel
```

Dans le dossier du projet lancez la commande :

```bash
php artisan key:generate
```

Ouvrez le fichier **.env** et allez à la ligne **APP_KEY=** et copiez tout ce qu'il y a à la suite.  
Puis dans le fichier ```config/app.php``` allez à la ligne

```php
'key' => env('APP_KEY')
```

ajoutez la clé

```php
'key' => env('APP_KEY','base64:dshfqkljshfjlkqshflqsdfhsdk=')
```

### Commit

Dans **GitKraken** fait un commit puis un pull du projet

### Dans le serveur

Créer un compte chez un hébergeur. Chez [Alwaysdata.net](http://alwaysdata.net) vous pouvez créer une compte gratuit avec 100mo de stockage et une base de donnée.

1. Connectez vous en ssh
1. Allez dans le dossier **www** puis faites
1. Créez un site et liez le au dossier créé précedemment

```bash
git pull adresse_du_repo
```

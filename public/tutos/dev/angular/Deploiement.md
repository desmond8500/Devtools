# Déploiement d'un projet angular

## Description

Pour déployer un projet angular nous allons utiliser Express JS qui est une framework Node JS.
Dans le cadre de ce tuto nousallonsfaire le test en local, mais le fonctionnement est le même sur un

## Prérequis

* NodeJS

## Installation

Utiliser la commande suivante pour installer express et l'ajouter aux dépendances.

```bash
npm install express --save
```

[Source](https://expressjs.com/fr/starter/installing.html)

## Hello world

1. Créer un fichier app.js
2. Y insérer le code ci dessous :

  ```js
    const express = require('express')
    const app = express()

    app.get('/', function (req, res) {
        res.send('Hello World!')
    })

    app.listen(3000, function () {
        console.log('Example app listening on port 3000!')
    })
  ```

3. Dans un terminal

  ```console
    node app.js
  ```
  
4. Lancer le fichier sur un navigateur [localhost:3000](http://localhost:3000)

## Servir des fichiers statiques

[Source](https://expressjs.com/fr/starter/static-files.html)

Pour rendre des fichiers disponible sur le serveur il faut utilser le code ci dessous.

```js
app.use(express.static('public'));
app.use(express.static('files'));
```

## Autre code

Si c'est un projet angular par exemple, voilà ci dessous un exemple de code pour le test en local.

```ts
const express = require('express')
const path = require('path');
const app = express()

// Dossier du projet
app.use(express.static('myProject'));

app.get('/', function (req, res) {
  res.sendFile(path.join(__dirname+'/myProject/index.html')) // Chemin vers le fichier html du projet angular
})

app.listen(3000, function () {
    console.log('Example app listening on port 3000!')
})
```

Lancer le code [localhost:3000](http://localhost:3000)

En ligne utilisez ce code

```ts
const express = require('express')
const path = require('path');
const app = express()

// Dossier du projet
app.use(express.static('myProject'));

app.get('/', function (req, res) {
  res.sendFile(path.join(__dirname+'/myProject/index.html')) // Chemin vers le fichier html du projet angular
})

app.listen(process.env.PORT, function () {
  console.log('Example app started!')
})
```

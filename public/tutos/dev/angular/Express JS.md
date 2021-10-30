# Utilisation d'express JS

## Description

Express JS est une framework node JS.

## Prérequis

* NodeJS

## Installation

Utiliser la commande suivante pour installer express et l'ajouter aux dépendances.

```bash
npm install express --save
```

Pour une installation temporaire

```bash
npm install express --save
```

[Source](https://expressjs.com/fr/starter/installing.html)

## Hello world

1. Créer un fichier app.js
1. Y insérer le code ci dessous :

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

1. Dans un terminal

  ```console
    node app.js
  ```
  
2. Lancer le fichier sur un navigateur [lien](http://localhost:3000)

## Servir des fichiers statiques

[Source](https://expressjs.com/fr/starter/static-files.html)

```js
app.use(express.static('public'));
app.use(express.static('files'));
```

## Autre code

```ts
const express = require('express')
const path = require('path');
const app = express()


app.get('/', function (req, res) {
  res.sendFile(path.join(__dirname+'/tmobile2/index.html'))
})

app.listen(process.env.PORT, '0.0.0.0', function () {
  console.log('Example app started!')
})
```

# Vuepress

## Installation

```sh
npm install -D vuepress@next
```
Il faut ensuite ajouter le code suivant dans le fichier package.json. 

```js
{
    "scripts": {
        "docs:dev": "vuepress dev docs",
        "docs:build": "vuepress build docs"
    }
}
```

## Utilisation

Lancer le serveur
```sh
npm run docs:dev
```
Compiler le projet
```sh
npm run docs:build
```


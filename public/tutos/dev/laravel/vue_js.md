# Laravel : Vue JS

## Description

Vue JS est un framework javascript très populaire qui peut être facilement intégré à un projet web.

## Installation

Avec la version 6 de Laravel il faut installer VueJS avec composer il n'est pas intégré de base.

```sh
composer require laravel/ui:^1.0 --dev
php artisan ui vue
npm install
npm run watch
```

il faut ensuite ajouter vue au projet 

```html
<link href="css/app.css">

<body>
    <div id="app">
        <example-component></example-component>
    </div>
</body>

<script href="/js/app.js">
```

[Source](https://laravel.com/docs/6.x/frontend#writing-vue-components)

## Composants

### Composant de base

Le template doit toujours commencer avec une div de base

```html
<template>
    <div class="container">
        <p>{{ message }}</p>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        data(){
            return {
                message: "hello"
            }
        }
    }
</script>
```

### Créer un composant

### Binding

```html
<input v-model="name">
```

### Boucle

```html
<div v-for="comment in comments">
    {{ comment }}
</div>
```

### Envoi et receoption de données

Envoi

```html
<form #submit.prevent="send">
    <input v-model="message" placeholder="modifiez-moi">
    <button type="submit"> Valider </buttun>
</form>
```

```js
send(){
    axios.post('/url',{
        message: 'My message'
    })
}
```

reception
Avec blade on récupère les données que l'on passe au js

```php
<div-component :comments="{{ $comments }}" >
</div-component>
```

Ensuite dans la partie js il faut déclarer la variable à traiter

```js
export default{
    props: ['comments'],
    data(){
        return{
            comment: '',
        }
    }
}
```

## SPA avec Vue

### installation du Vue Router

Pour faire une SPA il faudra faire des coniguration supplémentaires et se passer des vues blade. Il faudra commencer par installer le router de Vue.

```shell
npm install vue-router
```

Il faudra ensuite l'importer dan le fichier app.js

```js
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Test1 from './components/Test/Test1Component.vue';
import Test2 from './components/Test/Test2Component.vue';

const routes = [
    {   path: '/test1', component: Test1    },
    {   path: '/test2', component: Test2    }
];

const router = new VueRouter({routes});

const app = new Vue({
    el: '#app',
    router: router
});
```

dans le fichier html

```html
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Vue JS</title>
</head>
<body>
    <div id="app">
        <router-link to='/test1'>Test1</router-link>
        <router-link to='/test2'>Test2</router-link>

        <router-view></router-view>
    </div>
    <script src="{{asset('js/app.js')}} "></script>
</body>
</html>
```

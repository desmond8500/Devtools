# VUE JS : Navigation Vue JS

## Description

## Routage simple d'un composant à l'autre

```html
<router-link to="/home">
<router-link>
```

## Routage avec des paramètres

Dans le fichier index il faut ajouter la propriété props true sur la route concernée

```js
{ 
    path: "/boutique", 
    name: "Boutique", 
    props: true,
    component: () => import( "../components/pages/boutiques/boutique.vue")
},
```

sur le composant de départ il faudra définir le nom du composant de base **name** et les paramètres **params**.

```html
<router-link to="{ name: '', params: {boutique} }">
<router-link>
```

sur le composant de destination 

```html
<template>
    <div>  {{ welcome }} </div>
</template>

<script>
export default {
    name: 'Profile',
    props: ['msg'],
    data() {
        return {
            welcome: 'This is your profile'
        }
    }
}
</script>

```

## Source 

* [Lien](https://dev.to/aligoren/passing-data-to-a-router-link-in-vuejs-2cb0)


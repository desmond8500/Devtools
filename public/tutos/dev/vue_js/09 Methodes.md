# VUE JS : Methodes

## Watch

Permet de surveiller des variables ou des expression afin de pouvoir agir en conséquence.

```js


var vm = new Vue({
  data: {
    a: 1,
    b: 2
  },
  watch: {
    a: function (valeur, ancienneValeur) {
      console.log('nouveau: %s, ancien: %s', valeur, ancienneValeur)
    },
    // nom d'une méthode
    b: 'uneMéthode',
    // la fonction de rappel sera appelée quelque soit les changements des propriétés de l'objet observé indépendamment de leur profondeur
  }
})
vm.a = 2 // => nouveau : 2, ancien : 1
```

## Map 

Permet de mettre à jour un objet. 

```js
this.image2 = this.images.map((item) => {
    return {
        src: 'storage/'+ item.folder,
        thumb:'storage/'+ item.folder,
        subHtml:'caption'
    }
}) ;
```

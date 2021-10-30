# Array Methods

## Description

Methodes utiles pour traiter les tableaux en javascript.  
[Source](https://www.youtube.com/watch?v=R8rmfD9Y5-c)

```typescript
const items = [
  { name: 'bike', price: 100 },
  { name: 'tv', price: 200 },
  { name: 'album', price: 10 },
  { name: 'book', price: 5 },
  { name: 'phone', price: 500 },
  { name: 'compter', price: 1000 },
  { name: 'keyboard', price: 25 },
]
```

## Filter

Permet de filter le contenu d'un tableau dans un autre tableau.

```typescript
const filteredItems = items.filter((item) => {
    return item.price <= 100;
});
console.log(filteredItems)
```

Il ne va retourner que des champs dont le prix est inférieur ou égal à 100.

## Map

Permet de convertir un tableau en autre tableau.

```typescript
const itemNames = items.map((item) => {
    return item.price;
});
console.log(itemNames);
```

Il ne récupère que la liste des prix.

## Find

Permet de trouver un objet dans un tableau.

```typescript
const foundItem = items.find((item) => {
    return item.name == 'Book';
});
console.log(itemNames);
```

## Foreach

Permet de parcourir un tableau.

```typescript
items.forEach((item) => {
    console.log(item.names);
});
```

Affiche chaque élément du tableau.

## Some

Permet de vérifier si un certain type d'éléments existe dans un tableau.

```typescript
const inexpensiveItem = items.some((item) => {
    return item.price <= 100;
});
console.log(inexpensiveItem);
```

Retourne true ou false.

## Reduce

Permet de faire des sommes d'éléments d'un tableau.

```typescript
const total = items.reduce((sousTotal, item) => {
    return item.price + sousTotal;
}, 0);
console.log(total);
```

Retourne true ou false.

## Includes

Permet de vérifier si un élément existe dans un tableau, c'est une version simplfiée de find;

```typescript
const items = [1,2,3];
const includesTwo = items.icludes(2);
console.log(includesTwo);
```

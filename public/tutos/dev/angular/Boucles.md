# Les Boucles

## Boucle for

Boulcle simple

```html
<ul>
  <li *ngFor='let user of users'>
    { { user.nom }}
  </li>
</ul>
```

Boulcle avec index

```html
<ul>
  <li *ngFor='let user of users; let i = index'>
    { { user.nom }}
  </li>
</ul>
```

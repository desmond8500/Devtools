# Conditions

## Les Switch cases

```html
<div [ngSwitch]='monPlat'>
    <p *ngSwitchCase='"Hamburger"'> C'est de la malbouffe </p>
    <p *ngSwitchCase='"yassa"'> C'est de poisson et du riz avec de la sauce d'oignon</p>
    <p *ngSwitchCase='"Nana"'> C'est pas un plat ça </p>
</div>
```

## Les Conditions

### If Condition

Condition vrai ou faux.

```html
<div *ngIf='userHasPet'>
    { { user.pet.name }}
</div>
```

Condition complexes

```html
<div *ngIf='books > 0'>
    { { books }}
</div>
```

### If and Else condition

```html
<div *ngIf='books > 0; else select'>
    { { books }}
</div>

<ng-template #select>
    Il n'y a pas de livres
</ng-template>
```

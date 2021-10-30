# Angular

### Débuter un projet

```bash
ng new project
cd project
```

### Créer un composant

```bash
ng g c heroes
```
et dans le fichier **app.component.html** ajoutez le composant

```html
<app-heroes></app-heroes>
```

### Créer une classe

```bash
ng g class hero
```

Contenu de la classe hero

```ts
export class Hero {
  constructor(
    public id: number= 0,
    public name: string = "hello" ,
  ){}
}
```

et dans le fichier **app/heroes/heroes.component.html**

```ts
import { Hero } from '../hero';
```

### Ajouter un formulaire

dans le fichier app.modules.ls ajouter :

```ts
import { FormsModule } from '@angular/forms'; // <-- NgModel lives here

imports: [
  BrowserModule,
  FormsModule
],
```

```html
<div>
  <label>name:
    <input [(ngModel)]="hero.name" placeholder="name"/>
  </label>
</div>
```

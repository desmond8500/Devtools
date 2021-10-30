# Composants

## Description

| Fichier | Fonction |
:---- :----
| app.component.css | C'est le fichier qui contient le ficher de style (css, scss) |
| app.component.html  | Contient le code html |
| app.component.ts | Contient la classe |

## Fichier typescript

### Décorateur

```ts
@Component({
    selector: 'app-root',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.css'],
  })
```

#### Selector

* app-root = balise
* app-root = classe
* [app-root] = attribut

#### templateUrl

* templateUrl = chemin vers le fichier html
* template =

```css
  div{
    margin : auto;
    }`
```

#### templateUrl

* styleUrls = [chemin vers le fichier html,]
* style = `styles`
* la classe

```typescript
export class AppComponent{
  title = 'Codevolution';
}
```

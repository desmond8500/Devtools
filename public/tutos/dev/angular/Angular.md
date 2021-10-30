# Angular

# Installation

## Utilisation du CLI

Pour créer un composant :

```bash
ng g c nom_du_composant
```
* g = generate
* c = component

Pour créer un composant dans d'autres composants

```bash
ng g c dossier/sousdossier
```

Pour un service

```bash
ng g service nom_du_service
```

La suppresion se fait manuellement. Il supprimer les fichiers et mettre à jour le fichier **app.Module.ts**

## Gestion des routes
Les liens doivent être faits comme suit :

```html
<a routerLink="/">Ma super route</a>
```

Voilà un modèle de routing

```typescript
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { TicketsComponent }     from './page/tickets/tickets.component';

const routes: Routes = [
  { path: 'dashboard', component: DashboardComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

```

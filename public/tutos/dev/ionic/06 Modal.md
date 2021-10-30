# Modal (Ionic 5)

## Description

## Utilisation

Page 

```html
<ion-content>

    <button class="mybutton" (click)="presentModal()">
        Obtenir une adresse
    </button>
</ion-content>
```

```ts
import { ModalController } from '@ionic/angular';
import { LocalisationPage } from './modals/localisation/localisation.page';

export class IndexPage implements OnInit {
  constructor(public modalController: ModalController) { }
  
  async presentModal() {
    const modal = await this.modalController.create({
      component: LocalisationPage,
      cssClass: 'my-custom-class'
    });
    return await modal.present();
  }
}
```

Page modale

```html
<ion-content>
  <button (click)="dismiss()">close</button>
</ion-content>
```

```ts
import { Component, OnInit, Input } from '@angular/core';
import { ModalController } from '@ionic/angular';

export class LocalisationPage implements OnInit {
  constructor(private modalCtrl: ModalController) { }

  dismiss(){
    this.modalCtrl.dismiss();
  }
}
```

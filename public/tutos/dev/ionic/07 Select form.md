# Select Form

## Usage

```html
  <ion-item>
    <ion-label>Action Sheet</ion-label>
    <ion-select [interfaceOptions]="customActionSheetOptions" interface="action-sheet" placeholder="Select One">
      <ion-select-option value="red">Red</ion-select-option>
      <ion-select-option value="purple">Purple</ion-select-option>
      <ion-select-option value="yellow">Yellow</ion-select-option>
      <ion-select-option value="orange">Orange</ion-select-option>
      <ion-select-option value="green">Green</ion-select-option>
    </ion-select>
  </ion-item>
```

## Attributs

Les attributs permettent de personnaliser notre bouton select.

### Interface

L'attribut interface permet de modifier la façon dont la liste est affichée.

```html
<ion-select interface="action-sheet" >
      
</ion-select>
```


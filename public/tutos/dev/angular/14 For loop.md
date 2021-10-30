# Loop for

Template

```html
<div *ngFor="let color of colors">
  <h2>{{color}}</h2>
</div>
```

Classe

```typescript
public color =["red", "blue","green"];
```

-------------------------------------------
template

```html
<div *ngFor="let color of colors; index as i">
  <h2> {{i}} {{color}}</h2>
</div>
```


Classe

```typescript
public color =["red", "blue","green"];
```

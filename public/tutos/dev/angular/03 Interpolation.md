# Composants

## Description
Permet de créer des attributs ou des methodes et de les appeler dans le template

```typescript
export class test{
  public name = "Midoriya";

  greeting(){
    consolelog("hello");
  }
}
```

template  

```html
<div> {{name}}</div>
```

## Binding

```html
<h2 [class] = "blue" >hello</h2>
<h2 [class.true] = "error" >hello</h2>
```

```typescript
public error = true
```

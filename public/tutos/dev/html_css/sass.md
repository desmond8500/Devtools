# Le préprocesseur Saas

## Description

C'est un outil très pratique qui permet de rédiger du code CSS plus évolué.

## Utilisation

### Imbrication

```css
.table{
    width: 100px;

    tr{
       color: white; 
    }

    th{
        background: blue;
    }
}
```



```css
.btn{
    p {
        border-radius: 5px;
    }
    &:hover{
        color: green;
    }
}
```

### L'héritage 

```css
.btn{

}

.call{
    @extends .btn
}
```

css utilisable au besoin

```css
%btn{

}
```

ce btn là peu être appelé dans une class puis compilé mais par défaut le code qu'il contient n'est pas compilé.

### Les variables

```css
$padding : 10px;

.btn{
    padding: $padding;
}
```

import de fichiers scss

```css
@import "mon_fichier";
```

## Sources 

* [Graphiart: Le préprocesseur SASS](https://www.youtube.com/watch?v=tnmGdg46LnM&list=PLjwdMgw5TTLWVp8WUGheSrGnmEWIMk9H6&index=5)

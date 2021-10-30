# Vue JS: Fonctionalités de base

## Description


## Conditions

```html
<div id="app-3">
  <span v-if="seen">Now you see me</span>
</div>
```
```js
var app3 = new Vue({
  el: '#app-3',
  data: {
    seen: true
  }
})
```

## Boucles

```html
<div id="app-4">
  <ol>
    <li v-for="todo in todos">
      { { todo.text }}
    </li>
  </ol>
</div>
```

```js
var app4 = new Vue({
  el: '#app-4',
  data: {
    todos: [
      { text: 'Learn JavaScript' },
      { text: 'Learn Vue' },
      { text: 'Build something awesome' }
    ]
  }
})
```

## Formulaires

```html
<div id="app-6">
  <p>{ { message }}</p>
  <input v-model="message">
</div>
```

```js
var app6 = new Vue({
  el: '#app-6',
  data: {
    message: 'Hello Vue!'
  }
})
```

## Boucles

```html

```

```js

```

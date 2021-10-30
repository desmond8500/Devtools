# VUE JS : Props Vue JS

Permet d'envyer des données d'un composant vers un compsant fils.

## Methode 1

Dans le composant parent 

```html
<template>
    <child  :list='listdata' />
</template>
<script>
    import child from './child.vue';
    export default {
        name: 'parent',
        components: [ 
            child
        ]
        data() {
            return {
                listdata: {
                    name: 'naruto',
                    grade: 'junin'
                }
            }
        }
    }
</script>
```

dans le coposant fils

```html
<template>
    <div>
        {{ list.name }}
    </div>
</template>
<script>
    export default {
        name: 'child',
        props: ['list']
    }
</script>
```

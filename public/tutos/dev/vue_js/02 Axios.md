# VUE JS : Axios

## Envoyer des données

```js
export default {
    data: () => ({
        images: null,
    }),
    created(){
        axios.get('/images')
            .then(response => {
                this.images = response.data.data;
                console.log(this.images);
            })
            .catch(error => console.log(error)
            );
    },
}
```

## Recevoir des données

```vue
<template>
    <div>
        <input type="text" class="form-control" v-for="name">
        <input type="file" class="form-control" @change="selectFile">

        <button type="button" @click="store" class="btn btn-primary">Ajouter</button>
    
    </div>
</template>

<script>

export default {
    data: () => ({
        name: 'image',
        photo: null,
    }),

    methods: {
        selectFile(event) {
            this.photo = event.target.files[0];
        },
        store(){
            const data = new FormData();
            data.append('folder', this.photo);
            data.append('name', this.name);

            axios.post('/images',data)
            .then(response => console.log(response))
            .catch(error => console.log(error));
        }
    }
}
</script>
```

# Laravel : Axios

## Description

C'est une librairei qui permet de faire des requettes HTTP 

## Récupérer des données avec laravel

Coté server 

```php
public function index(Request $request){
    $test = Test::all();
    return response()->json($test);
}
```

Coté  frontend

```vue
<template>
    <div>
        <h1>Bienvenue</h1>
        <ul>
            <li v-for="task in tasks" :key="task.id">
                {{ task.prenom }}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                tasks: {}
            }
        },
        created(){
            axios.get('http://localhost:8000/api/tests')
                .then(response => this.tasks = response.data)
                .catch(error => console.log(error)
                );
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
```

## Gestion de la pagination

Pour gérer la pagination avec laravel il faut utiliser la librairie [Laravel vue pagination](https://github.com/gilbitron/laravel-vue-pagination)

```shell
npm install laravel-vue-pagination
```

Ajouter le composant dans le fichier `app.js`

```js
Vue.component('pagination', require('laravel-vue-pagination'));
```

utilier le composant

```vue
<template>
    <div>
        <h1>Bienvenue</h1>
        <ul>
            <li v-for="task in tasks.data" :key="task.id">
                { { task.prenom }}
            </li>
        </ul>
        <pagination :data="tasks" @pagination-change-page="getResults"></pagination>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                tasks: {}
            }
        },
        created(){
            axios.get('http://localhost:8000/api/tests')
                .then(response => {
                    this.tasks = response.data;
                    console.log(response.data);
                    })
                .catch(error => console.log(error)
                );
        },
        mounted() {
            console.log('Component mounted.');
		    this.getResults();
        },
        methods: {
            getResults(page = 1) {
                axios.get('http://localhost:8000/api/tests?page=' + page)
                    .then(response => {
                        this.tasks = response.data;
                    });
            }
        }
    }
</script>
```

coté serveur 

```php
public function index(Request $request)
{
    $test = Test::orderby('prenom')-> paginate(3);
    return response()->json($test);
}
```

## Ajouter des données dans la base avec Axios
v1

```vue
<template>
    <div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" >
                    <div class="form-group">
                        <input type="text" name="prenom" id="prenom" v-model="prenom" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nom" id="nom" v-model="nom" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary" @click="store">Valider</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                prenom: '',
                nom:''
            }
        },
        mounted() {
            console.log('Component mounted.');
        },
        methods: {
            store(){
                axios.post('http://localhost:8000/api/tests',{
                    prenom: this.prenom,
                    nom: this.nom
                })
                .then(response => console.log(response))
                .catch(error => console.log(error));
            },
        }
    }
</script>
``` 
Dans le fichier `app.js`

```js
Vue.component('modal-component', require('./components/Test/ModalComponent.vue').default);
```

## Définir l'url par défaut 

Dans le fichier `bootstrap.js` il faut ajouter : 

```js
window.axios.defaults.baseURL = 'http://example.test';
```

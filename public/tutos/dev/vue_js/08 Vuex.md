# VUE JS : Vuex


## Installation

Dans un projet vue lancer à partir du terminal : 

```bash
npm install axios vuex
```

## Utilisation

1. Créer un fichier `store/index.js`

    ```js
    import Vue from "vue";
    import Vuex from "vuex";
    import clients from './modules/clients';

    Vue.use(Vuex);

    export default new Vuex.Store({
        modules: {
            clients
        },
    });

    ```
2. Créer un fichier `store/modules/clients.js`

    ```js
    import axios from "axios";

    export default {
    namespaced: true,
    state: {
        clients: []
    },
    mutations: {
        setClients(state, data) {
        state.clients = data;
        }
    },
    actions: {
        getClients({ commit }) {
        axios
            .get("http://mydash.yonkou.info/api/dash_client")
            .then(response => {
            commit("setClients", response.data.data);
            })
            .catch(error => {
            console.log(error);
            });
        }
    }
    };

    ```
3. Ajouter dans le fichier main.js

    ```js
    import Vue from "vue";
    import App from "./App.vue";
    import router from "./router";
    import store from "./store/index";

    Vue.config.productionTip = false;

    new Vue({
    router,
    store,
    render: h => h(App)
    }).$mount("#app");

    ```
4. Dans le composant 

    ```js
    import { mapState } from "vuex";

    export default {
        computed: {
            ...mapState('clients', ['clients'])
        },
        created() {
            this.$store.dispatch('clients/getClients');
        }
    };
    ```

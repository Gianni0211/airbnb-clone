import Vue from "vue";

import axios from "axios";
axios.defaults.baseURL = "http://localhost:8000/";

import Vuelidate from "vuelidate";
Vue.use(Vuelidate);

import store from "./Store/store";

import router from "./router";
import App from "./App.vue";

store.dispatch("auth/me").then(() => {
    store.dispatch("assets/fetchCategory").then(() => {
        new Vue({
            router,
            store,
            render: h => h(App)
        }).$mount("#app");
    });
});

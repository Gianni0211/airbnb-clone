import Vue from "vue";

import axios from "axios";
axios.defaults.baseURL = "http://localhost:8000/";


import store from "./Store/store";

import router from "./router";
import App from "./App.vue";


store.dispatch("auth/me").then(() => {
    new Vue({
        router,
        store,
        render: h => h(App)
    }).$mount("#app");
});

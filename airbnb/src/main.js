
import Vue from 'vue'

import store from './Store/store';

import router from './router';
import App from './App.vue';

import axios from 'axios';
axios.defaults.withCredentials = true
axios.defaults.baseURL = 'http://localhost:8000/';




store.dispatch('auth/me').then(() => {
    new Vue({
      router,
      store,
      render: h => h(App)
    }).$mount('#app')
  })


// import Vue from 'vue';
// import Vuex from "vuex";
// import auth from "./auth";
// import axios from "axios";

// Vue.use(Vuex);

// export default new Vuex.Store({
//   modules: {
//     auth,

//   },
//   state: {
//     categories: [],
//   },

//   mutations: {
//     setCategory(state, categories) {
//       console.log(categories);
//       categories.forEach((category) => {
//         state.categories.push(category);
//       });
//     },
//   },
//   actions: {
//     async fetchCategory(context) {
//       const res = await axios.get("/get_all_categories");
//       context.commit("setCategory", res.data);
//     },
//   },
// });

import Vue from "vue";
import Vuex from "vuex";

import axios from "axios";
axios.defaults.baseURL = "http://localhost:8000/";
axios.defaults.accept = "application/json";
Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        categories: [],
        isLoggedIn: !!localStorage.getItem("token"),
        user: null
    },

    mutations: {
        setCategory(state, categories) {
            console.log(categories);
            categories.forEach(category => {
                state.categories.push(category);
            });
        },
        loginUser(state,response) {
          localStorage.setItem("token", response.data.access_token);
            state.isLoggedIn = true;
        },
        logoutUser(state) {
          localStorage.removeItem("token");
          state.isLoggedIn = false;
          state.user = null;
        },
        SET_USER(state, value) {
            state.user = value;
        },
        
    },
    actions: {
        async fetchCategory(context) {
            const res = await axios.get("/get_all_categories");
            context.commit("setCategory", res.data);
        },
        me({ commit }) {
            axios
                .get("/api/auth/me", {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("token")
                    }
                })
                .then(response => {
                    console.log(response);
                    commit("SET_USER", response.data);
                });
        }
    }
});

import Vue from 'vue';
import Vuex from "vuex";
import auth from "./auth";
import axios from "axios";

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    auth,
    
  },
  state: {
    categories: [],
  },

  mutations: {
    setCategory(state, categories) {
      console.log(categories);
      categories.forEach((category) => {
        state.categories.push(category);
      });
    },
  },
  actions: {
    async fetchCategory(context) {
      const res = await axios.get("/get_all_categories");
      context.commit("setCategory", res.data);
    },
  },
});

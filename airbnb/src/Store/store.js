import Vue from "vue";
import Vuex from "vuex";
import auth from "./auth";
import assets from "./assets";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        auth,
        assets
    }
});

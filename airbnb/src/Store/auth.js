import axios from "axios";
axios.defaults.withCredentials = true;
axios.defaults.baseURL = "http://localhost:8000/";
axios.defaults.accept = "application/json";

export default {
    namespaced: true,
    state: {
        isLoggedIn: !!localStorage.getItem("token"),
        user: null
    },
    mutations: {
        loginUser(state) {
            state.isLoggedIn = true;
        },
        logoutUser(state) {
            state.isLoggedIn = false;
        },
        SET_USER(state, value) {
            state.user = value;
        }
    },
    actions: {
        me({ commit }) {
            axios
                .get("/api/auth/me", {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("token")
                    }
                })
                .then(response => {
                    console.log(response);
                    commit('SET_USER', response.data)
                });
        }
    }
};

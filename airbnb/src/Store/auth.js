import axios from "axios";

export default {
    namespaced: true,
    state: {
        isLoggedIn: !!localStorage.getItem("token"),
        user: null
    },
    getters: {
        authenticated(state) {
            return state.authenticated;
        },

        user(state) {
            return state.user;
        }
    },
    mutations: {
        loginUser(state, response) {
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
                   
                    commit("SET_USER", response.data);
                });
        }
    }
};

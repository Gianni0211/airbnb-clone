import axios from "axios";

export default {
    namespaced: true,
    state: {
        isLoggedIn: !!localStorage.getItem("token"),
        user: null,
        isHost : false,
    },
    getters: {
        authenticated(state) {
            return state.isLoggedIn;
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
        LOGOUT_USER(state) {
            localStorage.removeItem("token");
            state.isLoggedIn = false;
            state.user = null;
        },
        SET_USER(state, value) {
            state.user = value;
            state.isHost = !!value.is_host;
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
        },
        logoutUser({commit}) {
          
                axios
                    .post("/api/auth/logout", '',{
                        headers: {
                            Authorization:
                                "Bearer " + localStorage.getItem("token"),
                            
                        }
                    })
                    .then(()=> {
                        console.log('out');
                        commit("LOGOUT_USER");
                    }).catch(() => {
                        commit("LOGOUT_USER");
                    })
            
        }
    }
};

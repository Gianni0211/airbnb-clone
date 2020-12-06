import Vue from "vue";
import VueRouter from "vue-router";
import store from './Store/store';

//Pagine
import Home from "./Views/Home";
import LocationCreate from "./Views/LocationCreate.vue";
import Login from "./Views/Login";
import Register from "./Views/Register";
import Index from "./Views/Index";
import Show from "./Views/Show";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        component: Home,
        name: "home"
    },
    {
        path: "/location/create",
        component: LocationCreate,
        name: "location.create",
        beforeEnter: (to,from,next) => {
            const isLoggedIn = store.state.auth.isLoggedIn  
            if(!isLoggedIn) next ({name: 'Login'})
            else next()
        }
    },
    {
        path: "/SingIn",
        component: Login,
        name: "Login"
    },
    {
        path: "/Register",
        component: Register,
        name: "Register"
    },
    {
        path: "/Index",
        component: Index,
        name: "location.index"
    },
    {
        path: "/Show/:id",
        component: Show,
        name: "location.show"
    },

];

const router = new VueRouter({ mode: "history", routes });



export default router;

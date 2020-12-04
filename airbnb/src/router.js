import Vue from 'vue';
import VueRouter from 'vue-router';

//Pagine
import Home from './Views/Home';
import LocationCreate from './Views/LocationCreate.vue';
import Login from './Views/Login';

Vue.use(VueRouter);

const routes = [
 {
  path: '/',
  component: Home,
  name: 'home'
 },
 {
  path: '/location/create',
  component: LocationCreate,
  name: 'location.create'
 },
 {
  path: '/SingIn',
  component: Login,
  name: 'Login'
 }
]

const router =  new VueRouter({mode:'history',routes});
 

export default router;
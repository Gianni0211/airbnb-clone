<template>
  <div
    class="h-50 w-64 bg-white rounded-xl absolute right-40 top-16 mt-2 text-black shadow z-50 transition-all duration-500 overflow-hidden"
  >
    <ul class="">
      <div v-if="authenticated">
        <li>
          <a @click.prevent="signout" href="#" class="hover:bg-gray-100 block p-3 text-sm"
            >SignOut</a
          >
        </li>
      </div>
      <div v-else>
        <li>
          <router-link to="/SingIn" class="hover:bg-gray-100 block p-3 text-sm"
            >Login</router-link
          >
        </li>
        <li>
          <router-link
            to="/register"
            class="hover:bg-gray-100 block p-3 text-sm"
            >Register</router-link
          >
        </li>
      </div>

      <li>
        <a href="" class="hover:bg-gray-100 block p-3 text-sm">Salvati</a>
      </li>
    </ul>
    <hr />
    <ul class="">
      <li>
        <a href="" class="hover:bg-gray-100 block p-3 text-sm">Messaggi</a>
      </li>
      <li><a href="" class="hover:bg-gray-100 block p-3 text-sm">Viaggi</a></li>
      <li>
        <a href="" class="hover:bg-gray-100 block p-3 text-sm">Salvati</a>
      </li>
    </ul>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters({
      authenticated: "auth/authenticated",
    }),
    
  },
  methods: {
    ...mapActions({
      logout : 'auth/logoutUser',
    }),

    signout () {
      this.logout();
      this.$router.push({name: 'Home'});
    }
  }
};
</script>


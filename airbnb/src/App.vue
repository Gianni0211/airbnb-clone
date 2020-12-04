<template>
  <app-container>
    <router-view />
    <a href="#" @click.prevent="signOut">Signout </a>
  </app-container>
</template>

<script>
import AppContainer from "./Layouts/AppContainer";
import { mapGetters, mapActions } from "vuex";
export default {
  components: {
    AppContainer,
  },
  computed: {
    ...mapGetters({
      authenticated: "auth/authenticated",
      user: "user",
    }),
  },

  methods: {
    ...mapActions({
      signOutAction: "auth/signOut",
    }),

    async signOut() {
      await this.signOutAction();

      this.$router.replace({ name: "home" });
    },
  },
};
</script>

<style>
</style>
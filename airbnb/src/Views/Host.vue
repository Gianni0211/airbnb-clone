<template>
  <div
    class="container flex md:flex-row flex-col mx-auto my-10 justify-between"
  >
    <div class="md:w-1/2 full self-center flex flex-col md:inline-block ">
      <h1 class="font-bold text-4xl">
        Cosa Aspetti? Unisciti alla nostra Comunity di Host
      </h1>
      <p class="text-lg mt-5 font-semibold">
        Ogni giorni milioni di nuovi utenti decidono di condividere le loro case
      </p>
      <button
        @click="requestHost"
        class="text-white font-bold text-lg py-3 px-5 rounded-xl bg-gradient-to-br to-pink-600 from-red-500 my-5 justify-self-center "
      >
        Diventa host
      </button>
    </div>
    <div class="md:w-1/2 w-full text-center md:mt-0 mt-8  order-first md:order-last">
      <img src="@/assets/images/couple.svg" alt="" />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { mapGetters } from "vuex";
export default {
  name: "Host",
  methods: {
    requestHost() {
      axios.post(`api/host/send/${this.user.id}`, {
        headers: { Authorization: "Bearer" + localStorage.getItem("token") },
      });
    },
  },
  computed: {
    ...mapGetters({ user: "auth/user" }),
  },
};
</script>

<style>
</style>
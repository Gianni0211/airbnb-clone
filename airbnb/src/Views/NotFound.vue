<template>
  <div class="container-xl py-5  bg-gray-100 ">
    <div class="container flex">
   <div class="w-1/2 my-auto">
     <h1 class="text-6xl font-bold my-3">Oops!</h1>
     <h2>Sembra che non riusciamo a trovare la pagina che stai cercando</h2>
     <p class="text-gray-400  my-3 mb-5">Codice errore: 404</p>
     <router-link class="text-white font-bold text-lg py-3 px-5 rounded-xl bg-gradient-to-br to-pink-600 from-red-500 " :to="{name: 'Home'}">Home</router-link>
   </div>
   <div class="w-1/2">
     <img src="@/assets/404.gif" alt="ooops">
   </div>
  </div>
  </div>
</template>

<script>
export default {
name: 'NotFound',
}
</script>

<style>

</style>
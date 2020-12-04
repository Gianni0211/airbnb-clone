<template>
  <div class="h2-container ">
    <h2 class="section-title">Esperienze online</h2>
    <p class="section-p">Incontra persone di tutto il mondo mentre provi qualcosa di nuovo. Partecipa a sessioni video interattive, in diretta, condotte da host unici, senza muoverti da casa.</p>
  </div>
</template>

<script>
export default {
 name: 'TitleSection'

}
</script>

<style scoped>
.h2-container{
 @apply text-left  p-5 pl-0 ml-0 mb-3 w-full ;
 /* flex: 1 1 0; */
 
}
.section-title{
 @apply text-3xl font-bold;
}
.section-p{
 @apply text-xl ;
}

</style>
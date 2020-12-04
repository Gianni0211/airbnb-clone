<template>
  <div class="btn-container   lg:m-15">
    <a href="" class="explore-btn">Esplora tutto</a>
   </div>
</template>

<script>
export default {
name: 'Button'
}
</script>

<style scoped>
.btn-container{
 @apply    flex items-center;
}
.explore-btn{
 @apply text-xl font-bold border rounded-lg mx-auto  border-white border-solid py-2 px-4;
}
.explore-btn:hover{
 background-color: rgba(113,113,113) ;
}

</style>
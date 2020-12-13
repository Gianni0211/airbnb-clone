<template>
  
   <div class="card flex flex-col" :class="{'light' : light }">
   <img class="img-card" :src="img" :alt="text">
   <p class="text-card">{{text}}</p>

   </div>
  
</template>

<script>
export default {
name: 'CardGrid',
 
 props: {
    light: {
       type: Boolean,
       deafult: false,
    },
    img: {
       type: String,
       default: 'https://picsum.photos/seed/picsum/200',
    },
    text:{
       type: String,
       default: 'Testo della carta',
    },
   
 },

}
</script>

<style scoped >

.light{
    background-color: white !important;
    color: black  !important;
    @apply shadow;
}


.card{
  background-color: rgba(34,34,34);
 overflow: hidden;
 @apply  rounded-xl h-full w-full  ;

}
.img-card{

 height: 75%;
 min-width: 50%;
 max-width: 100%;
 
 align-self: stretch;

}
.text-card{
 @apply text-lg  text-left p-5 ;
}
</style>
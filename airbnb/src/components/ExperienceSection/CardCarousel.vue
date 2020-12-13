<template>
  
   <div class="card  mx-2  " :class="{'light' : light}">
   <img class="img-card" :src="img" :alt="text">
   <p class="text-card truncate ">{{text}}</p>

   </div>
  
</template>

<script>
export default {
name: 'Cards',
 
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
    }
 }
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
 width: 80vw;
 @apply  rounded-xl h-full   flex flex-col;

}
.img-card{

 height: 75%;
 
 width: 80vw;
 

}
.text-card{
 @apply text-lg  text-left p-5 ;
}
</style>
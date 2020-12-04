<template>
<div>
  <div  class="md:flex hidden  justify-center mx-auto  p-10 p-custom container-xl md:px-32">
   <div v-for="category in categories" :key="category.id" class="mx-2 w-custom"><CardGrid :img="category.img" :text="category.name" :light="true" /></div>
   
   
  </div>
  <div  class="md:hidden w-full carousel-container p-10">
      <CardCarousel  v-for="category in categories" :key="category.id" :img="category.img" :text="category.name" :light="true" />
     
      
      
    </div>
  </div>
  
</template>

<script>
import CardGrid from './ExperienceSection/CardGrid';
import CardCarousel from './ExperienceSection/CardCarousel';
import axios from 'axios';

export default {
name: 'Categories',
components:{
 CardGrid,
 CardCarousel
 
},
data(){
  return {
    categories: []
  }
},
methods: {
  
},
created(){
  axios.get('/get_all_categories').then((res) => {
      this.categories = res.data;
      
    }).catch((err) => {
      console.log(err);
    });
}
}
</script>

<style scoped>
.w-custom{
 width: 500px;
 height: 400px;
}
.p-custom{
 padding: 80px 0 80px 0;
}
.carousel-container {
  @apply mx-auto text-white overflow-x-auto whitespace-nowrap;
}
.carousel-container::-webkit-scrollbar {
  display: none;
}

</style>
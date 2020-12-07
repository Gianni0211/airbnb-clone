<template>
  <div>
   <div v-for="location in locations" :key="location.id">{{location.name}}</div>
   
  </div>
   
</template>

<script>
import axios from 'axios';
export default {
 name: 'Index',
 data(){
  return {
   locations: [],
  }
 },
 mounted(){
  
  if(this.$route.query){
    axios.get('/api/location/index', {params:{...this.$route.query}}).then(res => {
      console.log(res.data);
      
    res.data.data.forEach(loc => {
     this.locations.push(loc);
    });
    })

  }
  else {
    axios.get('/api/location/index').then(res => {
    res.data.data.forEach(loc => {
     this.locations.push(loc);
    });
    })

  }
 },
 

 

 

}

</script>

<style>

</style>
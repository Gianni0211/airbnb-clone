<template>
  <div>
   <h1 v-if="location">{{location.name}}</h1>
  </div>
</template>

<script>
import axios from 'axios';
export default {
name: 'Show',
data(){
 return {
  location: null,
 }
},
created(){
 const id = this.$route.params.id;
 axios.get(`/api/location/show/${id}`).then(res => {
  this.location = res.data.data;
 })
},
}
</script>

<style>

</style>
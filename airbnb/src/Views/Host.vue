<template>
  <div>
   <button @click="requestHost" class="">Diventa host</button>
  </div>
</template>

<script>
import axios from 'axios';
import {mapGetters} from 'vuex';
export default {
name: 'Host',
methods: {
 requestHost(){
  axios.post(`api/host/send/${this.user.id}`, {headers: {Authorization: 'Bearer' + localStorage.getItem('token')}});

 }
},
computed:{
 ...mapGetters({user: 'auth/user'})
}
}
</script>

<style>

</style>
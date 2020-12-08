<template>
  <div class="container-xl px-8">
    <div v-for="location in locations" :key="location.id" class="mr-5 h-64 flex items-center  border-t">
      <div class="mr-20"><img src="../assets/logo.png" alt=""></div>
      <div class="self-start mt-10"> 
        <p class="text-sm text-gray-400 ">{{location.subtitle}}</p>
        <h2 class="text-xl">{{ location.name }}</h2>
        <hr class="w-10 mt-2">
        <p class="text-sm text-gray-400 ">{{location.description}}</p>
        </div>
     
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "Index",
  data() {
    return {
      locations: [],
    };
  },
  methods: {
    fetchData() {
      if (this.$route.query) {
        axios
          .get("/api/location/index", { params: { ...this.$route.query } })
          .then((res) => {
           this.locations =  res.data.data
          });
      } else {
        axios.get("/api/location/index").then((res) => {
           this.locations =  res.data.data
        });
      }
    },
  },
  mounted() {
    this.fetchData();
  },

  watch: {
    $route() {
      this.fetchData();
    },
  },
};
</script>

<style>
</style>
<template>
  <div>
    <div v-for="location in locations" :key="location.id">
      {{ location.name }}
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
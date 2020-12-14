<template>
  <div class="container-xl md:px-8">
    <h1 class="text-3xl font-semibold text-center my-5 " v-if="$route.query.cat">{{categoryName}}</h1>
    <div v-for="location in locations" :key="location.id">
        <index-card :location="location"/>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import IndexCard from '../components/IndexCard.vue';
import { mapGetters} from 'vuex';

export default {
  components: { IndexCard },
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
            this.locations = res.data.data;
          });
      } else {
        axios.get("/api/location/index").then((res) => {
          this.locations = res.data.data;
        });
      }
    },

    
  },
  computed: {
     ...mapGetters({categories : 'assets/categories'}),
    categoryName: function(){
      
      let category = this.categories.filter(el => {
        
        return el.id == this.$route.query.cat;
      });
      
      return category[0].name;
    }

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

<style scoped>

</style>
<template>
  <div
    class="container-xl carousel-container md:mx-auto flex flex-col justify-between md:items-center items-start w-full py-20"
  >
    <div class="md:flex hidden justify-center mx-auto w-full">
      <router-link
        :to="{ name: 'location.index', query: { cat: category.id } }"
        v-for="category in categories"
        :key="category.id"
        class="mx-2 w-custom"
        ><CardGrid :img="category.img" :text="category.name" :light="true" />
      </router-link>
    </div>
    <div class="md:hidden flex">
      <router-link
        :to="{ name: 'location.index', query: { cat: category.id } }"
        v-for="category in categories"
        :key="category.id"
      >
        <CardCarousel :img="category.img" :text="category.name" :light="true" />
      </router-link>
    </div>
  </div>
</template>

<script>
import CardGrid from "./ExperienceSection/CardGrid";
import CardCarousel from "./ExperienceSection/CardCarousel";

import { mapGetters } from "vuex";

export default {
  name: "Categories",
  components: {
    CardGrid,
    CardCarousel,
  },

  computed: {
    ...mapGetters({ categories: "assets/categories" }),
  },
};
</script>

<style scoped>
.w-custom {
  width: 500px;
  height: 400px;
}

.p-custom {
  padding: 80px 0 80px 0;
}
.carousel-container {
  @apply text-white overflow-x-auto whitespace-nowrap;
}
.carousel-container::-webkit-scrollbar {
  display: none;
}
</style>
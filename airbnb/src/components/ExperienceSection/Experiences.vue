<template>
  <div
    class="bg-black text-white container-xl mx-auto flex flex-col justify-between items-center w-full py-20 px-5"
    id="experiences"
  >
    <div
      class="container-xl lg:px-32 text-white flex justify-between items-center"
    >
      <div class="md:w-2/4">
        <TitleSection />
      </div>

      <div class="hidden md:block">
        <Button />
      </div>
    </div>

    <div class="md:hidden w-full carousel-container">
      <CardCarousel v-for="loc in topFour" :key="loc.id" :text="loc.name"/>
     
    </div>
    <div class="md:block hidden">
      <Grid v-if="topFour.length >= 4" class="mx-auto" :topFour="topFour" />
    </div>

    <div class="md:hidden btn-small mt-5">
      <Button />
    </div>
  </div>
</template>

<script>
import TitleSection from "./TitleSection.vue";
import Button from "./Button.vue";

import Grid from "./Grid.vue";
import CardCarousel from "./CardCarousel";

import axios from "axios";
export default {
  name: "experiences",
  data() {
    return {
      topFour: [],
    };
  },
  created() {
    axios.get("/api/location/index").then((res) => {
      res.data.data.slice(0, 4).forEach((l) => this.topFour.push(l));
    });
  },
  components: {
    Button,
    TitleSection,

    Grid,
    CardCarousel,
  },
};
</script>

<style scoped>
.container-custom {
  @apply text-white flex justify-between;
}

.btn-small {
  @apply mx-auto text-white;
}
#experiences {
  min-height: 75vh !important;
}

.carousel-container {
  @apply mx-auto text-white overflow-x-auto whitespace-nowrap;
}
.carousel-container::-webkit-scrollbar {
  display: none;
}
</style>
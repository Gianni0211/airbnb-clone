<template>
  <div
    class="bg-black text-white container-xl mx-auto flex flex-col justify-between items-center w-full py-20 px-5 "
    id="experiences"
  >
    <div class="container-xl lg:px-32 text-white flex justify-between items-center">
      <div class="md:w-2/4">
        <TitleSection />
      </div>

      <div class="hidden md:block">
        <Button />
      </div>
    </div>

    <div class="md:hidden w-full carousel-container">
      <CardCarousel/>
      <CardCarousel/>
      <CardCarousel/>
      <CardCarousel/>
    </div>
    <div class="md:block hidden">
      <Grid class="mx-auto" />
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
import CardCarousel from './CardCarousel'
export default {
  name: "experiences",
  components: {
    
    Button,
    TitleSection,
    
    Grid,
    CardCarousel
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
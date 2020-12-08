<template>
  <div class="flex mr-20 px-10 relative"  @mouseenter="togleArrows"
        @mouseleave="togleArrows">
    <button v-if="arrows" @click="onScroll($event, 'left')" class=" absolute left-5 top-20 arrows"><i class="fas fa-chevron-left"></i></button>
    <div
      class=" overflow-x-auto whitespace-nowrap w-64 h-48 carousel-container shadow rounded-xl mx-auto"
      
    >
      <img
        v-for="image in photos"
        :key="image.id"
        :src="image.file"
        alt=""
        class="inline-block w-full h-full"
       
      />
    </div>

    <button v-if="arrows" @click="onScroll($event,'right')" class=" absolute right-5 top-20 arrows"><i class="fas fa-chevron-right"></i></button>
  </div>
</template>

<script>
export default {
  name: "photoCarousel",
  props: {
    images: {
      type: Array,
      required: true,
    },
    defaultImage: {
      type: String,
      required: false,
      default: "https://via.placeholder.com/200x300",
    },
  },
  data (){
      return {
          arrows: false,
          scrolled : null
      }
  },
  computed: {
    photos: function () {
      if (this.images.length == 0) {
        return [{ id: 0, file: this.defaultImage }];
      }
      return this.images;
    },
  },
  methods: {
    onScroll(e, direction) {
      const elementoScrollato = e.target.closest("div").children[1];
     if(direction == 'left'){
        elementoScrollato.scrollLeft -= elementoScrollato.offsetWidth;
     }else if(direction == 'right'){
         elementoScrollato.scrollLeft += elementoScrollato.offsetWidth;
     }
    },
    togleArrows() {
        this.arrows = !this.arrows;
    },

  },
  updated(){
      console.log(this.arrows)
  }
};
</script>

<style scoped>
    .carousel-container::-webkit-scrollbar {
    display: none;
    }
    .arrows {
        @apply h-10 w-10 rounded-full bg-white text-air-500 shadow-xl focus:outline-none;
    }
</style>
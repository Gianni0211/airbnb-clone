<template>
  <router-link
    :to="{
      name: 'location.show',
      params: {
        id: location.id,
      },
    }"
  >
    <div
      class="md:mr-5 mx-3 md:h-64 flex flex-col md:flex-row items-center md:border-t border rounded-xl md:shadow-none shadow md:p-0 p-5 my-3"
    >
      <div class="">
        <photo-carousel
          :images="location.images"
          @click.prevent
          :full="mobile"
        />
      </div>

      <div class="self-start mt-10">
        <p class="text-sm text-gray-400">{{ location.subtitle }}</p>
        <h2 class="text-xl">{{ location.name }}</h2>
        <hr class="w-10 mt-2" />
        <p class="text-sm text-gray-400">{{ location.description }}</p>
      </div>
    </div>
  </router-link>
</template>

<script>
import PhotoCarousel from "../components/PhotoCarousel.vue";
export default {
  name: "IndexCard",
  components: { PhotoCarousel },
  data() {
    return {
      mobile:null ,
    };
  },
  props: {
    location: {
      type: Object,
      required: true,
    },
  },
  created() {
    window.addEventListener("resize", this.myEventHandler);
  },
  destroyed() {
    window.removeEventListener("resize", this.myEventHandler);
  },
  methods: {
    myEventHandler(e) {
      if (e.target.innerWidth > 700) {
        this.mobile = false;
      } else {
        this.mobile = true;
      }
    },
  },
};
</script>

<style scoped></style>

<template>
  <div class="py-10 container-xl lg:container px-8">
    <h1 class="font-bold text-2xl">{{ location.name }}</h1>
    <ul class="flex justify-between mt-3">
      <div class="flex justify-between w-80">
        <li>
          <i class="fa fa-star text-air-500"></i> 5.0
          <span class="text-gray-400">(20)</span>
        </li>
        <li>
          <i class="fas fa-certificate text-air-500"></i>
          <span class="text-gray-400">Superhost</span>
        </li>
        <li>
          <router-link to="/" class="text-gray-600 underline">{{
            location.place.name
          }}</router-link>
        </li>
      </div>
      <div class="md:flex w-32 justify-between text-gray-700 mr-5 hidden ">
        <li class="flex items-center">
          <i class="mr-2 fas fa-share-square"></i
          ><span class="underline">Condividi</span>
        </li>
        <li class="flex items-center ml-2">
          <i class="mr-2 far fa-heart"></i><span class="underline">Salva</span>
        </li>
      </div>
    </ul>

    <!-- immagini -->

    <!-- <img :src="location.images[index].file" class="w-full h-full" alt="" />
     -->
    <photo-carousel :images="location.images" class="mt-8 md:hidden" full />
    <div
      class="grid-container rounded-xl border mt-8 overflow-hidden relative hidden md:grid"
    >
      <div class="d">
        <img :src="location.images[0].file" class="w-full h-full" alt="" />
      </div>
      <div class="B">
        <div class="a">
          <img :src="location.images[1].file" class="w-full h-full" alt="" />
        </div>
        <div class="b">
          <img :src="location.images[2].file" class="w-full h-full" alt="" />
        </div>
        <div class="c">
          <img :src="location.images[3].file" class="w-full h-full" alt="" />
        </div>
        <div class="D">
          <img :src="location.images[4].file" class="w-full h-full" alt="" />
        </div>
      </div>
      <button
        v-if="more"
        class="font-semibold absolute bottom-5 right-5 bg-gray-50 px-3 py-2 rounded-xl border border-black flex items-center"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 17 17"
          role="presentation"
          aria-hidden="true"
          focusable="false"
          class="mr-2"
          style="height: 12px; width: 12px; display: block; fill: currentcolor"
        >
          <circle cx="1.5" cy="1.5" r="1.5"></circle>
          <circle cx="1.5" cy="8.5" r="1.5"></circle>
          <circle cx="8.5" cy="1.5" r="1.5"></circle>
          <circle cx="8.5" cy="8.5" r="1.5"></circle>
          <circle cx="15.5" cy="1.5" r="1.5"></circle>
          <circle cx="15.5" cy="8.5" r="1.5"></circle>
          <circle cx="1.5" cy="15.5" r="1.5"></circle>
          <circle cx="8.5" cy="15.5" r="1.5"></circle>
          <circle cx="15.5" cy="15.5" r="1.5"></circle></svg
        >Mostra tutte le foto
      </button>
    </div>
    <div class="container-xl flex-wrap flex relative mt-16">
      <div class="md:w-8/12 w-full">
        <!--title-->
        <div class="flex justify-between items-center border-b pb-6">
          <div>
            <h1 class="text-2xl font-bold text-black my-3">
              {{ location.name }}
            </h1>
            <ul class="text-sm text-gray-500">
              <li>{{ location.guest_number }} ospiti</li>
            </ul>
          </div>
          <img
            :src="location.user.profile_photo_path"
            alt=""
            class="h-16 w-16 rounded-full shadow"
          />
        </div>
        <!-- features -->
        <ul class="border-b border-gray-300">
          <li class="flex items-center my-4">
            <i class="fas fa-home fa-2x mr-3"></i>
            <div>
              <h3 class="text-lg font-bold">Casa intera</h3>
              <p class="text-gray-500">
                Casa: sarà a tua completa disposizione.
              </p>
            </div>
          </li>
          <li class="flex items-center my-4">
            <i class="fas fa-home fa-2x mr-3"></i>
            <div>
              <h3 class="text-lg font-bold">Casa intera</h3>
              <p class="text-gray-500">
                Casa: sarà a tua completa disposizione.
              </p>
            </div>
          </li>
          <li class="flex items-center my-4">
            <i class="fas fa-home fa-2x mr-3"></i>
            <div>
              <h3 class="text-lg font-bold">Casa intera</h3>
              <p class="text-gray-500">
                Casa: sarà a tua completa disposizione.
              </p>
            </div>
          </li>
          <li class="flex items-center my-4">
            <i class="fas fa-home fa-2x mr-3"></i>
            <div>
              <h3 class="text-lg font-bold">Casa intera</h3>
              <p class="text-gray-500">
                Casa: sarà a tua completa disposizione.
              </p>
            </div>
          </li>
          <li class="flex items-center my-4">
            <i class="fas fa-home fa-2x mr-3"></i>
            <div>
              <h3 class="text-lg font-bold">Casa intera</h3>
              <p class="text-gray-500">
                Casa: sarà a tua completa disposizione.
              </p>
            </div>
          </li>
        </ul>
        <div class="my-5 text-lg">
          <p class="mb-5">
            {{location.description}}
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed earum deserunt eius quo, quaerat et eum ullam nulla aspernatur doloribus quod aut, sequi voluptatem. Blanditiis, quas iusto. Reiciendis, expedita quasi! At possimus, nostrum incidunt itaque quibusdam ipsum. Suscipit asperiores blanditiis provident eos sed. Praesentium modi, neque autem quisquam pariatur voluptatum!
          </p>

          <a href="#" class="underline font-semibold  mt-20">Contatta l'host</a>
        </div>
      </div>
      <div
        class="z-100 fixed left-0 bottom-0 h-16 md:h-64 bg-white md:w-4/12 w-full md:sticky md:top-32 md:mt-20 flex items-center border-t md:border-none"
      >
        <!--Bottom navigation bar-->
        <div class="flex md:hidden w-full justify-between px-10">
          <div class="flex-col flex justify-center">
            <p class="text-bold text-xl">
              {{ location.price }}€<span class="text-gray-600 text-sm"
                >/notte</span
              >
            </p>
            <span class="text-sm"
              ><i class="fas fa-star text-xs text-air-500"></i> 5
              <span class="text-gray-500 text-xs">(22)</span></span
            >
          </div>

          <button
            class="text-white font-bold text-lg py-3 px-5 rounded-xl bg-gradient-to-br to-pink-600 from-red-500"
          >
            Prenota
          </button>
        </div>

        <!--md-->
        <div
          class="hidden md:flex bg-white justify-evenly w-10/12 mx-auto border shadow-md rounded-xl flex-col p-3"
        >
          <!--price-->
          <div class="flex justify-between items-center">
            <p class="text-bold text-xl">
              {{ location.price }}€<span class="text-gray-600 text-sm"
                >/notte</span
              >
            </p>
            <span class="text-sm"
              ><i class="fas fa-star text-xs text-air-500"></i> 5
              <span class="text-gray-500 text-xs">(22)</span></span
            >
          </div>
          <!--Date picker -->
          <div
            class="flex-col rounded-xl border border-gray-400 overflow-hidden my-5"
          >
            <div class="h-16">
              <div class="w-1/2 border-r h-full border-gray-400"></div>
              <div class="w-1/2"></div>
            </div>
            <div class="h-16 border-t border-gray-400"></div>
          </div>
          <!--Bottone-->
          <button
            class="text-white font-bold text-lg py-3 px-5 rounded-xl bg-gradient-to-br to-pink-600 from-red-500 my-2"
          >
            Prenota
          </button>
          <p class="text-gray-700 text-center text-sm">
            Non riceverai alcun addebito in questa fase
          </p>

          <div
            class="flex justify-between border-t border-gray-400 py-5 mt-5 font-bold text-xl"
          >
            <p>Totale</p>
            <p>378€</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import PhotoCarousel from "../components/PhotoCarousel.vue";
export default {
  components: { PhotoCarousel },
  name: "Show",
  data() {
    return {
      location: null,
    };
  },
  computed: {
    more: function () {
      return this.location.images.length >= 5 ? true : false;
    },
  },
  created() {
    const id = this.$route.params.id;
    axios.get(`/api/location/show/${id}`).then((res) => {
      this.location = res.data.data[0];
    });
  },
  mounted() {},
};
</script>

<style scoped>
.grid-container {
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 1fr;
  gap: 20px 20px;
  grid-template-areas: "d B";
}

.d {
  grid-area: d;
}

.B {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 1fr 1fr;
  gap: 20px 20px;
  grid-template-areas:
    "a b"
    "c D";
  grid-area: B;
}

.a {
  grid-area: a;
}

.b {
  grid-area: b;
}

.c {
  grid-area: c;
}

.D {
  grid-area: D;
}
</style>
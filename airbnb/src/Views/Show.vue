<template>
  <div class="py-10 container-xl lg:container px-8" v-if="!isLoading">
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
      <div class="md:flex w-32 justify-between text-gray-700 mr-5 hidden">
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
            <svg
              viewBox="0 0 32 32"
              class="mr-5"
              xmlns="http://www.w3.org/2000/svg"
              aria-hidden="true"
              role="presentation"
              focusable="false"
              style="
                display: block;
                height: 24px;
                width: 24px;
                fill: currentcolor;
              "
            >
              <path
                d="M17.954 2.781l.175.164 13.072 12.842-1.402 1.426-1.8-1.768L28 29a2 2 0 0 1-1.85 1.994L26 31H6a2 2 0 0 1-1.995-1.85L4 29V15.446l-1.8 1.767-1.4-1.426L13.856 2.958a3 3 0 0 1 4.097-.177zm-2.586 1.503l-.096.088L6 13.48 6 29l5-.001V19a2 2 0 0 1 1.85-1.995L13 17h6a2 2 0 0 1 1.995 1.85L21 19v9.999h5V13.48l-9.3-9.135a1.001 1.001 0 0 0-1.332-.06zM19 19h-6v9.999h6z"
              ></path>
            </svg>
            <div>
              <h3 class="text-lg font-semibold">Casa intera</h3>
              <p class="text-gray-500">
                Casa: sarà a tua completa disposizione.
              </p>
            </div>
          </li>
          <li class="flex items-center my-4">
            <svg
              viewBox="0 0 32 32"
              class="mr-5"
              xmlns="http://www.w3.org/2000/svg"
              aria-hidden="true"
              role="presentation"
              focusable="false"
              style="
                display: block;
                height: 24px;
                width: 24px;
                fill: currentcolor;
              "
            >
              <path
                d="M15.032 1.747c.263-1.004 1.692-.993 1.94.015.876 3.577 2.415 6.454 4.614 8.652 2.198 2.199 5.075 3.738 8.652 4.615 1.016.249 1.016 1.693 0 1.942-3.577.877-6.454 2.416-8.652 4.615-2.199 2.198-3.738 5.075-4.615 8.652-.249 1.016-1.693 1.016-1.942 0-.877-3.577-2.416-6.454-4.615-8.652-2.198-2.199-5.075-3.738-8.652-4.615-1.008-.247-1.019-1.676-.015-1.939 3.535-.923 6.394-2.487 8.597-4.69 2.202-2.202 3.765-5.06 4.688-8.595zm.945 3.518l-.133.325c-.88 2.085-2.025 3.914-3.438 5.484l-.33.357-.318.326c-1.6 1.6-3.5 2.893-5.693 3.88l-.475.206-.325.133.352.14c2.108.859 3.952 1.995 5.527 3.407l.358.33.326.319c1.603 1.602 2.887 3.515 3.854 5.732l.203.48.115.291.115-.292c.86-2.108 1.996-3.952 3.408-5.527l.33-.358.319-.326c1.602-1.603 3.515-2.887 5.732-3.854l.48-.203.292-.115-.293-.115c-2.421-.988-4.494-2.34-6.211-4.057-1.603-1.602-2.887-3.515-3.854-5.732l-.203-.48-.138-.351zm11.04-3.891c.13-.502.845-.497.969.007.176.718.48 1.287.913 1.72.433.433 1.002.737 1.72.913.508.125.508.847 0 .972-.718.176-1.287.48-1.72.913-.433.433-.737 1.002-.913 1.72-.125.508-.847.508-.972 0-.176-.718-.48-1.287-.913-1.72-.433-.433-1.002-.737-1.72-.913-.504-.124-.51-.839-.007-.97.71-.185 1.277-.496 1.712-.93.434-.435.745-1.002.93-1.712z"
              ></path>
            </svg>
            <div>
              <h3 class="text-lg font-semibold">Pulizia Avanzata</h3>
              <p class="text-gray-500">
                Questo host si impegna a seguire la procedura avanzata di
                pulizia in 5 fasi di Airbnb. Scopri di più
              </p>
            </div>
          </li>
          <li class="flex items-center my-4">
            <svg
              viewBox="0 0 32 32"
              class="mr-5"
              xmlns="http://www.w3.org/2000/svg"
              aria-hidden="true"
              role="presentation"
              focusable="false"
              style="
                display: block;
                height: 24px;
                width: 24px;
                fill: currentcolor;
              "
            >
              <path
                d="M25 1a2 2 0 0 1 1.995 1.85L27 3l-.001 26H29v2H3v-2h1.999L5 3a2 2 0 0 1 1.85-1.995L7 1zm-4 2H7l-.001 26H21zm4 0h-2v26h1.999zm-7 12a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
              ></path>
            </svg>
            <div>
              <h3 class="text-lg font-semibold">Self check-in</h3>
              <p class="text-gray-500">
                Esegui autonomamente il check-in con l'opzione Smart Lock.
              </p>
            </div>
          </li>
          <li class="flex items-center my-4">
            <svg viewBox="0 0 32 32" class="mr-5 w-24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; height: 24px; width: 24px; fill: currentcolor;"><path d="M12 0v2h8V0h2v2h6a2 2 0 0 1 1.995 1.85L30 4v15.586a2 2 0 0 1-.467 1.284l-.119.13L21 29.414a2 2 0 0 1-1.238.578l-.176.008H7a5 5 0 0 1-4.995-4.783L2 25V4a2 2 0 0 1 1.85-1.995L4 2h6V0zM4 12v13a3 3 0 0 0 2.824 2.995L7 28h11v-5a5 5 0 0 1 4.783-4.995L23 18h5v-6zm23.585 8H23a3 3 0 0 0-2.995 2.824L20 23v4.585zM4 10h24V4h-6v2h-2V4h-8v2h-2V4H4z"></path></svg>
            <div>
              <h3 class="text-lg font-semibold">Termini di cancellazione</h3>
              <p class="text-gray-500">
                puoi pagare un extra per renderla rimborsabile fino al giorno {{day}}.
              </p>
            </div>
          </li>
          <li class="flex items-center my-4">
            <svg
              viewBox="0 0 32 32"
              class="mr-5"
              xmlns="http://www.w3.org/2000/svg"
              aria-hidden="true"
              role="presentation"
              focusable="false"
              style="
                display: block;
                height: 24px;
                width: 24px;
                fill: currentcolor;
              "
            >
              <path
                d="M28.477 1.07a2 2 0 0 1 2.515 1.754L31 3v23.04a2 2 0 0 1-1.34 1.888l-.153.047-13 3.41a2 2 0 0 1-.813.041l-.201-.041-13-3.41a2 2 0 0 1-1.487-1.776L1 26.04V3a2 2 0 0 1 2.35-1.969l.173.039L16 4.448zM29 3L16.523 6.378a2 2 0 0 1-.873.039l-.173-.039L3 3v23.04l13 3.41 13-3.41zm-2 17.984v2l-9 2.5v-2zm0-7v2l-9 2.5v-2zm0-7v2l-9 2.5v-2z"
              ></path>
            </svg>
            <div>
              <h3 class="text-lg font-semibold">Regole della casa</h3>
              <p class="text-gray-500">
                L'host vieta di portare animali domestici, di organizzare feste e di fumare. Mostra i dettagli
              </p>
            </div>
          </li>
        </ul>
        <div class="my-5 text-lg">
          <p class="mb-5">
            {{ location.description }}
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed earum
            deserunt eius quo, quaerat et eum ullam nulla aspernatur doloribus
            quod aut, sequi voluptatem. Blanditiis, quas iusto. Reiciendis,
            expedita quasi! At possimus, nostrum incidunt itaque quibusdam
            ipsum. Suscipit asperiores blanditiis provident eos sed. Praesentium
            modi, neque autem quisquam pariatur voluptatum!
          </p>

          <a href="#" class="underline font-semibold mt-20">Contatta l'host</a>
        </div>
      </div>
      <div
        class="z-100 fixed left-0 bottom-0 h-16 md:h-64 bg-white md:w-4/12 w-full md:sticky md:top-32 md:mt-20 flex flex-col items-center border-t md:border-none"
        :class="{ 'h-full w-full py-20': dateSelectorMode }"
      >
        <!--MobileDate picker-->
        <div v-if="dateSelectorMode" class="mt-10 mb-10 px-20">
          <date-picker
            @change-date="selectedDate"
            value="range"
            is-range
            color="red"
          />

          <label class="mt-10 block font-bold" for="guests"
            >Seleziona posti letto</label
          >
          <select
            v-model="checkout.guests"
            id="guests"
            name="guests"
            autocomplete="guests"
            class="mt-2 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm sm:text-sm"
          >
            <option v-for="n in 15" :key="n">{{ n }}</option>
          </select>
        </div>
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
            @click="selectDate"
            class="text-white font-bold py-3 px-5 rounded-xl bg-gradient-to-br to-pink-600 from-red-500 my-2"
            v-if="!isDateSelected"
          >
            Seleziona date
          </button>

          <book-btn v-else :checkoutData="checkout" :id="location.id" />
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
            <date-picker @change-date="selectedDate" />
            <div class="h-16 border-t border-gray-400 flex flex-col p-2">
              <label class="font-bold" for="">OSPITI</label>
              <select
                class="focus:outline-none"
                name="ospiti"
                id=""
                v-model="checkout.guests"
              >
                <option v-for="n in 15" :key="n" :value="n">{{ n }}</option>
              </select>
            </div>
          </div>
          <!--Bottone-->
          <book-btn :checkoutData="checkout" :id="location.id" />
          <p class="text-gray-700 text-center text-sm">
            Non riceverai alcun addebito in questa fase
          </p>

          <div
            class="flex justify-between border-t border-gray-400 py-5 mt-5 font-bold text-xl"
          >
            <p>Totale</p>
            <p>{{ price }}€</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import PhotoCarousel from "../components/PhotoCarousel.vue";
import DatePicker from "../components/DatePicker.vue";
import BookBtn from "../components/BookBtn.vue";

export default {
  components: { PhotoCarousel, DatePicker, BookBtn },
  name: "Show",
  data() {
    return {
      location: null,
      checkout: {
        range: {
          start: new Date(),
          end: new Date(),
        },
        guests: 1,
      },
      dateSelectorMode: false,
      isDateSelected: false,
      isLoading: true,
      day : new Date(Date.now() + 7 * 24 * 60 * 60 * 1000).toLocaleDateString(),
    };
  },
  methods: {
    selectedDate(e) {
      this.checkout.range = {
        start: e.start.toISOString().split("T")[0],
        end: e.end.toISOString().split("T")[0],
      };
    },
    selectDate() {
      this.dateSelectorMode = true;
    },
  },
  watch: {
    "checkout.range": function () {
      this.dateSelectorMode = false;
      this.isDateSelected = true;
    },
  },
  computed: {
    more: function () {
      return this.location.images.length >= 5 ? true : false;
    },
    price: function () {
      let period =
        Math.abs(
          new Date(this.checkout.range.end) -
            new Date(this.checkout.range.start)
        ) /
        1000 /
        60 /
        60 /
        24;

      return period * this.checkout.guests * this.location.price;
    },
  },
  mounted() {
    const id = this.$route.params.id;
    axios.get(`/api/location/show/${id}`).then((res) => {
      this.location = res.data.data[0];
      this.isLoading = false;
    });
  },
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

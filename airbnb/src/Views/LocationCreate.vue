<template>
  <div class="container py-32">
    <h1 class="text-center">Inserisci</h1>

    <form>
      <h2 class="font-bold text-lg text-red-500 ml-2" v-if="submitStatus">
        Controlla i campi errati
      </h2>
      <div class="shadow-xl sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3 sm:col-span-2">
              <label class="block text-sm font-medium text-gray-700">
                Indirizzo
              </label>
              <div class="mt-1 flex rounded-md shadow-sm">
                <div class="felx flex-col">
                  <place-input id="address" @change="onPlaceChange" />
                  <div v-if="$v.form.address.$dirty">
                    <div class="text-red-600" v-if="!$v.form.address.required">
                      Il campo è obbligatorio
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3 sm:col-span-2">
              <label class="block text-sm font-medium text-gray-700">
                Titolo
              </label>
              <div class="mt-1 flex rounded-md shadow-sm">
                <input
                  v-model="$v.form.title.$model"
                  type="text"
                  name="title"
                  id="title"
                  class="focus:ring-air-500 focus:border-air-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                  placeholder="Airbnb resort"
                />
              </div>
              <div v-if="$v.form.title.$dirty">
                <div class="text-red-600" v-if="!$v.form.title.required">
                  Il campo è obbligatorio
                </div>
              </div>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">
              Descrizione
            </label>
            <div class="mt-1">
              <textarea
                v-model="$v.form.description.$model"
                id="description"
                name="description"
                rows="3"
                :class="{ 'border border-red-600': $v.form.description.$dirty }"
                class="shadow-sm focus:ring-air-500 focus:border-air-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                placeholder="Inizia a scrivere qui..."
              ></textarea>
              <div v-if="$v.form.description.$dirty">
                <div class="text-red-600" v-if="!$v.form.description.required">
                  Il campo è obbligatorio
                </div>
                <div class="text-red-600" v-if="!$v.form.description.minLength">
                  La descrizione deve contenere almeno 10 caratteri
                </div>
              </div>
            </div>
            <p class="mt-2 text-sm text-gray-500">
              Una breve descrizione della tua abitazione.
            </p>
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label for="guest" class="block text-sm font-medium text-gray-700"
              >Posti letto</label
            >
            <select
              v-model="$v.form.guest.$model"
              id="guest"
              name="guest"
              autocomplete="guest"
              class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm sm:text-sm"
            >
              <option selected disabled>Seleziona posti letto</option>
              <option v-for="n in 15" :key="n">{{ n }}</option>
            </select>
            <div v-if="$v.form.guest.$dirty">
              <div class="text-red-600" v-if="!$v.form.guest.required">
                Il campo è obbligatorio
              </div>
            </div>
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label
              for="category"
              class="block text-sm font-medium text-gray-700"
              >Categoria</label
            >
            <select
              v-model="$v.form.category.$model"
              id="category"
              name="category"
              autocomplete="category"
              class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm sm:text-sm"
            >
              <option selected disabled>Seleziona categoria</option>
              <option v-for="cat in categories" :value="cat.id" :key="cat.id">
                {{ cat.name }}
              </option>
            </select>
            <div v-if="$v.form.category.$dirty">
              <div class="text-red-600" v-if="!$v.form.category.required">
                Il campo è obbligatorio
              </div>
            </div>
          </div>

          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3 sm:col-span-2">
              <label class="block text-sm font-medium text-gray-700">
                Prezzo
              </label>
              <div class="mt-1 flex rounded-md shadow-sm">
                <span
                  class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"
                >
                  €
                </span>
                <input
                  v-model="$v.form.price.$model"
                  type="number"
                  name="price"
                  id="price"
                  class="focus:ring-air-500 focus:border-air-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 pl-5"
                  placeholder="30"
                />
                <div v-if="$v.form.price.$dirty">
                  <div class="text-red-600" v-if="!$v.form.price.required">
                    Il campo è obbligatorio
                  </div>
                </div>
              </div>
            </div>
          </div>

          <ImageUploader @uploaded="upload"></ImageUploader>
          <div v-if="$v.form.images.$dirty">
            <div class="text-red-600" v-if="!$v.form.images.minLength">
              Devi inserire almeno 5 immagini
            </div>
          </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
          <button
            @click.prevent="submitForm"
            type="submit"
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-air-500 hover:bg-air-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-air-500"
          >
            Aggiungi la tua Casa
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import PlaceInput from "@/components/PlaceInput";
import { mapActions, mapGetters } from "vuex";
import axios from "axios";
import ImageUploader from "@/components/ImageUploader/Uploader";
import _ from "lodash";
import { required, minLength } from "vuelidate/lib/validators";

export default {
  name: "LocationCreate",
  components: {
    ImageUploader,
    PlaceInput,
  },

  data() {
    return {
      form: {
        title: null,
        description: null,
        guest: null,
        price: null,
        address: null,
        category: null,
        images: [],
      },
      submitStatus: null,
    };
  },
  validations: {
    form: {
      price: {
        required,
      },
      description: {
        required,
        minLength: minLength(10),
      },
      images: {
        required,
        minLength: minLength(5),
      },
      guest: {
        required,
      },
      category: {
        required,
      },
      address: {
        required,
      },
      title: {
        required,
      },
    },
  },

  methods: {
    ...mapActions({ fetchCategory: "assets/fetchCategory" }),
    async submitForm() {
      this.$v.$touch();
      if (this.$v.$invalid) {
        this.submitStatus = "ERROR";
      } else {
        const response = await axios.post(
          "api/location/store",
          {
            ...this.form,
            user: this.user.id,
          },
          {
            headers: {
              Authorization: "Bearer " + localStorage.getItem("token"),
            },
          }
        );
        console.log(response);
        this.$router.push({ name: "thankyou" });
      }
    },

    upload(event) {
      this.form.images = event.images;
      if (this.form.images.length < 5) {
        console.log("ok");
        this.$v.form.images.$touch();
      }
    },
    uploaded(e) {
      console.log(e);
    },

    onPlaceChange(e) {
      this.form.address = {
        name: e.suggestion.name,
        region: _.kebabCase(e.suggestion.administrative.replace("/", "-")),
        region_code: e.suggestion.hit.county[1] || e.suggestion.hit.county[0],
        country_code: e.suggestion.countryCode,
        post_code: e.suggestion.postcode || e.suggestion.hit.objectID,
        cordinates: e.suggestion.latlng,
      };
    },
  },
  created: function () {
    this.fetchCategory();
    console.log(this.user);
  },
  computed: {
    ...mapGetters({
      user: "auth/user",
      categories: "assets/categories",
    }),
  },
};
</script>

<style></style>

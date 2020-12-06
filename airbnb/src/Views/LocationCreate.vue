<template>
  <div class="container py-32">
    <h1 class="text-center">Inserisci</h1>

    <form>
      <div class="shadow-xl sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3 sm:col-span-2">
              <label class="block text-sm font-medium text-gray-700">
                Indirizzo
              </label>
              <div class="mt-1 flex rounded-md shadow-sm">
                <input
                  v-model="form.address"
                  type="text"
                  name="address"
                  id="address"
                  class="focus:ring-air-500 focus:border-air-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                  placeholder="Via Vigliani 1"
                />
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
                  v-model="form.title"
                  type="text"
                  name="title"
                  id="title"
                  class="focus:ring-air-500 focus:border-air-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                  placeholder="Airbnb resort"
                />
              </div>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">
              Descrizione
            </label>
            <div class="mt-1">
              <textarea
                v-model="form.description"
                id="description"
                name="description"
                rows="3"
                class="shadow-sm focus:ring-air-500 focus:border-air-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                placeholder="Inizia a scrivere qui..."
              ></textarea>
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
              v-model="form.guest"
              id="guest"
              name="guest"
              autocomplete="guest"
              class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-air-500 focus:border-air-500 sm:text-sm"
            >
              <option selected disabled>Seleziona posti letto</option>
              <option v-for="n in 15" :key="n">{{ n }}</option>
            </select>
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label
              for="category"
              class="block text-sm font-medium text-gray-700"
              >Categoria</label
            >
            <select
              v-model="form.category"
              id="category"
              name="category"
              autocomplete="category"
              class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-air-500 focus:border-air-500 sm:text-sm"
            >
              <option selected disabled>Seleziona categoria</option>
              <option v-for="cat in categories" :value="cat.id" :key="cat.id">
                {{ cat.name }}
              </option>
            </select>
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
                  v-model="form.price"
                  type="number"
                  name="title"
                  id="title"
                  class="focus:ring-air-500 focus:border-air-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 pl-5"
                  placeholder="30"
                />
              </div>
            </div>
          </div>

          <ImageUploader></ImageUploader>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
          <button
            @click.prevent="submitForm"
            type="submit"
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-air-500 hover:bg-air-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-air-500"
          >
            Save
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import axios from "axios";
import ImageUploader from '@/components/ImageUploader/Uploader'
export default {
  name: "LocationCreate",
  components: {
    ImageUploader,
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
      },
    };
  },
  methods: {
    ...mapActions({fetchCategory :"assets/fetchCategory"}),
    async submitForm() {
      const response = await axios.post("api/location/store", { ...this.form, user : this.user.id });
      this.$router.push({name: 'home'});
      console.log(response);
    },
  },
  created: function () {
    this.fetchCategory();
  },
  computed: {
  
    ...mapGetters({
      user : 'auth/user',
      categories : 'assets/categories'
    })
  },
};
</script>

<style>
</style>
<template>
  

   <div class="container my-5">
    <h1 class="text-center">Inserisci</h1>
    

    <form   >
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label  class="block text-sm font-medium text-gray-700">
                    Indirizzo
                  </label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    
                    <input v-model="address" type="text" name="address" id="address" class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Via Vigliani 1">
                  </div>
                </div>
              </div>
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label  class="block text-sm font-medium text-gray-700">
                    Titolo
                  </label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    
                    <input v-model="title" type="text" name="title" id="title" class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Airbnb resort">
                  </div>
                </div>
              </div>

              <div>
                <label  class="block text-sm font-medium text-gray-700">
                  Descrizione
                </label>
                <div class="mt-1">
                  <textarea v-model="description" id="description" name="description" rows="3" class="shadow-sm focus:ring-red-500 focus:border-red-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Inizia a scrivere qui..."></textarea>
                </div>
                <p class="mt-2 text-sm text-gray-500">
                  Una breve descrizione della tua abitazione.
                </p>
              </div>

              <div class="col-span-6 sm:col-span-3">
                  <label for="guest" class="block text-sm font-medium text-gray-700">Posti letto</label>
                  <select v-model="guest" id="guest" name="guest" autocomplete="guest" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm">
                    <option selected disabled >Seleziona posti letto</option>
                    <option v-for="n in 15" :key="n">{{n}}</option>
                    
                  </select>
                </div>

              <div class="col-span-6 sm:col-span-3">
                  <label for="category" class="block text-sm font-medium text-gray-700">Categoria</label>
                  <select v-model="category" id="category" name="category" autocomplete="category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm">
                    <option selected disabled >Seleziona categoria</option>
                    <option v-for="cat in categories" :value="cat.id" :key="cat.id">{{cat.name}}</option>
                    
                  </select>
                </div>

                 <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label  class="block text-sm font-medium text-gray-700">
                    Prezzo
                  </label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                      €
                    </span>
                    <input v-model="price" type="number" name="title" id="title" class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 pl-5" placeholder="30">
                  </div>
                </div>
              </div>

              

              <div>
                <label class="block text-sm font-medium text-gray-700">
                  Cover photo
                </label>
                <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                  <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                      <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <div class="flex text-sm text-gray-600">
                      <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-red-600 hover:text-red-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-red-500">
                        <span>Upload a file</span>
                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                      </label>
                      <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">
                      PNG, JPG, GIF up to 10MB
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button @click.prevent="submitForm" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Save
              </button>
            </div>
          </div>
        </form>
   </div>
  
</template>

<script>



import { mapActions, mapState } from "vuex";
import axios from 'axios';
export default {
 name: 'LocationCreate',
 components:{
  
  
 },
 
 

        
 data(){
  return {
   title: null,
   description: null,
   guest: null,
   price: null,
   address: null,
   category: null
  }
 },
 methods: {
  ...mapActions(['fetchCategory']),
  async submitForm(){
   
   const response = await axios.post('/location/store', {...this.$data});
   console.log(response);

   
  }
  
 },
 created: function(){
 
  this.fetchCategory();
 },
 computed: {...mapState({
  categories:'categories',
  
 
 })
 }

}
</script>

<style>

</style>
<template>
  <div class="container flex-wrap flex relative md:mt-16 mt-5">
    <div class="md:w-1/2 w-full p-5 pt-0">
      <h1 class="text-4xl font-bold">Richiedi di prenotare</h1>

      <!--Header-->
      <checkout-p>
        <div>
          <h2 class="font-semibold text-xl my-2">È un'occasione unica.</h2>
          <p class="text-gray-600">
            Solitamente l'alloggio di !location.user è prenotato.
          </p>
        </div>
        <i class="far fa-gem text-green-700 text-2xl"></i>
      </checkout-p>
      <!--date-->
      <div class="flex flex-col border-b border-gray-300 py-5">
        <h2 class="font-bold text-2xl w-full">Il tuo viaggio</h2>
        <div class="flex justify-between mt-5">
          <div class="flex-col flex">
            <p class="font-bold text-lg">Date</p>
            <p class="text-gray-600 my-1">hfdsfd</p>
          </div>
          <button class="underline font-semibold text-lg self-start">
            Modifica
          </button>
        </div>
        <div class="flex justify-between mt-5">
          <div class="flex-col flex">
            <p class="font-bold text-lg">Ospiti</p>
            <p class="text-gray-600 my-1">hfdsfd</p>
          </div>
          <button class="underline font-semibold text-lg self-start">
            Modifica
          </button>
        </div>
      </div>
      <!--Lavoro-->
      <checkout-p>
        <h3 class="text-lg font-bold">È un viaggio di lavoro?</h3>
        <div
          class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in"
        >
          <input
            type="checkbox"
            name="toggle"
            id="toggle"
            class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer focus:outline-none"
          />
          <label
            for="toggle"
            class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"
          ></label>
        </div>
      </checkout-p>

      <div class="flex flex-col">
        <h3 class="font-semibold text-2xl">Paga con</h3>
        <form class="mt-5">
          <div
            class="flex justify-between items-center mt-3 px-4 py-5 border border-gray-400 rounded-xl w-full"
          >
            <select name="card" id="card" class="w-full focus:outline-none">
              <option value="" disabled selected="true">
                Carta di credito o di debito
              </option>
              <option value="card-type">sis</option>
              <option value="card-type">sis</option>
              <option value="card-type">sis</option>
            </select>
            <label for="card">
              <i class="fas fa-chevron-down text-2xl"></i>
            </label>
          </div>

          <div
            class="flex-col rounded-xl border border-gray-400 overflow-hidden my-5"
          >
            <div class="h-16 border-b border-gray-400 flex flex-col">
              <input
                type="text"
                id="cardNumber"
                placeholder="Numero Carta"
                class="h-full w-full p-2"
              />
            </div>
            <div class="h-16 flex">
              <div
                class="flex flex-col justify-center items-start w-1/2 border-r h-full border-gray-400"
              >
                <input
                  type="date"
                  placeholder="Scadenza"
                  class="w-full h-full p-2"
                />
              </div>

              <div class="flex flex-col justify-center items-start w-1/2">
                <input
                  type="number"
                  placeholder="CVV"
                  class="w-full h-full p-2"
                />
              </div>
            </div>
          </div>

          <h3 class="text-lg font-semibold">Indirizzo di fatturazione</h3>
          <div
            class="flex-col rounded-xl border border-gray-400 overflow-hidden my-5"
          >
            <div class="h-16 border-b border-gray-400 flex flex-col">
              <input
                type="text"
                id="cardNumber"
                placeholder="Indirizzo"
                class="h-full w-full p-2"
              />
            </div>
            <div class="h-16 border-b border-gray-400 flex flex-col">
              <input
                type="text"
                id="cardNumber"
                placeholder="Numero di appartamento o suite"
                class="h-full w-full p-2"
              />
            </div>
            <div class="h-16 border-b border-gray-400 flex flex-col">
              <input
                type="text"
                id="cardNumber"
                placeholder="Città"
                class="h-full w-full p-2"
              />
            </div>
            <div class="h-16 flex">
              <div
                class="flex flex-col justify-center items-start w-1/2 border-r h-full border-gray-400"
              >
                <input
                  type="text"
                  placeholder="Stato"
                  class="w-full h-full p-2"
                />
              </div>

              <div class="flex flex-col justify-center items-start w-1/2">
                <input
                  type="text"
                  placeholder="CAP"
                  class="w-full h-full p-2"
                />
              </div>
            </div>
          </div>

          <div
            class="flex justify-between items-center mt-3 px-4 py-5 border border-gray-400 rounded-xl w-full"
          >
            <select name="card" id="card" class="w-full focus:outline-none">
              <option value="" disabled selected="true">Paese</option>
              <option value="card-type">sis</option>
              <option value="card-type">sis</option>
              <option value="card-type">sis</option>
            </select>
            <label for="card">
              <i class="fas fa-chevron-down text-2xl"></i>
            </label>
          </div>
        </form>
        <button @click.prevent="submit" class="text-white mt-5 font-bold text-lg py-3 px-5 rounded-xl bg-gradient-to-br to-pink-600 from-red-500 my-2 flex items-center justify-center">
          <i class="fas fa-lock mr-5"></i>
          Conferma e paga</button>
      </div>
    </div>
    <div class=" md:h-64 bg-white md:w-1/2 w-full md:sticky md:top-20 mb-10  flex items-center  md:border-none sm:my-10 order-first md:order-last">
      <div
        class=" md:flex bg-white justify-evenly w-10/12 mx-auto border shadow-md rounded-xl flex-col p-5 "
      >
        <div class="flex border-b border-gray-300 pb-6  ">
          <img :src="location.images[0].file" alt="" class="w-1/2 rounded-2xl ">
          <div class="ml-5 flex flex-col justify-between pb-12 pt-2 self-start">
            
            <p class="text-gray-400 text-sm">{{location.place.name}}: {{location.category.name}}</p>
            <div>
            <h2 class="text-gray-600">{{location.name}}</h2>
            <p class="text-sm text-gray-400">{{location.guest_number}} Letti</p>

            </div>
            <div class="flex items-center">
              <i class="fas fa-star text-air-500 text-sm mr-1"></i>
              <p class="font-semibold text-sm text-black">5 <span class="text-gray-400">(10)</span></p>
              
            </div>
            
          </div>
        </div>
        
        <div class=" flex justify-between items-center  pb-6 ">
          <h2 class="font-bold mt-3 text-lg">Totale</h2>
          <p>€{{totalPrice}}</p>
        </div>
       
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import CheckoutP from "@/components/CheckoutP";
export default {
  components: {
    CheckoutP,
  },
  data() {
    return {
      info: {
        id: this.$route.params.id,
        check_in: this.$route.query.in,
        check_out: this.$route.query.out,
        guests: this.$route.query.guests,
      },
      location: null
    };
  },
  computed:{
    totalPrice: function(){
      let period = Math.abs(new Date(this.info.check_out) - new Date(this.info.check_in)) /1000 / 60 /60 / 24 ;
      
     return  period * this.info.guests * this.location.price;
    }

  },
  methods: {
    submit() {
      axios.post(
        "api/location/reservation",
        {
          ...this.info,
        },
        {
          headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
          },
        }
      ).then(()=>{
        this.$router.push({name: 'thankyou'});
      });
    },
  },
  mounted(){
    axios.get(`api/location/show/${this.$route.params.id}`).then(res => {
      
      this.location = res.data.data[0];
    })
  }
};
</script>

<style >
.toggle-checkbox:checked {
  @apply: right-0 border-air-400;
  right: 0;
  border-color: #ff5a5f;
}
.toggle-checkbox:checked + .toggle-label {
  @apply: bg-air-400;
  background-color: #ff5a5f;
}
select {
  -webkit-appearance: none;
  -moz-appearance: none;
  text-indent: 1px;
  text-overflow: "";
}
</style>

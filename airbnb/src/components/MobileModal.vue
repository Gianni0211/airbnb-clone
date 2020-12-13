<template>
  <div
    class="w-full h-full fixed bg-white py-10 px-3 flex flex-col items-center"
  >
    <div class="flex w-full">
      <div class="w-full h-10 rounded-full border flex items-center bg-gray-50">
        <i class="fas fa-search mx-3"></i>
        <place-input class="w-full" @change="onPlaceChange" />
      </div>
      <button
        class="hover:underline text-lg font-semibold ml-5"
        @click="$emit('close')"
      >
        Annulla
      </button>
    </div>

    <div class="mt-10">
      <date-picker value="range" is-range color="red" />
    </div>

    <div class="fixed bottom-0 w-full flex justify-center">
      <button
        @click="search"
        class="text-white font-bold text-lg py-3 px-5 rounded-xl bg-gradient-to-br to-pink-600 from-red-500 my-2"
      >
        Cerca
      </button>
    </div>
  </div>
</template>

<script>
import _ from "lodash";

import PlaceInput from "./PlaceInput.vue";
import DatePicker from "v-calendar/lib/components/date-picker.umd";

export default {
  name: "MobileModal",
  components: {
    PlaceInput,
    DatePicker,
  },
  data() {
    return {
      q: "",
      range: {
        start: new Date(),
        end: new Date(),
      },
    };
  },
  methods: {
    onPlaceChange(e) {
      this.q = {
        name: e.suggestion.name,
        region: _.kebabCase(e.suggestion.administrative.replace("/", "-")),
        region_code: e.suggestion.hit.county[1] || e.suggestion.hit.county[0],
        country_code: e.suggestion.countryCode,
        post_code: e.suggestion.postcode || e.suggestion.hit.objectID,
        cordinates: e.suggestion.latlng,
      };
    },

    search() {
      let post_code = this.q.post_code;
      let check_in = this.range.start;
      let check_out = this.range.end;
      this.$router.push({
        name: "location.index",
        query: {
          l: post_code,
          in: check_in.toISOString().split("T")[0],
          out: check_out.toISOString().split("T")[0],
        },
      });
      this.$emit("close");
    },
  },
};
</script>

<style>
</style>
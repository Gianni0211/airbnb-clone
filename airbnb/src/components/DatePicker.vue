
<template>
  <date-picker v-model="range" is-range class="flex">
    <template v-slot="{ inputValue, inputEvents }">
      <div class="flex flex-col justify-center items-start p-6 rounded-full">
        <div class="text-black text-sm">Check-in</div>
        <input :value="inputValue.start" v-on="inputEvents.start" class="" />
      </div>
      <div class="flex flex-col justify-center items-start p-6 rounded-full">
        <div class="text-black text-sm">Check-in</div>
        <input :value="inputValue.end" v-on="inputEvents.end" />
      </div>
    </template>
  </date-picker>
</template>
<script>
// import Calendar from 'v-calendar/lib/components/calendar.umd'
import DatePicker from "v-calendar/lib/components/date-picker.umd";
export default {
  name: "DatePicker",
  components: {
    DatePicker,
  },
  data() {
    return {
      range: {
        start: new Date(),
        end: new Date(),
      },
    };
  },
};
</script>
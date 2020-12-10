<template>
    <date-picker
        @input="$emit('change-date', range)"
        v-model="range"
        is-range
        class="h-16 flex"
    >
        <template v-slot="{ inputValue, inputEvents }">
            <div
                class="flex flex-col justify-center items-start w-1/2 border-r h-full border-gray-400 p-2"
            >
                <div class="text-black text-sm">Check-in</div>
                <input
                    :value="inputValue.start"
                    v-on="inputEvents.start"
                    class="w-full focus:outline-none"
                />
            </div>
            <div class="flex flex-col justify-center items-start w-1/2 p-2 ">
                <div class="text-black text-sm ">Check-in</div>
                <input
                    class="focus:outline-none"
                    :value="inputValue.end"
                    v-on="inputEvents.end"
                />
            </div>
        </template>
    </date-picker>
</template>
<script>
// import Calendar from 'v-calendar/lib/components/calendar.umd'
import DatePicker from "v-calendar/lib/components/date-picker.umd";
export default {
    name: "Date-picker",
    components: {
        DatePicker
    },
    data() {
        return {
            range: {
                start: new Date(),
                end: new Date()
            }
        };
    }
};
</script>

<style scoped></style>

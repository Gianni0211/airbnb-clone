<template>
    <div class="main-div md:flex px-10 xl:px-0 -mt-3 shadow ">
        <ul
            v-on-clickaway="unselect"
            class="pill-form w-full xl:w-1/2 "
            :class="{ 'bg-gray-100': selected }"
        >
            <li
                @click="select"
                class="flex flex-col justify-center items-start p-9 px-5 rounded-full"
                data-id="1"
                :class="{
                    'bg-white shadow': clicked == 1,
                    'li-before': !clicked,
                    'li-before-dark ': clicked && clicked != 1
                }"
            >
                <label for="q" class="text-black text-sm">Dove?</label>

                <place-input @change="onPlaceChange" />
            </li>
            
            <date-picker v-model="range" is-range class="flex h-full">
                <template v-slot="{ inputValue, inputEvents }">
                    <li
                        @click="select"
                        :class="{
                            'bg-white shadow': clicked == 2,
                            'li-before': !clicked,
                            'li-before-dark ': clicked && clicked != 2
                        }"
                        class="flex flex-col justify-center items-start p-6 rounded-full"
                        data-id="2"
                    >
                        <div class="text-black text-sm">Check-in</div>
                        <input
                            :value="inputValue.start"
                            v-on="inputEvents.start"
                            class="bg-transparent focus:outline-none"
                        />
                    </li>
                    <li
                        @click="select"
                        :class="{
                            'bg-white shadow': clicked == 3,
                            'li-before': !clicked,
                            'li-before-dark ': clicked && clicked != 3
                        }"
                        class="flex flex-col justify-center items-start p-6 rounded-full"
                        data-id="3"
                    >
                        <div class="text-black text-sm">Check-in</div>
                        <input
                            :value="inputValue.end"
                            v-on="inputEvents.end"
                            class="bg-transparent focus:outline-none"
                        />
                    </li>
                </template>
            </date-picker>

            <li
                @click="select"
                :class="{
                    'bg-white shadow': clicked == 4,
                    'li-before': !clicked,
                    'li-before-dark ': clicked && clicked != 4
                }"
                class="flex justify-center items-center p-9 px-5 rounded-full"
                data-id="4"
            >
                <div class="m-10">
                    <div class="text-black text-sm">Numero Ospiti</div>
                    <div class="text-gray-400 text-xm lg:text-base">
                        Aggiungi
                    </div>
                </div>
                <span
                    class="search-btn h-12 w-12"
                    :class="{ 'w-20': clicked }"
                    @click="search"
                >
                    <i class="fa fa-search"></i>
                </span>
            </li>
        </ul>
    </div>
</template>

<script>
import _ from "lodash";

import { directive as onClickaway } from "vue-clickaway";
import DatePicker from "v-calendar/lib/components/date-picker.umd";
import PlaceInput from "./PlaceInput";

export default {
    name: "search-bar",
    components: {
        PlaceInput,
        DatePicker
    },
    data() {
        return {
            q: "",
            selected: false,
            clicked: null,
            range: {
                start: new Date(),
                end: new Date()
            }
        };
    },
    methods: {
        select(event) {
            this.selected = true;
            this.clicked = event.target.closest("li").getAttribute("data-id");
            console.log(this.clicked);
        },
        unselect() {
            this.selected = false;
            this.clicked = null;
        },
        onPlaceChange(e) {
            this.q = {
                name: e.suggestion.name,
                region: _.kebabCase(
                    e.suggestion.administrative.replace("/", "-")
                ),
                region_code:
                    e.suggestion.hit.county[1] || e.suggestion.hit.county[0],
                country_code: e.suggestion.countryCode,
                post_code: e.suggestion.postcode || e.suggestion.hit.objectID,
                cordinates: e.suggestion.latlng
            };
        },
        async search() {
            let post_code = this.q.post_code;
            let check_in = this.range.start;
            let check_out = this.range.end;
            this.$router.push({
                name: "location.index",
                query: {
                    l: post_code,
                    in: check_in.toISOString().split("T")[0],
                    out: check_out.toISOString().split("T")[0]
                }
            });
        }
    },
    directives: {
        onClickaway: onClickaway
    }
};
</script>

<style scoped>
li {
    position: relative;
    height: 100%;
    z-index: 10;
}
.li-before:hover::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    @apply bg-gray-100;
    width: 100%;
    height: 100%;
    border-radius: 60px;
    z-index: -99999999;
}
.li-before-dark:hover::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    @apply bg-gray-200;
    width: 100%;
    height: 100%;
    border-radius: 60px;
    z-index: -99999999;
}
.main-div {
    @apply bg-white h-64  items-center justify-center py-10;
}
.pill-form {
    @apply flex   h-20 mx-auto justify-between items-center rounded-full border border-gray-300;
}
.search-btn {
    @apply bg-red-500 text-white  rounded-full flex justify-center items-center -mr-2;
}
.search-btn:hover {
    @apply bg-gradient-to-r from-red-600 to-red-400;
}
</style>

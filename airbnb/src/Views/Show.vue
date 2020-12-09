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
            <div class="flex w-32 justify-between text-gray-700 mr-5">
                <li class="flex items-center">
                    <i class="mr-2 fas fa-share-square"></i
                    ><span class="underline">Condividi</span>
                </li>
                <li class="flex items-center ml-2">
                    <i class="mr-2 far fa-heart"></i
                    ><span class="underline">Salva</span>
                </li>
            </div>
        </ul>

        <!-- immagini -->

        <div class="grid-container h-80 rounded-xl border mt-8 overflow-hidden">
            <div class="d">
                <img
                    :src="location.images[0].file"
                    class="w-full h-full"
                    alt=""
                />
            </div>
            <div class="B">
                <div class="a">
                    <img
                        :src="location.images[1].file"
                        class="w-full h-full"
                        alt=""
                    />
                </div>
                <div class="b">
                    <img
                        :src="location.images[2].file"
                        class="w-full h-full"
                        alt=""
                    />
                </div>
                <div class="c">
                    <img
                        :src="location.images[2].file"
                        class="w-full h-full"
                        alt=""
                    />
                </div>
                <div class="D">
                    <img
                        :src="location.images[2].file"
                        class="w-full h-full"
                        alt=""
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "Show",
    data() {
        return {
            location: null
        };
    },
    created() {
        const id = this.$route.params.id;
        axios.get(`/api/location/show/${id}`).then(res => {
            this.location = res.data.data[0];
        });
    }
};
</script>

<style scoped>
.grid-container {
    display: grid;
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
    grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
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

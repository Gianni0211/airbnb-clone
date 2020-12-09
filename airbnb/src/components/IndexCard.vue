<template>
    <router-link to="{name: 'show'}">
        <div class="mr-5 h-64 flex  items-center border-t">
            <photo-carousel :images="location.images" @click.prevent />
            <div class="self-start mt-10">
                <p class="text-sm text-gray-400">{{ location.subtitle }}</p>
                <h2 class="text-xl">{{ location.name }}</h2>
                <hr class="w-10 mt-2" />
                <p class="text-sm text-gray-400">{{ location.description }}</p>
            </div>
        </div>
    </router-link>
</template>

<script>
import PhotoCarousel from "../components/PhotoCarousel.vue";
export default {
    name: "IndexCard",
    components: { PhotoCarousel },
    props: {
        location: {
            type: Object,
            required: true
        }
    }
};
</script>

<style scoped></style>

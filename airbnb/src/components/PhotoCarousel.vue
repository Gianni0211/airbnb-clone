<template>
    <div class="flex  relative container-photo"
        :class="{'mr-10 px-10': !full }"
    >
        <button
        
            @click.prevent="onScroll($event, 'left')"
            class="absolute left-10 top-20 arrows focus:outline-none hidden md:inline-block"
        >
            <i class="fas fa-chevron-left"></i>
        </button>
        <div
            class="overflow-x-auto whitespace-nowrap  h-48 carousel-container shadow rounded-xl mx-auto"
            :class="{'w-80': !full , 'w-full h-72' : full}"
        >
            <img
                v-for="image in photos"
                :key="image.id"
                :src="image.file"
                alt=""
                class="inline-block w-full h-full"
            />
        </div>

        <button
            @click.prevent="onScroll($event, 'right')"
            class="absolute right-10 top-20 arrows focus:outline-none
            hidden md:inline-block
            "
        >
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</template>

<script>
export default {
    name: "photoCarousel",
    props: {
        images: {
            type: Array,
            required: true
        },
        defaultImage: {
            type: String,
            required: false,
            default: "https://via.placeholder.com/200x300"
        },
        full: {
            type: Boolean,
            default: false,
        }
    },

    computed: {
        photos: function() {
            if (this.images.length == 0) {
                return [{ id: 0, file: this.defaultImage }];
            }
            return this.images;
        }
    },
    methods: {
        onScroll(e, direction) {
            const elementoScrollato = e.target.closest("div").children[1];
            if (direction == "left") {
                elementoScrollato.scrollLeft -= elementoScrollato.offsetWidth;
            } else if (direction == "right") {
                elementoScrollato.scrollLeft += elementoScrollato.offsetWidth;
            }
        }
    }
};
</script>

<style scoped>
.carousel-container::-webkit-scrollbar {
    display: none;
}
.arrows {
    opacity: 0;
    transition: 0.3s;
    @apply h-10 w-10 rounded-full bg-white text-air-500 shadow-xl;
}

.container-photo:hover .arrows {
    opacity: 1;
}
</style>

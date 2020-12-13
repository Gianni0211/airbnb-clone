<template>

    <button
        @click.prevent="checkout"
        class="text-white font-bold text-lg py-3 px-5 rounded-xl bg-gradient-to-br to-pink-600 from-red-500 my-2"
    >

        Prenota
    </button>
</template>

<script>
export default {
    name: "BookBtn",
    props: {
        checkoutData: {
            type: Object,
            required: true
        },
        id:{
            required: true,
        }
    },
    methods: {
        checkout() {
            this.$router.push({
                name: "checkout",
                query: {
                    in: this.checkoutData.range.start,
                    out: this.checkoutData.range.end,
                    guests: this.checkoutData.guests
                },
                params: {
                    id: this.id,
                }
            });
        }
    }
};
</script>



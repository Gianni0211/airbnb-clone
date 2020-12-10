<template>
  <div><button @click="submit">Prenota</button></div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      info: {
        id: this.$route.params.id,
        check_in: this.$route.query.in,
        check_out: this.$route.query.out,
        guests: this.$route.query.guests,
      },
    };
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
      );
    },
  },
};
</script>

<style></style>

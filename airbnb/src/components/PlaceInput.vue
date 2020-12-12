<template>
  <!-- container for places.js -->
  <div />
</template>

<script>
import places from "places.js";


export default {
  data() {
    return { instance: null };
  },
  mounted() {
 
    const search = document.createElement("input");
    search.placeholder= "Dove vuoi andare?";
    
    //input style
    search.style.outline = "none";
    search.style.border = "none";
    search.style.background = "transparent";
    search.style.height = "20px";
    search.style.padding = "0";

    
    this.input = search;
    this.$el.appendChild(this.input);

    this.instance = places({
      apiKey: "ce563e532d0eb5b14fda8a4614f302e7",
      appId: "plJEYXAMRTHF",
      language: "it",
      container: this.input,
      
    });

    this.instance.on("change", (e) => {
      this.$emit("change", e);
    });
  },
  beforeUnmount() {
    this.instance.off("change");
    this.instance.destroy();
  },
  watch: {
    type(newVal) {
      this.instance.configure({
        type: newVal,
      });
    },
  },
};
</script>



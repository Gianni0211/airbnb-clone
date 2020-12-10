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

<style>
  .ap-dropdown-menu{
    width: 300px;
    background: #ffffff;
    box-shadow: 0 1px 10px rgba(0, 0, 0, 0.2), 0 2px 4px 0 rgba(0, 0, 0, 0.1);
    border-radius: 3px;
    margin-top: 3px;
    overflow: hidden;
  }
  .ap-input-icon{
    display: none;
  }
</style>

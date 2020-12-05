<template>
  <div>
    <div class="card relative rounded shadow" @mouseover="mouseOver" @mouseleave="mouseLeave">
      <div v-show="hover">
        <button
          @click="onClick($event)"
          class="outline-none absolute center text-white px-4 py-4 h-10 w-10 rounded-full bg-red-600 z-10"
        >
          <i class="far fa-trash-alt"></i>
        </button>
      </div>

      <img :src="image" alt="result" class="w-52 h-20" />
      <span class="name">{{ shortName }}</span>
    </div>
    
  </div>
</template>

<script>
import { v4 as uuidv4 } from 'uuid';

export default {
  name: "PreviewCard",
  data() {
    return {
      options: ["L-CC", "R-CC", "L-MLO", "R-MLO"],
      selected: "L-CC",

      id : null,
      hover: false,
    };
  },
  computed:{
    shortName: function(){
      return this.name.substr(0, 20);
    }
  },
  props: {
    image: {
      type: String,
      required: true,
    },
    name: {
      type: String,
      required: true,
    },
   
  },
  mounted ()  {

    if(this.id == null){
      this.id = uuidv4();
    }
    
    this.$emit("mount", {
      id: this.id,
      image: this.image,
      view: this.selected,
    });
  },
  methods: {
    onChange() {
      this.$emit("selected", {
        id: this.id,
        image: this.image,
        view: this.selected,
      });
    },
    mouseOver() {
      this.hover = true;
    },
    mouseLeave() {
      this.hover = false;
    },

    onClick() {

      this.$emit("deleted", {
        id: this.id,
      });
    },
  },
};
</script>

<style scoped>
.card {
  @apply flex flex-col mt-5 ml-5 mr-5 -mb-1 w-32 h-32 justify-between bg-white;
}

.card::after {
  content: " ";
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.4);
  opacity: 0;
  transition: all 0.4s;
}
.card:hover::after {
  opacity: 1;
}
.name {
  @apply text-sm text-gray-500 mb-2;
}
.center {
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
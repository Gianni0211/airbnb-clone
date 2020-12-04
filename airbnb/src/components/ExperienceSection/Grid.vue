<template>
<div class="grid-container">
  <div class="A"><card-grid/></div>
  <div class="B">
    <div class="B1"><card-grid/></div>
    <div class="B2"><card-grid/></div>
    <div class="C"><card-grid/></div>
  </div>
</div>
</template>

<script>
/* import { component } from 'vue/types/umd'; */
import CardGrid from './CardGrid.vue';
export default {
name: 'Grid',
components: {
 CardGrid
},
}
</script>

<style scoped>
.grid-container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 1fr;
  gap: 20px 20px;
  grid-template-areas:
    "A B";
  height: 100%;
  width: 80vw;
  margin: auto;
}

.A { grid-area: A; }

.B {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 1fr 1fr;
  gap: 20px 20px;
  grid-template-areas:
    "B1 B2"
    "C C";
  grid-area: B;
}

.B1 { grid-area: B1; }

.B2 { grid-area: B2; }

.C { grid-area: C; }

</style>
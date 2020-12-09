<template>
<div class="grid-container">
  <div class="A"><card-grid :text="topFour[0].name"/></div>
  <div class="B">
    <div class="B1"><card-grid :text="topFour[1].name"/></div>
    <div class="B2"><card-grid :text="topFour[2].name"/></div>
    <div class="C"><card-grid :text="topFour[3].name"/></div>
  </div>
</div>
</template>

<script>

import CardGrid from './CardGrid.vue';
export default {
name: 'Grid',
props : {
  topFour: {
    type: Array,
    required : false,

  }
},
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
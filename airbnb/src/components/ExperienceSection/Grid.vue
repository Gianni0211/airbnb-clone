<template>
<div class="grid-container">
  <div class="A">
    <router-link :to="{name: 'location.show', params:{id: topFour[0].id}}">
    <card-grid  :img="topFour[0].images[0].file||null" :text="topFour[0].name"/>
    </router-link>
    </div>
  <div class="B">
    <div class="B1">
      <router-link :to="{name: 'location.show', params:{id: topFour[1].id}}">
      <card-grid  :img="topFour[1].images[0].file||null" :text="topFour[1].name"/>
      </router-link>
      </div>
    <div class="B2">
      <router-link :to="{name: 'location.show', params:{id: topFour[2].id}}">
      <card-grid  :img="topFour[2].images[0].file||null" :text="topFour[2].name"/>
      </router-link>
      </div>
    <div class="C">
      <router-link :to="{name: 'location.show', params:{id: topFour[3].id}}">
      <card-grid  :img="topFour[3].images[0].file||null" :text="topFour[3].name"/>
      </router-link>
      </div>
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
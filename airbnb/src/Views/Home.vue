<template>
  <div>
      
    <home-hero></home-hero>
    <Categories />
    <Experiences></Experiences>
  </div>
</template>

<script>
import Experiences from "../components/ExperienceSection/Experiences";
import HomeHero from "../components/HomeHero";
import Categories from "../components/Categories";



export default {
  components: {
    Experiences,
    HomeHero,
    Categories,
  },
    
  
};
</script>

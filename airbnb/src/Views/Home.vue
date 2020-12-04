<template>
    <app-container>
    
            <home-hero></home-hero>
            <Categories/>
            <Experiences></Experiences>
     
         
     
     
     
    </app-container>
   
</template>

<script>

import AppContainer from '../Layouts/AppContainer';
import Experiences from '../components/ExperienceSection/Experiences';
import HomeHero from '../components/HomeHero';
import Categories from '../components/Categories'

    export default {
        
        components: {
          AppContainer,
          Experiences,
          HomeHero,
          Categories
                
               

        },
       
    }
</script>

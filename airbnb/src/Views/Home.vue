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

import axios from "axios";
axios.defaults.withCredentials = true;
axios.defaults.baseURL = "http://localhost:8000/";

    export default {
        
        components: {
          AppContainer,
          Experiences,
          HomeHero,
          Categories
                
               

        },

        mounted(){
           
                axios.get('/api/auth').then(r => console.log(r));
           
        }
       
    }
</script>

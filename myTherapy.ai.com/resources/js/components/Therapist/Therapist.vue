<template>
    <div class="absolute top-7 right-1">
        <Button @click.prevent="newTherapist = !newTherapist">Add New Therapist</Button>
    </div>
    <div class="clear"></div>
    <div class="container">
  
      <div class="content" v-show="newTherapist">
        <CreateTherapist />
      </div>
  
      <div class="content">
        <TherapistView />
      </div>
    </div>
  </template>
  
<script setup>
import { ref, computed, provide, onBeforeMount } from 'vue';
import Button from "primevue/button";
import CreateTherapist from "./CreateTherapist.vue";
import TherapistView from "./TherabistView.vue";
import useTherapist from '../../composables/Therabist/handleTherapist.js';
  
  // Use therapist composable
  const { 
    therapists, 
    loading, 
    error, 
    fetchTherapists, 
    removeTherapist, 
    createTherapists, 
    editTherapists 
} = useTherapist();
  
  // Layout options for DataView
  const layout = ref('list');
  
  const newTherapist = ref(false);
  
  // Provide newTherapist state and createTherapists function
  provide('newTherapist', newTherapist);
  provide('createTherapists', createTherapists);
  provide('editTherapists', editTherapists);
  provide('removeTherapist', removeTherapist);
  
  onBeforeMount(() => {
    // Fetch therapists on mount
    fetchTherapists();
  
    // Provide therapists data
    provide('therapists', therapists);
  });
  </script>
  
  <style scoped>
  
  </style>
  
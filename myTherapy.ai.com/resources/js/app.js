import { createApp, provide, onBeforeMount } from 'vue';
import App from './App.vue';
import { createPinia } from 'pinia';
import { createRouter, createWebHistory } from 'vue-router';
import PrimeVue from 'primevue/config';
import axios from 'axios';
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import 'primevue/resources/themes/aura-light-green/theme.css';
import { PrimeIcons } from 'primevue/api';
import { routes } from "./routes.js";

// Create Vue app instance
const app = createApp(App);

// Use PrimeVue plugin
app.use(PrimeVue);

// Create Vue Router instance
const router = createRouter({ history: createWebHistory(), routes });

// Use Vue Router
app.use(router);


// Register FontAwesomeIcon globally
app.component('font-awesome-icon', [FontAwesomeIcon, library, PrimeIcons]);

// Initialize Pinia
const pinia = createPinia();
app.use(pinia);

// Mount the app
app.mount('#app');

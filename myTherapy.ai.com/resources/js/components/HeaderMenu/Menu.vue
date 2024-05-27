<template>
    <MegaMenu>
        <template #start>
            <i class="pi pi-bars ml-1 text-2xl" @click="toggleSideMenu"></i>
        </template>
        <template #menubutton>
            <!-- Replace with your custom logo -->
            <h2 class="ml-auto">logo</h2>
        </template>
        <template #end>
            <Button
                v-for="(button, index) in buttons"
                :key="index"
                :to="`/${button.link}`"
                class="my-3 mx-1"
                :class="`bg-${button.variant}-500 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-${button.variant}-500 focus:ring-opacity-50`"
            >
                {{ button.text }}
            </Button>
        </template>
    </MegaMenu>
</template>

<script setup>
import Button from "primevue/button";
import MegaMenu from "primevue/megamenu";
import { ref } from 'vue';

const buttons = ref([
    { text: 'Logout', link: 'Logout', variant: 'primary' },
]);

const toggleSideMenu = () => {
    // Implement your logic to toggle the side menu
};
</script>

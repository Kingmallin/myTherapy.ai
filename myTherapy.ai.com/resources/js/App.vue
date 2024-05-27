<template>
    <div id="app">
        <AdminDashboard/>
    </div>
</template>

<script setup>
import AdminDashboard from "./AdminDashboard.vue";
import { userStore } from './pinia/userStore.js';
import { onMounted } from 'vue';

const authUserStore = userStore();

onMounted(() => {
    if (authUserStore.token) {
        authUserStore.fetchUser();
    }
});
</script>

<style scoped>
/* Your scoped styles here */
</style>

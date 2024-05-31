<template>
    <div >
        <AdminDashboard/>
    </div>
</template>

<script setup>
import { onMounted, provide } from 'vue';
import { useUserStore } from './pinia/userStore.js';
import AdminDashboard from "./AdminDashboard.vue";
import connection from './echo.js';

const echo = connection();

provide('echo', echo);
const authUserStore = useUserStore();

onMounted(() => {
  authUserStore.fetchUser();
});
</script>

<style scoped>
/* Your scoped styles here */
</style>

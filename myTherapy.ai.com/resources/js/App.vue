<template>
    <div >
        <AdminDashboard/>
    </div>
</template>

<script setup>
import { onMounted, provide } from 'vue';
import { useUserStore } from './pinia/userStore.js';
import AdminDashboard from "./AdminDashboard.vue";

const authUserStore = useUserStore();


onMounted(() => {
  authUserStore.fetchUser();
});

</script>

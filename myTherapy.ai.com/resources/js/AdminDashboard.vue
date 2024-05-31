<template>
    <div class="admin-dashboard">
        <!-- Navigation Bar -->
        <Menu />

        <!-- Main Layout Container -->
        <div class="main-layout">
            <!-- Sidebar using PrimeVue Sidebar component -->
            <SideMenu class="sidebar" />
            <!-- Main Content Area -->
            <router-view class="main-content" />
        </div>
    </div>
</template>

<script setup>
import Menu from './components/HeaderMenu/Menu.vue';
import SideMenu from './components/SideMenu/SideMenu.vue';

</script>

<style scoped>
.admin-dashboard {
    display: flex;
    flex-direction: column;
    height: 100vh;
}

.main-layout {
    display: flex;
    flex: 1;
    height: calc(100vh - 50px);
}

.main-content {
    flex: 1;
    padding-left: 5rem;
    padding-top: 1rem;
    overflow-y: auto;
}

.main-content h1 {
    margin-top: 0;
}

.main-content p {
    margin-bottom: 1rem;
}

/* Example styling for the sidebar */
.sidebar {
    width: 8rem;
    background-color: #f8f9fa;
    height: 100%;
    padding: 1px;
}
</style>

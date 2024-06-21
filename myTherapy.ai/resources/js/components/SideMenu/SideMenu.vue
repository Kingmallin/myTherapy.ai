<template>
    <div class="card flex justify-center custom-menu">
        <Menu :model="items" class="w-70 md:w-15rem">
            <template #start>
                <div class="flex items-center gap-1 px-2 py-2">
                    <Avatar />
                    <span class="font-bold text-lg"><span class="text-primary">{{ username }}</span></span>
                </div>
            </template>
            <template #submenuheader="{ item }">
                <span class="text-primary font-bold">{{ item.label }}</span>
            </template>
            <template #item="{ item, props }">

                <router-link v-if="item.to" :to="item.to" v-ripple class="flex items-center" v-bind="props.action">
                    <span :class="item.icon" />
                    <span class="ml-2">{{ item.label }}</span>
                    <Badge v-if="item.badge" class="ml-auto" :value="item.badge" />
                    <span v-if="item.shortcut" class="ml-auto border border-dark rounded p-1 text-xs">{{ item.shortcut }}</span>
                </router-link>
            </template>
            <template #end>
                <hr>
                <div class="mt-4">
                    <span><strong>MyTherapy © 2024</strong></span>
                </div>
            </template>
        </Menu>
    </div>
</template>

<script setup>
import Avatar from "primevue/avatar";
import Menu from 'primevue/menu';
import {computed, ref} from "vue";
import { useUserStore } from "../../pinia/userStore";

const userStore = useUserStore();

const username = computed(() => {
  return userStore.getUser?.userName || '';
});

const items = ref([
    {
        label: 'Chat Room\'s',
        icon: 'pi pi-calendar',
        to: '/rooms'
    },
    {
        label: 'Therapist',
        icon: 'pi pi-user',
        to: '/therapist'
    },
    {
        label: 'Therapist Test',
        icon: 'pi pi-user',
        to: '/testTherapist'
    },
    {
        label: 'Mental Health Condition\'s',
        icon: 'pi pi-money-bill',
        to: '/health-categorys'
    },
    {
        label: 'Blogs',
        icon: 'pi pi-pencil',
        to: '/blogs'
    },
    {
        label: 'Meme Management',
        icon: 'pi pi-image',
        to: '/meme-management'
    },
    {
        label: 'Account Settings',
        icon: 'pi pi-cog',
        to: '/account-settings'
    }
]);
</script>

<style scoped>
.custom-menu {
    height: 100%;
    width: 10rem;
}
</style>

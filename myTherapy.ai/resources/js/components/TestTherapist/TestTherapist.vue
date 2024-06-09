<template>
    <Card class="container">
        <template #title>Test Ai Therapists</template>
        <template #content>
            <TabView>
                <TabPanel v-for="therapist in therapists" :key="therapist.id" :header="therapist.name">
                    <TherapistChat :id="therapist.id" />
                </TabPanel>
            </TabView>
        </template>
    </Card>
</template>
<script setup>
import TherapistChat from './TherapistChat.vue';
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import Card from 'primevue/card';
import { ref, onMounted } from 'vue';
import useTherapist from '../../composables/Therabist/handleTherapist.js';

const { 
    therapists, 
    loading, 
    error, 
    fetchTherapists, 
} = useTherapist();

onMounted(() => {
    fetchTherapists();
})
</script>

<style scoped>

.container {
 margin-top: 1rem !important;   
}
.main-content {
    padding-left: 0;
}
</style>
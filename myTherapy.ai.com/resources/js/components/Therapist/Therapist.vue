<template>
    <div class="absolute top-7 right-1">
        <Button>Add New Therapist</Button>
    </div>
    <div class="clear"></div>
    <CreateTherapist />
</template>

<script setup>
import { ref, computed } from 'vue';
import Button from "primevue/button";
import CreateTherapist from "./CreateTherapist.vue";
import useTherapist from '../../composables/Therabist/handleTherapist.js'
// Use therapist composable
const { therapists, loading, error, fetchTherapists, removeTherapist } = useTherapist();

const deleteDialogVisible = ref(false);
let therapistToDeleteId = null;

// Layout options for DataView
const layout = ref('list');

// Fetch therapists on  mount
fetchTherapists();


const viewTherapist = (therapist) => {
    // Implement view logic
};

const editTherapist = (therapist) => {
    // Implement edit logic
};

const confirmDelete = (id) => {
    therapistToDeleteId = id;
    deleteDialogVisible.value = true;
};

const cancelDelete = () => {
    deleteDialogVisible.value = false;
};

const deleteTherapist = async () => {
    await removeTherapist(therapistToDeleteId);
    deleteDialogVisible.value = false;
};

const createNewTherapist = () => {
    // Implement create logic
};

</script>

<style scoped>
</style>

<template>
  <div>
    <ConfirmDialog />
    <Card v-for="item in therapists" :key="item.id" style="margin-bottom: 0.5rem;">
      <template #title>
        {{ item.name }}
      </template>
      <template #content v-if="item.editMode">
        <p>Name</p>
        <InputText v-model="item.name" />
        <p>Specialization</p>
        <InputText v-model="item.specialization" />
        <p>Persona</p>
        <InputText v-model="item.persona" />
        <p>ApiKey</p>
        <InputText v-model="item.apiKey" />
        <p>ApiEndPoint</p>
        <InputText v-model="item.apiEndPoint" />
        <p>Additional Settings</p>
        <InputText v-model="item.additionalSettings" />
        <!-- Add other editable fields here -->
      </template>
      <template #footer>
        <div v-if="!item.editMode">
          <Button label="Edit" @click="toggleEditMode(item)" />
          <Button label="Delete" @click="event => openDeletePopup(event, item)" class="p-button-danger" />
        </div>
        <div v-else>
          <Button label="Save" @click="saveItem(item)" severity="success" />
          <Button label="Cancel" @click="cancelEdit(item)" severity="danger" />
        </div>
      </template>
    </Card>
  </div>
</template>

<script setup>
import { ref, inject } from 'vue';
import Card from 'primevue/card';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import ConfirmDialog from '../Dialog/ConfirmDialog.vue';
import {useConfirm}  from '../../composables/useConfirm.js';

const therapists = inject('therapists');
const editTherapists = inject('editTherapists');
const deleteTherapist = inject('removeTherapist');

const { openConfirmation } = useConfirm();

const toggleEditMode = (item) => {
  item.editMode = true;
};

const saveItem = (item) => {
  console.log('Saving item:', item);
  editTherapists(item);
  item.editMode = false;
};

const cancelEdit = (item) => {
  item.editMode = false;
};

const openDeletePopup = (event, item) => {
  console.log('delete click');
  openConfirmation(
    'Are you sure you want to delete this therapist?',
    'Confirmation',
    () => deleteTherapist(item.id),
    () => console.log('Delete canceled')
  );
};
</script>

<style scoped>
button {
  margin-right:3px;
}
</style>

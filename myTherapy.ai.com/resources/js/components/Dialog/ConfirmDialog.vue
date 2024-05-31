<template>
  <div v-if="isVisible" class="confirm-dialog-overlay">
    <div class="confirm-dialog">
      <h2>{{ header }}</h2>
      <p>{{ message }}</p>
      <div class="confirm-dialog-buttons">
        <Button label="Yes" @click="accept" />
        <Button label="No" @click="reject" class="p-button-danger" />
      </div>
    </div>
  </div>
</template>

<script setup>
import { useConfirm } from '../../composables/useConfirm.js';
import Button from 'primevue/button';

const { isVisible, message, header, accept, reject } = useConfirm();
</script>

<style scoped>
.confirm-dialog-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000; /* Ensure overlay is on top */
}

.confirm-dialog {
  background: white;
  padding: 1rem;
  border-radius: 5px;
  text-align: center;
  z-index: 1001; /* Ensure dialog is on top of the overlay */
}

.confirm-dialog-buttons {
  display: flex;
  justify-content: center;
  gap: 1rem;
  margin-top: 1rem;
}
</style>

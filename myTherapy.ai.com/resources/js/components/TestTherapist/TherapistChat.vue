<template>
  <div class="chat-container">
    <Card class="chat-window">
      <template #content>
        <div class="messages">
          <div
            v-for="(message, index) in messages"
            :key="index"
            :class="['message', message.sender === 'user' ? 'sent' : 'received']"
          >
            <p>{{ message.text }}</p>
          </div>
        </div>
        <div class="input-container">
          <InputText v-model="newMessage" placeholder="Type a message..." @keyup.enter="sendMessage" />
          <Button class="send" label="Send" @click="sendMessage" />
        </div>
      </template>
    </Card>
  </div>
</template>


<script setup>
import Card from 'primevue/card';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import { onMounted } from 'vue';
import useChat from '../../composables/Chat/useChat.js';
import { useUserStore } from '../../pinia/userStore.js';

const {
  subscribe,
  setChannel,
  messages,
  newMessage,
  sendMessage
} = useChat();

const props = defineProps({
  id: {
    type: Number,
    required: true
  }
});

const userStore = useUserStore();

onMounted(() => {
  setChannel(userStore.getUser?.uuid, props.id);
  subscribe();
});
</script>

<style scoped>
/* Your existing styles */
</style>

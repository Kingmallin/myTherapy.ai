<template>
  <div class="chat-container">
    <Card class="chat-window">
      <template #content>
        <div class="messages">
          <div
            v-for="(message, index) in messages"
            :key="index"
            :class="['message', message.sender === 'me' ? 'sent' : 'received']"
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
import { ref, onMounted, inject } from 'vue';
import useChat from '../../composables/Chat/useChat.js';
import { useRoute } from 'vue-router';
import { useUserStore } from '../../pinia/userStore.js';

const echo = inject('echo');
echo.channel('test')
    .listen('AdminToAi', (event) => {
        receiveMessage(event.message);
    });

const { setChannle, channel, messages, newMessage, sendMessage, receiveMessage } = useChat();

const props = defineProps({
  id: {
    type: Number,
    required: true
  }
});

const userStore = useUserStore();

onMounted(() => {
  setChannle(`admin.therapist.${userStore.getUser?.uuid}.${props.id}`); // Uncomment and adjust channel name
});
</script>

<style scoped>
/* Your existing styles */
</style>

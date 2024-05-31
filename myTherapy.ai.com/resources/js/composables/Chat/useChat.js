import { ref } from 'vue';

export default function useChat() {
  const messages = ref([]);
  const newMessage = ref('');
  const channle = ref('chat');

  const setChannle = (newChannle) => {
    channle.value = newChannle;
  };

  const sendMessage = () => {
    if (newMessage.value.trim() !== '') {
    //   Emit or send the message to the server using Echo
      // window.Echo.private(this.channle).whisper('message', newMessage.value);
      messages.value.push({ text: newMessage.value, sender: 'me' });
      newMessage.value = '';
    }
  };
  

  const receiveMessage = (text) => {
    messages.value.push({ text, sender: 'other' });
  };

  return {channle, setChannle, messages, newMessage, sendMessage, receiveMessage };
}


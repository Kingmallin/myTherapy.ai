import { ref } from 'vue';
// import { WebSocketUtility } from '../../websocket.js';

// const { subscribeToChannel, sendData, disconnect } = WebSocketUtility();

export default function useChat() {
  const messages = ref([]);
  const newMessage = ref('');
  const channel = ref('');
  const userId = ref('');
  const therapistId = ref('');

  const setChannel = (uId, tId) => {
    userId.value = uId;
    therapistId.value = tId;
    channel.value = 'admin.' + uId + '.' + tId;
  };

  const subscribe = () => {
    // subscribeToChannel(channel.value, 'WhisperResponse', receiveMessage);
    window.Echo.channel(channel.value)
    .listen('SendMessageBroadcast', (event) => {
      receiveMessage(event);
    });
  };

  const sendMessage = () => {
    if (newMessage.value.trim() !== '') {

      window.Echo.connector.pusher.send_event(
        'SendMessage',
        JSON.stringify({
          message: newMessage.value,
          therapistId: therapistId.value,
          adminUuid: userId.value,
          sender: 'user'
        }),
        `${channel.value}`
      );

      messages.value.push({ text: newMessage.value, sender: 'user' });
      newMessage.value = '';
    }
  };

  const receiveMessage = (data) => {
    console.log('data received:', data);
    messages.value.push({ text: data.message, sender: 'other' });
  };

  return { subscribe, setChannel, messages, newMessage, sendMessage };
}

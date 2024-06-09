import { ref } from 'vue';

  const WEBSOCKET_URL = import.meta.env.VITE_REVERB_SCHEME === 'https'
      ? `wss://${import.meta.env.VITE_REVERB_HOST}:${import.meta.env.VITE_REVERB_PORT ?? 443}/app/${import.meta.env.VITE_REVERB_APP_KEY}/`
      : `ws://${import.meta.env.VITE_REVERB_HOST}:${import.meta.env.VITE_REVERB_PORT ?? 80}/app/${import.meta.env.VITE_REVERB_APP_KEY}/`;

  const TOKEN = localStorage.getItem('token');

  const targetClient = ref('');
  let socket;

export default function useChat() {
  const messages = ref([]);
  const newMessage = ref('');
  const channel = ref('');

  const setRecvier = (reciver) => {
    targetClient.value = reciver;
  };
  
  const connectWebSocket = (user, tId, type) => {
      channel.value = `${user}.${tId}.${type}`;

      socket = new WebSocket(`${WEBSOCKET_URL}?clientId=${channel.value}/?type=admin`);

      socket.addEventListener('open', () => {
          console.log('WebSocket connected');
      });

      socket.addEventListener('close', () => {
          console.log('WebSocket disconnected');
      });

      socket.addEventListener('error', (event) => {
          console.error('WebSocket error:', event);
          receiveMessage(event);
      });

      socket.addEventListener('message', (event) => {
        const data = JSON.parse(event.data);
            receiveMessage(data);
    });
  };

  const sendMessageToServer = () => {
    if (newMessage.value.trim() !== '' && socket && socket.readyState === WebSocket.OPEN) {
        socket.send(JSON.stringify({
            event: 'SendMessage',
            data: {
                message: newMessage.value,
                sender: 'user',
                target: targetClient.value
            },
            channel: channel.value,
        }));
        messages.value.push({ text: newMessage.value, sender: 'user' });
        newMessage.value = '';
    } else {
        setTimeout(() => {
            connectWebSocket(channel.value);
            console.error('WebSocket is not open. Ready state:', socket?.readyState);
            sendMessageToServer();
        }, 1000);
    }
};


  const receiveMessage = (event) => {
    console.log(event);
    messages.value.push({ text: event.message, sender: event.from });
  };

  return {connectWebSocket, messages, newMessage, sendMessageToServer, setRecvier };
}

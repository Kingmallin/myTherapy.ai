// export function WebSocketUtility() {
//   let socket;
//   const WEBSOCKET_URL = import.meta.env.VITE_REVERB_SCHEME === 'https'
//       ? `wss://${import.meta.env.VITE_REVERB_HOST}:${import.meta.env.VITE_REVERB_PORT ?? 443}/app/${import.meta.env.VITE_REVERB_APP_KEY}/`
//       : `ws://${import.meta.env.VITE_REVERB_HOST}:${import.meta.env.VITE_REVERB_PORT ?? 80}/app/${import.meta.env.VITE_REVERB_APP_KEY}/`;

//   const TOKEN = localStorage.getItem('token');

//   let messageHandlers = {};

//   let callbackFunction;
  
//   const connect = (channel) => {
//       socket = new WebSocket(WEBSOCKET_URL + channel);

//       socket.addEventListener('open', () => {
//           console.log('WebSocket connected');
//       });

//       socket.addEventListener('close', () => {
//           console.log('WebSocket disconnected');
//       });

//       socket.addEventListener('error', (event) => {
//           console.error('WebSocket error:', event);
//           callback(event);
//       });

//       socket.addEventListener('message', (event) => {
//         const data = JSON.parse(event.data);
//         if (callbackFunction) {
//             callbackFunction(data);
//         }
//     });
//   };

//   const setCallback = (callback) => {
//     callbackFunction = callback;
//   };

//   const sendMessage = (channel, event, message) => {
//       if (socket && socket.readyState === WebSocket.OPEN) {
//           socket.send(JSON.stringify({
//             event: event,
//             data: { message },
//             channel: channel,
//         }));
//       } else {
//         setTimeout(() => {
//           connect();
//           console.error('WebSocket is not open. Ready state:', socket?.readyState);
//           sendMessage(channel, event, message);
//         }, 1000);
//       }
//   };

//   const disconnect = () => {
//       if (socket) {
//           socket.close();
//       }
//   };

//   return { connect, sendMessage, disconnect, socket, setCallback };
// }

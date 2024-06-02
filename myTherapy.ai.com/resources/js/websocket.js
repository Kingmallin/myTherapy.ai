// export default function WebSocketUtility() {
//   let socket;
//   const WEBSOCKET_URL = import.meta.env.VITE_REVERB_SCHEME === 'https'
//     ? `wss://${import.meta.env.VITE_REVERB_HOST}:${import.meta.env.VITE_REVERB_PORT ?? 443}/app/${import.meta.env.VITE_REVERB_APP_KEY}?protocol=7&client=js&version=8.4.0-rc2&flash=false`
//     : `ws://${import.meta.env.VITE_REVERB_HOST}:${import.meta.env.VITE_REVERB_PORT ?? 80}/app/${import.meta.env.VITE_REVERB_APP_KEY}?protocol=7&client=js&version=8.4.0-rc2&flash=false`;

//   const connect = () => {
//     socket = new WebSocket(WEBSOCKET_URL);

//     socket.addEventListener('open', function() {
//       console.log('WebSocket connected');
//     });

//     socket.addEventListener('close', function() {
//       console.log('WebSocket disconnected');
//     });

//     socket.addEventListener('error', function(event) {
//       console.error('WebSocket error:', event);
//     });
//   };

//   const subscribeToChannel = (channel, event, callback) => {
//     const subscribeMessage = {
//       event: "subscribe",
//       data: {},
//       channel: channel
//     };
//     socket.send(JSON.stringify(subscribeMessage));
    
//     socket.addEventListener(event, function(messageEvent) {
//       const data = JSON.parse(messageEvent.data);
//       if (data.channel === channel && data.event === event) {
//         callback(data);
//       }
//     });
//   };

//   const sendData = (channel, event, data) => {
//     const message = {
//       event: event,
//       data: data,
//       channel: channel,
//     };
//     socket.send(JSON.stringify(message));
//   };

//   const disconnect = () => {
//     if (socket) {
//       socket.close();
//     }
//   };

//   return { connect, subscribeToChannel, sendData, disconnect };
// }

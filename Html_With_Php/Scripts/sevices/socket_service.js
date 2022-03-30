import { io } from 'socket.io-client';
// const socket = io('http://localhost:8081');
// const sendMsg = document.getElementById('sendMsg');
// const message = document.getElementById('chatInput');
// const chatBox = document.getElementById('chat-box');


export default class Chat {

    socket = io('http://localhost:8081');
    sendMsg = document.getElementById('sendMsg');
    message = document.getElementById('chatInput');
    chatBox = document.getElementById('chat-box');
    connected = false;
    messageList = [];
    message = document.getElementById('chatInput');

    socketServiceConnect() {
        sendMsg.focus();
        socket.disconnect();
        socket.connect();
        this.connected = true;
        socket.emit('handshake', sessionStorage.getItem('email'));
        socket.on('full-chat', (messages) => chatRender(messages))
    }

    socketDisconnect() {
        socket.disconnect(socket);
        this.connected = false;
    }

    sendMessage() {
        const now = new Date();
        const date = now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + now.getDate();
        const time = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
        const dateTime = date + ' ' + time;
        const messageToSend = {
            message: this.message.value,
            time: dateTime,
            userName: sessionStorage.getItem('email')
        };
        this.socket.emit('send-message', messageToSend);
        this.messageList.push(messageToSend);
    }

    chatRender() {
        chatBox.innerHTML = '';
        obj.map(({ message, time, userName }) => {
            const chatMessage = document.createElement('div');
            const chatMessageBody = document.createElement('div');
            const chatMessageTime = document.createElement('p');
            const chatMessageUserName = document.createElement('p');
            chatMessageBody.innerHTML = item.message;
            chatMessageBody.className = 'chat-message-body'
            chatMessageTime.innerHTML = item.time;
            chatMessageUserName.innerHTML = item.userName;
            chatMessage.style.backgroundColor = 'white';
            chatMessage.style.margin = '1rem';
            chatMessage.style.borderRadius = '1rem'
            if (item.userName === sessionStorage.getItem('email')) {
                chatMessage.style.backgroundColor = 'lightblue';
            };
            chatMessage.append(chatMessageBody, chatMessageTime, chatMessageUserName);
            this.chatBox.append(chatMessage)

        })
    }
}



// export function socketServiceConnected() {
//     sendMsg.focus();
//     socket.disconnect();
//     socket.connect();
//     socket.emit('handshake', sessionStorage.getItem('email'));
//     socket.on('full-chat', (messages) => chatRender(messages))
//     sendMsg.addEventListener('click', (e) => {
//         e.preventDefault();
//         if (message.value !== '') {
//             const now = new Date();
//             const date = now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + now.getDate();
//             const time = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
//             const dateTime = date + ' ' + time;
//             const messageToSend = {
//                 message: message.value,
//                 time: dateTime,
//                 userName: sessionStorage.getItem('email')
//             };
//             socket.emit('send-message', messageToSend);
//             message.value = ''

//         }
//     });


//     socket.on('all-messages', (messages) => {
//         console.log(messages);
//         chatRender(messages)
//     })
// }

// export function socketDc() {
//     socket.disconnect(socket);
// }

// function chatRender() {
//     chatBox.innerHTML = '';
//     obj.map(({ message, time, userName }) => {
//         const chatMessage = document.createElement('div');
//         const chatMessageBody = document.createElement('div');
//         const chatMessageTime = document.createElement('p');
//         const chatMessageUserName = document.createElement('p');
//         chatMessageBody.innerHTML = item.message;
//         chatMessageBody.className = 'chat-message-body'
//         chatMessageTime.innerHTML = item.time;
//         chatMessageUserName.innerHTML = item.userName;
//         chatMessage.style.backgroundColor = 'white';
//         chatMessage.style.margin = '1rem';
//         chatMessage.style.borderRadius = '1rem'
//         if (item.userName === sessionStorage.getItem('email')) {
//             chatMessage.style.backgroundColor = 'lightblue';
//         };
//         chatMessage.append(chatMessageBody, chatMessageTime, chatMessageUserName);
//         chatBox.append(chatMessage)

//     })
// }
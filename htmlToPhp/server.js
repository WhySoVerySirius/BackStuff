const io = require('socket.io')(5000, {
    cors: {
        origin: ['http://localhost:8080', 'https://localhost:8080/?'],
    }
});

const _ = require('lodash');

let users = [];
const messages = [];

console.log('listening on port : 5000')
io.on('connection', socket => {
    console.log('connected with id: ' + socket.id)
    socket.on('handshake', (email) => {
        users.push({ email: email, socket: socket.id });
        socket.emit('all-messages', messages);
        console.log(users)
    });
    socket.on('send-message', message => {
        console.log(message + socket.id);
        messages.push(message);
        io.emit('full-chat', messages);
    });
    socket.on('disconnect', socket => {
        users = users.filter(obj => obj.socket === socket.id);
        console.log(users);
        console.log(socket.id + '  has disconnected')
    })
})
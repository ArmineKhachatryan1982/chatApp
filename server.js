// const express = require('express');

// const app = express();
// const server = require('http').createServer(app);

// const io = require('socket.io')(server,{
//    cors: {origin: "*"},
//    path: '/socket/io' // Set your custom path here
// });
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);


http.listen(3000,function(){
    console.log(4444444444)
})

io.on('connection',(socket) => {
    console.log('connection1');

    socket.on('sendChatToServer',(message) => {
        console.log(message);
        // get from server
        io.sockets.emit('sendChatToClient',message);
        // socket.broadcast.emit('sendChatToClient',message)

    });

    socket.on('disconnect',(socket) => {
        console.log('Disconnect');
    });
});

// server.listen(3000,() =>{
//     console.log('Server is runing');
// });

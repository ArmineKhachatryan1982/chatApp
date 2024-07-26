const express = require('express');
// import express from 'express';
// import { Server } from 'socket.io';

const app = express();
const server = require('http').createServer(app);

const io = require('socket.io')(server,{
   cors: {origin: "*"}
});

// const __dirname=resolve()

// app.use('/', express.static(path.join(__dirname, 'public')));

// const dotenv = configDotenv();
// app.set("view engine", "ejs")

// app.set("views", path.join(__dirname,"public"))

// app.get("/",(req,res)=> res.render("index",{roomId: null, cookie: null}))

io.on('connection',(socket) => {
    console.log('connection');

    socket.on('sendChatToServer',(message) => {
        console.log(message);
        // get from server
        // io.sockets.emit('sendChatToClient',message);
        socket.broadcast.emit('sendChatToClient',message)

    });

    socket.on('disconnect',(socket) => {
        console.log('Disconnect');
    });
});

server.listen(3000,() =>{
    console.log('Server is runing');
});

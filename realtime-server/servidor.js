// realtime-server/servidor.js
const express = require('express');
const http = require('http');
const { Server } = require('socket.io');

const app = express();
const server = http.createServer(app);
const io = new Server(server, {
  cors: {
    origin: "*",
    methods: ["GET", "POST"]
  }
});

let actasData = {}; // Guarda los datos de cada acta en RAM

io.on('connection', socket => {
  socket.on('join-acta', actaId => {
    socket.join(actaId);
    if (actasData[actaId]) {
      for (const [field, content] of Object.entries(actasData[actaId])) {
        socket.emit('update', { field, content });
      }
    }
  });

  socket.on('edit', ({ actaId, field, content }) => {
    if (!actasData[actaId]) actasData[actaId] = {};
    actasData[actaId][field] = content;
    socket.to(actaId).emit('update', { field, content });
  });
});

server.listen(3000, () => {
  console.log('🟢 Servidor Socket.IO en http://localhost:3000');
});
var express = require('express');
var mongoose = require('mongoose');
var app = express();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var server = app.listen(3000, () => {
 console.log('server is running on port', server.address().port);
});

// Tell JS that we are using a static file.
app.use(express.static(__dirname));

// Variable for our MongoDB database URL.
var db = 'mongodb+srv://H3xu55:S0l0men88%2A@cs313xchat-1jy52.mongodb.net/test?retryWrites=true&w=majority'

io.on('db', () =>{
 console.log('a user is connected')
})

// Connect to DB
mongoose.connect(db , (err) => {
	console.log('Database Connected',err);
})

// This is where the message model is defined
var Message = mongoose.model('Message',{ user : String, message : String})

// For bodyParser
var bodyParser = require('body-parser')
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: false}))

// get all the messages from the db
app.get('/messages', (req, res) => {
  Message.find({},(err, messages)=> {
    res.send(messages);
  })
})

// post new messages created by the user to the db
app.post('/messages', (req, res) => {
  var message = new Message(req.body);
  message.save((err) =>{
    if(err)
      sendStatus(500);
    io.emit('message', req.body);
    res.sendStatus(200);
  })
})
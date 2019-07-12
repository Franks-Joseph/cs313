var express = require('express');
var mongoose = require('mongoose');
var dotenv = require('dotenv');
var app = express();
var http = require('http').Server(app);
// var io = require('socket.io')(http);
var server = app.listen(3000, () => {
 console.log('server is running on port', server.address().port);
});

// Tell JS that we are using a static file.
app.use(express.static(__dirname));

dotenv.config();

// Variable for our MongoDB database URL.
var db = process.env.MONGO_DB;

// io.on('db', () =>{
//  console.log('a user is connected')
// })

// Connect to DB
// mongoose.connect(db , { useNewUrlParser: true }) => {
// 	console.log('Database Connected',err);
// }

 mongoose.connect(db, { useNewUrlParser: true }) .then(() => console.log('MongoDB Connected'))
   .catch(err => console.log(err));


// This is where the message model is defined
var Message = mongoose.model('Message',{ user : String, message : String})

// For bodyParser
var bodyParser = require('body-parser')
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: true}))

// get all the messages from the db
app.get('/messages', (req, res) => {
  Message.find({},(err, messages)=> {
    res.send(messages);
  })
})

// post new messages created by the user to the db
// app.post('/messages', (req, res) => {
//   var message = new Message(req.body);
//   message.save((err) =>{
//     if(err)
//       sendStatus(500);
//     io.emit('message', req.body);
//     res.sendStatus(200);
//   })
// })
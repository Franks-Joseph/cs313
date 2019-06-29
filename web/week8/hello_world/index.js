const http = require('http')
const fs = require('fs')

var jsonObj;
var jsonArr;

console.log("listening on: localhost:8888");
console.log("Access by: http://localhost:8888/home");

const server = http.createServer(function(req, r) {

    switch (req.url) {
        case '/home':
            r.writeHead(200, { 'Content-Type': 'text/html' });
            r.write("<h1>Welcome to the Home Page</h1>");
            r.end();
            break;

        case '/info':
            jsonObj = fs.readFileSync("profile.json");
            jsonArr = JSON.parse(jsonObj);

            r.writeHead(200, { 'Content-Type': 'application/json' });
            r.write("My Name: " + jsonArr.name + "\n");
            r.write("Current Class: " + jsonArr.class + "\n");
            r.write("Stringify JSON Object: " + JSON.stringify(jsonArr));
            r.end();
            break;

        default:
            r.writeHead(404, { "Content-Type": "text/html" });
            r.write('404: Page Not Found');
            r.end();
    }

}).listen(8888);
/* 
 * Server-Side Web Scripting: Node.js
 * Handling HTTP Requests
 */

const http = require('http');

const host = 'localhost';
const port = 8001;

const server = http.createServer();

server.on('request', handler);

server.listen(
    port, 
    host, 
    () => { console.log(`Node.js HTTP Server at http://${host}:${port} started..`); }
);


function handler(request, response) {
    var method = request.method;
    var url = request.url;
    var httpVersion = request.httpVersion;

    var headers = JSON.stringify(request.headers, null, 4);

    var body = [];
    request.on('data', data => { body.push(data); });

    request.on('end', () => {
        console.log('\n\nRequest Details:\n');
        console.log(`Method: ${method}`);
        console.log(`Request URI: ${url}`);
        console.log(`HTTP Version: ${httpVersion}`);
        console.log(`\nMessage Headers:\n${headers}`);
        console.log(`\nMessage Body:\n${Buffer.concat(body).toString()}`);
        
        response.end();
    });
}


// alternatively..
// http.createServer((request, response) => {
//     request processing code here..
// }).listen(port, host);

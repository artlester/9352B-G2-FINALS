var mysql = require('mysql');
var http = require('http');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database:"audirentur"
});

con.connect(function(err) {
  if (err) throw err;
  con.query("SELECT * FROM customers", function (err, result, fields) {
    if (err) throw err;
    console.log(result);
  });
});

http.createServer(function (req, res) {
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.end('Hello World!');
}).listen(8001);